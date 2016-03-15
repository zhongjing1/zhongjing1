<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>编辑公司信息</title>
    <link href="/public/css/admin.css" type="text/css" rel="stylesheet">
    <link href="/public/css/validform.css" type="text/css" rel="stylesheet">
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer1.8/layer')}>
    <{load_js('ajaxfileupload')}>
</head>
<body>
<div class="content_title">
    编辑公司信息
    <span><input onclick="window.location.href='<{site_url("<{$index_dir}>/admin_involved")}>'" type="button" class="button" value="返回"/></span>
</div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td align="right" width="150"><span class="hong">*</span>公司名称：</td>
        <td>
            <input type="text" name="company" id="company" datatype="*" nullmsg="请输入公司名称！" placeholder="公司名称" value="<{$id_update.company}>" />
        </td>
    </tr>
    <tr>
        <td align="right" width="150"><span class="hong">*</span>项目标题：</td>
        <td>
            <input type="text" name="project" id="project" value="<{$id_update.project}>" />
        </td>
    </tr>
    <tr>
        <td align="right" width="150"><span class="hong">*</span>运作资金：</td>
        <td>
            <input type="text" name="money" id="money" value="<{$id_update.money}>" />
        </td>
    </tr>
    <tr>
        <td align="right" width="150"><span class="hong">*</span>合伙人要求：</td>
        <td>
            <input type="text" name="partnerrequire" id="partnerrequire" value="<{$id_update.partnerrequire}>" />
        </td>
    </tr>
    <tr>
        <td align="right">分成比例图：</td>
        <td>
            <input name="image_up" id="image_up" type="file" onchange="upload_image('image_up');"/>建议控制500KB以内，格式jpg、png、gif
            <img src="<{$id_update.image}>" class="open_litpic" id="pic" <{if $id_update.image==''}>style="display: none"<{/if}>>
            <img src="<{$id_update.image}>" class="open_bigpic" id="big_pic" style="display:none"/>
            <input name="image" type="hidden" value="<{$id_update.image}>"/>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>内容：</td>
        <td>
           <{load_editer_js()}>
           <{load_editer('desc', $id_update.desc)}>
        </td>
    </tr>
    <tr>
        <td align="right">&nbsp;</td>
        <td>
            <input name="dopost" type="hidden" id="dopost" value="save" />
            <input name="id" type="hidden" id="id" value="<{$id_update.id}>" />
            <input name="submit" type="submit" class="button" value="保存"/>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input name="Submit2" type="reset" class="button" value="重置" />
            &nbsp;&nbsp;时间：<input name="addtime" class="input200" type="text" value="<{if $id_update.addtime==''}><{date('Y-m-d H:i:s',time())}><{else}><{date('Y-m-d H:i:s',$id_update.addtime)}><{/if}>" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"/>
        </td>
    </tr>
</table>
</form>
<script type="text/javascript">
    //验证表单
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
            var loadi = layer.load('图片上传中...');
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
