<?php

namespace celebre\src\control\util;;

date_default_timezone_set('America/Sao_Paulo');

class GeradorHash
{
    static public function gerarHashTrocaSenha()
    {
        if (date('i') >= 50)
            $hash = md5('wonthack'.date('dmyH', strtotime('+1 hour')));
        else
            $hash = md5('wonthack'.date('dmyH'));

        return $hash;
    }
}
