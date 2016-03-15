<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('admin_title')}></title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
</head>
<body>
<div class="content_title"><{if get_segment(3) == 'add'}>添加<{else}>修改<{/if}>公众号<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td width="150" align="right"><span class="hong">*</span>名称：</td>
        <td>
            <input name="title" type="text" class="input300" value="<{$item.title}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>微信号：</td>
        <td>
            <input name="wechat_num" type="text" class="input300" <{if get_segment(3) == 'add'}>ajaxurl="<{site_url('manager/mp/get_wechat_num')}>"<{/if}> <{if get_segment(3) == 'edit'}>readonly="readonly"<{/if}> value="<{$item.wechat_num}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>原始ID：</td>
        <td>
            <input name="original_id" type="text" class="input300" <{if get_segment(3) == 'add'}>ajaxurl="<{site_url('manager/mp/get_original_id')}>"<{/if}> <{if get_segment(3) == 'edit'}>readonly="readonly"<{/if}> value="<{$item.original_id}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>appid：</td>
        <td>
            <input name="appid" class="input300" type="text" value="<{$item.appid}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>appsecret：</td>
        <td>
            <input name="appsecret" class="input300" type="text" value="<{$item.appsecret}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>是否加密：</td>
        <td>
            <input type="radio" name="aestype" value="1" <{if $item.aestype==1 || $item.aestype==''}>checked<{/if}>/>明文模式
            <input type="radio" name="aestype" value="2" <{if $item.aestype==2}>checked<{/if}>/>兼容模式
            <input type="radio" name="aestype" value="3" <{if $item.aestype==3}>checked<{/if}>/>加密模式
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>公众号类型：</td>
        <td>
            <input type="radio" name="mp_type" value="1" <{if $item.mp_type==1 || $item.aestype==''}>checked<{/if}>/>服务号
            <input type="radio" name="mp_type" value="2" <{if $item.mp_type==2}>checked<{/if}>/>订阅号
        </td>
    </tr>
    <tr>
        <td align="right">微信支付商户ID：</td>
        <td>
            <input name="pay_id" class="input300" type="text" value="<{$item.pay_id}>" datatype="empty|*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right">微信支付密匙：</td>
        <td>
            <input name="pay_key" class="input300" type="text" value="<{$item.pay_key}>" datatype="empty|*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>用户名：</td>
        <td>
            <input name="username" type="text" class="input300" <{if get_segment(3) == 'add'}>ajaxurl="<{site_url('manager/mp/get_username')}>"<{/if}> <{if get_segment(3) == 'edit'}>readonly="readonly"<{/if}> value="<{$item.username}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><{if get_segment(3) == 'add'}><span class="hong">*</span><{/if}>密码：</td>
        <td>
            <input name="password" type="password" class="input300" value="" datatype="<{if get_segment(3) == 'edit'}>empty|<{/if}>*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td align="right"><{if get_segment(3) == 'add'}><span class="hong">*</span><{/if}>重复密码：</td>
        <td>
            <input name="passwords" type="password" class="input300" value="" recheck="password" datatype="<{if get_segment(3) == 'edit'}>empty|<{/if}>*"/><span class="Validform_checktip"></span>
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
