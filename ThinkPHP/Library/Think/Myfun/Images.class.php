<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2017/7/17
 * Time: 21:26
 */
namespace Think\Myfun;
class Images{
    public static function  getImgSrc($src=null){
        if(!$src){
            return '';
        }
        $img_url_arr = parse_url($src);
        if (ArrayHelper::getVal($img_url_arr, 'host')) {
            return $src;
        }
        return C('IMG_HOST') . $src;
    }
}