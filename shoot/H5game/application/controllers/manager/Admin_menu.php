<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 后台菜单
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_menu extends CI_Controller {
	private $user_data;
	public function __construct()
	{
		parent::__construct();
		$this->load->helpers('manager_helper');
		$this->user_data = manager_user_login();//用户是否登陆
		$this->load->model('admin_menu_model');
	}

	/**
	 * 列表
	 */
	public function index()
	{
		$dopost = $this->input->post('dopost');
		if($dopost!='save')
		{
			//所有菜单列表
			$list = $this->admin_menu_model->get_manager_admin_menu(array('reid'=>0));//查询所有
			assign('list', $list);
			display('manager/admin_menu/admin_menu_list.tpl');
		}
		else
		{
			//保存
			$id      = $this->input->post('id');
			$title   = $this->input->post('title');
			$model   = $this->input->post('model');
			$action  = $this->input->post('action');
			$string  = $this->input->post('string');
			$sortnum = $this->input->post('sortnum');
			$show    = $this->input->post('show');
			if(!empty($id) && !empty($title) && !empty($model) && !empty($action))
			{
				foreach($id as $val=>$key)
				{
					if($show[$val] != 1)
					{
						$show[$val] = 2;
					}
					$up_data = array(
						'title'   => $title[$val],
						'model'   => $model[$val],
						'action'  => $action[$val],
						'string'  => $string[$val],
						'sortnum' => $sortnum[$val],
						'show'    => $show[$val]
					);
					$this->admin_menu_model->update_id($up_data, $id[$val]);//保存
					$up_data = '';
				}
				msg('修改成功' , site_url('manager/admin_menu'));
			}
			else
			{
				msg('修改失败' , site_url('manager/admin_menu'));
			}
		}
	}

	/**
	 * 增加
	 */
	public function add($reid=0)
	{
		$dopost = $this->input->post('dopost');
		if($dopost=='save')
		{
			//保存
			$reid    = $this->input->post('reid');
			$title   = $this->input->post('title');
			$model   = $this->input->post('model');
			$action  = $this->input->post('action');
			$string  = $this->input->post('string');
			$sortnum = $this->input->post('sortnum');
			$insert_data = array(
				'reid'    => $reid,
				'title'   => $title,
				'model'   => $model,
				'action'  => $action,
				'string'  => $string,
				'sortnum' => $sortnum,
				'show'    => 1,
				'addtime' => config_item('sys_time')
			);
			$insert_id = $this->admin_menu_model->insert($insert_data);
			if(!empty($insert_id))
			{
				msg('保存成功', site_url('manager/admin_menu'));
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			assign('reid', $reid);//上级栏目ID
			display('manager/admin_menu/admin_menu_add_edit.tpl');
		}
	}

	/**
	 * 修改
	 */
	public function edit($id)
	{
		$dopost = $this->input->post('dopost');
		$redirect_url = $this->input->get('redirect_url');//返回链接
		if($dopost=='save')
		{
			//保存
			$title   = $this->input->post('title');
			$model   = $this->input->post('model');
			$action  = $this->input->post('action');
			$string  = $this->input->post('string');
			$sortnum = $this->input->post('sortnum');
			$update_data = array(
				'title'   => $title,
				'model'   => $model,
				'action'  => $action,
				'string'  => $string,
				'sortnum' => $sortnum
			);
			$update_id = $this->admin_menu_model->update_id($update_data, $id);
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
			//菜单信息
			$admin_menu_data = $this->admin_menu_model->get_one(array('id'=>$id));
			assign('item', $admin_menu_data);
			//所有用户组
			display('manager/admin_menu/admin_menu_add_edit.tpl');
		}
	}

	/**
	 * 删除
	 */
	public function delete()
	{
		$id = $this->input->get('id');
		$delete_id = $this->admin_menu_model->delete_id($id);
		if(!empty($delete_id))
		{
			error_json('y');
		}
		else
		{
			error_json('保存失败');
		}
	}
}
