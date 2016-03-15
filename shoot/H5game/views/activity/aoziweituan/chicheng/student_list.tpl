<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>个人/团队报名列表</title>
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
            <li class="cur"><a href="<{site_url("<{$index_dir}>/admin_student")}>" >个人/团队报名</a></li>
            <li><a href="<{site_url("<{$index_dir}>/admin_involved")}>" >参与公司</a></li>
            <li><a href="<{site_url("<{$index_dir}>/admin_comment")}>" >评论列表</a></li>
        </ul>
    </div>
    <!--预约用户查询-->
    <div>
        <form action="<{site_url("<{$index_dir}>/admin_student")}>" method="post" enctype="multipart/form-data" name="search_text" style="float: left;">
            <table class="table_search">
                <tr>
                    <td>
                        <input type="text" class="input100" name="username" placeholder="姓名" value="<{$username}>"/>
                        <input type="text" class="input100" name="telphone" placeholder="电话" value="<{$telphone}>"/>
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
    </div>
    <form action="<{site_url("<{$index_dir}>/admin_student_batch")}>" method="post" enctype="multipart/form-data" name="search_text" id="search_text">
        <table class="tablebg">
            <tr class="table_title">
            <td width="40" align="center">选择</td>
                <td width="50">姓名</td>
                <td width="50">联系电话</td>
                <td width="200">创意名称</td>
                <td width="400">创意概述</td>
                <td width="70">团队成员姓名</td>
                <td width="70">团队队员角色</td>
                <td width="100">状态</td>
                <td width="50">时间</td>
                <td width="50">操作</td>
            </tr>
            <{foreach $list as $key}>
            <tr id="tr_<{$key.id}>">
            	<td align="center"><input type="checkbox" name="id[]" value="<{$key.id}>" /></td>
                <td align="center"><{$key.username}></td>
                <td align="center"><{$key.telphone}></td>
                <td><{$key.jobneed}></td>
                <td><{$key.projectintro}></td>
                <td align="center"><{$key.teamname1}><{if $key.teamname2!=''}><br/>
                    <{$key.teamname2}><{/if}><{if $key.teamname3!=''}><br/>
                    <{$key.teamname3}><{/if}><{if $key.teamname4!=''}><br/>
                    <{$key.teamname4}><{/if}>
                </td>
                <td align="center"><{$key.teamrole1}><{if $key.teamrole2!=''}><br/>
                    <{$key.teamrole2}><{/if}><{if $key.teamrole3!=''}><br/>
                    <{$key.teamrole3}><{/if}><{if $key.teamrole4!=''}><br/>
                    <{$key.teamrole4}><{/if}>
                </td>
                <td align="center"><{if $key.status==1}>正常<{else}><span class="hong">锁定</span><{/if}></td>
                <td align="center"><{date("Y-m-d",$key.addtime)}></td>
                <td align="center">
                    <a href="javascript:del(<{$key.id}>);">删除</a>
                </td>
            </tr>
            <{/foreach}>
        </table>
        </div>
        <table class="table_search">
        <tr>
            <td>
                <input type="checkbox" name="select_all" id="select_all" value="" onclick="selectAll(this);"/>
                <input name="submit_name" type="submit" class="button" value="已联系"/>
                <input name="submit_name" type="submit" class="button" value="未联系"/>
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
                url: "<{site_url("<{$index_dir}>/admin_student_delete")}>",
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