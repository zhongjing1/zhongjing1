<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 炽橙报名20150105
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Chicheng extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('loop_model');
        $this->load->helpers('activity_helper');
        $this->weixin_data = get_weixin_data();//获取微信信息，jssdk信息
        //获得用户。不是后台管理的时候才启用
        if(!strstr(get_segment(4),'admin'))
        {
            $this->userinfo  = get_userinfo($this->appid, $this->appsecret);
            //$this->userinfo = array('openid'=>123,'nickname'=>'淘','headimgurl'=>'http://wx.qlogo.cn/mmopen/MIOjkW0mCTjpjfgJQZia07q6WIrypic654ibgjzanTWP6Zs4KBXt43KtADh19GBEaK7nVyufo0XaVvHLXs6v4JHXXoF9ibMhicia5m/0');
            assign('userinfo', $this->userinfo);
        }
	}



	/**
	 * 首页
	 */
	public function index()
	{
        $user_data = $this->get_user_openid();
        assign('user_data', $user_data);
        $comment_list = $this->loop_model->get_list($this->weixin_data['table_name'], array('status'=>1), 50, 0, 'addtime desc');//查询评论前50
        assign('comment_list', $comment_list);
        $details_list = $this->loop_model->get_list($this->weixin_data['table_name'].'_involved', array(), 50, 0, 'addtime desc');//查询公司信息前50
        assign('details_list', $details_list);
        display($this->weixin_data['index_dir'].'/index.html');
	}

    /**
     * 点赞
     */
    public function add_zan()
    {
        $id = $this->input->post('id');
        $cache_name = 'zan_'.$id.'_'. $this->userinfo['openid'];
        $zan_time = cache('get', $cache_name);
        if(!empty($zan_time))
        {
            error_json('已经点过赞了');
        }
        else
        {
            $this->loop_model->update_id($this->weixin_data['table_name'].'_involved', array('set'=>array('zan','zan+1')), $id);
            cache('set', $cache_name, 1,600);
            error_json('y');
        }
    }

    /**
     * 公司信息展示页
     */
    public function details($id)
    {
        $details_data = $this->loop_model->get_one($this->weixin_data['table_name'].'_involved', array('id'=>$id));
        assign('details_data', $details_data);
        display($this->weixin_data['index_dir'].'/details.html');
    }

    /**
     * 企业报名
     */
    public function company()
    {
        $user_data = $this->get_user_openid();
        assign('user_data', $user_data);
        display($this->weixin_data['index_dir'].'/company.html');
    }

    /**
     * 个人/团队报名
     */
    public function student()
    {
        $user_data = $this->get_user_openid();
        assign('user_data', $user_data);
        display($this->weixin_data['index_dir'].'/student.html');
    }

    /**
     * 保存评论信息
     */
    public function save_comment()
    {
        $user_data = $this->get_user_openid();
        $comment = $this->input->post('comment');
        if(empty($comment))error_json('请填写评论内容！');
        $up_data = array(
            'comment'  => $comment,
            'addtime'  => config_item('sys_time'),
        );
        $up_id = $this->loop_model->update_id($this->weixin_data['table_name'], $up_data, $user_data['id']);
        if($up_id>0)
        {
            error_json('y');
        }
        else
        {
            error_json('信息保存失败');
        }
    }
    /**
     * 保存公司提交信息
     */
    public function save_company()
    {
        $user_data = $this->get_user_openid();
        $companyintro = $this->input->post('companyintro');
        $projectintro = $this->input->post('projectintro');
        $jobneed      = $this->input->post('jobneed');
        $person       = $this->input->post('person');
        $telphone     = $this->input->post('telphone');
        if(empty($telphone))error_json('请填写电话号码！');
        $up_data = array(
            'openid'       => $this->userinfo['openid'],
            'companyintro' => $companyintro,
            'projectintro' => $projectintro,
            'jobneed'      => $jobneed,
            'person'       => $person,
            'telphone'     => $telphone,
            'addtime'      => config_item('sys_time'),
        );
        $tel_data = $this->loop_model->get_one($this->weixin_data['table_name'].'_company', array('telphone'=>$telphone));
        if(!empty($tel_data))
        {
            error_json('该手机号码已经登记');
        }
        else
        {
            $up_id = $this->loop_model->insert($this->weixin_data['table_name'].'_company', $up_data);
            if ($up_id > 0) {
                error_json('y');
            } else {
                error_json('信息保存失败');
            }
        }
    }
    /**
     * 保存个人/团队提交信息
     */
    public function save_student()
    {
        $user_data = $this->get_user_openid();
        $username      = $this->input->post('username');
        $telphone      = $this->input->post('telphone');
        $jobneed       = $this->input->post('jobneed');
        $projectintro  = $this->input->post('projectintro');
        $image         = $this->input->post('image');
        $teamname1     = $this->input->post('teamname1');
        $teamrole1     = $this->input->post('teamrole1');
        $teamname2     = $this->input->post('teamname2');
        $teamrole2     = $this->input->post('teamrole2');
        $teamname3     = $this->input->post('teamname3');
        $teamrole3     = $this->input->post('teamrole3');
        $teamname4     = $this->input->post('teamname4');
        $teamrole4     = $this->input->post('teamrole4');
        if(empty($telphone))error_json('请填写电话号码！');
        $up_data = array(
            'openid'         => $this->userinfo['openid'],
            'username'       => $username,
            'telphone'       => $telphone,
            'jobneed'        => $jobneed,
            'projectintro'   => $projectintro,
            'image'          => $image,
            'teamname1'      => $teamname1,
            'teamrole1'      => $teamrole1,
            'teamname2'      => $teamname2,
            'teamrole2'      => $teamrole2,
            'teamname3'      => $teamname3,
            'teamrole3'      => $teamrole3,
            'teamname4'      => $teamname4,
            'teamrole4'      => $teamrole4,
            'addtime'      => config_item('sys_time'),
        );
        $tel_data = $this->loop_model->get_one($this->weixin_data['table_name'].'_student', array('telphone'=>$telphone));
        if(!empty($tel_data))
        {
            error_json('该手机号码已经登记');
        }
        else
        {
            $up_id = $this->loop_model->insert($this->weixin_data['table_name'].'_student', $up_data);
            if ($up_id > 0) {
                error_json('y');
            } else {
                error_json('信息保存失败');
            }
        }
    }

    /**
     ***************************************************************
     * 获取用户信息
     ***************************************************************
     */

    /**
     * 根据openid获取用户信息
     */
    public function get_user_openid()
    {
        $openid = $this->userinfo['openid'];
        $cache_name = $this->weixin_data['table_name'].'_'.$openid;//缓存名称
        $user_data = cache('get', $cache_name);
        if(empty($user_data))
        {
            $user_data = $this->loop_model->get_one($this->weixin_data['table_name'], array('openid'=>$openid));
            if(empty($user_data))
            {
                $user_data = array(
                    'openid'     => $this->userinfo['openid'],
                    'nickname'   => $this->userinfo['nickname'],
                    'headimgurl' => $this->userinfo['headimgurl'],
                    'addtime'    => config_item('sys_time'),
                );
                $insert_id = $this->loop_model->insert($this->weixin_data['table_name'], $user_data);
                $user_data['id'] = $insert_id;
                cache('set', $cache_name, $user_data);
            }
        }
        return $user_data;
    }

    /**
     * 根据openid获取用户信息
     * @param $id
     */
    public function get_user_id($id)
    {
        $cache_name = $this->weixin_data['table_name'].'_'.$id;//缓存名称
        $user_data = cache('get', $cache_name);
        if(empty($user_data))
        {
            $user_data = $this->loop_model->get_one($this->weixin_data['table_name'], array('id'=>$id));
            cache('set', $cache_name, $user_data);
        }
        return $user_data;
    }


    /**
     ***************************************************************
     * 后台操作
     ***************************************************************
     */

    /**
     * 后台管理
     * 公司报名列表
     */
    public function admin()
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $pagesize = 20;
            $page = $this->input->get('page');
            $page < 1 ? $page = 1 : $page = $page;//当前页数
            //搜索条件
            $person   = $this->input->get_post('person');
            $telphone = $this->input->get_post('telphone');
            $status   = (int)$this->input->get_post('status');
            assign('person', $person);
            assign('telphone', $telphone);
            assign('status', $status);
            if(!empty($person))$where_and = array('person'=>$person);
            if(!empty($telphone))$where_and = array('telphone'=>$telphone);
            if(!empty($status))$where_and = array('status'=>$status);
            $where_data = array(
                'and' => $where_and,
            );
            $list = $this->loop_model->get_list($this->weixin_data['table_name'].'_company', $where_data, $pagesize, $pagesize*($page-1));//查询所有
            assign('list', $list);
            $total_rows = $this->loop_model->get_list_num($this->weixin_data['table_name'].'_company', $where_data);//计算所有数据
            $link = site_url($this->weixin_data['index_dir'].'/admin').'?person='.$person.'&telphone='.$telphone;
            $pagecount = page($link, $total_rows, $page, $pagesize);//分页
            assign('pagecount', $pagecount);
            display($this->weixin_data['index_dir'].'/company_list.tpl');
        }
    }
    /**
     * 批量操作
     * 公司报名列表
     */
    public function admin_batch()
    {
        $id = $this->input->post('id');
        if(empty($id))
        {
            msg("您没有选择任何内容。" ,site_url($this->weixin_data['index_dir'].'/admin'));
        }
        $submit_name = $this->input->post('submit_name');
        switch($submit_name){
            case '审核':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_company', array('status'=>1), $id);
                break;
            case '锁定':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_company', array('status'=>2), $id);
                break;
            case '删除':
                $update_id = $this->loop_model->delete_id($this->weixin_data['table_name'].'_company', $id);
                break;
        }
        if($update_id>0){
            $redirect_url = $this->input->get('redirect_url');//返回链接
            msg("操作成功" , site_url($this->weixin_data['index_dir'].'/admin'));
        }else{
            msg("操作失败" , site_url($this->weixin_data['index_dir'].'/admin'));
        }
    }
    /**
     * 单条删除
     * 公司报名列表
     */
    public function admin_delete()
    {
        $id = $this->input->post('id');
        $delete_id = $this->loop_model->delete_id($this->weixin_data['table_name'].'_company', $id);
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
     * 后台管理
     * 个人/团队报名列表
     */
    public function admin_student()
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $pagesize = 20;
            $page = $this->input->get('page');
            $page < 1 ? $page = 1 : $page = $page;//当前页数
            //搜索条件
            $username   = $this->input->get_post('username');
            $telphone = $this->input->get_post('telphone');
            $status   = (int)$this->input->get_post('status');
            assign('username', $username);
            assign('telphone', $telphone);
            assign('status', $status);
            if(!empty($username))$where_and = array('username'=>$username);
            if(!empty($telphone))$where_and = array('telphone'=>$telphone);
            if(!empty($status))$where_and = array('status'=>$status);
            $where_data = array(
                'and' => $where_and,
            );
            $list = $this->loop_model->get_list($this->weixin_data['table_name'].'_student', $where_data, $pagesize, $pagesize*($page-1));//查询所有
            assign('list', $list);
            $total_rows = $this->loop_model->get_list_num($this->weixin_data['table_name'].'_student', $where_data);//计算所有数据
            $link = site_url($this->weixin_data['index_dir'].'/admin_student').'?username='.$username.'&telphone='.$telphone;
            $pagecount = page($link, $total_rows, $page, $pagesize);//分页
            assign('pagecount', $pagecount);
            display($this->weixin_data['index_dir'].'/student_list.tpl');
        }
    }
    /**
     * 批量操作
     * 个人/团队报名列表
     */
    public function admin_student_batch()
    {
        $id = $this->input->post('id');
        if(empty($id))
        {
            msg("您没有选择任何内容。" ,site_url($this->weixin_data['index_dir'].'/admin_student'));
        }
        $submit_name = $this->input->post('submit_name');
        switch($submit_name){
            case '审核':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_student', array('status'=>1), $id);
                break;
            case '锁定':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_student', array('status'=>2), $id);
                break;
            case '删除':
                $update_id = $this->loop_model->delete_id($this->weixin_data['table_name'].'_student', $id);
                break;
        }
        if($update_id>0){
            $redirect_url = $this->input->get('redirect_url');//返回链接
            msg("操作成功" , site_url($this->weixin_data['index_dir'].'/admin_student'));
        }else{
            msg("操作失败" , site_url($this->weixin_data['index_dir'].'/admin_student'));
        }
    }
    /**
     * 单条删除
     * 个人/团队报名列表
     */
    public function admin_student_delete()
    {
        $id = $this->input->post('id');
        $delete_id = $this->loop_model->delete_id($this->weixin_data['table_name'].'_student', $id);
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
     * 后台管理
     * 参与公司列表
     */
    public function admin_involved()
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $pagesize = 20;
            $page = $this->input->get('page');
            $page < 1 ? $page = 1 : $page = $page;//当前页数
            //搜索条件
            $company   = $this->input->get_post('company');
            $project = $this->input->get_post('project');
            $status   = (int)$this->input->get_post('status');
            assign('company', $company);
            assign('project', $project);
            assign('status', $status);
            if(!empty($company))$where_and = array('company'=>$company);
            if(!empty($project))$where_and = array('project'=>$project);
            if(!empty($status))$where_and = array('status'=>$status);
            $where_data = array(
                'and' => $where_and,
            );
            $list = $this->loop_model->get_list($this->weixin_data['table_name'].'_involved', $where_data, $pagesize, $pagesize*($page-1));//查询所有
            assign('list', $list);
            $total_rows = $this->loop_model->get_list_num($this->weixin_data['table_name'].'_involved', $where_data);//计算所有数据
            $link = site_url($this->weixin_data['index_dir'].'/admin_involved').'?company='.$company.'&project='.$project;
            $pagecount = page($link, $total_rows, $page, $pagesize);//分页
            assign('pagecount', $pagecount);
            display($this->weixin_data['index_dir'].'/involved_list.tpl');
        }
    }
    /**
     * 批量操作
     * 参与公司列表
     */
    public function admin_involved_batch()
    {
        $id = $this->input->post('id');
        if(empty($id))
        {
            msg("您没有选择任何内容。" ,site_url($this->weixin_data['index_dir'].'/admin_involved'));
        }
        $submit_name = $this->input->post('submit_name');
        switch($submit_name){
            case '审核':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_involved', array('status'=>1), $id);
                break;
            case '锁定':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_involved', array('status'=>2), $id);
                break;
            case '删除':
                $update_id = $this->loop_model->delete_id($this->weixin_data['table_name'].'_involved', $id);
                break;
        }
        if($update_id>0){
            $redirect_url = $this->input->get('redirect_url');//返回链接
            msg("操作成功" , site_url($this->weixin_data['index_dir'].'/admin_involved'));
        }else{
            msg("操作失败" , site_url($this->weixin_data['index_dir'].'/admin_involved'));
        }
    }
    /**
     * 单条删除
     * 参与公司列表
     */
    public function admin_involved_delete()
    {
        $id = $this->input->post('id');
        $delete_id = $this->loop_model->delete_id($this->weixin_data['table_name'].'_involved', $id);
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
     * 添加
     * 参与公司列表
     */
    public function admin_involved_add()
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $dopost = $this->input->post('dopost');
            if($dopost=='save')
            {
                $company        = $this->input->post('company');
                $money          = $this->input->post('money');
                $project         = $this->input->post('project');
                $partnerrequire = $this->input->post('partnerrequire');
                $image          = $this->input->post('image');
                $desc           = $this->input->post('desc');
                $insert_data = array(
                    'company'  	        => $company,
                    'money'  	        => $money,
                    'project'  	        => $project,
                    'partnerrequire'  	=> $partnerrequire,
                    'desc'  	        => $desc,
                    'image'  	        => $image,
                    'addtime'           => config_item('sys_time'),
                );
                $insert_id = $this->loop_model->insert($this->weixin_data['table_name'].'_involved', $insert_data);
                if($insert_id>0)
                {
                    msg("操作成功" ,site_url($this->weixin_data['index_dir'].'/admin_involved'));
                }
                else
                {
                    msg("操作失败");
                }
            }else
            {
                display($this->weixin_data['index_dir'].'/in_add.tpl');
            }
        }
    }

    /**
     * 编辑/修改
     * 参与公司列表
     */
    public function admin_involved_update($id)
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $dopost = $this->input->post('dopost');
            if($dopost=='save')
            {
                $company        = $this->input->post('company');
                $money          = $this->input->post('money');
                $project         = $this->input->post('project');
                $partnerrequire = $this->input->post('partnerrequire');
                $image          = $this->input->post('image');
                $desc           = $this->input->post('desc');
                $up_data = array(
                    'company'  	        => $company,
                    'money'  	        => $money,
                    'project'  	        => $project,
                    'partnerrequire'  	=> $partnerrequire,
                    'desc'  	        => $desc,
                    'image'  	        => $image,
                    'addtime'           => config_item('sys_time'),
                );
                $up_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_involved', $up_data, $id);
                if($up_id>0)
                {
                    /*error_json('y');*/
                    msg("操作成功" ,site_url($this->weixin_data['index_dir'].'/admin_involved'));
                }
                else
                {
                    msg("操作失败");
                }
            }
            else{
                $id_update = $this->loop_model->get_one($this->weixin_data['table_name'].'_involved', array('id'=>$id));
                assign('id_update', $id_update);
                display($this->weixin_data['index_dir'].'/in_edit.tpl');
            }
        }
    }

    /**
     * 后台管理
     * 评论列表
     */
    public function admin_comment()
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $pagesize = 20;
            $page = $this->input->get('page');
            $page < 1 ? $page = 1 : $page = $page;//当前页数
            //搜索条件
            $nickname   = $this->input->get_post('nickname');
            $status   = (int)$this->input->get_post('status');
            assign('nickname', $nickname);
            assign('status', $status);
            if(!empty($nickname))$where_and = array('nickname'=>$nickname);
            if(!empty($status))$where_and = array('status'=>$status);
            $where_data = array(
                'and' => $where_and,
            );
            $list = $this->loop_model->get_list($this->weixin_data['table_name'], $where_data, $pagesize, $pagesize*($page-1));//查询所有
            assign('list', $list);
            $total_rows = $this->loop_model->get_list_num($this->weixin_data['table_name'], $where_data);//计算所有数据
            $link = site_url($this->weixin_data['index_dir'].'/admin_comment').'?nickname='.$nickname;
            $pagecount = page($link, $total_rows, $page, $pagesize);//分页
            assign('pagecount', $pagecount);
            display($this->weixin_data['index_dir'].'/comment_list.tpl');
        }
    }
    /**
     * 批量操作
     * 评论列表
     */
    public function admin_comment_batch()
    {
        $id = $this->input->post('id');
        if(empty($id))
        {
            msg("您没有选择任何内容。" ,site_url($this->weixin_data['index_dir'].'/admin_comment'));
        }
        $submit_name = $this->input->post('submit_name');
        switch($submit_name){
            case '审核':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'], array('status'=>1), $id);
                break;
            case '锁定':
                $update_id = $this->loop_model->update_id($this->weixin_data['table_name'], array('status'=>2), $id);
                break;
            case '删除':
                $update_id = $this->loop_model->delete_id($this->weixin_data['table_name'], $id);
                break;
        }
        if($update_id>0){
            $redirect_url = $this->input->get('redirect_url');//返回链接
            msg("操作成功" , site_url($this->weixin_data['index_dir'].'/admin_comment'));
        }else{
            msg("操作失败" , site_url($this->weixin_data['index_dir'].'/admin_comment'));
        }
    }
    /**
     * 单条删除
     * 评论列表
     */
    public function admin_comment_delete()
    {
        $id = $this->input->post('id');
        $delete_id = $this->loop_model->delete_id($this->weixin_data['table_name'], $id);
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
