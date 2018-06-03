<?php
/**
 * Created by PhpStorm.
 * User: millions
 * Date: 16/1/15
 * Time: 上午11:47
 */

namespace Think\Myfun;


class TimeHelper
{
    public static function qaTimeFormat($dateTime)
    {
        $timestamp = time() - strtotime($dateTime) + 5;
        if ($timestamp < 60) {
            return $timestamp.'秒以前';
        } elseif ($timestamp < 3600) {
            return (int)($timestamp / 60).'分钟以前';
        } elseif ($timestamp < 86400) {
            return (int)($timestamp / 3600).'小时以前';
        } elseif ($timestamp < 86400 * 2) {
            return '昨天';
        } else {
            return date("Y-m-d", strtotime($dateTime));
        }
    }

    public static function diffBetweenTwoDays($day1, $day2)
    {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);

        if ($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }

        return ($second1 - $second2) / 86400;
    }

    public static function addYear($timestamp)
    {
        return strtotime('+1 year', $timestamp);
    }

    public static function isValidDate($date)
    {
        return preg_match('#20\d{2}-\d{2}-\d{2}#', $date);
    }

    public static function getMonthDay($monthIndex)
    {
        $thirtyOnes = [1, 3, 5, 7, 8, 10, 12];
        $thirties = [4, 6, 9, 11];
        if (in_array($monthIndex, $thirtyOnes)) {
            return 31;
        }

        if (in_array($monthIndex, $thirties)) {
            return 30;
        }

        if (static::isLeapYear(date("Y"))) {
            return 29;
        }

        return 28;
    }

    public static function isLeapYear($year)
    {
        $time = mktime(20, 20, 20, 2, 1, $year);//取得一个日期的 Unix 时间戳;
        if (date("t", $time) == 29) { //格式化时间，并且判断2月是否是29天；
            return true;
        } else {
            return false;
        }
    }

    public static function roundPlusDays($num)
    {
        //多加一天
        $timestamp = strtotime(date("Y-m-d")) + 86400 * $num;

        return date("Y-m-d H:i:s", $timestamp-1);
    }
}