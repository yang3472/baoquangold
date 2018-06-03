<?php
/**数组
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/25
 * Time: 22:12
 */
namespace Think\Myfun;
class ArrayHelper{
    /**
     * @param array $arr
     * @param $key
     * @param null $default
     * @return null
     */
    public static function getVal(array $arr,$key,$default=null){
         if(isset($arr[$key])){
              return $arr[$key];
         }
         return $default;
    }
}