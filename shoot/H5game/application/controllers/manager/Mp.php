<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 公众号
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Mp extends CI_Controller {
	private $user_data;
	public function __construct()
	{
		parent::__construct();
        $this->load->helpers('manager_helper');
        $this->user_data = manager_user_login();//用户是否登陆
		$this->load->model('mp_model');
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
		$username = $this->input->get_post('username');
		$title    = $this->input->get_post('title');
		$status   = (int)$this->input->get_post('status');
		assign('username', $username);
		assign('title', $title);
		assign('status', $status);
		$where_data = array(
			'username' => $username,
			'title'    => $title,
			'status'   => $status
		);
		$list = $this->mp_model->get_mp_list($where_data, $pagesize, $pagesize*($page-1));//查询所有
		assign('list', $list);
		$total_rows = $this->mp_model->get_mp_list_num($where_data);//计算所有数据
		$link = site_url('manager/mp/index/').'?username='.$username.'&title='.$title.'&status='.$status;
		$pagecount = page($link, $total_rows, $page, $pagesize);//分页
		assign('pagecount', $pagecount);
		display('manager/mp/list.tpl');
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
				$update_id = $this->mp_model->update_id(array('status'=>1), $id);
				break;
			case '冻结':
				$update_id = $this->mp_model->update_id(array('status'=>2), $id);
				break;
			case '删除':
				$update_id = $this->mp_model->delete_id($id);
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
			$title     = $this->input->post('title');
            $username  = $this->input->post('username');
			$password  = $this->input->post('password');
            $salt      = get_rand_num('int', 6);
            $wechat_num  = $this->input->post('wechat_num');
            $original_id = $this->input->post('original_id');
            $appid     = $this->input->post('appid');
            $appsecret = $this->input->post('appsecret');
            $aestype   = (int)$this->input->post('aestype');
            $mp_type   = (int)$this->input->post('mp_type');
            $pay_id    = $this->input->post('pay_id');
            $pay_key   = $this->input->post('pay_key');
			$insert_data = array(
                'title'     => $title,
				'username'  => $username,
				'password'  => md5(md5($password).$salt),
				'salt'      => $salt,
                'wechat_num'=> $wechat_num,
				'original_id' => $original_id,
				'appid'     => $appid,
                'appsecret' => $appsecret,
                'token'     => get_rand_num('str', 16),
                'aestype'   => $aestype,
                'aeskey'    => get_rand_num('str', 43),
                'mp_type'   => $mp_type,
                'pay_id'    => $pay_id,
                'pay_key'   => $pay_key,
				'status'    => 1,
				'addtime'   => config_item('sys_time'),
			);
            //验证用户名
			$user_data = $this->mp_model->get_one(array('username'=>$username));
			if(!empty($user_data['id']))
			{
				msg('已经存在的用户名');
			}
            //验证微信号
            $wechat_num_data = $this->mp_model->get_one(array('wechat_num'=>$wechat_num));
            if(!empty($wechat_num_data['id']))
            {
                msg('已经存在的微信号');
            }
            //验证公众号
            $gh_data = $this->mp_model->get_one(array('original_id'=>$original_id));
            if(!empty($gh_data['id']))
            {
                msg('已经存在的公众号');
            }
            //添加数据到数据库
			$insert_id = $this->mp_model->insert($insert_data);
			if(!empty($insert_id))
			{
                //创建目录start
                @mkdir(dirname(__file__).'/../activity/'.$wechat_num, 0755);//创建类目录
                @mkdir(dirname(__file__).'/../../../views/activity/'.$wechat_num, 0755);//创建模板目录
                //创建目录end
				msg('保存成功', site_url('manager/mp'));
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			display('manager/mp/add_edit.tpl');
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
            $appid     = $this->input->post('appid');
            $appsecret = $this->input->post('appsecret');
            $aestype   = (int)$this->input->post('aestype');
            $mp_type   = (int)$this->input->post('mp_type');
            $pay_id    = $this->input->post('pay_id');
            $pay_key   = $this->input->post('pay_key');
            $update_data = array(
                'appid'     => $appid,
                'appsecret' => $appsecret,
                'aestype'   => $aestype,
                'mp_type'   => $mp_type,
                'pay_id'    => $pay_id,
                'pay_key'   => $pay_key,
            );
			//修改密码
            $password  = $this->input->post('password');
			if(!empty($password))
			{
                $salt = get_rand_num('int', 6);
				$update_data['password'] = md5(md5($password).$salt);
				$update_data['salt']     = $salt;
			}
			$update_id = $this->mp_model->update_id($update_data, $id);
			if(!empty($update_id))
			{
                $wechat_num = $this->input->post('wechat_num');
                cache('delete', 'mp_'.$wechat_num);//清除缓存
				msg('保存成功', $redirect_url);
			}
			else
			{
				msg('保存失败');
			}
		}
		else
		{
			//公众号信息
			$mp_data = $this->mp_model->get_one(array('id'=>$id));
			assign('item', $mp_data);
			display('manager/mp/add_edit.tpl');
		}
	}

	/**
	 * 删除
	 */
	public function delete()
	{
		$id = (int)$this->input->get('id');
		$delete_id = $this->mp_model->delete_id($id);
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
		$mp_data = $this->mp_model->get_one(array('username'=>$username));
		if(!empty($mp_data['id']))
		{
			error_json('已经存在的用户名');
		}else
		{
			error_json('y');
		}
	}

    /**
     * 查询微信号是否存在
     */
    public function get_wechat_num()
    {
        $wechat_num = $this->input->post('param');
        $mp_data = $this->mp_model->get_one(array('wechat_num'=>$wechat_num));
        if(!empty($mp_data['id']))
        {
            error_json('已经存在的微信号');
        }else
        {
            error_json('y');
        }
    }

    /**
     * 查询公众号是否存在
     */
    public function get_original_id()
    {
        $original_id = $this->input->post('param');
        $mp_data = $this->mp_model->get_one(array('original_id'=>$original_id));
        if(!empty($mp_data['id']))
        {
            error_json('已经存在的公众号');
        }else
        {
            error_json('y');
        }
    }

    /**
     * 显示api信息
     */
    public function api()
    {
        $id = (int)$this->input->get('id');
        $mp_data = $this->mp_model->get_one(array('id'=>$id));
        assign('item', $mp_data);
        display('manager/mp/api.tpl');
    }
}
