<?php

namespace celebre\src\control\util;;

class ErroId{
    static public function gerarErroId($string){
        return md5($string);
    }
}