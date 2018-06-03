<?php


function makeOutPut($return_code = -1, $message = '',$exit=true)
{
    $arr=array('return_code' => $return_code, 'return_message' => $message);
    if($exit){
        echo json_encode($arr,JSON_UNESCAPED_UNICODE);exit();
    }
    return $arr;
}

function makeSuccOutPut($data=array(),$exit=true)
{
    $ret= array('return_code' => 0, 'return_message' => '','data'=>$data);
    if($exit){
        echo json_encode($ret,JSON_UNESCAPED_UNICODE);exit();
    }else{
        return $ret;
    }
}



function getPageStr($total_count,$page_size,$current_page,$current_num_style='current',$not_current_num_style='num'){
    if(!$total_count || !(int)$page_size){
        return '';
    }
    $total_page=ceil($total_count/$page_size);
    if($total_page==1){
        return '';
    }
    $page_str='';
    $sub_page_count=3;
    //上一页
    if($current_page>1){
        $page_str.='<a class="next" href="javascript:void(0)" onclick="get_page_data('.($current_page-1).')">上一页</a>';
    }
    //第一页
    if($current_page==1){
        $page_str.='<span class="'.$current_num_style.'">1</span>';
    }else{
        $page_str.='<a class="'.$not_current_num_style.'" href="javascript:void(0)" onclick="get_page_data(1)">1</a>';
    }
    $begin_page= ($current_page-$sub_page_count)>2?($current_page-$sub_page_count):2;
    $end_page=($current_page+$sub_page_count)<$total_page?($current_page+$sub_page_count):$total_page-1;
    if($begin_page>=$sub_page_count){
        $page_str.='<a class="'.$not_current_num_style.'" href="javascript:void(0)" >...</a>';
    }
    for($i=$begin_page;$i<=$end_page;$i++){
        if( $i>=($current_page-$sub_page_count) && $i<=($current_page+$sub_page_count)){
            if($current_page==$i){
                $page_str.='<span class="'.$current_num_style.'">'.$i.'</span>';
            }else{
                $page_str.='<a class="'.$not_current_num_style.'" href="javascript:void(0)" onclick="get_page_data('.$i.')">'.$i.'</a>';
            }
        }else{
            $page_str.='<a class="'.$not_current_num_style.'" href="javascript:void(0)" onclick="get_page_data('.$i.')">'.$i.'</a>';
        }
    }
    if( ($current_page+$sub_page_count)< ($total_page-1) ){
        $page_str.='<a class="'.$not_current_num_style.'" href="javascript:void(0)" >...</a>';
    }
    //最后一页
    if($current_page==$total_page){
        $page_str.='<span class="'.$current_num_style.'">'.$total_page.'</span>';
    }else{
        $page_str.='<a class="'.$not_current_num_style.'" href="javascript:void(0)" onclick="get_page_data('.$total_page.')">'.$total_page.'</a>';
    }
    //下一页
    if($total_page>1 && $current_page<$total_page){
        $page_str.='<a class="next" href="javascript:void(0)" onclick="get_page_data('.($current_page+1).')">下一页</a>';
    }
    return $page_str;
}

function getClientRealIp()
{
    $realIp = '';
    $unknown = 'unknown';
    if (isset($_SERVER)) {
        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])
            && !empty($_SERVER['HTTP_X_FORWARDED_FOR'])
            && strcasecmp($_SERVER['HTTP_X_FORWARDED_FOR'], $unknown)
        ) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($arr as $ip) {
                $ip = trim($ip);
                if ($ip != 'unknown') {
                    $realIp = $ip;
                    break;
                }
            }
        } else {
            if (isset($_SERVER['HTTP_CLIENT_IP'])
                && !empty($_SERVER['HTTP_CLIENT_IP'])
                && strcasecmp($_SERVER['HTTP_CLIENT_IP'], $unknown)
            ) {
                $realIp = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                if (isset($_SERVER['REMOTE_ADDR'])
                    && !empty($_SERVER['REMOTE_ADDR'])
                    && strcasecmp($_SERVER['REMOTE_ADDR'], $unknown)
                ) {
                    $realIp = $_SERVER['REMOTE_ADDR'];
                } else {
                    $realIp = $unknown;
                }
            }
        }
    } else {
        if (getenv('HTTP_X_FORWARDED_FOR')
            && strcasecmp(getenv('HTTP_X_FORWARDED_FOR'), $unknown)
        ) {
            $realIp = getenv("HTTP_X_FORWARDED_FOR");
        } else {
            if (getenv('HTTP_CLIENT_IP')
                && strcasecmp(getenv('HTTP_CLIENT_IP'), $unknown)
            ) {
                $realIp = getenv("HTTP_CLIENT_IP");
            } else {
                if (getenv('REMOTE_ADDR')
                    && strcasecmp(getenv('REMOTE_ADDR'), $unknown)
                ) {
                    $realIp = getenv("REMOTE_ADDR");
                } else {
                    $realIp = $unknown;
                }
            }
        }
    }
    $realIp = preg_match("/[\\d\\.]{7,15}/", $realIp, $matches)
        ? $matches[0] : $unknown;

    return $realIp;
}

function getCityFromIp($ip = '')
{
    $address['country']=$address['province']=$address['city']='';
    if($ip == ''){
        $url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json";
        $ip=json_decode(file_get_contents($url),true);
        $data = $ip;
        if($data && $data['ret']==1){
            $address['country']=$data['country'];
            $address['province']=$data['province'];
            $address['city']=$data['city'];
        }
    }else{
        $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$ip;
        $ip=json_decode(file_get_contents($url));
        if((string)$ip->code!='1'){
            $data = (array)$ip->data;
            $address['country']=$data['country'];
            $address['province']=$data['region'];
            $address['city']=$data['city'];
        }
    }
    return $address;
}

/**遍历文件
 * @param $path
 * @return array
 */
function scanFile($path) {
    global $result;
    $files = scandir($path);
    foreach ($files as $file) {
        if ($file != '.' && $file != '..') {
            if (is_dir($path . '/' . $file)) {
                scanFile($path . '/' . $file);
            } else {
                $result[] = basename($file);
            }
        }
    }
    return $result;
}