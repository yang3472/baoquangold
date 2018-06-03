<?php
/**
 * Created by PhpStorm.
 * User: millions
 * Date: 15/12/22
 * Time: 上午11:13
 */

namespace Think\Myfun;;


class UUIDGenerator
{

    public static function gen()
    {
        mt_srand((double)microtime() * 10000);//optional for php 4.2.0 and up.
        $charid = md5(uniqid(rand(), true));
        $hyphen = '';
        $uuid = ''
            . substr($charid, 0, 8) . $hyphen
            . substr($charid, 8, 4) . $hyphen
            . substr($charid, 12, 4) . $hyphen
            . substr($charid, 16, 4) . $hyphen
            . substr($charid, 20, 12)
            . '';
        return $uuid;
    }
    
    
}