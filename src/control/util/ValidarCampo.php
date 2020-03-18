<?php

namespace celebre\src\control\util;

use Firebase\JWT\JWT;

;

class ValidarCampo
{
    static public function validarString($string)
    {
        if (is_null($string))
            return false;
        if (empty($string))
            return false;
        return true;
    }
    static public function validarDate($date)
    {
        $format = 'Y-m-d';
        if (is_null($date))
            return false;
        if (empty($date))
            return false;
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    static public function validarDateTime($date)
    {
        $format = 'Y-m-d h:M:i';
        if (is_null($date))
            return false;
        if (empty($date))
            return false;
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    static public function validarDateDMY($date)
    {
        $format = 'd/m/Y';
        if (is_null($date))
            return false;
        if (empty($date))
            return false;
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
    static public function validarEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL))
            return true;
        else
            return false;
    }
    static public function validarBoolean($bool)
    {
        if ($bool == 'false' || $bool == 'true' || $bool == '1' || $bool == '0' || $bool == true || $bool == false)
            return true;
        else
            return false;
    }
    static public function validarArray($array){
        return is_array($array);
    }
    static public function validarNumber($n){
        if (!is_numeric($n)) {
            return false;
        } else {
            return true;
        }
    }
    static public function validaJWT($jwt, $key){
        $decoded = JWT::decode($jwt, $key, array('HS256'));
        return $decoded;
    }
}
