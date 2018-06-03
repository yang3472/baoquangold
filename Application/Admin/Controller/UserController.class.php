<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 9:06
 */
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\AdminUserModel;
use Think\Cookie;
use Think\Db;

class UserController extends  TemplateController{
     public function  __construct(){
         parent::__construct();
     }
     public function index(){
         $user_model= new AdminUserModel;
         $ret=$user_model->getList(I('param.'));
         $this->assign('menu_id','user_list');
         $this->assign('data',$ret['data']);
         $this->assign('page',$ret['page']);
         $this->display('index');
     }

    /**
     * 添加用户
     */
     public function addUser(){
         $input= I('post.');
         if($input){
             $user_model= new AdminUserModel;
             $ret=$user_model->addUser($input);
             if($ret){
                 makeSuccOutPut();
             }else{
                 makeOutPut(-10,'操作失败');
             }
         }
         $this->assign('menu_id','user_add');
         $this->display('addUser');
     }

    /**修改用户资料
     * @return mixed
     * @throws \think\Exception
     */
     public function editInfo(){
        $id=(int)I('id',0);
        $user_model= new AdminUserModel;
        $data=$user_model->getUserInfo($id);
        if(!$data){
            $data['user_name']='';
        }
        if(I('operate','')=='editInfo'){
            $rs= M('admin_user')->save(['real_name'=>I('real_name'),'id'=>$id]);
            if($rs){
                makeSuccOutPut();
            }else{
                makeOutPut(-10,'操作失败');
            }
        }
        $this->assign('menu_id','user_add');
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display('editInfo');
    }

    /**修改密码
     * @return mixed
     * @throws \think\Exception
     */
    public function editPwd(){
        $id=(int)I('id',0);
        $user_model= new AdminUserModel;
        $data=$user_model->getUserInfo($id);
        if(!$data){
            $data['user_name']='';
        }
        if(I('operate','')=='editPwd'){
            $rs= M('admin_user')->save(['password'=>md5(I('password')),'id'=>$id]);
            if($rs){
                makeSuccOutPut();
            }else{
                makeOutPut(-10,'操作失败');
            }
        }
        $this->assign('menu_id','user_add');
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display('editPwd');
    }

    /**删除用户
     * @param $id
     * @throws \think\Exception
     */
    public function del($id){
        if(Cookie('admin_name')!='admin'){
            makeOutPut(-10,'您没有该权限');
        }
        $user_model= new AdminUserModel;
        $data=$user_model->getUserInfo($id);
        if(!$data){
            makeOutPut(-10,'该用户不存在');
        }
        if($data['user_name']=='admin'){
            makeOutPut(-10,'不能删除admin用户');
        }
        $rs=  M('admin_user')->where(['id'=>$id])->delete();
        if($rs){
            makeSuccOutPut();
        }else{
            makeOutPut(-10,'删除失败');
        }
    }
}