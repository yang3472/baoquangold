<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 9:06
 */
namespace Admin\Controller;
use Admin\Model\ProductModel;
use Think\Myfun\ArrayHelper;
use Think\Controller;
class ProductController extends  TemplateController{
     public function  __construct(){
         parent::__construct();
     }
     public function index(){
         $product_model= new ProductModel();
         $ret=$product_model->getList(I('param.'));
         $productCategoryConfig= $product_model->getProductCategoryConfig();
         $this->assign('menu_id','product_list');
         $this->assign('data',$ret['data']);
         $this->assign('page',$ret['page']);
         $this->assign('productCategoryConfig',$productCategoryConfig);
         $this->display('index');
     }

    public function edit(){
        $id=(int)I('id',0);
        $product_model= new ProductModel();
        if($input=I('post.')){
            $rs=$product_model->editProduct($input);
            if($rs){
                echo 1;exit;
            }else{
                echo -10;exit;
            }
        }
        $data=$product_model->getProductDetail($id);
        if( !ArrayHelper::getVal($data,'product_type')){
            $data['product_type']=0;
        }
        $productCategoryConfig= $product_model->getProductCategoryConfig();
        $this->assign('productCategoryConfig',$productCategoryConfig);
        $this->assign('menu_id','product_edit');
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->display('edit');
    }

    /**
     * 删除单条资讯
     */
    public function delProduct(){
        $id=(int)I('id',0);
        $product_model= new ProductModel();
        if($id){
            $ret= $product_model->delProduct($id);
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