<?php
namespace app\admin\controller;

use Think\Controller;


class AdminsController extends TemplateController
{
    public function index(){
        $this->display('index');
    }
}
