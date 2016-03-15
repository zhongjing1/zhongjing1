<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
</head>
<body>
    <div class="clear"></div>
    <div class="footer_bg">版本1.0<{if $admin_user_data.uid==1}>&nbsp;<a target="main" style="color: #FFFFFF;" href="<{site_url("manager/admin_menu")}>">菜单管理</a><{/if}></div>
</body>
</html>