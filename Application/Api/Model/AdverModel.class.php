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
           $rs=  M('adver')->field(['img_url','href_url','title','descrip'])
               ->where(['position'=>$position])
               ->order(['order_sort'=>'asc','create_time'=>'desc'])
               ->limit($index,$limit)
               ->select();
          return $rs?$rs:[];
      }
}