<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\TwoFactorAuthentication;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\SendSms;

class LoginController extends Controller
{
    use SendSms;
    public function loginForm()
    {
        return view('auth.login');
    }


    public function login(Request $request)
    {


        $request->validate([
            'mobile' => ['required', 'exists:users'],
            'code' => ['required', 'digits:4'],
        ], [
            '*.required' => 'فیلد مورد نظر اجباری است',
            'mobile.exists' => 'شماره وارد شده ثبت نشده است',
            'code.digits' => 'کد تائید باید 4 رقم باشد',
        ]);


        $mobile = $request->input('mobile');
        $code = $request->input('code');
//        $type[] =TwoFactorAuthentication::query()->select('type')->get();



        // check if code is correct or not
        $two_factor = TwoFactorAuthentication::where('mobile', $mobile)->first();

        if ($two_factor['code'] != $code)
            return redirect()->back()->with(['code-failed' => ' کد وارد شده صحیح نمیباشد']);
        else {

            $two_factor->delete();

            $user = User::where('mobile', $mobile)->first();

            if (Auth::loginUsingId($user['id']))
            {
                return redirect()->route('admin.dashboard');

//                if ($type['user']){
//                    return redirect()->route('admin.dashboard');
//                }
//
//                elseif ($type['superadmin']){
//                    return redirect()->route('super-admin.manager-dashboard');
//                    }

            }

        }
    }

    public function logout()
    {
        $user = auth()->user();
        Auth::logout($user);
        return redirect()->route('auth.login.form');
    }


    public function sendCode(Request $request)
    {

        $response = [];

        $mobile = $request->input('mobile');

        $code = $this->generateCode();

        $user = User::where('mobile', $mobile)->first();

//        $type[]=User::query()->select('type')->where('mobile', $mobile)->get();

        if ($user) {

            $data = [
                'mobile' => $user->mobile,
                'code' => $code,
                'type' => 'user',
            ];

            $two_factor = TwoFactorAuthentication::where('mobile', $user->mobile)->first();

            if ($two_factor instanceof TwoFactorAuthentication) {

                $two_factor->update([
                    'code' => $code
                ]);

            } else
                TwoFactorAuthentication::create($data);


            if ($this->sendSms($data)) {

                $response = [
                    'status' => 1,
                    'msg' => 'ارسال اس ام اس با موفقیت انجام شد'
                ];

                return response()->json($response, 200);

            } else {
                $response = [
                    'status' => 0,
                    'msg' => 'ارسال اس ام اس با خطا مواجه شده است'
                ];

                return response()->json($response, 200);
            }
        }

        $response = [
            'status' => 0,
            'msg' => 'چنین کاربری ثبت نشده است'
        ];

        return response()->json($response, 200);

    }

    private function generateCode()
    {
        $code = "";
        do {
            $code = rand(1000, 9999);
        } while (TwoFactorAuthentication::where('code', $code)->first());

        return $code;
    }

    private function sendSms($data)
    {
        $url = "https://ippanel.com/services.jspd";

        $rcpt_nm = array($data['mobile']);
        $param = array
        (
            'uname' => 'hhaaddii4303',
            'pass' => 'Hadi43003',
            'from' => '+983000505',
            'message' => " کد تائید ورود به سامانه انجمن صنفی البرز : {$data['code']}",
            'to' => json_encode($rcpt_nm),
            'op' => 'send',
        );

        $handler = curl_init($url);
        curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
        curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handler);

        $response = json_decode($response);
        $res_code = $response[0];
        $res_data = $response[1];

        return ($res_code == 0) ? true : false;

    }

}
