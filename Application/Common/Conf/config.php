<?php
$config_common=array(
    "version"=>'20.0.0',
    /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_NAME'               =>  'baoquangold',          // 数据库名
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
);

if(APP_PRO){
    $config= array(
        'DB_HOST'               =>  '127.0.0.1', // 服务器地址
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'WEB_HOST'=>'http://www.baoquangold.com/',  //网站域名
    );
}else if(APP_DEV){
    $config= array(
        'DB_HOST'               =>  '127.0.0.1', // 服务器地址
        'DB_USER'               =>  'root',      // 用户名
        'DB_PWD'                =>  'root',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'WEB_HOST'=>'http://www.baoquan_my.com/',  //网站域名
    );
}else if(APP_TEST){
    $config= array(
        'DB_NAME'               =>'hdm427764453_db',
        'DB_HOST'               =>  'hdm427764453.my3w.com', // 服务器地址
        'DB_USER'               =>  'hdm427764453',      // 用户名
        'DB_PWD'                =>  'yjq336019',          // 密码
        'DB_PORT'               =>  '3306',        // 端口
        'WEB_HOST'=>'http://hyu4299510001.my3w.com/',  //网站域名
    );
}

return array_merge($config_common,$config);
