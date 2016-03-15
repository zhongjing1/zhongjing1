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
<div class="content_title">案例管理 <input onclick="window.location.href='<{site_url('manager/cases/add')}>'" type="button" class="button" value="新增案例"/></div>
<form action="<{site_url('manager/cases')}>" method="post" enctype="multipart/form-data" name="search_text">
    <table class="table_search">
        <tr>
            <td>
                <input type="text" class="input100" name="actname" placeholder="活动名" value="<{$actname}>"/>
                <input type="text" class="input100" name="links" placeholder="活动链接" value="<{$links}>"/>
                <select name="project_list">
                    <option value="0">项目名称</option>
                    <{foreach config_item('project_list') as $v=>$k}>
                    <option value="<{$v}>" <{if $v==$item.project_list}>selected<{/if}>><{$k}></option>
                    <{/foreach}>
                </select>
                <select name="project_type">
                    <option value="0">活动类型</option>
                    <{foreach config_item('project_type') as $v=>$k}>
                    <option value="<{$v}>" <{if $v==$item.project_list}>selected<{/if}>><{$k}></option>
                    <{/foreach}>
                </select>
                <select name="status">
                    <option value="0">是否审核</option>
                    <option value="1" <{if $status==1}>selected<{/if}>>审核</option>
                    <option value="2" <{if $status==2}>selected<{/if}>>冻结</option>
                </select>
                <input name="Submit" type="submit" class="button" value="搜索"/>
            </td>
        </tr>
    </table>
</form>
<form action="<{site_url('manager/cases/batch')}>?redirect_url=<{get_now_url()}>" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
    <table class="tablebg">
        <tr class="table_title">
            <td width="40" align="center">选择</td>
            <td>活动名称</td>
            <td width="200">活动链接</td>
            <td width="200">项目名称</td>
            <td width="200">活动类型</td>
            <td width="70">状态</td>
            <td width="100">添加时间</td>
            <td width="250">操作</td>
        </tr>
        <{foreach $list as $key}>
        <tr id="tr_<{$key.id}>">
            <td><input type="checkbox" name="id[]" value="<{$key.id}>" /></td>
            <td>
                <{if $key.image!=''}>
                <img src="<{$key.image}>" class="open_litpic" id="pic_<{$key.id}>"/>
                <img src="<{$key.image}>" class="open_bigpic" id="big_pic_<{$key.id}>"/>
                <{/if}>
                <{$key.actname}>
            </td>

            <td><{$key.links}></td>
            <td><{$pro_list[$key.project_list]}></td>
            <td><{$pro_type[$key.project_type]}></td>
            <td align="center"><{if $key.status==1}>正常<{else}><span class="hong">冻结</span><{/if}></td>
            <td align="center"><{date("Y-m-d",$key.addtime)}></td>
            <td align="center">
                &nbsp<a href="<{site_url("manager/cases/edit/<{$key.id}>")}>?redirect_url=<{get_now_url()}>">编辑</a>
                &nbsp<a href="javascript:get_delete(<{$key.id}>);">删除</a>
            </td>
        </tr>
        <{/foreach}>
    </table>
    <table class="table_search">
        <tr>
            <td>
                <input type="checkbox" name="select_all" id="select_all" value="" onclick="selectAll(this);"/>
                <input name="submit_name" type="submit" class="button" value="审核"/>
                <input name="submit_name" type="submit" class="button" value="冻结"/>
                <input name="submit_name" type="submit" class="button" value="删除" onclick="if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){return true;}else{return false;}"/>
            </td>
        </tr>
    </table>
</form>
<table class="table_page">
    <tr>
    	<td><{$pagecount}></td>
    </tr>
</table>
<script language="javascript">
    //根据ID删除
    function get_delete(id){
        if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){
            $.ajax({
                type:"GET",
                url: "<{site_url("manager/cases/delete/")}>",
                data:"id="+id,
                dataType:"json",
                success: function(data){
                    if(data.status=='y'){
                        $("#tr_"+id).hide();
                    }else{
                        layer.msg("操作失败。");
                    }
                }
            });
        }else{
            return false;
        }
    }
</script>
</body>
</html>
