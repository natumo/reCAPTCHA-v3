<?php

namespace App\Helper;

class ReCaptcha3
{
    static $captchaSecretKey = '$captchaSecretKey';

    public static function check($captchaKey)
    {
        $captchaResult = self::getResult($captchaKey);
        return ($captchaResult->success == true && $captchaResult->score > 0.5);
    }

    public static function getResult($captchaKey)
    {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . self::$captchaSecretKey . "&response={$captchaKey}");
        return json_decode($response);
    }

}