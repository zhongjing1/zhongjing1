<?php
return array(
	//'配置项'=>'配置值'
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'localhost', // 服务器地址
    'DB_NAME'   => 'chinaelite', // 数据库名
    'DB_USER'   => 'chinaelite', // 用户名
    'DB_PWD'    => 'Zj123456', // 密码
    'DB_PORT'   => 3306, // 端口
    'DB_PREFIX' => 'wb_', // 数据库表前缀
    'DB_CHARSET'=> 'utf8', // 字符集
   // 'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增

    // 配置邮件发送服务器
    'MAIL_HOST' =>'smtp.exmail.qq.com',//smtp服务器的名称
    'MAIL_SMTPAUTH' =>TRUE, //启用smtp认证
    'MAIL_USERNAME' =>'licai@chinaelite.hk',//你的邮箱名
    'MAIL_FROM' =>'licai@chinaelite.hk',//发件人地址
    'MAIL_FROMNAME'=>'中精',//发件人姓名
    'MAIL_PASSWORD' =>'Zhongjing12',//邮箱密码
    'MAIL_CHARSET' =>'utf-8',//设置邮件编码
    'MAIL_ISHTML' =>TRUE, // 是否HTML格式邮件

);

