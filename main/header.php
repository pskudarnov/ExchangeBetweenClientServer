<?php
session_start();
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link href="/assets/css/style.css" rel="stylesheet">
    <script defer src="/assets/js/jquery-3.0.0.min.js"></script>
    <script defer src="/assets/js/script.js"></script>
    <title>Лабораторная работа №3 вариант №2</title>
</head>
<body>

<?require_once($_SERVER["DOCUMENT_ROOT"].'/functions/class/Users.php')?>
<?
if ($_GET["logout"] == "Y") {
    LR3\Users::logout();
}
?>
<?if ($_POST['name'] && $_POST['family'] && $_POST['login'] && $_POST['password'] && !isset($reg)) {
    $reg = LR3\Users::registerUser();
    if ($reg) {
        $_SESSION["user"] = $reg;
    }
}?>
<?if ($_POST["authLogin"] && $_POST["password"] && $_POST["submit"]  && !isset($auth)) {
    $auth = LR3\Users::checkRegister();
    if ($auth) {
        $_SESSION["user"] = $auth;
    }
}?>
<header>

    <? require_once($_SERVER["DOCUMENT_ROOT"].'/functions/class/Banners.php');

    function show_banner($banners, $format, $cookie_dict){
        $need_reset = 1;
        $indexes =  range(1, count($banners));
        shuffle($indexes);
        foreach ($indexes as $index){
            if($cookie_dict[$index] < $banners[$index-1]['max_shows']) {
                echo sprintf($format, $banners[$index-1]['path']);
                $cookie_dict[$banners[$index-1]['id']]+=1;
                setcookie('banners', json_encode($cookie_dict));
                $need_reset = 0;
                break;
            }
        }
        return $need_reset;
    }


    function set_default_cookie($format){
        $default = array('1'=>0, '2'=>0, '3'=>0);
        setcookie('banners', json_encode($default));
        return $default;
    }

    $banners = LR3\Banners::getAllBanners();
    $format = '<img src=%s  weidth="200px" height="500px">';


    if($_COOKIE['banners']) {
        $cookie_dict = json_decode($_COOKIE['banners'], true);
        if (show_banner($banners, $format, $cookie_dict)){
            show_banner($banners, $format, set_default_cookie($format));
        }
    }
    else{
        show_banner($banners, $format, set_default_cookie($format));
    }
    ?>



    <?if (!LR3\Users::isAuth($_SESSION["user"])):?>
        <div class="user">
            <a href="/index.php">Главная</a> |
            <a href="/authorize.php">Авторизация</a> |
            <a href="/register.php">Регистрация</a>
        </div>
    <?else:?>
        <div class="user">
            <?=LR3\Users::getFullName($_SESSION["user"])?> | <a href="/index.php?logout=Y">Выйти</a>
        </div>
    <?endif;?>

</header>
<div class="container">

    <div class="center_column">