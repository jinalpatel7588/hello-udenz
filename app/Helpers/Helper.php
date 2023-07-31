<?php

namespace App\Helpers;


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
}
