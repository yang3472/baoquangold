<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        redirect(C('WEB_HOST').'pc');
    }
}