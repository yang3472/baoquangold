<?php
/**
 * Created by PhpStorm.
 * User: millions
 * Date: 15/12/22
 * Time: 上午11:19
 */

namespace Think\Myfun;
class HttpHelper
{
    public static function curlGet(
        $url,
        $connect_timeout = 10,
        $timeout = 30,
        $optionalHeaders = array()
    ) {
        $ch = curl_init();
        if ($ch === false) {
            return false;
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,
            $connect_timeout); // wait to connect
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);//wait to execute
        curl_setopt($ch, CURLOPT_HTTPHEADER, $optionalHeaders);

        $result = curl_exec($ch);
        if ($result === false) {
            curl_close($ch);
            return false;
        }
        curl_close($ch);

        return $result;
    }

    public static function curlPost(
        $url,
        $data,
        $connect_timeout = 10,
        $timeout = 30,
        $headers = [],
        $shouldBuildQuery = true
    ) {
        $ch = curl_init();
        if ($ch === false) {
            return false;
        }

        //对于上传文件,不要进行http_build_query
        if (is_array($data) && $shouldBuildQuery) {
            $data = http_build_query($data);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        if ($data) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,
            $connect_timeout); // wait to connect
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);//wait to execute
        if (empty($headers)) {
            $headers[]
                = 'Content-Type: application/x-www-form-urlencoded; charset=utf-8';
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);

        if ($result === false) {
            curl_close($ch);
            return false;
        }
        curl_close($ch);

        return $result;
    }

    public static function uploadFile($url, $fileData, $fileName)
    {
        $headers
            = array("Content-Type:multipart/form-data"); // cURL headers for file uploading
        $postFields = array("filedata" => "$fileData", "filename" => $fileName);
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $url,
            CURLOPT_HEADER => true,
            CURLOPT_POST => 1,
            CURLOPT_HTTPHEADER => $headers,
            CURLOPT_POSTFIELDS => $postFields,
            CURLOPT_INFILESIZE => strlen($fileData),
            CURLOPT_RETURNTRANSFER => true,
        ); // cURL options
        curl_setopt_array($ch, $options);
        curl_exec($ch);
        curl_close($ch);
        if (!curl_errno($ch)) {
            return true;
        } else {
            return false;
        }
    }
}