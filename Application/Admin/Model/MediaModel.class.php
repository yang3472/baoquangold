<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-20
 * Time: 18:19
 */
namespace Admin\Model;
use Think\Myfun\ArrayHelper;
use Think\Db;
use Think\Model;

class MediaModel extends  Model{

     public function  getDbImgs(){
         $ret=[];
         $product_img_rs= M('product_img')->field(['img_url'])->select();
         foreach($product_img_rs as $img){
             array_push($ret,$img['img_url']);
         }
         $adver_img_rs= M('adver')->field(['img_url'])->select();
         foreach($adver_img_rs as $img2){
             array_push($ret,$img2['img_url']);
         }
         return $ret;
     }

    public function getList($condition){
        $query =M('media');
        $where_data = [];
        if($descrip = ArrayHelper::getVal($condition, 'descrip')){
            $where_data['descrip']=array('like',"%{$descrip}%");
        }
        $count      = $query->where($where_data)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        $rs = $query->where($where_data)->order(['create_time' => 'desc'])
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        return ['data'=>$rs,'page'=>$show];
    }

    /**编辑广告
     * @param $input
     */
    public function editAdver($input){
        $id=ArrayHelper::getVal($input,'id');
        $data['position']=ArrayHelper::getVal($input,'position');
        $img_url=ltrim(ArrayHelper::getVal($input,'img_url'));
        $data['img_url']='/'.$img_url;
        $data['href_url']=ltrim(ArrayHelper::getVal($input,'href_url'),'/');
        $data['title']=ArrayHelper::getVal($input,'title');
        $data['descrip']=ArrayHelper::getVal($input,'descrip');
        $data['order_sort']=ArrayHelper::getVal($input,'order_sort');
        if(!$id){
            $ret=M('adver')->add($data);
        }else{
            $ret= M('adver')->where(['id'=>$id])->save($data);
        }
        return $ret;
    }

    /**获取广告详情
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getAdverDetail($id){
        if(!$id){
            return [];
        }
        $rs= M('adver')->where(['id'=>$id])->find();
        if(!$rs){
            return [];
        }
        return $rs;
    }

    public function delAdver($id){
       return M('adver')->where(['id'=>$id])->delete();
    }
}