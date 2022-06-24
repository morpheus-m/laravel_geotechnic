<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\TwoFactorAuthentication;
use App\Traits\SendSms;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
    use SendSms;


    public function verify(Request $request)
    {
        $response = [];

        $mobile = $request->input('mobile');
        $code = $this->generateCode();


        $data = [
            'mobile' => $mobile,
            'code' => $code,
            'type' => 'owner',
        ];

        $two_factor = TwoFactorAuthentication::where('mobile', $mobile)->where('type', 'owner')->first();


        if ($two_factor instanceof TwoFactorAuthentication) {
            $two_factor->update([
                'code' => $code
            ]);
        } else
            $two_factor = TwoFactorAuthentication::create($data);


        $message = " کد احراز هویت مالک : $code";
        if ($this->sendSms([$mobile], $message)) {

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

        return response()->json($response, 200);
    }
}
