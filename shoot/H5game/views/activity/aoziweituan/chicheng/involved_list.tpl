<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>参与公司列表</title>
    <{load_css('admin')}>
    <{load_css('validform')}>
    <{load_js('jquery')}>
    <{load_js('global')}>
    <{load_js('validform')}>
    <{load_js('layer/layer')}>
</head>
<style>
#menu #nav {display:block;width:100%;padding:0;margin:0;list-style:none;}
#menu #nav li {float:left;width:120px;}
#menu #nav li.cur{border-bottom: 2px solid #000;  height: 35px;}
#menu #nav li a {display:block;line-height:27px;text-decoration:none;padding:10px 0 0 5px; text-align:center; color:#333;}
#menu #nav li a:hover{border-bottom: 2px solid #000;display: block; height: 25px;}
</style>
<body>
<div id="menu">
    <div class="content_title">
        <ul id="nav">
            <li><a href="<{site_url("<{$index_dir}>/admin")}>" >公司报名</a></li>
            <li><a href="<{site_url("<{$index_dir}>/admin_student")}>" >个人/团队报名</a></li>
            <li class="cur"><a href="<{site_url("<{$index_dir}>/admin_involved")}>" >参与公司</a></li>
            <li><a href="<{site_url("<{$index_dir}>/admin_comment")}>" >评论列表</a></li>
        </ul>
    </div>
    <!--查询-->
    <div style="float: left">
    <form action="<{site_url("<{$index_dir}>/admin_involved")}>" method="post" enctype="multipart/form-data" name="search_text">
        <table class="table_search">
            <tr>
                <td>
                    <input type="text" class="input100" name="company" placeholder="公司名称" value="<{$company}>"/>
                    <input type="text" class="input100" name="project" placeholder="项目主题" value="<{$project}>"/>
                    <select name="status">
                        <option value="">是否审核</option>
                        <option value="1" <{if $status==1}>selected<{/if}>>审核</option>
                        <option value="2" <{if $status==2}>selected<{/if}>>锁定</option>
                    </select>
                    <input name="Submit" type="submit" class="button" value="搜索"/>
                </td>
            </tr>
        </table>
    </form>
    <div style="float: left; margin:-26px 0 0 380px;">
        <input name="add" type="submit" class="button" value="添加" onclick="window.location.href='<{site_url("<{$index_dir}>/admin_involved_add")}>'" />
    </div>
    </div>
    <!--批量操作-->
	<form action="<{site_url("<{$index_dir}>/admin_involved_batch")}>" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
        <table class="tablebg">
            <tr class="table_title">
            	<td width="30" align="center">选择</td>
                <td>公司名称</td>
                <td width="100">项目标题</td>
                <td width="150">项目运行资金</td>
                <td width="100">合伙人要求</td>
                <td width="100">点赞数</td>
                <td width="100">状态</td>
                <td width="100">时间</td>
                <td width="100">操作</td>
            </tr>
            <{foreach $list as $key}>
            <tr id="tr_<{$key.id}>">
            	<td align="center"><input type="checkbox" name="id[]"  value="<{$key.id}>" /></td>
                <td align="left">
                    <{$key.company}>
                    <{if $key.image!=''}>
                        <img src="<{$key.image}>" class="open_litpic" id="pic_<{$key.id}>">
                        <img src="<{$key.image}>" class="open_bigpic" id="big_pic_<{$key.id}>"/>
                    <{/if}>
                </td>
                <td align="center"><{$key.projec}></td>
                <td align="center"><{$key.money}></td>
                <td align="center"><{$key.partnerrequire}></td>
                <td align="center"><{$key.zan}></td>
                <td align="center"><{if $key.status==1}>审核<{else}><span class="hong">锁定</span><{/if}></td>
                <td align="center"><{date("Y-m-d",$key.addtime)}></td>
                <td align="center">
                    <a href="<{site_url("<{$index_dir}>/admin_involved_update/<{$key.id}>")}>">编辑</a>
                    <a href="javascript:get_delete(<{$key.id}>);">删除</a>
            	</td>
            </tr>
            <{/foreach}>
        </table>
        
        <table class="table_search">
        <tr>
            <td>
                <input type="checkbox" name="select_all" id="select_all" value="" onclick="selectAll(this);"/>
                <input name="submit_name" type="submit" class="button" value="删除" onclick="if(confirm('您确定要删除所选内容吗?\n\n注意：删除后不可恢复\！')){return true;}else{return false;}"/>
            </td>
        </tr>
    	</table>
	</form>
</div>
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
                type:"POST",
                url: "<{site_url("<{$index_dir}>/admin_involved_delete")}>",
                data:"id="+id,
                dataType:"json",
                success: function(data){
                    if(data.status=='y'){
						alert("删除成功！");
                        $("#tr_"+id).hide();
                    }else{
                        alert("操作失败。");
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

</body>
</html>