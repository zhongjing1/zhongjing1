<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-06 10:24:32
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/chicheng/in_add.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1586181062568c7ae0481199-27662409%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00e912aeb3bc80c24df53cb24fa5d24b89f09bf8' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/chicheng/in_add.tpl',
      1 => 1451993364,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1586181062568c7ae0481199-27662409',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'index_dir' => 0,
    'id_update' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568c7ae0500c88_24131551',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568c7ae0500c88_24131551')) {function content_568c7ae0500c88_24131551($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>添加公司信息</title>
    <link href="/public/css/admin.css" type="text/css" rel="stylesheet">
    <link href="/public/css/validform.css" type="text/css" rel="stylesheet">
    <?php echo load_js('jquery');?>

    <?php echo load_js('global');?>

    <?php echo load_js('validform');?>

    <?php echo load_js('layer1.8/layer');?>

    <?php echo load_js('ajaxfileupload');?>

</head>
<body>
<div class="content_title">
    添加公司信息
    <span><input onclick="window.location.href='<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/admin_involved");?>
'" type="button" class="button" value="返回"/></span>
</div>
<form action="" method="post" enctype="multipart/form-data" name="add" id="add">
<table class="table_add">
    <tr>
        <td align="right" width="150"><span class="hong">*</span>公司名称：</td>
        <td>
            <input type="text" name="company" id="company" datatype="*" nullmsg="请输入公司名称！" placeholder="公司名称" />
        </td>
    </tr>
    <tr>
        <td align="right" width="150"><span class="hong">*</span>项目标题：</td>
        <td>
            <input type="text" name="projec" id="projec" datatype="*" nullmsg="请输入项目标题！" placeholder="项目标题" />
        </td>
    </tr>
    <tr>
        <td align="right" width="150"><span class="hong">*</span>运作资金：</td>
        <td>
            <input type="text" name="money" id="money" datatype="n" nullmsg="请输入运作资金！" placeholder="运作资金" errormsg="请输入有效数字" />请输入有效数字
        </td>
    </tr>
    <tr>
        <td align="right" width="150"><span class="hong">*</span>合伙人要求：</td>
        <td>
            <input type="text" name="partnerrequire" id="partnerrequire" datatype="*" nullmsg="请输入合伙人要求！" placeholder="合伙人要求" />
        </td>
    </tr>
    <tr>
        <td align="right">分成比例图：</td>
        <td>
            <input name="image_up" id="image_up" type="file" onchange="upload_image('image_up');"/>建议控制500KB以内，格式jpg、png、gif
            <img src="" class="open_litpic" id="pic" <?php if ($_smarty_tpl->tpl_vars['id_update']->value['image']=='') {?>style="display: none"<?php }?>>
            <img src="" class="open_bigpic" id="big_pic" style="display:none"/>
            <input name="image" type="hidden" value=""/>
        </td>
    </tr>
    <tr>
        <td align="right"><span class="hong">*</span>内容：</td>
        <td>
           <?php echo load_editer_js();?>

           <?php echo load_editer('desc');?>

        </td>
    </tr>
    <tr>
        <td align="right">&nbsp;</td>
        <td>
            <input name="dopost" type="hidden" id="dopost" value="save" />
            <input name="submit" type="submit" class="button" value="保存"/>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <input name="Submit2" type="reset" class="button" value="重置" />
            &nbsp;&nbsp;时间：<input name="addtime" class="input200" type="text" value="<?php echo date('Y-m-d H:i:s',time());?>
" onclick="laydate({istime: true, format: 'YYYY-MM-DD hh:mm:ss'})"/>
        </td>
    </tr>
</table>
</form>
<?php echo '<script'; ?>
 type="text/javascript">
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
        var loadi = layer.load('照片分析中...');
        $.ajaxFileUpload({
            url:'<?php echo site_url('activity/upload/upload');?>
?width=&height=&file_name='+upfile_name,
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
<?php echo '</script'; ?>
>
</body>
</html>
<?php }} ?>
