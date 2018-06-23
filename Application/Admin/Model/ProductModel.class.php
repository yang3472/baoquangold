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
        $special = ArrayHelper::getVal($condition, 'special',-1);
        if ($special!=-1) {
            $where_data['special']=$special;
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
                $product_info['img_1']=ltrim($img['img_url'],'/');
            }else if($img['img_type']==2){
                $product_info['img_2']=ltrim($img['img_url'],'/');
            }else if($img['img_type']==3){
                $product_info['img_3']=ltrim($img['img_url'],'/');
            }else if($img['img_type']==4){
                $product_info['img_4']=ltrim($img['img_url'],'/');
            }else if($img['img_type']==5){
                array_push($img_5,ltrim($img['img_url'],'/'));
            }else if($img['img_type']==6){
                array_push($img_6,ltrim($img['img_url'],'/'));
            }
        }
        $product_info['img_5']=$img_5?$img_5:[];
        $product_info['img_6']=$img_6?$img_6:[];
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
            if(empty($v)){
                makeOutPut(-10,'参数错误');
            }
        }
        $data['special']=ArrayHelper::getVal($input,'special',0);

        $img_3=ArrayHelper::getVal($input,'img_3','');
        $img_single['img_3']=$img_3?'/'.ltrim($img_3,'/'):'';
        $img_4=ArrayHelper::getVal($input,'img_4','');
        $img_single['img_4']=$img_4?'/'.ltrim($img_4,'/'):'';

        $img_5_0=ArrayHelper::getVal($input,'img_5_0','');
        $img_5_1=ArrayHelper::getVal($input,'img_5_1','');
        $img_5_2=ArrayHelper::getVal($input,'img_5_2','');
        $img_5_3=ArrayHelper::getVal($input,'img_5_3','');
        $img_5_4=ArrayHelper::getVal($input,'img_5_4','');
        $img_more_5['img_5_0']=$img_5_0?'/'.ltrim($img_5_0,'/'):'';
        $img_more_5['img_5_1']=$img_5_1?'/'.ltrim($img_5_1,'/'):'';
        $img_more_5['img_5_2']=$img_5_2?'/'.ltrim($img_5_2,'/'):'';
        $img_more_5['img_5_3']=$img_5_3?'/'.ltrim($img_5_3,'/'):'';
        $img_more_5['img_5_4']=$img_5_4?'/'.ltrim($img_5_4,'/'):'';

        $img_more_6['img_6_0']=ArrayHelper::getVal($input,'img_6_0','');
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
            $img_5=[];
            foreach($img_more_5 as $km=>$vm){
                if($vm){
                    array_push($img_5,$vm);
                }
            }
            if(!$img_5){
                M('product_img')->where(['product_id'=>$id,'img_type'=>5 ])->delete();
            }else{
                $img_url_arr= M('product_img')->where(['product_id'=>$id,'img_type'=>5])->getField('img_url',true);
                foreach($img_url_arr as $im){
                    if(!in_array($im,$img_5)){
                        M('product_img')->where(['product_id'=>$id,'img_url'=>$im,'img_type'=>5])->delete();
                    }
                }
                foreach($img_5 as $im2){
                    if(in_array($im2,$img_url_arr)){
                        continue;
                    }
                    $img_data['img_url']=$im2;
                    $img_data['img_type']=5;
                    M('product_img')->add($img_data);
                }
            }


            $img_6=[];
            foreach($img_more_6 as $km=>$vm){
                if($vm){
                    array_push($img_6,$vm);
                }
            }
            if(!$img_6){
                M('product_img')->where(['product_id'=>$id,'img_type'=>6 ])->delete();
            }else{
                $img_url_arr= M('product_img')->where(['product_id'=>$id,'img_type'=>6])->getField('img_url',true);
                foreach($img_url_arr as $im){
                    if(!in_array($im,$img_6)){
                        M('product_img')->where(['product_id'=>$id,'img_url'=>$im,'img_type'=>6])->delete();
                    }
                }
                foreach($img_6 as $im2){
                    if(in_array($im2,$img_url_arr)){
                        continue;
                    }
                    $img_data['img_url']=$im2;
                    $img_data['img_type']=6;
                    M('product_img')->add($img_data);
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