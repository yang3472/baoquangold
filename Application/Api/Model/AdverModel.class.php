<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-24
 * Time: 21:39
 */
namespace Api\Model;
use Think\Db;
use Think\Model;
class AdverModel extends  Model{
      public function getList($position,$index=0,$limit=50){
           if($position=='mobile.home.wonderfull'){
                $position='pc.home.wonderfull';
           }
           if($position=='mobile.home.fine'){
              $position='pc.home.fine';
           }
           $rs=  M('adver')->field(['img_url','href_url','title','descrip'])
               ->where(['position'=>$position])
               ->order(['order_sort'=>'asc','create_time'=>'desc'])
               ->limit($index,$limit)
               ->select();
          foreach($rs as &$v){
              $v['href_url']=C('WEB_HOST').ltrim($v['href_url'],'/');
          }
          return $rs?$rs:[];
      }
}