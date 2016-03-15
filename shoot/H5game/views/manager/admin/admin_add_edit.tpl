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
<div class="content_title"><{if get_segment(3) == 'add'}>添加<{else}>修改<{/if}>管理员<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td width="150" align="right"><span class="hong">*</span>用户名：</td>
        <td>
            <input name="username" type="text" class="input200" <{if get_segment(3) == 'add'}>ajaxurl="<{site_url('manager/admin/get_username')}>"<{/if}> <{if get_segment(3) == 'edit'}>readonly="readonly"<{/if}> value="<{$item.username}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>密码：</td>
        <td>
            <input name="password" type="password" class="input200" value="" datatype="<{if get_segment(3) == 'edit'}>empty|<{/if}>*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>重复密码：</td>
        <td>
            <input name="passwords" type="password" class="input200" value="" recheck="password" datatype="<{if get_segment(3) == 'edit'}>empty|<{/if}>*"/><span class="Validform_checktip"></span>
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
        <td align="right">用户组：</td>
        <td>
            <select name="group">
                <{foreach $group_list as $key}>
                    <option value="<{$key.gid}>" <{if $item.group==$key.gid}>selected<{/if}>><{$key.group_name}></option>
                <{/foreach}>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right">状态：</td>
        <td>
            <input type="radio" name="status" value="1" <{if $item.status=='1' || $item.status==''}>checked="checked"<{/if}>/>正常
            <input type="radio" name="status" value="2" <{if $item.status=='2'}>checked="checked"<{/if}>/>锁定
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
