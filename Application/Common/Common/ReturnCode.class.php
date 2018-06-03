<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2017/6/27
 * Time: 22:32
 */
namespace Common\Common;
class ReturnCode {
     const NOT_LOGIN=-1000; //未登陆
     const PARAMETER_ERROR=-1001; //参数错误
     const SYSTEM_ERROR=-1002; //系统错误
     const LEAVEWORD_TOO_MORE=-1003; //当天留言次数过多
}