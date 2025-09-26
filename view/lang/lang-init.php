<?php

if (!empty($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}

$lang = $args['lang'] ?? ($_SESSION['lang'] ?? 'fr');

$_SESSION['lang'] = $lang;


$language = include $_SERVER['DOCUMENT_ROOT'] . "/view/lang/lang.$lang.php";
?>
