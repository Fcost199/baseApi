<?php

include './src/autoload.php';

use celebre\src\control\scripts\CorretoraS;
use celebre\src\control\scripts\Login;
use celebre\src\control\scripts\PermissaoS;
use Firebase\JWT\JWT;
use celebre\src\control\scripts\UsuarioS;
use celebre\src\control\util\Config;
use celebre\src\control\util\Email;
use celebre\src\control\util\Util;
use celebre\src\models\bd\DBH;
use celebre\src\models\dao\PermissaoDAO;
use celebre\src\models\dao\UsuarioDAO;

include_once 'vendor/autoload.php';

$config['displayErrorDetails'] = true;

$app = new \Slim\App(['settings' => $config]);

$app->add(new Tuupola\Middleware\CorsMiddleware([
    "origin" => ["*"],
    "methods" => ["GET", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"],
    "headers.allow" => ["Content-type", "Authorization"],
    "headers.expose" => [],
    "credentials" => false,
    "cache" => 0
]));

$app->add(new Tuupola\Middleware\JwtAuthentication([
    "path" => [], //End-points bloqueados com JWT
    "ignore" => [], // End-points ignorados pelo JWT
    "secret" => "telegram", // Senha para decodificar o JWT
    "error" => function ($response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]));

$app->options('*', function ($request, $response) {
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200)
        ->withJson("ok");
});
/* Exemplo
    $app->post('/usuario/autenticar/', function ($request, $response) {
        $body = $request->getParsedBody();
        //Validate request
        if (!isset($body['password']) || !isset($body['cpf'])) {
            return $response->withJson('A requisicao nao esta completa', 400);
        }

        //Okay
        // Valida se o o login do usuario 

        if (!$usuario = Login::validarLogin($body['cpf'], $body['password'])) {
            return $response->withJson('Username or password is incorrect', 400);
        }

        $permissions = Login::getPermissions($usuario->getId());

        $key = "SAC3JFD";
        $payload = array(
            "id" => $usuario->getId(),
        );

        
        // * IMPORTANT:
        // * You must specify supported algorithms for your application. See
        // * https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40
        // * for a list of spec-compliant algorithms.
         
        //Token segurança.
        $jwt = JWT::encode($payload, $key);
        $data = array('id' => $usuario->getId(), 'firstname' => $usuario->getNome(), 'token' => $jwt, 'permissions' => $permissions);

        //JWT sub: id, subject Firstname, secret: PortalRH
        return $response->withJson($data, 200);
    });
*/




$app->run();
