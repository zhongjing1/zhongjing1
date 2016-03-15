<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('admin_title')}></title>
    <{load_css('admin')}>
</head>
<body>
<table class="table_add">
    <tr>
        <td width="100" align="right">url：</td>
        <td>
            <input type="text" class="input400" value="<{site_url('weixin_api')}>"/>
        </td>
    </tr>
    <tr>
        <td align="right">token：</td>
        <td>
            <input type="text" class="input400" value="<{$item.token}>"/>
        </td>
    </tr>
    <tr>
        <td align="right">aesKey：</td>
        <td>
            <input type="text" class="input400" value="<{$item.aeskey}>"/>
        </td>
    </tr>
</table>
</body>
</html>
