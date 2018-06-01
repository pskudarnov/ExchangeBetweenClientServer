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
                    array_push($allBanners,
                    array('id'=>$userData[0],
                    'path'=>$userData[1],
                    'max_shows'=>$userData[2],
                    'target_url'=>$userData[3]));
                }
            }
            return $allBanners;
        } else {
            return false;
        }
    }
}
