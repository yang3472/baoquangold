<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 18:13
 */
namespace Api\Model;
use Think\Myfun\ArrayHelper;
use Common\Common\ReturnCode;
use Think\Db;
use Think\Model;
class LeavewordModel extends  Model{
     public function addLeaveword($input){
         $data['name']=ArrayHelper::getVal($input,'name','');
         $data['tel'] =ArrayHelper::getVal($input,'tel','');
         $data['company'] =ArrayHelper::getVal($input,'company','');
         $data['content'] =ArrayHelper::getVal($input,'content','');
         if(!$data['name'] || !$data['tel'] || !$data['content']){
             makeOutPut(ReturnCode::PARAMETER_ERROR,'参数错误');
         }
         $data['ip'] =getClientRealIp();
         $position=getCityFromIp($data['ip']);
         $data['province']=$position['province'];
         $data['city']=$position['city'];
         $rs= M('leaveword')->where(['ip'=>$data['ip']])->order(['create_time'=>'desc'])->find();
         if($rs &&  (time()- strtotime($rs['create_time'])<5) ){
             makeOutPut(-10,'操作太频繁');
         }
         return M('leaveword')->add($data);
     }
}