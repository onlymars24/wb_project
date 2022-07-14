<?php

namespace App\Services;


class WbService
{
    private $token = 'ODVkNjhlYmQtYWMzOS00ZTk2LWJkZGEtM2VhNmQ1ZjYwMzdj';

    public static function result($api){
        $url = 'https://suppliers-stats.wildberries.ru/api/v1/supplier'.$api;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);

        return encode_json($result);
    }
}