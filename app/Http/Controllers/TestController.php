<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;


class TestController extends Controller
{
    public function send(){
        $curl = curl_init();

        $secret_key = "##subf837tb23b##SGWYESSISHOP##LINKAJA##TES123##150000##PUSHTOPAY##fbkgev7muqa8g48q##";
        $strUpper = strtoupper($secret_key);
        $sha256 = hash('sha256', $strUpper);
        $username = "SGWYESSISHOP";
        $password = 'SGWYESSISHOP';

        $hash = base64_encode($username.":".$password);

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://sandbox-api.espay.id/rest/digitalpay/pushtopay',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => 'rq_uuid=subf837tb23b&rq_datetime=2020-12-15 06:00:45&comm_code=SGWYESSISHOP&order_id=TES123&product_code=LINKAJA&amount=150000&customer_id=087888088202&description=payment&signature='.$sha256,
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic ' . $hash
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }

    public function loginprocess(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email' => $email , 'password' => $password])){
            echo 'you are loged in';
            //return redirect('/admin/home');
        }
        else{
            return redirect()->back();
        }
    }
}
