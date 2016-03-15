<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('admin_title')}></title>
    <link href="/public/css/admin.css" type="text/css" rel="stylesheet">
    <link href="/public/css/validform.css" type="text/css" rel="stylesheet">
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer1.8/layer')}>
    <{load_js('ajaxfileupload')}>
</head>
<body>
<div class="content_title"><{if get_segment(3) == 'add'}>添加<{else}>修改<{/if}>案例<span><input onclick="history.back(-1);" type="button" class="button" value="返回"/></span></div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td width="150" align="right"><span class="hong">*</span>活动名称：</td>
        <td>
            <input name="actname" type="text" class="input300" value="<{$item.actname}>" datatype="*"/><span class="Validform_checktip"></span>
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>活动链接：</td>
        <td>
            <input name="links" type="text" class="input300" value="<{$item.links}>" datatype="url"/><span class="Validform_checktip"></span>格式为：http://网址
        </td>
    </tr>
    <tr>
        <td width="150" align="right"><span class="hong">*</span>项目列表：</td>
        <td>
            <select name="project_list">
                <{foreach config_item('project_list') as $v=>$k}>
                <option value="<{$v}>" <{if $v==$item.project_list}>selected<{/if}>><{$k}></option>
                <{/foreach}>
            </select>
            <select name="project_type">
                <{foreach config_item('project_type') as $v=>$k}>
                <option value="<{$v}>" <{if $v==$item.project_type}>selected<{/if}>><{$k}></option>
                <{/foreach}>
            </select>
        </td>
    </tr>
    <tr>
        <td align="right">预览图：</td>
        <td>
            <input name="image_up" id="image_up" type="file" onchange="upload_image('image_up');"/>建议控制500KB以内，格式jpg、png、gif
            <img src="<{$item.image}>" class="open_litpic" id="pic" <{if $item.image==''}>style="display: none"<{/if}>>
            <img src="<{$item.image}>" class="open_bigpic" id="big_pic" style="display:none"/>
            <input name="image" type="hidden" value="<{$item.image}>"/>
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
    //上传缩略图
    function upload_image(upfile_name){
        var loadi = layer.load('照片分析中...');
        $.ajaxFileUpload({
            url:'<{site_url('activity/upload/upload')}>?width=&height=&file_name='+upfile_name,
            secureuri:false,
            fileElementId:upfile_name,
            dataType: 'json',
            success: function (data) {
                if(data.state == 'SUCCESS') {
                    layer.close(loadi)
                    $('[name="'+upfile_name+'"]').parent().find('.open_litpic').attr('src', data.url).show();
                    $('[name="'+upfile_name+'"]').parent().find('.open_bigpic').attr('src', data.url)
                    $('[name="'+upfile_name+'"]').parent().find('[type="hidden"]').val(data.url);
                } else {
                    layer.msg(data.state, 2, -1);//错误提示
                    return false;
                }
            }
        });
    }
</script>
</body>
</html>
