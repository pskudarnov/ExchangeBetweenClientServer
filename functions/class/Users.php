<?php

namespace LR3;


class Users
{
    public static $BD = '/functions/BD/users.txt';

    /**
     * Добавление нового пользователя в систему
     * @return bool
     */
    public static function registerUser() {

        if (!empty($_POST['name']) && !empty($_POST['family']) && !empty($_POST['login']) &&
            !empty($_POST['password']) && !empty($_POST["submitReg"])) {

            $id = self::getNextId();
            $name = trim($_POST['name']);
            $family = trim($_POST['family']);
            $login = trim($_POST['login']);
            $pass = trim($_POST['password']);
            $userFile = $_SERVER['DOCUMENT_ROOT'].self::$BD;

            if (self::checkUser($login, $userFile)) {
                return false;
            } else {
                $userData = "\n". $id ." | ". $family ." | ". $name ." | ". $login ." | ". $pass;
                file_put_contents($userFile, $userData, FILE_APPEND | LOCK_EX);
                return $login;
            }
        }
        return false;
    }

    /**
     * Проверка на регистрацию пользователя в системе
     * @return bool
     */
    public static function checkRegister() {

        if (!empty($_POST['authLogin']) && !empty($_POST['password']) && !empty($_POST["submit"])) {
            $arUsers = file($_SERVER['DOCUMENT_ROOT'].self::$BD);
            if ($arUsers) {
                foreach ($arUsers as $strUser) {
                    $userData = explode(' | ', $strUser);
                    if ($userData[3] == trim($_POST['authLogin'])) {
                        if (trim($userData[4]) == trim($_POST['password'])) {
                            return $_REQUEST['authLogin'];
                        }
                    }
                }
            }
        }
        return false;
    }

    /**
     * Вошел ли пользователь в систему
     * @param $login
     * @return bool
     */
    public static function isAuth($login) {
        if (!empty($login)) {
            if ($_SESSION["user"] == $login) {
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * Получение имени и фамилии пользователя
     * @param $login
     * @return bool|string
     */
    public static function getFullName($login = "") {
        if (empty($login)) {
            $login = $_SESSION["user"];
        }
        $arUsers = file($_SERVER['DOCUMENT_ROOT'].self::$BD);
        if ($arUsers) {

            foreach ($arUsers as $strUser) {
                $userData = explode(' | ', $strUser);
                if ($userData[3] == $login) {
                    return $userData[1] . " " . $userData[2];
                }
            }
        } else {
            return false;
        }
    }



    /**
     * Получение имени и фамилии пользователя
     * @param $login
     * @return bool|string
     */
    public static function getNextId($login = "") {
        $arUsers = file($_SERVER['DOCUMENT_ROOT'].self::$BD);
        if ($arUsers) {
            $userData = explode(' | ', $arUsers[count($arUsers)-1]);
            return $userData[0] + 1;
        } else {
            return 1;
        }
    }
    /**
     * Проверка на существование пользователя с переданным логином
     * @param string $login
     * @param $file
     * @return bool
     */
    private static function checkUser($login, $file) {

        $arUsers = file($file);
        if (!empty($arUsers)) {
            foreach ($arUsers as $strUser) {
                $arUser = explode(' | ', $strUser);
                if ($arUser[3] == $login) {
                    return true;
                }
            }
        }
        return false;
    }

    public static function logout() {
        if ($_GET["logout"] == "Y") {
            $_SESSION["user"] = "";
        }
    }
}