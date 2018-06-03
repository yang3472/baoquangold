<?php
/**
 * Created by PhpStorm.
 * User: millions
 * Date: 16/5/5
 * Time: 上午9:22
 */

namespace Think\Myfun;


class IdNoHelper
{

    /**
     * 根据身份证号码返回性别 1 男 2 女
     *
     * @param $idNo
     *
     * @return string
     */
    public static function getSexByIdNo($idNo)
    {
        if (!ValidateHelper::isValidIdNo($idNo)) {
            return null;
        }
        $sex = substr($idNo, (strlen($idNo) == 15 ? -1 : -2), 1) % 2 ? "1"
            : "2";

        return $sex;
    }
    /**根据身份证号返回到某个时间时的年龄
     * @param $idNo  身份证号
     * @param string $date_later 到某个日期
     * @return bool|null|string
     */
    public static function getAgeByIdNo($idNo,$date_later='')
    {
        if (!ValidateHelper::isValidIdNo($idNo)) {
            return null;
        }
        //获取年月日信息
        $date = substr($idNo, 6, 8);
        $year = substr($date, 0, 4);
        $monthDay = (int)substr($date, 4, 4);
        $nowYear = $date_later?date('Y',strtotime($date_later)):date('Y');
        $nowMonthDay=$date_later?(int)date('md',strtotime($date_later)):(int)date('md');
        return ($nowYear-$year-1) + ($monthDay>$nowMonthDay ? 0 : 1);
    }

    /**
     * 由身份证号码返回出生年月日 格式为yyyy-mm-dd
     * @param $idNo
     *
     * @return bool|null|string
     */
    public static function getBirthDate($idNo)
    {
        if (!ValidateHelper::isValidIdNo($idNo)) {
            return null;
        }

        return date('Y-m-d', strtotime(substr($idNo, 6, 8)));
    }
    
}
