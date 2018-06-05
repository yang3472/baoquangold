<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 11:26
 */
namespace Admin\model;
use Think\Db;
use Think\Model;
use Think\Myfun\ArrayHelper;
class ProductModel extends  Model{

    private static $product_category=array(
        array('id'=>1,'category_name'=>'金银币/章定制'),
        array('id'=>2,'category_name'=>'金银条/钞/卡定制'),
        array('id'=>3,'category_name'=>'徽章/勋章定制'),
        array('id'=>4,'category_name'=>'金银摆件定制'),
    );

    public static function  getProductCategoryConfig(){
        return self::$product_category;
    }

    /**产品列表
     * @param $condition
     * @return array
     */
    public function getList($condition){
        $query= M('product');
        $where_data = [];
        //添加时间
        if ($start_time = ArrayHelper::getVal($condition, 'start_time')) {
            if ($end_time = ArrayHelper::getVal($condition, 'end_time')) {
                $where_data['create_time'] = array(array('egt', date('Y-m-d 00:00:00', strtotime($start_time))), array('elt', date('Y-m-d 23:59:59', strtotime($end_time))), 'and');
            } else {
                $where_data['create_time'] = array('egt', date('Y-m-d 00:00:00', strtotime($start_time)));
            }
        } else {
            if ($end_time = ArrayHelper::getVal($condition, 'end_time')) {
                $where_data['create_time'] = array('elt', date('Y-m-d 23:59:59', strtotime($end_time)));
            }
        }
        if($product_type = ArrayHelper::getVal($condition, 'product_type')){
            $where_data['product_type']=$product_type;
        }
        if($product_name = ArrayHelper::getVal($condition, 'product_name')){
            $where_data['product_name']=array('like',"%{$product_name}%");
        }
        if($material = ArrayHelper::getVal($condition, 'material')){
            $where_data['material']=array('like',"%{$material}%");
        }
        if($purpose = ArrayHelper::getVal($condition, 'purpose')){
            $where_data['purpose']=array('like',"%{$purpose}%");
        }
        $count      = $query->where($where_data)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        $rs = $query->where($where_data)->order(['create_time' => 'desc'])
            ->limit($Page->firstRow.','.$Page->listRows)->select();

        return ['data'=>$rs,'page'=>$show];
    }

    /** 产品详情
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getProductDetail($id){
       $product_info= M('product')
            ->where(['id'=>$id])
            ->find();

        $product_info['img_1']=$product_info['img_2']=$product_info['img_3']=$product_info['img_4']=$product_info['img_5']=$product_info['img_6']='';
        $img_info=  M('product_img')->field(['img_type','img_url'])->where(['product_id'=>$id])->select();
        $img_5=$img_6=[];
        foreach($img_info as $img){
            if($img['img_type']==1){
                $product_info['img_1']=$img['img_url'];
            }else if($img['img_type']==2){
                $product_info['img_2']=$img['img_url'];
            }else if($img['img_type']==3){
                $product_info['img_3']=$img['img_url'];
            }else if($img['img_type']==4){
                $product_info['img_4']=$img['img_url'];
            }else if($img['img_type']==5){
                array_push($img_5,$img['img_url']);
            }else if($img['img_type']==6){
                array_push($img_6,$img['img_url']);
            }
        }
        $product_info['img_5']=$img_5?implode(' ; ',$img_5):'';
        $product_info['img_6']=$img_6?implode(' ; ',$img_6):'';
        return $product_info;
    }

    /**编辑产品
     * @param $id
     */
    public function editProduct($input){
        $id=ArrayHelper::getVal($input,'id',0);
        $data['product_type']=ArrayHelper::getVal($input,'product_type','');
        $data['product_name']=ArrayHelper::getVal($input,'product_name','');
        $data['material']=ArrayHelper::getVal($input,'material','');
        $data['weight']=ArrayHelper::getVal($input,'weight',0);
        $data['spec']=ArrayHelper::getVal($input,'spec','');
        $data['purpose']=ArrayHelper::getVal($input,'purpose','');
        $data['descrip']=ArrayHelper::getVal($input,'descrip','');
        $data['detail']=html_entity_decode(ArrayHelper::getVal($input,'detail',''));
        foreach($data as $v){
            if(!$v){
                makeOutPut(-10,'参数错误');
            }
        }
        $img_single['img_1']=ArrayHelper::getVal($input,'img_1','');
        $img_single['img_2']=ArrayHelper::getVal($input,'img_2','');
        $img_single['img_3']=ArrayHelper::getVal($input,'img_3','');
        $img_single['img_4']=ArrayHelper::getVal($input,'img_4','');
        $img_more['img_5']=ArrayHelper::getVal($input,'img_5','');
        $img_more['img_6']=ArrayHelper::getVal($input,'img_6','');
        if(!$id){
            $data['create_time'] = date('Y-m-d H:i:s');
            $id=$ret= M('product')->add($data,false,true);
        }else{
            $data['id'] = $id;
            $ret= M('product')->save($data);
        }
        if($id){
            foreach($img_single as $kk=>$vv){
               $type=explode('_',$kk);
               $img_data['product_id']=$id;
               $img_data['img_type']=$type[1];
               $img_data['img_url']=$vv;
               if(!$vv){
                   M('product_img')->where(['product_id'=>$id,'img_type'=>$img_data['img_type'] ])->delete();
               }else{
                   $pre_info= M('product_img')->where(['product_id'=>$id,'img_type'=>$img_data['img_type'] ])->find();
                   if(!$pre_info){
                       M('product_img')->add($img_data);
                   }else{
                       M('product_img')->where(['id'=>$pre_info['id']])->save($img_data);
                   }
               }
            }
            foreach($img_more as $km=>$vm){
                $type=explode('_',$km);
                $img_data['product_id']=$id;
                $img_data['img_type']=$type[1];
                if(!$vm){
                    M('product_img')->where(['product_id'=>$id,'img_type'=>$img_data['img_type'] ])->delete();
                }else{
                    if(strpos($vm,';')!==false){
                         $img_arr=explode(';',$vm);
                    }else{
                         $img_arr=array($vm);
                    }
                    foreach($img_arr as &$v){
                        $v=trim($v);
                    }
                    $img_url_arr= M('product_img')->where(['product'=>$id,'img_type'=>$img_data['img_type']])->getField('img_url',true);
                    foreach($img_url_arr as $im){
                        if(!in_array($im,$img_arr)){
                            M('product_img')->where(['product_id'=>$id,'img_url'=>$im,'img_type'=>$img_data['img_type']])->delete();
                        }
                    }
                    foreach($img_arr as $im2){
                        if(in_array($im2,$img_url_arr)){
                            continue;
                        }
                        $img_data['img_url']=$im2;
                        M('product_img')->add($img_data);
                    }
                }
            }
        }
        return true;
    }

    /**删除单条产品
     * @param $id
     * @return int
     * @throws \think\Exception
     */
    public function delProduct($id){
        return M('product')->where(['id'=>$id])->delete();
    }
}