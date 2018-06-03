<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 9:06
 */
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\LeavewordModel;
class LeavewordController extends  TemplateController{
     public function  __construct(){
         parent::__construct();
         $this->assign('menu_id','leaveword');
     }
     public function index(){
         $leaveword_model= new LeavewordModel;
         $ret=$leaveword_model->getList(I('param.'));

         $this->assign('data',$ret['data']);
         $this->assign('page',$ret['page']);
         $this->display('index');
     }

     public  function  changeStatus(){
         $leaveword_model= new LeavewordModel;
         $ret=$leaveword_model->changeStatus(I('param.'));
         if($ret){
             makeSuccOutPut();
         }else{
             makeOutPut(-10,'操作失败');
         }
     }
}