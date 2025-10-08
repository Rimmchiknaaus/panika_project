<?php

//Lecture de la langue via l’URL
if (!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
//Définition de la langue active
$lang = $_SESSION['lang'] ?? 'fr';

//Chargement du fichier de traduction
$langFile = $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.$lang.php";

if (file_exists($langFile)) {
    $language = include $langFile;
} else {
    $language = include $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.fr.php";
}

if (!is_array($language)) {
    $language = [];
}

