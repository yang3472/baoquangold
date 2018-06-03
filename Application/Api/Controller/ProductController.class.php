<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 20:19
 */
namespace Api\Controller;
use Api\Model\ProductModel;
use Think\Controller;
class ProductController extends  Controller{
    /**
     * 产品列表
     */
      public function  getList(){
          $input=I('param.');
          $product_model=  new ProductModel();
          $ret= $product_model->getList($input);
          $data['list']=$ret;

          $input['getCount']=true;
          $data['cnt']= $ret= $product_model->getList($input);
          makeSuccOutPut($data);
      }

     /**
     * 产品详情
     */
      public function getDetail(){
          $id=I('id',0);
          $device=I('device');
          $product_model=  new ProductModel();
          $rs=$product_model->getDetail($id,$device);
          makeSuccOutPut($rs);
      }

    /**
     * 分类产品列表
     */
      public function getCategoryProductList(){
          $product_type=I('product_type');
          $device=I('device');
          $product_model=  new ProductModel();
          $ret= $product_model->getCategoryProductList($product_type,$device);
          makeSuccOutPut($ret);
      }
}