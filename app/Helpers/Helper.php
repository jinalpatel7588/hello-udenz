<?php

namespace App\Helpers;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class Helper
{
    static public function curlPostAPICall($data, $url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $response = curl_exec($ch);
        if (isset($response)) {
            return $response;
        } else {
            return '';
        }
    }

    public static function getBaseUrl()
    {
        $appUrl = env('APP_URL');
        $url = "$appUrl/api/";
        return $url;
    }

    public static function randomString()
    {
        try {
            $alphabet = 'abcdefghijklmnopqrstuvwxyz'; // all alphabets in lowercase
            $randomAlphabets = Str::random(2, $alphabet); // generate 2 random alphabetic characters

            $randomNumber = Str::random(10, '0123456789'); // generate a random 10-digit number

            $randomString = $randomAlphabets . $randomNumber; // concatenate the alphabets and the number

            return $randomString; // Output the generated string
        } catch (Exception $exception) {
            Log::error('error : ' . $exception->getMessage());
        }
    }
}
