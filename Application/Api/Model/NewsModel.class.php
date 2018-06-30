<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 18:13
 */
namespace Api\Model;
use Think\Db;
use Think\Model;
class NewsModel extends  Model{
    /**新闻列表
     * @param int $index
     * @param int $limit
     * @return
     */
     public function getList($index=0,$limit=10){
         $rs= M('news')
             ->field(['id','title','create_time'])
             ->order(['create_time'=>'desc'])
             ->limit($index,$limit)
             ->select();
         return $rs;
     }

    /**新闻详情
     * @param $id
     * @return $this
     */
     public function getDetail($id){
          return $rs=M('news')->where(['id'=>$id])->find();
     }

    /**相关阅读
     * @param $id
     */
     public function getRelationNews($id){
         $ids=M('news')
             ->where(['id'=>array('neq',$id)])->getField('id',true);
         $all_count=count($ids);
         if($all_count==0){
             return [];
         }else if($all_count<=4){
             $ids_keys=array_rand($ids,$all_count);
         }else if($all_count>4){
             $ids_keys=array_rand($ids,4);
         }
         $ik=[];
         foreach($ids_keys as $val){
             array_push($ik,$ids[$val]);
         }
         $ret=M('news')->field(['id','title','create_time'])
             ->where(['id'=>array('in',$ik)])
             ->select();
         foreach($ret as &$v){
             $v['create_time']=date('Y-m-d',strtotime($v['create_time']));
         }
         return $ret;
     }
}