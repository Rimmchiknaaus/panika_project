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
use App\Model\Lib\Mail as LibMail;

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

    public function do(): void
    {
        // Lis les informations saisies dans le formulaire
        $email = $_POST['myEmail'];
        $phone = $_POST['myPhone'];
        $password = $_POST['myPassword'];
        $passwordRepeat = $_POST['myPasswordRepeat'];
        $nom = $_POST['myFirstname'];
        $prenom = $_POST['myName'];
        
        $lang = $_SESSION['lang'] ?? 'fr';

        // Vérifie les mots de passe
        if ($password !== $passwordRepeat) {
            $this->redirectTo('/ctrl/register-display.php?lang=' . $lang);
            exit();
        }

        // Hachage du mot de passe
        $options = ['cost' => 12];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        
        // Vérifie si l'utilisateur existe déjà
        $user = Auth::getUser($email);
        if ($user) {
            $this->redirectTo('/ctrl/register-display.php?lang=' . $lang);
            exit();
            }
        // Création dans la BDD
        $success = Auth::createUser($prenom, $nom, $email, $phone, $password,  $hashedPassword);

        // Ajoute une notification d'erreur
        if (!$success) {
            $this->redirectTo('/ctrl/register-display.php?lang=' . $lang);
            exit();
        }


        // Envoie un mail, uniquement en cas de succès
        // Ecrit le corps du message en HTML d'après un template twig                
        $twigLoader = new FilesystemLoader($_SERVER['DOCUMENT_ROOT'] . '/model/mail/templates');
        $twig = new Environment($twigLoader);
        $template = $twig->load('hello-' . $lang . '.twig');
        $bodyMsg = $template->render(['name' => $nom]);       
        $templateAlt = $twig->load('hello-' . $lang . '-alt.twig');
        $AltBodyMsg = $templateAlt->render(['name' => $nom]); 
        $mail = LibMail::initMail();
        $mail->addAddress ($email);
        $mail->Subject = ($lang === 'fr') ? 'Bienvenue sur Panika' : 'Добро пожаловать';
        $mail->Body    = $bodyMsg; 
        $mail->AltBody =$AltBodyMsg;
        $mailSuccess = $mail->send();
                
        // rediriger vers la list de question
        $this->redirectTo('/ctrl/login-display.php?lang=' . $lang);
        exit();

    }
}

// Exécute le Controlleur
$ctrl = new registerUser();
$ctrl->execute();





