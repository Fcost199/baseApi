<?php

namespace celebre\src\control\util;
use Firebase\JWT\JWT;

;

class Util
{
    static public function validaJWT($request){
        $jwt = $request->getHeader('HTTP_AUTHORIZATION');
        $jwt = str_replace('Bearer ', '', $jwt[0]);
        $decoded = JWT::decode($jwt, 'SAC3JFD', ['HS256']);
        return $decoded;
    }
    static public function ymdToDmy($string)
    {
        $date = new \DateTime($string);
        return $date->format('d/m/Y');
    }
    static public function dmyToYmd($string)
    {
        if (!$string)
            return false;
        $date = \DateTime::createFromFormat("d/m/Y", $string);
        $string = date_format($date, "Y-m-d");
        return $string;
    }
    static public function converterFloat($valor)
    {
        if ($valor == null) {
            return false;
        }
        $valor = str_replace(',', '.', str_replace('.', '', $valor));
        return $valor;
    }
    static public function converterFloatToString($valor)
    {
        if ($valor == null) {
            return false;
        }
        $valor = str_replace('.', ',', $valor);
        return $valor;
    }
    static public function search($array, $key, $value)
    {
        $results = array();

        if (is_array($array)) {
            if (isset($array[$key]) && $array[$key] == $value) {
                $results[] = $array;
            }

            foreach ($array as $subarray) {
                $results = array_merge($results, self::search($subarray, $key, $value));
            }
        }

        return $results;
    }
    public static function date_compare($element1, $element2)
    {
        // echo "Element 1: " . $element1[1] . "<br>";
        // echo "Element 2: " . $element2[1] . "<br>";
        // echo "<br><br>";
        return $element1[1] > $element2[1];
    }
    public static function calculaPorte($numeroVidas){
        if(!ValidarCampo::validarNumber($numeroVidas)){
            return false;
        }
        if($numeroVidas >= Config::$PMEI[0] && $numeroVidas <= Config::$PMEI[1]){
            return'PME Porte I [2,29]';
        } else if($numeroVidas >= Config::$PMEII[0] && $numeroVidas <= Config::$PMEII[1]){
            return'PME Porte II [30,99]';
        } else if($numeroVidas >= Config::$EMPRESARIALI[0] && $numeroVidas <= Config::$EMPRESARIALI[1]){
            return'Empresarial Porte I [100,249]';
        } else if($numeroVidas >= Config::$EMPRESARIALII[0] && $numeroVidas <= Config::$EMPRESARIALII[1]){
            return'Empresarial Porte II [250,499]';
        } else if($numeroVidas >= Config::$EMPRESARIALIII[0] && $numeroVidas <= Config::$EMPRESARIALIII[1]){
            return'Empresarial Porte III [+500]';
        } else {
            return 'As vidas não entrem em nenhum porte';
        }
    }
}
