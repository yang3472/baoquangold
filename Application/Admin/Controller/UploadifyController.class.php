<?php
/**
 * Created by PhpStorm.
 * User: 杨精勤
 * Date: 2018-05-20
 * Time: 10:54
 */
namespace Admin\Controller;
use Think\Controller;
class UploadifyController{
     public  static $imgFolder=['/product/','/adver/','/media/'];
     public function  upload(){
         // Define a destination
         $folder=isset($_POST['folder']) && $_POST['folder']?'/'.$_POST['folder']:'';
         if(!in_array($folder,self::$imgFolder)){
             echo '不支持的文件夹.';exit;
         }
         $target = '/Public/uploaded'.$folder; // Relative to the root
         $verifyToken = md5('unique_salt' . $_POST['timestamp']);

         if (!empty($_FILES) && $_POST['token'] == $verifyToken) {
             $tempFile = $_FILES['Filedata']['tmp_name'];
             //$targetPath = $_SERVER['DOCUMENT_ROOT'] . $target;


             // Validate the file type
             $fileTypes = array('jpg','jpeg','gif','png'); // File extensions
             $fileParts = pathinfo($_FILES['Filedata']['name']);
             $target=$target.time().rand(1000,9999).'.'.$fileParts['extension'];
             $targetFile = $_SERVER['DOCUMENT_ROOT'].$target;
             if (in_array($fileParts['extension'],$fileTypes)) {
                 move_uploaded_file($tempFile,$targetFile);
                 echo  $target;
             } else {
                 echo '不支持的文件格式.';
             }
         }
     }
}