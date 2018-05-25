<?php
/**
 * Created by PhpStorm.
 * User: pc
 * Date: 25.05.2018
 * Time: 19:51
 */

namespace LR3;


class Banners
{
    public static $BD = '/functions/BD/banners.txt';

    public static function getFullName() {
        $arBanners = file($_SERVER['DOCUMENT_ROOT'].self::$BD);
        if ($arBanners) {

            foreach ($arBanners as $strUser) {
                $userData = explode(' | ', $strUser);
            }
        } else {
            return false;
        }
    }
}