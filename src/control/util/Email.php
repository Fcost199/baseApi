<?php

namespace celebre\src\control\util;;

use \PHPMailer\PHPMailer\Exception;
use \PHPMailer\PHPMailer\SMTP;
use \PHPMailer\PHPMailer\PHPMailer;

// include_once '../vendor/phpmailer/Exception.php';
// include_once '../vendor/phpmailer/PHPMailer.php';
// include_once '../vendor/phpmailer/SMTP.php';

class Email{
    function enviarEmailUsuarios($body, $lstUsuarios, $assunto){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.office365.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "intranet@celebrecorretora.com.br";
        $mail->Password = "Cel@8102";

        $mail->setFrom('intranet@celebrecorretora.com.br', 'Sistema');
        foreach($lstUsuarios as $usuario){
            $mail->addAddress($usuario->getEmail(), $usuario->getNome());
        }

        $mail->isHTML(true);
        $mail->Subject = utf8_decode($assunto);
        $mail->Body = utf8_decode($body);


        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    function enviarEmailUsuariosComAnexo($body, $lstUsuarios, $assunto, $caminho, $nome){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.office365.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "intranet@celebrecorretora.com.br";
        $mail->Password = "Cel@8102";

        $mail->setFrom('intranet@celebrecorretora.com.br', 'Sistema');
        foreach($lstUsuarios as $usuario){
            $mail->addAddress($usuario->getEmail(), $usuario->getNome());
        }

        $mail->isHTML(true);
        $mail->Subject = utf8_decode($assunto);
        $mail->Body = utf8_decode($body);

        $mail->addAttachment($caminho, $nome);

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
    function enviarEmailUsuariosComAnexos($body, $lstUsuarios, $assunto, $anexos){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = "smtp.office365.com";
        $mail->Port = 587;
        $mail->SMTPSecure = 'tls';
        $mail->SMTPAuth = true;
        $mail->Username = "intranet@celebrecorretora.com.br";
        $mail->Password = "Cel@8102";

        $mail->setFrom('intranet@celebrecorretora.com.br', 'Sistema');
        foreach($lstUsuarios as $usuario){
            $mail->addAddress($usuario->getEmail(), $usuario->getNome());
        }

        $mail->isHTML(true);
        $mail->Subject = utf8_decode($assunto);
        $mail->Body = utf8_decode($body);
        foreach ($anexos as $anexo) {
            $mail->addAttachment($anexo['caminho'], $anexo['nome']);
        }

        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    }
}
