<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2009 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

namespace Think\Myfun;
/**
 * 验证类操作类
 * @category   ORG
 * @package  ORG
 * @subpackage  Date
 * @author    杨精勤
 * @version   $Id: Date.class.php 2662 2012-01-26 06:32:50Z liu21st $
 */
class ValidateHelper {
    /**验证手机号
     * @param $mobile
     * @return bool
     */
     public static function validate_mobile($mobile){
         if(APP_PRO){
             if(preg_match("/^1[34578]{1}\d{9}$/",$mobile)){
                 return true;
             }
         }else{
             if(strlen($mobile)==11){
                 return true;
             }
         }

         return false;
     }

    /**验证用户名
     * @param $user_name
     * @return bool
     */
     public static  function  validate_username($user_name){
         if(preg_match("/^[A-Za-z0-9]{6,10}$/",$user_name)){
             return true;
         }
         return false;
     }

    //验证邮箱格式
    public static function validate_email($email)
    {
        if (preg_match('/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/',
            $email)) {
            return true;
        }

        return false;
    }

    public static function isValidIdNo($idNo)
    {
        $city = array(
            11 => "北京",
            12 => "天津",
            13 => "河北",
            14 => "山西",
            15 => "内蒙古",
            21 => "辽宁",
            22 => "吉林",
            23 => "黑龙江",
            31 => "上海",
            32 => "江苏",
            33 => "浙江",
            34 => "安徽",
            35 => "福建",
            36 => "江西",
            37 => "山东",
            41 => "河南",
            42 => "湖北",
            43 => "湖南",
            44 => "广东",
            45 => "广西",
            46 => "海南",
            50 => "重庆",
            51 => "四川",
            52 => "贵州",
            53 => "云南",
            54 => "西藏",
            61 => "陕西",
            62 => "甘肃",
            63 => "青海",
            64 => "宁夏",
            65 => "新疆",
            71 => "台湾",
            81 => "香港",
            82 => "澳门",
            91 => "国外",
        );

        //基本验证
        if (!preg_match('/^\d{17}(\d|x)$/i', $idNo)
            and !preg_match('/^\d{15}$/i', $idNo)
        ) {
            return false;
        }

        //地区验证
        if (!array_key_exists(intval(substr($idNo, 0, 2)), $city)) {
            return false;
        }

        $idNoLength = strlen($idNo);
        // 15位身份证验证生日
        if ($idNoLength == 15) {
            $sBirthday = '19'.substr($idNo, 6, 2).'-'.substr($idNo, 8, 2).'-'
                .substr($idNo, 10, 2);
            $dd = date("Y-m-d", strtotime($sBirthday));
            if ($sBirthday != $dd) {
                return false;
            }
            $year = substr($sBirthday, 0, 4);
        } else {
            $year = substr($idNo, 6, 4);
        }

        // 判断出生年份是否大于2020年，小于1900年
        if ($year < 1900 || $year > 2078) {
            return false;
        } elseif ($idNoLength == 15) {
            return true;
        }

        //18位身份证验证身份
        $sBirthday = substr($idNo, 6, 4).'-'.substr($idNo, 10, 2).'-'
            .substr($idNo, 12, 2);

        $dd = date("Y-m-d", strtotime($sBirthday));
        if (strcmp($dd, $sBirthday) != 0) {
            return false;
        }
        //身份证编码规范验证
        if (!self::checkIdNoVerifyBit($idNo)) {
            return false;
        }

        return true;
    }

    // 计算身份证校验码，根据国家标准GB 11643-1999
    private static function checkIdNoVerifyBit($idNo)
    {
        if (($len = strlen($idNo)) != 18) {
            return false;
        }
        //加权因子
        $weight = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
        //校验码对应值
        $verifyNumber = array(
            '1',
            '0',
            'X',
            '9',
            '8',
            '7',
            '6',
            '5',
            '4',
            '3',
            '2',
        );
        $sum = 0;
        $verifyLen = $len - 1;
        for ($i = 0; $i < $verifyLen; $i++) {
            $sum += $idNo[$i] * $weight[$i];
        }
        $mode = $sum % 11;

        return $verifyNumber[$mode] == strtoupper($idNo[$verifyLen]);
    }
}