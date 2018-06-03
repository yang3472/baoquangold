<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 9:06
 */
namespace Admin\Controller;
use Admin\Model\AdverModel;
use Think\Myfun\ArrayHelper;
use Think\Controller;


class AdverController extends  TemplateController{
     public function  __construct(){
         parent::__construct();
     }
     public function index(){
         $adver_model= new AdverModel();
         $position_config=$adver_model->getPositionConfig();
         $ret=$adver_model->getList(I('param.'));
         $this->assign('menu_id','adver_list');
         $this->assign('data',$ret['data']);
         $this->assign('page',$ret['page']);
         $this->assign('position_config',$position_config);
         $this->display('index');
     }

    public function edit(){
        $id=(int)I('id',0);
        $adver_model= new AdverModel();
        $position_config=$adver_model->getPositionConfig();
        if($input=I('post.')){
            $rs=$adver_model->editAdver($input);
            if($rs){
                echo 1;exit;
            }else{
                echo -10;exit;
            }
        }
        $data=$adver_model->getAdverDetail($id);
        if(!ArrayHelper::getVal($data,'position')){
            $data['position']='';
        }
        $this->assign('menu_id','adver_edit');
        $this->assign('id',$id);
        $this->assign('data',$data);
        $this->assign('position_config',$position_config);
        $this->display('edit');
    }

    /**
     * 删除广告
     */
    public function delAdver(){
        $id=(int)I('id',0);
        $adver_model= new AdverModel();
        if($id){
            $ret= $adver_model->delAdver($id);
            if($ret){
                makeSuccOutPut();
            }else{
                makeOutPut(-10,'操作失败');
            }
        }else{
            makeOutPut(-10,'操作失败');
        }
    }

    /**
     * 删除多余的图片
     */
    public function  deleteFile(){
        $adver_model= new AdverModel();
        $all_db_imgs= $adver_model->getDbImgs();
        $folder=UploadifyController::$imgFolder;
        foreach($folder as $fv){
            $relative_path='/Public/uploaded/'.trim($fv,'/');
            $absolute_path=$_SERVER['DOCUMENT_ROOT'].$relative_path;
            $file_arr=scanFile($absolute_path);
            foreach($file_arr as $filename ){
                if(!in_array($relative_path.'/'.$filename,$all_db_imgs)){
                    @unlink($absolute_path.'/'.$filename);
                }
            }
        }
        $this->assign('menu_id','delete_file');
        $this->display('deleteFile');
    }
}