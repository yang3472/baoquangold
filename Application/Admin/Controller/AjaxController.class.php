<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2017/8/19
 * Time: 21:28
 */
namespace app\admin\controller;
use app\admin\model\ProductPrice;
use app\admin\model\Region;
use Think\Controller;
class AjaxController extends  Controller{

    public function getPriceList($product_id){
        $price_model= new ProductPrice();
        $arr= $price_model->getPriceListByProductId($product_id);
        makeSuccOutPut($arr);
    }

    public  function  get_provinces(){
        $region_model= new Region();
        $provinces= $region_model->getProvinces();
        makeSuccOutPut(['provinces'=>$provinces]);
    }

    public  function  get_cities(){
        $province=input('province');
        $region_model= new Region();
        $cities=$region_model->getCities($province);
        makeSuccOutPut(['cities'=>$cities]);
    }

    public  function  get_districts(){
        $province=input('province');
        $city=input('city');
        $region_model= new Region();
        $districts=$region_model->getDistrict($province,$city);
        makeSuccOutPut(['districts'=>$districts]);
    }
}