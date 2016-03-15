<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
</head>
<body>
<div class="content_title">修改信息<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td width="9%" align="right"><span class="hong">*</span>用户名：</td>
        <td>
            <input name="username" type="text" class="input200" readonly="readonly" value="<{$item.username}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>密码：</td>
        <td>
            <input name="password" type="password" class="input200" value="" datatype="<{if get_segment(3) == 'self'}>empty|<{/if}>*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>重复密码：</td>
        <td>
            <input name="passwords" type="password" class="input200" value="" recheck="password" datatype="<{if get_segment(3) == 'self'}>empty|<{/if}>*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right">电话：</td>
        <td>
            <input name="tel" class="input200" type="text" value="<{$item.tel}>" datatype="empty|m"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right">邮箱：</td>
        <td>
            <input name="email" class="input200" type="text" value="<{$item.email}>" datatype="empty|e"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right">&nbsp;</td>
        <td>
            <input name="Submit" type="submit" class="button" value="保存"/>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input name="Submit2" type="reset" class="button" value="重置" />
            <input name="dopost" type="hidden" id="dopost" value="save" />
        </td>
    </tr>
</table>
</form>
<script type="text/javascript">
    $(function(){
        $("#add").Validform({
            tiptype:function(msg,o,cssctl){
                if(!o.obj.is("form")){
                    var objtip=o.obj.siblings(".Validform_checktip");
                    cssctl(objtip,o.type);
                    objtip.text(msg);
                }
            },
            datatype: {
                "empty": /^\s*$/
            }
        });
    })
</script>
</body>
</html>
