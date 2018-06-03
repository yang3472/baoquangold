<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 20:19
 */
namespace Api\Controller;
use Api\Model\LeavewordModel;
use Common\Common\ReturnCode;
use Think\Controller;
class LeavewordController extends  Controller{
      public function  addLeaveword(){
          $input=I('param.');
          $leaveword_model=  new LeavewordModel();
          $ret= $leaveword_model->addLeaveword($input);
          if($ret){
              makeSuccOutPut();
          }else{
              makeOutPut(ReturnCode::SYSTEM_ERROR,'系统错误');
          }
      }
}