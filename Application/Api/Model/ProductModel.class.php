<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 18:13
 */
namespace Api\Model;
use Think\Myfun\ArrayHelper;
use Common\Common\ReturnCode;
use Think\Db;
use Think\Model;
class ProductModel extends  Model{
    /**产品列表
     * @param $input
     * @return mixed
     */
     public static $device_arr=['pc','mobile'];
     public function getList($input){
         $device=ArrayHelper::getVal($input,'device');
         $index=ArrayHelper::getVal($input,'index',0);
         $limit=ArrayHelper::getVal($input,'limit',10);

         $getCount=ArrayHelper::getVal($input,'getCount',false);
         if(!in_array($device,self::$device_arr)){
              makeOutPut(-10,'device--设备参数不正确');
         }
         //pc端和手机端暂时使用同一套
         if($device=='pc'){
             $img_type=3;
         }else if($device=='mobile'){
             $img_type=3;
             //$img_type=4;
         }
         $query= M('product')->field(['product.id','product_type','product_name','img_url'])
             ->join("product_img on product_img.product_id=product.id and img_type={$img_type} ")
             ->where(['special'=>0]);

         if($getCount){
             return $query->count();
         }
         $rs= $query->order(['product.create_time'=>'desc'])
             ->limit($index,$limit)
             ->select();
         return $rs;
     }

    /**产品详情
     * @param $id
     * @param $device
     */
     public function getDetail($id,$device){
         if(!$id || !in_array($device,self::$device_arr)){
             makeOutPut(ReturnCode::PARAMETER_ERROR,'参数错误');
         }
         $rs= M('product')
             ->field(
                 [
                     'product_name',
                     'detail',
                     'material',
                     'weight',
                     'spec',
                     'purpose',
                     'descrip'
                 ])
             ->where(['id'=>$id])
             ->find();
         //pc端和手机端暂时使用同一套
          if($device=='pc'){
             $img_type=5;
          }else{
              $img_type=5;
              //$img_type=6;
          }
          $img=M('product_img')->where(['product_id'=>$id,'img_type'=>$img_type])->getField('img_url',true);
          $rs['marque']=$img?$img:[];
          return $rs?$rs:[];
     }

    /**
     * @param $product_type
     */
     public  function getCategoryProductList($product_type,$device){
         if(!$product_type || !in_array($device,self::$device_arr)){
             makeOutPut(ReturnCode::PARAMETER_ERROR,'参数错误');
         }
         $where_data['product_type']=$product_type;
         $where_data['special']=1;
         //pc端和手机端暂时使用同一套
         if($device=='pc'){
             $where_data['img_type']=3;
         }else if($device=='mobile'){
             $where_data['img_type']=3;
             //$where_data['img_type']=4;
         }
         $rs= M('product')->field(['product.id','product_type','descrip','product_name','img_url'])
             ->join('product_img on product.id=product_img.product_id')
             ->where($where_data)
             ->select() ;
         return $rs?$rs:[];
     }
}