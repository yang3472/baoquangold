<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2017-10-28
 * Time: 18:26
 */
namespace Think\Myfun;
class StringHelper{
    /**
     *
     * @todo 截取指定长度的字数
     * @param string $string
     * @param
     *        	$length
     */
    public static function truncateStr($string, $length = 80, $etc = '...', $break_words = false, $middle = false) {
        if ($length == 0)
            return '';
        if (mb_strlen ( $string, 'utf8' ) > $length) {
            $length -= mb_strlen ( $etc, 'utf8' );
            if (! $break_words && ! $middle) {
                $string = preg_replace ( '/\s+?(\w+)?$/', '', mb_substr ( $string, 0, $length + 1, 'utf8' ) );
            }
            if (! $middle) {
                return mb_substr ( $string, 0, $length, 'utf8' ) . $etc;
            } else {
                return mb_substr ( $string, 0, $length / 2, 'utf8' ) . $etc . mb_substr ( $string, - $length / 2 );
            }
        } else {
            return $string;
        }
    }
}
