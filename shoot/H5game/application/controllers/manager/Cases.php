<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 案例作品
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cases extends CI_Controller {
	private $user_data;
	public function __construct()
	{
		parent::__construct();
        $this->load->helpers('manager_helper');
        $this->user_data = manager_user_login();//用户是否登陆
		$this->load->model('cases_model');
	}

	/**
	 * 列表
	 */
	public function index()
	{
		$pagesize = 20;
		$page = (int)$this->input->get('page');
		$page <= 1 ? $page = 1 : $page = $page;//当前页数
		//搜索条件
		$actname  = $this->input->get_post('actname');
		$links    = $this->input->get_post('links');
		$status   = (int)$this->input->get_post('status');
		$project_list  = (int)$this->input->get_post('project_list');
		$project_type  = (int)$this->input->get_post('project_type');
		assign('actname', $actname);
		assign('links', $links);
		assign('status', $status);
		assign('project_list', $project_list);
		assign('project_type', $project_type);
		assign('pro_list',config_item('project_list'));
		assign('pro_type',config_item('project_type'));
		$where_data = array(
			'actname'  => $actname,
			'links'    => $links,
			'status'   => $status,
			'project_list'   => $project_list,
			'project_type'   => $project_type,
		);
		$list = $this->cases_model->get_cases_list($where_data, $pagesize, $pagesize*($page-1));//查询所有
		assign('list', $list);
		$total_rows = $this->cases_model->get_cases_list_num($where_data);//计算所有数据
		$link = site_url('manager/cases/index/').'?actname='.$actname.'&links='.$links.'&status='.$status.'&project_list='.$project_list.'&project_type='.$project_type;
		$pagecount = page($link, $total_rows, $page, $pagesize);//分页
		assign('pagecount', $pagecount);
		display('manager/cases/list.tpl');
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
				$update_id = $this->cases_model->update_id(array('status'=>1), $id);
				break;
			case '冻结':
				$update_id = $this->cases_model->update_id(array('status'=>2), $id);
				break;
			case '删除':
				$update_id = $this->cases_model->delete_id($id);
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
			$actname       = $this->input->post('actname');
            $links         = $this->input->post('links');
		    $image         = $this->input->post('image');
			$project_list  = $this->input->post('project_list');
			$project_type  = $this->input->post('project_type');
			$insert_data = array(
                'actname'    => $actname,
				'links'      => $links,
				'image'      => $image,
				'project_list'   => $project_list,
				'project_type'   => $project_type,
				'status'    => 1,
				'addtime'   => config_item('sys_time'),
			);
			//验证活动名称
			$user_data = $this->cases_model->get_one(array('actname'=>$actname));
            //验证链接
			$user_data = $this->cases_model->get_one(array('links'=>$links));
			if(!empty($user_data['id']))
			{
				msg('已经存在的链接');
			}
            //添加数据到数据库
			$insert_id = $this->cases_model->insert($insert_data);
			if(!empty($insert_id))
			{
				msg('保存成功', site_url('manager/cases'));
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			display('manager/cases/add_edit.tpl');
		}
	}

	/**
	 * 修改
	 */
	public function edit($id)
	{
        $id = (int)$id;
		$dopost = $this->input->post('dopost');
		$redirect_url = $this->input->get('redirect_url');//返回链接
		if($dopost=='save')
		{
			$actname       = $this->input->post('actname');
			$links         = $this->input->post('links');
			$image         = $this->input->post('image');
			$project_list  = $this->input->post('project_list');
			$project_type  = $this->input->post('project_type');
            $update_data = array(
				'actname'        => $actname,
				'links'          => $links,
				'image'          => $image,
				'project_list'   => $project_list,
				'project_type'   => $project_type,
            );
			$update_id = $this->cases_model->update_id($update_data, $id);
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
			//活动信息
			$cases_data = $this->cases_model->get_one(array('id'=>$id));
			assign('item', $cases_data);
			display('manager/cases/add_edit.tpl');
		}
	}

	/**
	 * 删除
	 */
	public function delete()
	{
		$id = (int)$this->input->get('id');
		$delete_id = $this->cases_model->delete_id($id);
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
