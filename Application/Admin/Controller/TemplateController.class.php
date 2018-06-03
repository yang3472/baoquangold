<?php
namespace Admin\Controller;

use Think\Controller;
class TemplateController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->assign('menu_id','');
        $admin_name = cookie('admin_name');
        if (!$admin_name) {
           $this-> redirect(C('INDEX_MODE').'/admin/login/index');
        }
    }
}