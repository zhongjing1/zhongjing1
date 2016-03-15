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
<div class="content_title"><{if get_segment(3) == 'add'}>添加<{else}>修改<{/if}>菜单<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
    <table class="table_add">
        <tr>
            <td width="150" align="right"><span class="hong">*</span>栏目名称：</td>
            <td>
                <input name="title" type="text" class="input200" value="<{$item.title}>" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right"><span class="hong">*</span>模型：</td>
            <td>
                <input name="model" type="text" class="input200" value="<{$item.model}>" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right"><span class="hong">*</span>控制器：</td>
            <td>
                <input name="action" type="text" class="input200" value="<{$item.action}>" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right">自定义参数：</td>
            <td>
                <input name="string" type="text" class="input200" value="<{$item.string}>"/>
            </td>
        </tr>
        <tr>
            <td align="right"><span class="hong">*</span>排序：</td>
            <td>
                <input name="sortnum" type="text" class="input50" value="<{$item.sortnum|default:0}>" datatype="*"/><span class="Validform_checktip"></span>
            </td>
        </tr>
        <tr>
            <td align="right">&nbsp;</td>
            <td>
                <input name="Submit" type="submit" class="button" value="保存"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <input name="Submit2" type="reset" class="button" value="重置" />
                <input name="dopost" type="hidden" id="dopost" value="save" />
                <input type="hidden" name="reid" value="<{$reid|default:0}>">
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
