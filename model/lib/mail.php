<?php

namespace App\Model\Lib;

require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail
{
    /**
     *  Initialise un mail.
     * 
     * @return PHPMailer Prototype d'un mail bien configuré, prêt à être envoyé.
     */
    public static function initMail(): PHPMailer
    {
        // Lit le fichier de configuration
        $cfg = parse_ini_file($_SERVER['DOCUMENT_ROOT'] . '/cfg/mail.ini');

        // Crée et configure la connexion au serveur
        $mail = new PHPMailer(true);
        $mail->Host = $cfg['host'];
        $mail->Port = $cfg['port'];
        $mail->Username = $cfg['user'];
        $mail->Password = $cfg['pass'];
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        
        // N'affiche pas les informations de debug
        // $mail->SMTPDebug  = SMTP::DEBUG_SERVER;

        // Informations sur l'émetteur
        // NOTE le header 'from' n'a aucune autorité, il faut toujours s'en méfier !
        $fromAddress = $cfg['user'];
        $fromName = $cfg['from.name'];
        $