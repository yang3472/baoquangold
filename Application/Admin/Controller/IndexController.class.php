<?php
namespace app\Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public static $original_str='systemId=0010&userId=test';
    //public static $original_str='userId=test&systemId=0010';
    public function index(){
         echo md5(123456);
    }
    public function test(){
        $key_pem_path='D:\phpStudy\WWW\www.baoquangold.com\public\static\admin\key.pem';
        $private_content=file_get_contents($key_pem_path);
        $private_key=openssl_get_privatekey($private_content);
        openssl_sign(self::$original_str,$sign,$private_key);
        openssl_free_key($private_key);
        $sign=base64_encode($sign);
        echo $sign;die();
    }

    public function test2(){
        $key_pem_path='D:\phpStudy\WWW\www.baoquangold.com\public\static\admin\key.pem';
        $private_content=file_get_contents($key_pem_path);
        $private_key=openssl_get_privatekey($private_content);
        $arr=$this->getBytes(self::$original_str);
        $arrToStr=implode('',$arr);
        openssl_sign(self::$original_str,$sign,$private_key,OPENSSL_ALGO_SHA256);
        openssl_free_key($private_key);
        $sign=urlencode(base64_encode($sign));
        echo $sign;die();
    }

    public function  test3(){
        $str='ZQqUgYHUdok8LEPbYTbstElTx04x1pKmyyr7gCh7SqCFBc6S3+Z2kLByxrwYkbLmnzO32Ix4PfXY lWRVzhMu78HItduinUgYqPFzi7TD+2h23Q+htECqDiXcxlSSoKbFlsepIcMNR5TfFouzZl6OM8ix 1f0j9pb7JDNedmHqUvw=';
        echo urlencode($str);
    }

    public  function test4(){
        $arr=$this->getBytes(self::$original_str);
        $arrToStr=implode('',$arr);
        $key_pem_path='D:\phpStudy\WWW\www.baoquangold.com\public\static\admin\key.pem';
        $private_content=file_get_contents($key_pem_path);
        $private_key=openssl_get_privatekey($private_content);
        openssl_private_encrypt($arrToStr, $encrypted, $private_key,OPENSSL_ALGO_SHA256);
        echo base64_decode($encrypted);die();
    }

    public static function getBytes($string) {
        $bytes = array();
        for($i = 0; $i < strlen($string); $i++){
            $bytes[] = ord($string[$i]);
        }
        return $bytes;
    }


    public  function StrToBin($str){
        //1.列出每个字符
        $arr = preg_split('/(?<!^)(?!$)/u', $str);
        //2.unpack字符
        foreach($arr as &$v){
            $temp = unpack('H*', $v);
            $v = base_convert($temp[1], 16, 2);
            unset($temp);
        }

        return $arr;
    }

    public static function getBytes_10($str) {


        $len = strlen($str);
        $bytes = array();
        for($i=0;$i<$len;$i++) {
            if(ord($str[$i]) >= 128){
                $byte = ord($str[$i]) - 256;
            }else{
                $byte = ord($str[$i]);
            }
            $bytes[] =  $byte ;
        }
        return $bytes;
    }

    public static function getBytes_16($str) {


        $len = strlen($str);
        $bytes = array();
        for($i=0;$i<$len;$i++) {
            if(ord($str[$i]) >= 128){
                $byte = ord($str[$i]) - 256;
            }else{
                $byte = ord($str[$i]);
            }
            $bytes[] =  "0x".dechex($byte) ;
        }
        return $bytes;
    }
}
