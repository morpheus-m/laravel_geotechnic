<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Geotechnic;
use App\Models\Installment;
use App\Models\Owner;
use App\Models\TwoFactorAuthentication;
use App\Traits\SendSms;
use App\Traits\Uploder;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GeoTechnicsController extends Controller
{
    use SendSms, Uploder;

    public function index()
    {
        $geotechnics = Geotechnic::where('user_id', auth()->user()->id)->get();

        return view('admin.geotechnics.index', compact('geotechnics'));
    }

    public function create()
    {

        $land_costs = [
            'fine_grained_lands' => ' ریزدانه ای',
            'sandy_alluvial_soils' => 'آبرفتی ماسه ای',
            'large_sand_alluvium' => 'آبرفتی شن درشت',
        ];

        return view('admin.geotechnics.create', compact('land_costs'));

    }

    public function store(Request $request)
    {

        // validation fields
        $this->validateForm($request);

        $data = [
            'user_id' => auth()->user()->id,
            'map_registration_number' => $request->post('map_registration_number'),
            'total_building_area' => (int)$request->post('total_building_area'),
            'type_of_land' => $request->post('type_of_land'),
            'number_of_floors' => (int)$request->post('number_of_floors'),
            'occupancy_level_downstairs' => (int)$request->post('occupancy_level_downstairs'),
            'number_of_underground_floors' => (int)$request->post('number_of_underground_floors'),
            'number_of_machine_boreholes' => (int)$request->post('number_of_machine_boreholes'),
            'machine_bore_depth' => $request->post('machine_bore_depth'),
            'number_of_manual_wells' => (int)$request->post('number_of_manual_wells'),
            'manual_well_depth' => $request->post('manual_well_depth'),
            'guard_structure' => $request->post('guard_structure'),
            'upload_and_cut_in_place' => $request->post('upload_and_cut_in_place'),
            'in_well_vibration_test' => $request->post('in_well_vibration_test'),
            'bedrock' => $request->post('bedrock'),
            'drilling_surcharge' => $request->post('drilling_surcharge'),
            'number_of_payment' => $request->post('number_of_payment'),
        ];


        $cost_of_studies = $this->calCulateCostOfStudeis($data);
        $data['cost_of_studies'] = $cost_of_studies;

        $cost_of_membership = $this->calCulateCostOfMembership($data);
        $data['cost_of_membership'] = $cost_of_membership;

        $data['total_cost'] = $cost_of_studies + $cost_of_membership;


        $geotechnic = Geotechnic::create($data);


        //  calculate installments section
        $this->CalculateInstallment($geotechnic);


        return redirect()->route('admin.geotechnics.complete-register', $geotechnic);


    }

    public function completeRegister(Geotechnic $geotechnic)
    {
        $studies_installments = $geotechnic->installments->where('type', Installment::STUDIES);
        $membership_installments = $geotechnic->installments->where('type', Installment::MEMBERSHIP);
        return view('admin.geotechnics.complete-register', compact('geotechnic', 'studies_installments', 'membership_installments'));
    }


    public function completeRegisteStore(Request $request, Geotechnic $geotechnic)
    {

        // validation fields
        $request->validate([
            'f_name' => ['required'],
            'l_name' => ['required'],
            'code_melli' => ['required'],
            'mobile' => ['required'],
            'address' => ['required'],
            'registration_plate' => ['required'],
            'code' => ['required', Rule::exists('two_factor_authentications', 'code')->where('type', 'owner')]
        ], [
            '*.required' => 'فیلد :attribute الرامی است',
            'code.exists' => 'کد وارد شده صحیح نمیباشد',
        ]);

        // delete two_factor_authentication code
        TwoFactorAuthentication::where('code', $request->input('code'))->delete();


        $data = [
            'f_name' => $request->post('f_name'),
            'l_name' => $request->post('l_name'),
            'code_melli' => $request->post('code_melli'),
            'mobile' => $request->post('mobile'),
            'address' => $request->post('address'),
            'registration_plate' => $request->post('registration_plate'),
        ];

        $owner = $geotechnic->owner()->create($data);

        if ($owner instanceof Owner)
            return redirect()->route('admin.geotechnics')->with(['geotechnic-created-success' => 'ثبت پرونده ژئوتکنیک شما با موفقیت انجام شد']);

    }


    private function validateForm(Request $request)
    {
        $request->validate([
            'map_registration_number' => ['required', 'unique:geotechnics'],
            'total_building_area' => ['required'],
            'type_of_land' => ['required', 'in:fine_grained_lands,sandy_alluvial_soils,large_sand_alluvium'],
            'number_of_floors' => ['required'],
            'occupancy_level_downstairs' => ['required'],
            'number_of_underground_floors' => ['required'],
            'number_of_machine_boreholes' => ['required','gt:0'],
            'machine_bore_depth' => ['required_if:bedrock,no'],
            'number_of_manual_wells' => ['required'],
            'manual_well_depth' => ['required_if:number_of_manual_wells,gt:0'],
            'guard_structure' => ['required', Rule::in(['yes', 'no'])],
            'upload_and_cut_in_place' => ['required', Rule::in(['yes', 'no'])],
            'in_well_vibration_test' => ['required', Rule::in(['yes', 'no'])],
            'bedrock' => ['required', Rule::in(['yes', 'no'])],
            'drilling_surcharge' => ['required', Rule::in(['yes', 'no'])],
            'number_of_payment' => ['required', Rule::in(['Cash', 'One_Installment', 'Two_Installment', 'Three_Installment'])],
        ], [
            'type_of_land.in' => 'مقدار فیلد صحیح نمیباشد',
            '*.in' => 'یکی از گزینه ها را انتخاب کنید'
        ]);

    }

    private function calCulateCostOfStudeis(array $data)
    {
        $cost_of_studies = 0;


        if ($data['guard_structure'] == 'yes')
            $cost_of_studies = (int)$data['number_of_underground_floors'] * 2000000;


        $area_cost = 0;
        if ($data['total_building_area'] <= 2000)
            $area_cost = 20000000;
        else
            $area_cost = $data['total_building_area'] * 8000;

        $cost_of_studies += $area_cost;

        return $cost_of_studies + (($cost_of_studies * 9) / 100);

    }

    private function calCulateCostOfMembership(array $data)
    {
        $cost_of_membership = 0;


        // #1
        if ($data['bedrock'] == 'yes')
            $cost_of_membership += $data['number_of_machine_boreholes'] * 9300000;
        elseif ($data['bedrock'] == 'no')
            $cost_of_membership += array_sum($data['machine_bore_depth']) * $this->getLandPriceByType($data['type_of_land']);


        // #2
        if (!is_null($data['manual_well_depth'])) {

            $cost_of_membership += array_sum($data['manual_well_depth']) * 250000;
        }


        // #3
        if ($data['in_well_vibration_test'] == 'yes')
            $cost_of_membership += 1500000;

        // #4
        if ($data['upload_and_cut_in_place'] == 'yes')
            $cost_of_membership += 10000000;

        // #5
        if ($data['drilling_surcharge'] == 'yes')
            $cost_of_membership += 2000000;

        return $cost_of_membership;
    }

    private function calCulateTotalCost(array $data)
    {
        $total_cost = 0;

        $land_price = $this->getLandPriceByType($data['type_of_land']);

        dd($land_price);
    }

    private function getLandPriceByType(string $type)
    {

        $price = 0;
        switch ($type) {
            case Geotechnic::FINE_GRAINED_LANDS:
                $price = 300000;
                break;
            case Geotechnic::SANDY_ALLUVIAL_SOILS:
                $price = 350000;
                break;
            case Geotechnic::LARGE_SAND_ALLUVIUM:
                $price = 400000;
                break;
        }

        return $price;
    }

    private function CalculateInstallment(Geotechnic $geotechnic)
    {
        switch ($geotechnic['number_of_payment']) {
            case Installment::CASH:

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه نقدی ',
                    'amount' => $geotechnic['cost_of_studies'],
                    'type' => Installment::STUDIES,
                    'status' => Installment::UNPAID,
                ];

                $installment = Installment::create($data);

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه نقدی ',
                    'amount' => $geotechnic['cost_of_membership'],
                    'type' => Installment::MEMBERSHIP,
                    'status' => Installment::UNPAID,
                ];

                $installment = Installment::create($data);

                break;
            case Installment::ONE_INSTALLMENT:

                $study_amount = $geotechnic['cost_of_studies'] / 2;

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه پیش پرداخت',
                    'amount' => $study_amount,
                    'type' => Installment::STUDIES,
                    'status' => Installment::UNPAID,
                ];
                Installment::create($data);

                $data['title'] = 'هزینه قسط اول';
                Installment::create($data);

                $membership_amount = $geotechnic['cost_of_membership'] / 2;

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه پیش پرداخت',
                    'amount' => $membership_amount,
                    'type' => Installment::MEMBERSHIP,
                    'status' => Installment::UNPAID,
                ];
                Installment::create($data);

                $data['title'] = 'هزینه قسط اول';
                Installment::create($data);

                break;
            case Installment::TWO_INSTALLMENT:
                $study_amount = $geotechnic['cost_of_studies'] / 3;

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه پیش پرداخت',
                    'amount' => $study_amount,
                    'type' => Installment::STUDIES,
                    'status' => Installment::UNPAID,
                ];
                Installment::create($data);

                $data['title'] = 'هزینه قسط اول';
                Installment::create($data);

                $data['title'] = 'هزینه قسط دوم';
                Installment::create($data);

                $membership_amount = $geotechnic['cost_of_membership'] / 3;

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه پیش پرداخت',
                    'amount' => $membership_amount,
                    'type' => Installment::MEMBERSHIP,
                    'status' => Installment::UNPAID,
                ];
                Installment::create($data);

                $data['title'] = 'هزینه قسط اول';
                Installment::create($data);

                $data['title'] = 'هزینه قسط دوم';
                Installment::create($data);
                break;

            case Installment::THREE_INSTALLMENT:
                $study_amount = $geotechnic['cost_of_studies'] / 4;

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه پیش پرداخت',
                    'amount' => $study_amount,
                    'type' => Installment::STUDIES,
                    'status' => Installment::UNPAID,
                ];
                Installment::create($data);

                $data['title'] = 'هزینه قسط اول';
                Installment::create($data);

                $data['title'] = 'هزینه قسط دوم';
                Installment::create($data);

                $data['title'] = 'هزینه قسط سوم';
                Installment::create($data);

                $membership_amount = $geotechnic['cost_of_membership'] / 4;

                $data = [
                    'geotechnic_id' => $geotechnic['id'],
                    'title' => 'هزینه پیش پرداخت',
                    'amount' => $membership_amount,
                    'type' => Installment::MEMBERSHIP,
                    'status' => Installment::UNPAID,
                ];
                Installment::create($data);

                $data['title'] = 'هزینه قسط اول';
                Installment::create($data);

                $data['title'] = 'هزینه قسط دوم';
                Installment::create($data);

                $data['title'] = 'هزینه قسط سوم';
                Installment::create($data);
                break;
        }

        return true;
    }
}
