<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
</head>
<body>
<div class="content_title">系统首页</div>
<table class="tablebg">
    <tr>
        <td width="150" height="30" align="right">登陆用户：</td>
        <td align="left"><{$admin_data.username}></td>
    </tr>
    <tr>
        <td align="right" height="30">程序版本：</td>
        <td align="left">V1.0</td>
    </tr>
    <tr>
        <td align="right" height="30">操作系统：</td>
        <td align="left"><{php_uname()}></td>
    </tr>
    <tr>
        <td align="right" height="30">网站域名：</td>
        <td align="left"><{$http_host}></td>
    </tr>
    <tr>
        <td align="right" height="30">服务器时间：</td>
        <td align="left"><{date('Y-m-d H:i:s',time())}></td>
    </tr>
    <tr>
        <td align="right" height="30">服务器解析引擎：</td>
        <td align="left"><{$server_soft}></td>
    </tr>
    <tr>
        <td align="right" height="30">PHP版本：</td>
        <td align="left"><{$php_version}></td>
    </tr>
    <tr>
        <td align="right" height="30">PHP安装路径：</td>
        <td align="left"><{$php_path}></td>
    </tr>
    <tr>
        <td align="right" height="30">上传文件限制：</td>
        <td align="left"><{$file_size}></td>
    </tr>
    <tr>
        <td align="right" height="30">WEB运行用户名：</td>
        <td align="left"><{Get_Current_User()}></td>
    </tr>
</table>
</body>
</html>
