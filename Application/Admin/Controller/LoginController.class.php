<?php
namespace Admin\controller;

use Think\Controller;
use think\Db;


class LoginController extends Controller
{
    /**
     * 登录页
     */
    public function index(){
        $this->display('index');
    }

    /**
     * 登录方法
     */
    public function login()
    {
        if (IS_AJAX) {
            $user_name = I('post.user_name', 'trim');
            $pass = I('post.password', '', 'trim');
            $rs =M('admin_user') ->where(['user_name' => $user_name, 'password' =>md5($pass)])->find();
            if ($rs) {
                $this->set_admin_cookie($rs['id'],$rs['user_name']);
                makeSuccOutPut();
            }else{
                makeOutPut(-1000,'用户名或密码错误');
            }
        }
    }
    /**
     * 退出登录
     */
    public function logout()
    {
        cookie('admin_id',null);
        cookie('admin_name',null);
        $this->redirect('/admin/login/index');
    }

    /**设置cookie
     * @param $user_id
     * @param $user_name
     */
    private function set_admin_cookie($user_id,$user_name)
    {
        $expire_time= date('Y-m-d',strtotime('+1 day')).' 03:00:00';
        $time=strtotime($expire_time)-time();
        cookie('admin_id', $user_id, $time); // 指定cookie保存时间
        cookie('admin_name', $user_name, $time);
        M('admin_user')->where(['id'=>$user_id])->save(['last_login_time'=>date('Y-m-d H:i:s')]); //更新最近登录时间
    }
}