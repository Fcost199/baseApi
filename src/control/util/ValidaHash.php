<?php

namespace celebre\src\control\util;;

date_default_timezone_set('America/Sao_Paulo');

class ValidaHash
{
    public function validaHashTrocaSenha($hash)
    {
        $atual = md5('wonthack'.date('dmyH'));
        $atualMaisUm = md5('wonthack'.date('dmyH', strtotime('+1 hour')));

        if ($hash == $atual || $hash == $atualMaisUm)
            return true;
        return false;
    }
}
