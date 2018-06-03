<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2017/8/5
 * Time: 19:40
 */
namespace Think\Myfun;
use Api\Model\UserOrderStatus;
class OrderHelper{
    /**订单的付款状态
     * @param $status
     * @return string
     */
   public static function get_order_pay_status_str($status) {
        switch ($status) {
            case (UserOrderStatus::WAIT_PAY):
                $str = '待付款';
                break;
            case (UserOrderStatus::HAS_PAYED):
                $str = '已付款';
                break;
            case (UserOrderStatus::RETURN_PAYED):
                $str = '已退款';
                break;
            case (UserOrderStatus::PAYED_PARTY):
                $str = '部分支付';
                break;
            default :
                $str = '';
                break;
        }
        return $str;
    }

    /**订单的配送状态
     * @param $dispatch_type
     * @param $status
     * @return string
     */
    public static function get_order_dispatch_status_str($dispatch_type, $status) {
        $str='';
        if ($dispatch_type == UserOrderStatus::LOGISTICS) {
            switch ($status) {
                case (UserOrderStatus::WAIT_DISPATCH):
                    $str = '待配送';
                    break;
                case (UserOrderStatus::ON_DISPATCH):
                    $str = '配送中';
                    break;
                case (UserOrderStatus::HAS_DISPATCHED):
                    $str = '已配送';
                    break;
                case (UserOrderStatus::RETURN_DISPATCHED):
                    $str = '已退货';
                    break;
                default :
                    $str = '';
                    break;
            }
        } else if($dispatch_type==UserOrderStatus::SELF_TAKE) {
            switch ($status) {
                case (UserOrderStatus::WAIT_DISPATCH):
                    $str = '待自提';
                    break;
                case (UserOrderStatus::HAS_DISPATCHED):
                    $str = '已自提';
                    break;
                case (UserOrderStatus::RETURN_DISPATCHED):
                    $str = '已退货';
                    break;
                default :
                    $str = '';
                    break;
            }
        }
        return $str;
    }
}