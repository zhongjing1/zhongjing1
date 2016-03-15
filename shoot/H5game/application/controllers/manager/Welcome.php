<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 后台首页
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers('manager_helper');
	}
	/**
	 * 后台登陆
	 */
	public function index()
	{
		$admin_user_id = $this->session->userdata('admin_user_id');
		if(!empty($admin_user_id))
		{
			display('manager/index.tpl');
		}
		else
		{
			$redirect_url = $this->input->get('redirect_url');//返回链接
			assign('redirect_url' , $redirect_url);
			display('manager/login.tpl');
		}
	}

	/**
	 * 后台用户登陆提交
	 */
	public function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if(!empty($username) && !empty($password))
		{
			$this->load->model('admin_model');
			$user_data = $this->admin_model->get_one(array('username'=>$username));
			if($user_data['username'] == '')
			{
				error_json('用户名不存在');
			}
			elseif($user_data['password'] != md5(md5($password).$user_data['salt']))
			{
				error_json('密码错误');
			}
			elseif($user_data['status'] != 1)
			{
				error_json('帐号被管理员锁定');
			}
			else
			{
				$this->session->set_userdata('admin_user_id', $user_data['uid']);
				error_json('y');
			}
		}
		else{
			error_json('账号和密码不能为空');
		}
	}

	/**
	 * 后台用户退出登陆
	 */
	public function loginout()
	{
		$this->session->unset_userdata('admin_user_id');
		echo "<script>alert('已经成功退出。');parent.window.location.href='".site_url('manager')."'</script>";
	}


	/**
	 * 后台头部
	 */
	public function header()
	{
		$admin_data = manager_user_login();//用户是否登陆
		assign('admin_data', $admin_data);
		display('manager/index_header.tpl');
	}

	/**
	 * 后台菜单
	 */
	public function menu()
	{
		manager_user_login();//用户是否登陆
		//公共菜单查询
		$this->load->model('admin_menu_model');
		$menu_list = $this->admin_menu_model->get_manager_left_menu(array('reid'=>0));
		assign('menu_list', $menu_list);
		display('manager/index_menu.tpl');
	}

	/**
	 * 后台底部
	 */
	public function footer()
	{
		$admin_user_data = manager_user_login();//用户是否登陆
		assign('admin_user_data', $admin_user_data);
		display('manager/index_footer.tpl');
	}

	/**
	 * 后台右侧首页
	 */
	public function main()
	{
		date_default_timezone_set("PRC");//设置时区
		$admin_data = manager_user_login();//用户是否登陆
		assign('admin_data', $admin_data);
		assign('php_version', PHP_VERSION);//php版本
		assign('server_soft', $_SERVER['SERVER_SOFTWARE']);//服务器解析引擎
		assign('http_host', $_SERVER["HTTP_HOST"]);//网站域名
		assign('php_path', DEFAULT_INCLUDE_PATH);//php安装路径
		assign('file_size', ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled");//文件最大上传限制
		display('manager/index_main.tpl');
	}
}
