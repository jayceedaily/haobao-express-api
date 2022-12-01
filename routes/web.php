<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', function() {

// Put your key and secret here
$key = "pk_test_27fbea56bd355d0f8761fabc29124809"; // put your lalamove API key here
$secret = "sk_test_N2Ekx77F6t8wnfP6V3M9sT9LBhwfbMbV9bxcmeOhxnrLKrb8+JB/dI47ClsureVI"; // put your lalamove API secret here

$time = time() * 1000;
$baseURL = "https://rest.sandbox.lalamove.com"; // URl to Lalamove Sandbox API
$method = 'POST';
$path = '/v2/quotations';
$region = 'PH_PAM';

// Please, find information about body structure and passed values here https://developers.lalamove.com/#get-quotation
$body = '{
    "serviceType": "MOTORCYCLE",
    "stops": [
        {
            "location": {
                "lat": "15.1457427",
                "lng": "120.5930867"
            },
            "addresses": {
                "en_PH": {
                    "displayString": "Hao Bao Wonton Noodles",
                    "market": "PH_PAM"
                }
            }
        },
        {
            "location": {
                "lat": "15.1443576",
                "lng": "120.5574333"
            },
            "addresses": {
                "en_PH": {
                    "displayString": "Mcdo Friendship",
                    "market": "PH_PAM"
                }
            }
        }
    ],
    "deliveries": [
        {
            "toStop":1,
            "toContact": {
                "name": "Jaycee Mariano",
                "phone": "09991781308"
            },
            "remarks": "In front of AUF"
        }
    ],
    "requesterContact": {
        "name": "Nova Opinga",
        "phone": "09991781308"
    }
}';

$rawSignature = "{$time}\r\n{$method}\r\n{$path}\r\n\r\n{$body}";
$signature = hash_hmac("sha256", $rawSignature, $secret);
$startTime = microtime(true);
$token = $key.':'.$time.':'.$signature;

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => $baseURL.$path,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 3,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HEADER => false, // Enable this option if you want to see what headers Lalamove API returning in response
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $body,
    CURLOPT_HTTPHEADER => array(
        "Content-type: application/json; charset=utf-8",
        "Authorization: hmac ".$token, // A unique Signature Hash has to be generated for EVERY API call at the time of making such call.
        "Accept: application/json",
        "X-LLM-Market: {$region}" // Please note to which city are you trying to make API call
    ),
));

$response = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

return response($response);

echo "Total elapsed http request/response time in milliseconds: ".floor((microtime(true) - $startTime)*1000)."\r\n";
echo "Authorization: hmac ".$token."\r\n";
echo 'Status Code: '. $http_code."\r\n";
echo 'Returned data: '.$response."\r\n";
});
