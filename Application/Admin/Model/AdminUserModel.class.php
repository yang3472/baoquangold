<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-14
 * Time: 21:38
 */
namespace Admin\model;
use Common\Common\ReturnCode;
use Think\Db;
use Think\Model;
use Think\Myfun\ArrayHelper;
class AdminUserModel extends  Model{
     public function  getList(){
         $query= M('admin_user')->field(['id','user_name','real_name','last_login_time']);
         $count      = $query->count();// 查询满足要求的总记录数
         $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
         $show       = $Page->show();// 分页显示输出

         $rs = $query->order(['create_time' => 'desc'])
             ->limit($Page->firstRow.','.$Page->listRows)->select();


         return ['data'=>$rs,'page'=>$show];
     }

    /**添加用户
     * @param $input
     * @return int|string
     */
     public function  addUser($input){
         $data['user_name']=ArrayHelper::getVal($input,'user_name','');
         $data['real_name']=ArrayHelper::getVal($input,'real_name','');
         $password=ArrayHelper::getVal($input,'password','');
         if(!$data['user_name'] || !$data['real_name'] || !$password ){
              makeOutPut(ReturnCode::PARAMETER_ERROR,'参数错误！');
         }
         $res= M('admin_user')->where(['user_name'=> $data['user_name']])->find();
         if($res){
             makeOutPut(ReturnCode::PARAMETER_ERROR,'该用户名已经存在，请更换用户名！');
         }
         $data['password']=md5($password);
         return M('admin_user')->add($data);
     }

     public function  getUserInfo($id){
        $rs=M('admin_user')->where(['id'=>$id])->find();
        $login_user=cookie('admin_name');
        if(!$rs || ($login_user!='admin' && $login_user!=$rs['user_name'] )){
             return [];
         }
         return $rs;
     }
}