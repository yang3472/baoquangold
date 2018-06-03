<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 9:06
 */
namespace Admin\Controller;
use Think\Controller;
use Admin\Model\NewsModel;
class NewsController extends  TemplateController{
     public function  __construct(){
         parent::__construct();
     }
     public function index(){
         $news_model= new NewsModel();
         $ret=$news_model->getList(I('param.'));
         $this->assign('menu_id','news_list');
         $this->assign('data',$ret['data']);
         $this->assign('page',$ret['page']);
         $this->display('index');
     }

     public function edit(){
         $id=(int)I('id',0);
         $data=[];
         if($id){
             $news_model= new NewsModel();
             $data=$news_model->getNewsDetail($id);
         }
         $this->assign('menu_id','news_edit');
         $this->assign('id',$id);
         $this->assign('data',$data);
         $this->display('edit');
     }

    /**
     * 编辑新闻
     */
     public function  editNews(){
         $news_model= new NewsModel();
         $ret= $news_model->editNews(I('param.'));
         if($ret){
              makeSuccOutPut();
         }else{
              makeOutPut(-10,'操作失败');
         }
     }

    /**
     * 删除单条资讯
     */
     public function delNews(){
         $id=(int)I('id',0);
         $news_model= new NewsModel();
         if($id){
             $ret= $news_model->delNews($id);
             if($ret){
                 makeSuccOutPut();
             }else{
                 makeOutPut(-10,'操作失败');
             }
         }else{
             makeOutPut(-10,'操作失败');
         }
     }
}