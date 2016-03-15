<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><{config_item('manager_title')}></title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
</head>
<body>
<div class="content_title">用户管理</div>
<form action="" method="post" enctype="multipart/form-data" name="search_text">
    <table class="table_search">
        <tr>
            <td>
                <input type="text" class="input100" name="username" placeholder="用户名" value="<{$username}>"/>
                <input type="text" class="input100" name="tel" placeholder="电话" value="<{$tel}>"/>
                <input name="Submit" type="submit" class="button" value="搜索"/>
            </td>
        </tr>
    </table>
</form>
    <table class="tablebg">
        <tr class="table_title">
            <td width="100">姓名</td>
            <td width="170">电话</td>
            <td width="200">地址</td>
            <td width="170">奖品等级</td>
            <td width="170">奖品状态</td>
            <td width="100">时间</td>
            <td>&nbsp;</td>
        </tr>
        <{foreach $list as $key}>
        <tr id="tr_<{$key.id}>">
            <td><{$key.username}></td>
            <td><{$key.tel}></td>
            <td><{$key.address}></td>
            <td><{$key.prize}></td>
            <td align="center" id="prize_ok_<{$key.id}>"><{if $key.prize_ok==1}>已经兑换<{else}><span onclick="up_prize_ok(<{$key.id}>);"><span class="hong">等待兑换</span></span><{/if}></td>
            <td align="center"><{date("Y-m-d H:i:s",$key.addtime)}></td>
            <td>&nbsp;</td>
        </tr>
        <{/foreach}>
    </table>
<table class="table_page">
    <tr>
    	<td><{$pagecount}></td>
    </tr>
</table>
<script language="javascript">
    //根据ID删除
    function up_prize_ok(id){
        $.ajax({
            type:"POST",
            url: "<{site_url("<{$index_dir}>/admin_prize_ok")}>",
            data:"id="+id,
            dataType:"json",
            success: function(data){
                if(data.status=='y'){
                    $("#prize_ok_"+id).text('已经兑换');
                }else{
                    layer.msg("操作失败。");
                }
            }
        });
    }
</script>
</body>
</html>
