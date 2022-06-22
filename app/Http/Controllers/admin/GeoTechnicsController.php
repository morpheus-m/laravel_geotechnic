<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Geotechnic;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class GeoTechnicsController extends Controller
{
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

        $this->validateForm($request, 1);

        $data = [
            'user_id' => auth()->user()->id,
            'map_registration_number' => $request->post('map_registration_number'),
            'total_building_area' => $request->post('total_building_area'),
            'type_of_land' => $request->post('type_of_land'),
            'number_of_floors' => $request->post('number_of_floors'),
            'occupancy_level_downstairs' => $request->post('occupancy_level_downstairs'),
            'number_of_underground_floors' => $request->post('number_of_underground_floors'),
            'number_of_machine_boreholes' => $request->post('number_of_machine_boreholes'),
            'machine_bore_depth' => $request->post('machine_bore_depth'),
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

        $data['total_of_cost'] = $cost_of_studies + $cost_of_membership;

        dd($data);

        $total_cost = $this->calCulateTotalCost($data);

    }

    public function completeRegister(Geotechnic $geotechnic, Request $request)
    {
        dd($geotechnic, $request->all());
    }

    private function validateForm(Request $request, $step)
    {
        if ($step == 1) {
            $request->validate([
                'map_registration_number' => ['required', 'unique:geotechnics'],
                'total_building_area' => ['required'],
                'type_of_land' => ['required', 'in:fine_grained_lands,sandy_alluvial_soils,large_sand_alluvium'],
                'number_of_floors' => ['required'],
                'occupancy_level_downstairs' => ['required'],
                'number_of_underground_floors' => ['required'],
                'number_of_machine_boreholes' => ['required'],
                'machine_bore_depth' => ['required_if:bedrock,no'],
                'number_of_manual_wells' => ['required'],
                'manual_well_depth' => ['required'],
                'guard_structure' => ['required'],
                'upload_and_cut_in_place' => ['required'],
                'in_well_vibration_test' => ['required'],
                'bedrock' => ['required'],
                'drilling_surcharge' => ['required'],
                'number_of_payment' => ['required'],
            ]);
        }
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


        return $cost_of_studies + (($cost_of_studies * 9) / 100);

    }


    private function calCulateCostOfMembership(array $data)
    {
        $cost_of_membership = 0;


        // #1
        if ($data['bedrock'] == 'yes')
            $cost_of_membership += $data['number_of_machine_boreholes'] * 9300000;
        elseif ($data['bedrock'] == 'no')
            $cost_of_membership+= array_sum($data['machine_bore_depth']) * $this->getLandPriceByType($data['type_of_land']);

        // #2
        $cost_of_membership+= array_sum($data['machine_bore_depth']) * 250000;

        // #3
        if($data['in_well_vibration_test'] == 'yes')
            $cost_of_membership+= 1500000;

        // #4
        if($data['upload_and_cut_in_place'] == 'yes')
            $cost_of_membership+= 10000000;

        if($data['drilling_surcharge'] == 'yes')
            $cost_of_membership+= 2000000;

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
}
