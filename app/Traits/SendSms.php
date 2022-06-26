<?php


namespace App\Traits;


use App\Models\TwoFactorAuthentication;

trait SendSms
{
    private function generateCode()
    {
        $code = "";
        do {
            $code = rand(1000, 9999);
        } while (TwoFactorAuthentication::where('code', $code)->first());

        return $code;
    }

    private function sendSms(array $to = [],$message)
    {
        $url = "https://ippanel.com/services.jspd";

        $rcpt_nm = array($to);
        $param = array
        (
            'uname' => 'hhaaddii4303',
            'pass' => 'Hadi43003',
            'from' => '+983000505',
            'message' => $message,
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
