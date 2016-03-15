<?php
$database = require ('./config.php');
if(is_file( DATA_PATH.'sys.config.php')){
    $aa=file_get_contents( DATA_PATH.'sys.config.php');
    $sys_config=json_decode($aa,true);
}

if(empty($sys_config)){$sys_config=array();}
$config	= array(
        'URL_MODEL'=>1,
        'HTML_CACHE_ON'=>1,
		'URL_CASE_INSENSITIVE' => true, 
		'DEFAULT_CHARSET' => 'utf-8',
		'APP_GROUP_LIST' => 'Home,Admin,User,En',
		'DEFAULT_GROUP' =>'Home',
		'DB_FIELDTYPE_CHECK' => true,
        'LAYOUT_ON'=> false,
        'DB_LIKE_FIELDS'=>  'title|remark|account',
        'DEFAULT_THEME'=> 'Default',
        'VAR_PAGE' => 'p',
        'APP_AUTOLOAD_PATH' =>  '@.TagLib',
        'SESSION_AUTO_START'=>  true,
        'TMPL_ACTION_ERROR' =>  'Public:success', // 默认错误跳转对应的模板文件
        'TMPL_ACTION_SUCCESS' => 'Public:success', // 默认成功跳转对应的模板文件
		'TAGLIB_PRE_LOAD' => 'html' ,
        'TMPL_FILE_DEPR' => '_',
	'APP_DEBUG'=>true,
    'OUTPUT_ENCODE'=>1,
    'URL_HTML_SUFFIX'=>'html',
    'TMPL_STRIP_SPACE'=>1,
    'URL_ROUTER_ON'   => false,

);
return array_merge($database, $config,$sys_config);
?>