<?php
/**
 * Created by PhpStorm.
 * User: millions
 * Date: 15/12/26
 * Time: 下午2:24
 */

namespace Think\Myfun;

class IdObfuscator
{
    const CRYPT_SALT = 'myfarmlife';

    public static function encode($id)
    {
        if (!is_numeric($id) or $id < 1) {
            return FALSE;
        }
        $id = (int)$id;
        if ($id > pow(2, 31)) {
            return FALSE;
        }
        $segment1 = self::getHash($id, 16);
        $segment2 = self::getHash($segment1, 8);
        $dec = (int)base_convert($segment2, 16, 10);
        $dec = ($dec > $id) ? $dec - $id : $dec + $id;
        $segment2 = base_convert($dec, 10, 16);
        $segment2 = str_pad($segment2, 8, '0', STR_PAD_LEFT);
        $segment3 = self::getHash($segment1 . $segment2, 8);
        $hex = $segment1 . $segment2 . $segment3;
        $hex = str_replace(array('+', '/', '='), array('$', ':', ''), $hex);
        return $hex;
    }

    public static function decode($hex)
    {
        $hex = str_replace(array('$', ':'), array('+', '/'), $hex);
        $segment1 = substr($hex, 0, 16);
        $segment2 = substr($hex, 16, 8);
        $segment3 = substr($hex, 24, 8);
        $exp2 = self::getHash($segment1, 8);
        $exp3 = self::getHash($segment1 . $segment2, 8);
        if ($segment3 != $exp3) {
            return 0;
        }
        $v1 = (int)base_convert($segment2, 16, 10);
        $v2 = (int)base_convert($exp2, 16, 10);
        $id = abs($v1 - $v2);
        return $id;
    }

    private static function getHash($str, $len)
    {
        return substr(strtolower(sha1($str . self::CRYPT_SALT)), 0, $len);
    }
}
