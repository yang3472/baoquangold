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
class LeavewordModel extends  Model{
    public function getList($condition){
        $query =M('leaveword');
        $where_data = [];
        $status=(int)ArrayHelper::getVal($condition,'status',-1);
        if($status!=-1){
            $where_data['status']=$status;
        }
        //注册时间
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
        $count      = $query->where($where_data)->count();// 查询满足要求的总记录数
        $Page       = new \Think\Page($count,10);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出

        $rs = $query->where($where_data)
            ->Order(['create_time' => 'desc'])
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        return ['data'=>$rs,'page'=>$show];
    }

    public function  changeStatus($input){
        $type=ArrayHelper::getVal($input,'type',0);
        $id=ArrayHelper::getVal($input,'id',0);
         if($type==1){
            return M('leaveword')->save(['id'=>$id,'status'=>1]);
         }else{
            return M('leaveword')->where(['id'=>$id])->delete();
         }
    }
}