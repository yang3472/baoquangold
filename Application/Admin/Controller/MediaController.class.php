<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-13
 * Time: 9:06
 */
namespace Admin\Controller;
use Admin\Model\AdverModel;
use Admin\Model\MediaModel;
use Think\Myfun\ArrayHelper;
use Think\Controller;


class MediaController extends  TemplateController{
     public function  __construct(){
         parent::__construct();
     }
     public function index(){
         $media_model= new MediaModel();
         $ret=$media_model->getList(I('param.'));
         $this->assign('menu_id','media_list');
         $this->assign('data',$ret['data']);
         $this->assign('page',$ret['page']);
         $this->display('index');
     }

    public function add(){
        $url='';
        if($descrip=I('descrip')){
            $upload = new \Think\Upload();// 实例化上传类
            $upload->autoSub = false;
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            $upload->rootPath  =     './Public/'; // 设置附件上传根目录
            $upload->savePath  =     'uploaded/media/'; // 设置附件上传（子）目录
            // 上传文件
            $info   =   $upload->upload();
            if(!$info) {// 上传错误提示错误信息
                $this->error($upload->getError());
            }else{// 上传成功
                $url=$upload->rootPath.$info['photo']['savepath'].$info['photo']['savename'];
                $url=ltrim($url,'.');
                M('media')->add(['url'=>$url,'descrip'=>$descrip]);
            }
        }
        $this->assign('url',$url);
        $this->assign('menu_id','add_media');
        $this->display('add');
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
                    M('media')->where(['url'=>$relative_path.'/'.$filename])->delete();
                    @unlink($absolute_path.'/'.$filename);
                }
            }
        }
        $this->assign('menu_id','delete_file');
        $this->display('deleteFile');
    }
}