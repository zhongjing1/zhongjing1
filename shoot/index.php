<?php
//定义项目名称和路径
if (!is_file('./config.php')) header("location: ./Install");
header("Content-type: text/html; charset=utf-8");
define('APP_NAME', 'App');
define('APP_PATH', './App/');
define('APP_DEBUG',TRUE);
// 加载框架入口文件
require( "./ThinkPHP/ThinkPHP.php");