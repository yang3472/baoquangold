<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-24
 * Time: 21:36
 */

namespace Api\Controller;

use Api\Model\AdverModel;
use Common\Common\ReturnCode;
use Think\Controller;
class AdverController extends  Controller {
    /**
     * 获取广告
     */
     public function getList(){
          $position=I('position');
          $index=I('index',0);
          $limit=I('limit',50);
          if(!$position){
               makeOutPut(ReturnCode::PARAMETER_ERROR,'参数错误');
          }
          $adver_model=  new AdverModel();
          $rs= $adver_model->getList($position,$index,$limit);
          makeSuccOutPut($rs);
     }
}