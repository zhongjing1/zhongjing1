<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 后台文件上传
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
    public function __construct()
    {
    	parent::__construct();
        $this->load->helpers('manager_helper');
        //manager_user_login();//用户是否登陆
    }

    /**
     * 开始上传
     */
	public function index()
    {
        $callback = $this->input->get('callback');
        //上传文件域名称
        $file_name = $this->input->get('file_name');
        if($file_name == '')
        {
            $file_name = 'upfile';
        }
        //开始上传
        $this->load->library('upload');
        if($this->upload->do_upload($file_name))
        {
            $image = $this->upload->data();
            $info = array(
                "originalName" => $image['orig_name'] ,
                "name"         => $image['file_name'] ,
                "url"          => $image['full_path'] ,
                "size"         => $image['file_size'] ,
                "type"         => $image['file_ext'] ,
                "rand_num"     => time() ,
                "state"        => 'SUCCESS'
            );
        }
        else
        {
            $info = array(
                "state"  => $this->upload->display_errors()
            );
        }
        /**
         * 返回数据
         */
        if($callback)
        {
            echo '<script>'.$callback.'('.json_encode($info).')</script>';
        }
        else
        {
            echo json_encode($info);
        }
    }
}