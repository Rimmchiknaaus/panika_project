<?php

namespace App\Ctrl;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ctrl/ctrl.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/mail.php';

use App\Ctrl\Ctrl;
use App\Model\Lib\Auth\Auth;
use App\Model\Lib\Mailer;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/** Montre le forme pour ajouter des question. */
class registerUser extends Ctrl
{
    /** @Override */
    public function getPageTitle(): ?string
    {
        return null;
    }

    /** @Override */
    public function getViewFile(): ?string
    {
        return null;
    }

    /** @Override */
    public function do(): void
    {
        // Lis les informations saisies dans le formulaire
        $email = $_POST['myEmail'];
        $phone = $_POST['myPhone'];
        $password = $_POST['myPassword'];
        $passwordRepeat = $_POST['myPasswordRepeat'];
        $nom = $_POST['myFirstname'];
        $prenom = $_POST['myName'];
        $lang = $_GET['lang'] ?? 'fr';

        $mail = Mailer::sendEmail ();

        // Twig

        $twigLoader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/model/mail/templates');
        $twig = new Environment($twigLoader);
        $template = $twig->load('hello-' . $lang . '.twig');
        $bodyMsg = $template->render(['name' => $nom]);       
        $templateAlt = $twig->load('hello-' . $lang . '-alt.twig');
        $AltBodyMsg = $templateAlt->render(['name' => $nom]); 
        
        $mail->CharSet = "UTF-8";

        $mail->addAddress ($email);  //Add a recipient     
        $mail->Subject = ($lang === 'en') ? 'Welcome to  Web3@Crypto' : 'Bienvenue sur Web3@Crypto';
        $mail->Body    = $bodyMsg; 
        $mail->AltBody =$AltBodyMsg;

        // Vérifie les mots de passe
        if ($password !== $passwordRepeat) {
     