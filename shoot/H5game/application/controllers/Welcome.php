<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 首页
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
	/**
	 * 首页
	 */
	public function index()
	{
        display('project_list/project_list.tpl');
    }

}
