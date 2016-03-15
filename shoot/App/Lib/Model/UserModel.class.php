<?php
class UserModel extends CommonModel {
	/*
	 * 表单验证
	 */
    var $sort=true;
	protected  $_validate = array(	
		array('username','require','用户名不能为空',1,'regex',1),
		array('username','','用户名已存在',1,'unique',1),
		array('pwd','require','密码不能为空',0,'regex',1),
		array('email','require','Email不能为空',1,'regex',3),
		array('email','email','Email格式不正确'),
		array('email','checkEmail','Email以存在',1,'callback',3),
	);
	
	/*
	 * 字段映射
	 */

	
	/*
	 * 自动完成
	 */
	protected $_auto=array(	
		array('password','pwdHash',3,'function'),
		array('createtime','time',1,'function'),
		array('updatetime','time',2,'function'),
		array('reg_ip','get_client_ip',1,'function'),
	);

	function checkEmail(){
		$user=M('User');
		if(empty($_POST['id'])){
			if($user->getByEmail($_POST['email'])){
				return false;
			}else{
				return true;
			}
		}else{
			//判断邮箱是否已经使用
			if($user->where("id!={$_POST['id']} and email='{$_POST['email']}'")->find()){
				return false;
			}else{
				return true;
			}
		}
	}
}
?>