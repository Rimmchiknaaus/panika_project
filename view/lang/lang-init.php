<?php

if (!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $_SESSION['lang'] ?? 'fr';



$langFile = $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.$lang.php";

if (file_exists($langFile)) {
    $language = include $langFile;
} else {
    $language = include $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.fr.php";
}

if (!is_array($language)) {
    $language = [];
}
