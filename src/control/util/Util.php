<?php

namespace celebre\src\control\util;
use Firebase\JWT\JWT;

;

class Util
{
    static public function validacaoUser($request, $permissao = null)
    {
        $jwt = Util::validaJWT($request);
        /**
         * JWT possui
         * ID do usuario
         */
        //Validate request
        if( $jwt->id != 123 )
            return array( false, "Usuario não possui acesso!" );
        else
            Config::$USUARIOREQUEST = ["nome" => "Fernando", "cpf" => "479.315.618-56", "id" => "123"];

        return array(true, Config::$USUARIOREQUEST);
    }
    static public function validaJWT($request){
        $jwt = $request->getHeader('HTTP_AUTHORIZATION');
        $jwt = str_replace('Bearer ', '', $jwt[0]);
        $config = new Config;
        $decoded = JWT::decode($jwt, $config->returnPass(), ['HS256']);
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
}
