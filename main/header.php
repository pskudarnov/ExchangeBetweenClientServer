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