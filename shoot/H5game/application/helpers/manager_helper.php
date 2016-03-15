<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 后台自定义全局函数
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 检测后台用户是否登陆
 */
if( ! function_exists('manager_user_login'))
{
	function manager_user_login()
	{
		$CI = &get_instance();
		$admin_user_id = $CI->session->userdata('admin_user_id');
		if($admin_user_id == '')
		{
			msg('需要登陆后才能继续操作', site_url('manager?redirect_url='.get_now_url()));
		}
		$admin_data = cache('get', 'admin_'.$admin_user_id);//查询缓存
		if(empty($admin_data))
		{//缓存不存在重新获取
			$CI->load->model('admin_model');
			$admin_data = $CI->admin_model->get_one(array('uid'=>$admin_user_id));
			cache('set', 'admin_'.$admin_user_id, $admin_data);//写入缓存
		}
		return $admin_data;
	}
}