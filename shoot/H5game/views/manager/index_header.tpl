<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
</head>
<body>
    <div class="top_header">
        <div class="top_left">
            <{config_item('manager_title')}>
        </div>
        <div class="top_right">欢迎<{$admin_data.username}> <a href="<{site_url('manager/welcome/loginout')}>">退出</a></div>
        <div class="clear"></div>
    </div>
</body>
</html>