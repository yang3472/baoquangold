<?php
/**
 * Created by PhpStorm.
 * User: millions
 * Date: 15/12/23
 * Time: 下午3:25
 */

namespace Think\Myfun;
use Common\Common\ReturnCode;
class RandomStringGenerator
{
    const MIXED = 0;
    const ALPHABET = 1;
    const NUMBER = 2;
    /**
     * 产生随机字串，可用来自动生成密码 默认长度6位 字母和数字混合
     * @param int $len 长度
     * @param string $type 字串类型
     * 0 字母加数字 1 字母 2数字
     * @param string $addChars 额外字符
     * @return string
     * @throws
     */
    public static function randomString($len = 6, $type = '0', $addChars = '')
    {
        switch ($type) {
            case 0:
                // 默认去掉了容易混淆的字符oOLl和数字01，要添加请使用addChars参数
                $chars = 'ABCDEFGHIJKMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz23456789' . $addChars;
                break;
            case 1:
                $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz' . $addChars;
                break;
            case 2:
                $chars = str_repeat('0123456789', 3);
                break;
            default:
                makeOutPut(ReturnCode::SYSTEM_ERROR,'系统错误！');
        }
        if ($len > 10) { //位数过长重复字符串一定次数
            $chars = $type == 1 ? str_repeat($chars, $len) : str_repeat($chars, 5);
        }
        $chars = str_shuffle($chars);
        $str = substr($chars, 0, $len);
        return $str;
    }

}
