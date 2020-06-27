<?php

namespace celebre\src\control\router;

use celebre\src\control\util\Config;
use celebre\src\control\util\Util;
use celebre\src\models\classes\ReturnApi;
use Firebase\JWT\JWT;
use Slim\Http\Request;
use Slim\Http\Response;

class BaseRouter {
    static public function validateUserBase ( Request $request, Response $response ) {
        $returnApi = new ReturnApi;
        $validator = Util::validacaoUser($request);
        if (!$validator[0])
            return $response->withJson($returnApi->setMessage( $validator[1]), 401);

    }
    static public function createAcess( Request $request, Response $response ) {
        $body = $request->getParsedBody();
        $returnApi = new ReturnApi;
        //Validate request
        if (!isset($body['password']) || !isset($body['cpf'])) {
            return $response->withJson($returnApi->setMessage( 'A requisicao nao esta completa' ), 400);
        }
        /**
         * Valida o login
         */
        if( $body['password'] != 123 || $body['cpf'] != "479.315.618-56" )
            return $response->withJson( $returnApi->setMessage("Usuario ou senha incorretos"), 401 );
        $config = new Config;
        $key = $config->returnPass();
        $payload = array(
            "id" => 123,
        );
        $jwt = JWT::encode($payload, $key);
        
        return $response->withJson( $returnApi->setData(["nome" => 'Fernando', "jwt" => $jwt]), 200 );
        
    }
}