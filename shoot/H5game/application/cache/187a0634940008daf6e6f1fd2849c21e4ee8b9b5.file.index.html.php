<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-01-11 09:50:30
         compiled from "/www/web/ten/public_html/views/activity/aoziweituan/chicheng/index.html" */ ?>
<?php /*%%SmartyHeaderCode:2027467894568b96ed5d2895-74706149%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '187a0634940008daf6e6f1fd2849c21e4ee8b9b5' => 
    array (
      0 => '/www/web/ten/public_html/views/activity/aoziweituan/chicheng/index.html',
      1 => 1452476920,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2027467894568b96ed5d2895-74706149',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_568b96ed767a28_54185544',
  'variables' => 
  array (
    'tmp_dir' => 0,
    'details_list' => 0,
    'val' => 0,
    'index_dir' => 0,
    'key' => 0,
    'comment_list' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568b96ed767a28_54185544')) {function content_568b96ed767a28_54185544($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>炽橙</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=no" >
<meta name="format-detection" content="telephone=no" />
<?php echo load_js('jquery');?>

<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/iscroll.js"><?php echo '</script'; ?>
>
<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/css/public.css" />
<?php echo load_js('validform');?>

<?php echo load_js('layer1.8/layer');?>

</head>
<?php echo '<script'; ?>
>
	$(function(){
		var doc_H=window.innerHeight;	
			$('.wrap').height(doc_H);	
	});

	var myScroll;
    function loaded() {
        myScroll = new IScroll('.wrap',{click: true });
    }
<?php echo '</script'; ?>
>
<body>
<div class="wrap" style="background: #2c2c2c;">
	<div id="scroller">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/logo.jpg" class="logo">
		<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/indexbanner.jpg" class="bannerbox">
		<div class="contentbox">
			<?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['details_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
 $_smarty_tpl->tpl_vars['val']->value = $_smarty_tpl->tpl_vars['key']->key;
?>
			<div class="content">
				<div class="order"> <?php echo $_smarty_tpl->tpl_vars['val']->value+1;?>
 </div>
				<a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/details/".((string)$_smarty_tpl->tpl_vars['key']->value['id']));?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/showbtn.png" class="showbtn"></a>
				<div class="introducebox">
					<h1><?php echo $_smarty_tpl->tpl_vars['key']->value['project'];?>
</h1>
					<p><?php echo $_smarty_tpl->tpl_vars['key']->value['company'];?>
</p>
					<p>项目运作基金：<?php echo $_smarty_tpl->tpl_vars['key']->value['money'];?>
</p>
					<p>分成比例：</p>
					<div class="demo-container">
						<div id="pie1" class="demo-placeholder flexStyle">
							<img src="<?php echo $_smarty_tpl->tpl_vars['key']->value['image'];?>
" width="80%" />
						</div>
					</div>
					<p>大学生合伙人要求</p>
					<p><?php echo $_smarty_tpl->tpl_vars['key']->value['partnerrequire'];?>
</p>
					<div class="zanbox">
						<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/zan.png" id="zan-btn" onclick="add_zan(<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
)">
						<span class="zanNum" id="zan_num_<?php echo $_smarty_tpl->tpl_vars['key']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['key']->value['zan'];?>
</span>
					</div>
				</div>
			</div>
			<?php } ?>
		<div class="joinbox">
			<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/zhuban.png" class="zhuban">
			<!-- <a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/company");?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/studentsign.png" class="jion-btn"></a>
			<a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/student");?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/studentsign.png" class="nextbtn" width="240" height="120"></a> -->
			<div class="joinbtnbox">
				<div class="joinbtnleft">
					<a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/company");?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/companysign.png" ></a>
				</div>
				<div class="joinbtnright">
					<a href="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/student");?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/studentsign.png" ></a>
				</div>
			</div>
		</div>
		<div class="commentwrap">
			<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/comment.png" class="commentTitle">
			<form name="add_comment" id="add_comment" method="post" action="<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/save_comment");?>
">
			<div class="textbox">
				<textarea name="comment" id="comment" datatype="*" nullmsg="请输入评论内容！"></textarea>
				<input type="submit" value="提交" id="submitcomment">
			</div>
			</form>
			
			<div class="commentbox">
				<?php  $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['key']->_loop = false;
 $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['comment_list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['key']->key => $_smarty_tpl->tpl_vars['key']->value) {
$_smarty_tpl->tpl_vars['key']->_loop = true;
 $_smarty_tpl->tpl_vars['val']->value = $_smarty_tpl->tpl_vars['key']->key;
?>
				<?php if ($_smarty_tpl->tpl_vars['val']->value>9) {?><div class="commenthidden"><?php }?>
				<div class="commentlist">
					<div class="commentLeft">
						<img src="<?php echo $_smarty_tpl->tpl_vars['key']->value['headimgurl'];?>
" width="100%"/>
					</div>
					<div class="commentRight">
						<p class="yellow"><span class="nick"><?php echo $_smarty_tpl->tpl_vars['key']->value['nickname'];?>
</span><span class="issuetime"><?php echo date("Y-m-d",$_smarty_tpl->tpl_vars['key']->value['addtime']);?>
</span></p>
						<p><?php echo $_smarty_tpl->tpl_vars['key']->value['comment'];?>
 </p>
					</div>
				</div>
				<?php if ($_smarty_tpl->tpl_vars['val']->value>9) {?></div><?php }?>
				<?php } ?>
				<img src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/images/morebtn.png" id="morebtn">
			</div>
		</div>
	</div>
</div>
	<?php echo '<script'; ?>
 type="text/javascript" >
		$(function(){
			$.Tipmsg.r=null;
			$("#add_comment").Validform({
				tiptype:function(msg){
					layer.msg(msg, 2, -1);//错误提示
				},
				tipSweep:true,
				ajaxPost:true,
				callback:function(data){
					if(data.status=="y"){
						layer.msg('评论成功', 2, -1);
						$(".textbox").hide();
					}
				}
			});
		})
	<?php echo '</script'; ?>
>
	<?php echo $_smarty_tpl->getSubTemplate ("activity/share.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery.flot.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['tmp_dir']->value;?>
/js/jquery.flot.pie.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
	$(function() {
		/*//饼图
		var data = [
			{ label: "大学生合伙人",  data: 40},
			{ label: "杭州思量",  data: 60}		
		];
		
		$.plot($("#pie1"), data, {
			series: {
				pie: { 
					show: true,
					combine: {
						color: "#999",
						threshold: 0.05
					}

				}
			},
			legend: {
				show: false
			}
		});


		$.plot($("#pie2"), data, {
			series: {
				pie: { 
					show: true,
					combine: {
						color: "#999",
						threshold: 0.05
					}

				}
			},
			legend: {
				show: false
			}
		});*/


		//评论输入框的展示和隐藏
		$(".commentTitle").click(function(){
			$(".textbox").show();
		});
		$("#submitcomment").click(function(){
			$(".textbox").hide();
		});

		//展示全部评论
		$("#morebtn").click(function(){
			$(".commenthidden").show();
		});
	})

	function add_zan(id){
		$.ajax({
			type:"POST",
			url: "<?php echo site_url(((string)$_smarty_tpl->tpl_vars['index_dir']->value)."/add_zan");?>
",
			data:"id="+id,
			dataType:"json",
			success: function(data){
				if(data.status=='y'){
					nums = Number($('#zan_num_'+id).text());
					all_num = nums+1;
					$('#zan_num_'+id).text(all_num)
				}else{
					alert(data.info);
				}
			}
		});
	}
<?php echo '</script'; ?>
>
</body>
</html><?php }} ?>
