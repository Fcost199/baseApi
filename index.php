<?php

include './src/autoload.php';

use celebre\src\control\router\BaseRouter;
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
/**
 * Função cria o JWT do usuario com o id.
 * Padrão do acesso local é fixo a principio
 */
$app->group('/usuario', function () use ($app) {
    $app->post('/autenticar/', BaseRouter::class . ":createAcess" );
});




$app->run();
