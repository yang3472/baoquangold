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
class NewsModel extends  Model{
    /**新闻列表
     * @param $condition
     * @return array
     */
    public function getList($condition){
        $query =M('news')->field(['id','title','create_time']);
        $where_data = [];
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

        $rs = $query->where($where_data)->order(['create_time' => 'desc'])
            ->limit($Page->firstRow.','.$Page->listRows)->select();
        return ['data'=>$rs,'page'=>$show];
    }

    /** 新闻详情
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     */
    public function getNewsDetail($id){
       return  M('news')
            ->where(['id'=>$id])
            ->find();
    }

    /**编辑新闻详情
     * @param $id
     */
    public function editNews($input){
        $id=ArrayHelper::getVal($input,'id',0);
        $title=ArrayHelper::getVal($input,'title','');
        $author=ArrayHelper::getVal($input,'author','');
        $source_from=ArrayHelper::getVal($input,'source_from','');
        $detail=ArrayHelper::getVal($input,'detail','');
        if(!$title || !$author || !$source_from || !$detail){
            makeOutPut(-10,'参数错误');
        }
        $data = [
            'title' => $title,
            'author' => $author,
            'source_from'=>$source_from,
            'detail'=>$detail,
        ];
        if(!$id){
            $data['create_time'] = date('Y-m-d H:i:s');
            $ret=  M('news')->add($data);
        }else{
            $data['id'] = $id;
            $ret= M('news')->save($data);
        }
        return $ret;
    }

    /**删除单条新闻
     * @param $id
     * @return int
     * @throws \think\Exception
     */
    public function delNews($id){
        return M('news')->where(['id'=>$id])->delete();
    }
}