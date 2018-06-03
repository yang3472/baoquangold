<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 18:10
 */
namespace Api\Controller;
use Api\Model\NewsModel;
use Think\Controller;
class NewsController extends  Controller{
    /**
     * 新闻列表
     */
     public function  getList(){
         $index=I('index',0);
         $limit=I('limit',10);
         if($limit>50){
             $limit=50;
         }
         $news_model= new NewsModel();
         $ret= $news_model->getList($index,$limit);
         makeSuccOutPut($ret);
     }

    /**新闻详情
     * @return array
     */
     public function getDetail(){
         $id=I('id',0);
         $news_model= new NewsModel();
         $detail=$news_model->getDetail($id);
         if($detail){
             $detail['create_time']=date('Y-m-d',strtotime($detail['create_time']));
             $relation_news=$news_model->getRelationNews($id);
             $detail['relation_news']=$relation_news;
         }
         return makeSuccOutPut($detail);
     }
}