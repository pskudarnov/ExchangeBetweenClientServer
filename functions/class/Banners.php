<?php

namespace LR3;


class Banners
{
    public static $BD = '/functions/BD/banners.txt';

    public static function getAllBanners() {
        $allBanners = array();
        $arBanners = file($_SERVER['DOCUMENT_ROOT'].self::$BD);
        if ($arBanners) {
            foreach ($arBanners as $strUser) {
                $userData = explode(' | ', $strUser);
                if ($userData) {
                    array_push($allBanners, $userData);
                }
            }
            return $allBanners;
        } else {
            return false;
        }
    }
}
