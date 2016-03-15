<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 后台用户
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	private $user_data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers('manager_helper');
		$this->user_data = manager_user_login();//用户是否登陆
		$this->load->model('admin_model');
	}

	/**
	 * 列表
	 */
	public function index()
	{
		$pagesize = 20;
		$page = $this->input->get('page');
		$page <= 1 ? $page = 1 : $page = $page;//当前页数
		//搜索条件
		$username = $this->input->get_post('username');
		$tel      = $this->input->get_post('tel');
		$email    = $this->input->get_post('email');
		assign('username', $username);
		assign('tel', $tel);
		assign('email', $email);
		$where_data = array(
			'username' => $username,
			'tel'      => $tel,
			'email'    => $email,
		);
		$list = $this->admin_model->get_manager_admin($where_data, $pagesize, $pagesize*($page-1));//查询所有
		assign('list', $list);
		$total_rows = $this->admin_model->get_manager_admin_num($where_data);//计算所有数据
		$link = site_url('manager/member/index/').'?username='.$username.'&tel='.$tel.'&email='.$email;
		$pagecount = page($link, $total_rows, $page, $pagesize);//分页
		assign('pagecount', $pagecount);
		display('manager/admin/admin_list.tpl');
	}

	/**
	 * 批量操作
	 */
	public function batch()
	{
		$id = $this->input->post('id');
		if(empty($id))
		{
			msg("您没有选择任何内容。");
		}
		$submit_name = $this->input->post('submit_name');
		switch($submit_name){
			case '审核':
				$update_id = $this->admin_model->update_id(array('status'=>1), $id);
				break;
			case '冻结':
				$update_id = $this->admin_model->update_id(array('status'=>2), $id);
				break;
			case '删除':
				$update_id = $this->admin_model->delete_id($id);
				break;
		}
		if($update_id>0){
			$redirect_url = $this->input->get('redirect_url');//返回链接
			msg("操作成功" , $redirect_url);
		}else{
			msg("操作失败");
		}
	}

	/**
	 * 增加
	 */
	public function add()
	{
		$dopost = $this->input->post('dopost');
		if($dopost=='save')
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$tel      = $this->input->post('tel');
			$email    = $this->input->post('email');
			$group    = $this->input->post('group');
			$status   = $this->input->post('status');
			$salt     = get_rand_num('int', 6);
			$insert_data = array(
				'username' => $username,
				'password' => md5(md5($password).$salt),
				'salt'     => $salt,
				'tel'      => $tel,
				'email'    => $email,
				'group'    => $group,
				'status'   => $status,
				'addtime'  => config_item('sys_time')
			);
			$user_data = $this->admin_model->get_one(array('username'=>$username));
			if(!empty($user_data['uid']))
			{
				msg('已经存在的用户名');
			}
			$insert_id = $this->admin_model->insert($insert_data);
			if(!empty($insert_id))
			{
				msg('保存成功', site_url('manager/admin'));
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			//所有用户组
			$this->load->model('admin_group_model');
			$group_list = $this->admin_group_model->get_manager_admin_group();
			assign('group_list', $group_list);
			display('manager/admin/admin_add_edit.tpl');
		}
	}

	/**
	 * 修改
	 */
	public function edit($uid)
	{
		$dopost = $this->input->post('dopost');
		$redirect_url = $this->input->get('redirect_url');//返回链接
		if($dopost=='save')
		{
			$password = $this->input->post('password');
			$tel      = $this->input->post('tel');
			$email    = $this->input->post('email');
			$group    = $this->input->post('group');
			$status   = $this->input->post('status');
			$salt     = get_rand_num('int', 6);
			$update_data = array(
				'tel'      => $tel,
				'email'    => $email,
				'group'    => $group,
				'status'   => $status,
			);
			//修改密码
			if(!empty($password))
			{
				$update_data['password'] = md5(md5($password).$salt);
				$update_data['salt']     = $salt;
			}
			$update_id = $this->admin_model->update_id($update_data, $uid);
			if(!empty($update_id))
			{
				msg('保存成功', $redirect_url);
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			//用户信息
			$admin_data = $this->admin_model->get_one(array('uid'=>$uid));
			assign('item', $admin_data);
			//所有用户组
			$this->load->model('admin_group_model');
			$group_list = $this->admin_group_model->get_manager_admin_group();
			assign('group_list', $group_list);
			display('manager/admin/admin_add_edit.tpl');
		}
	}

	/**
	 * 修改自己的资料
	 */
	public function self()
	{
		$uid = $this->user_data['uid'];
		$dopost = $this->input->post('dopost');
		if($dopost=='save')
		{
			$password = $this->input->post('password');
			$tel      = $this->input->post('tel');
			$email    = $this->input->post('email');
			$salt     = get_rand_num('int', 6);
			$update_data = array(
				'tel'      => $tel,
				'email'    => $email,
			);
			//修改密码
			if(!empty($password))
			{
				$update_data['password'] = md5(md5($password).$salt);
				$update_data['salt']     = $salt;
			}
			$update_id = $this->admin_model->update_id($update_data, $uid);
			if(!empty($update_id))
			{
				msg('保存成功');
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			//用户信息
			$admin_data = $this->admin_model->get_one(array('uid'=>$uid));
			assign('item', $admin_data);
			display('manager/admin/admin_self.tpl');
		}
	}

	/**
	 * 删除
	 */
	public function delete()
	{
		$uid = $this->input->get('uid');
		$delete_id = $this->admin_model->delete_id($uid);
		if(!empty($delete_id))
		{
			error_json('y');
		}
		else
		{
			error_json('保存失败');
		}
	}

	/**
	 * 查询用户名是否存在
	 */
	public function get_username()
	{
		$username = $this->input->post('param');
		$user_data = $this->admin_model->get_one(array('username'=>$username));
		if(!empty($user_data['uid']))
		{
			error_json('已经存在的用户名');
		}else
		{
			error_json('y');
		}
	}
}
