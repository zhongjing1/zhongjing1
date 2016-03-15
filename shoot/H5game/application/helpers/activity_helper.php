<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 活动自定义全局函数
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 获取当前活动微信信息
 */
if( ! function_exists('get_weixin_data'))
{
    function get_weixin_data()
    {
        //微信号
        $wechat_num = get_segment(2);
        //活动名称
        $activity_name = get_segment(3);
        //获取公众号信息
        $mp = get_mp_wechat_num($wechat_num);
        if($mp['mp_type']==1){
            $appid     = $mp['appid'];
            $appsecret = $mp['appsecret'];
        }
        //js sdk信息
        $js_sdk  = get_jsapi_ticket($appid, $appsecret);
        assign('js_sdk', $js_sdk);
        //静态文件引用路径
        assign('tmp_dir', config_item('base_url').'/views/activity/'.$wechat_num.'/'.$activity_name);
        //模板文件访问地址目录
        $index_dir = 'activity/'.$wechat_num.'/'.$activity_name;
        assign('index_dir', $index_dir);
        return array('index_dir'=>$index_dir, 'table_name' => $wechat_num.'_'.$activity_name);
    }
}



/**
 * 检测后台操作用户是否登陆
 */
if( ! function_exists('activity_user_login'))
{
    function activity_user_login()
    {
        $wechat_num = get_segment(2);
        if(!empty($wechat_num))
        {
            $CI = &get_instance();
            $mp_user_id = $CI->session->userdata('mp_user_id'.$wechat_num);
            if($mp_user_id == '')
            {
                $dopost = $CI->input->post('dopost');
                if($dopost=='login')
                {
                    //开始验证登录
                    $mp_data = get_mp_wechat_num($wechat_num);
                    $username = $CI->input->post('username');
                    $password = $CI->input->post('password');
                    if($mp_data['username'] != $username)
                    {
                        error_json('用户名不存在');
                    }
                    elseif($mp_data['password'] != md5(md5($password).$mp_data['salt']))
                    {
                        error_json('密码错误');
                    }
                    else
                    {
                        $CI->session->set_userdata('mp_user_id'.$wechat_num, $mp_data['id']);
                        error_json('y');
                    }
                    return false;
                }
                else
                {
                    //没有登录
                    display('activity/admin_login.tpl');
                    return false;
                }
            }
            else
            {
                return $mp_user_id;
            }
        }
    }
}

/**
 ***************************************************************
 * 微信相关操作
 ***************************************************************
 */

/**
 * 获取微信公众号信息
 * @param str $wechat_num 微信号
 * return array
 */
if( ! function_exists('get_mp'))
{
    function get_mp_wechat_num($wechat_num = false)
    {
        if($wechat_num !== false)
        {
            $mp_data = cache('get', 'mp_'.$wechat_num);
            if(empty($mp_data))
            {
                $CI =& get_instance();
                $CI->load->model('mp_model');
                $mp_data = $CI->mp_model->get_one(array('wechat_num'=>$wechat_num));//返回查询数据
                cache('set', 'mp_'.$wechat_num, $mp_data);
            }
            return $mp_data;
        }
        else
        {
            return false;
        }
    }
}
/**
 * 获取全局token
 * @param str $tmp_name 模板地址
 */
if( ! function_exists('get_grobal_token'))
{
    function get_grobal_token($appid = '', $secret = ''){
        if(empty($appid))$appid = config_item('appid');//appid不存在调用默认
        if(empty($secret))$secret = config_item('secret');//secret不存在调用默认

        $grobal_token = cache('get', 'grobal_token_'.$appid);
        if($grobal_token == ''){
            $json_grobal_token = curl_get('https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.$appid.'&secret='.$secret);
            $grobal_token = json_decode($json_grobal_token, true);
            cache('set', 'grobal_token_'.$appid, $grobal_token);
        }
        return $grobal_token;
    }
}

/**
 * 获取jssdk签名
 */
if( ! function_exists('get_jsapi_ticket')) {
    function get_jsapi_ticket($appid = '', $secret = '')
    {
        if(empty($appid))$appid = config_item('appid');//appid不存在调用默认
        if(empty($secret))$secret = config_item('secret');//secret不存在调用默认

        $jsapi_ticket = cache('get', 'jsapi_ticket_'.$appid);//取得缓存
        if ($jsapi_ticket == '') {
            $token = get_grobal_token($appid, $secret);
            $json_jsapi_ticket = curl_get('https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.$token['access_token'].'&type=jsapi');
            $jsapi_ticket = json_decode($json_jsapi_ticket, true);
            cache('set', 'jsapi_ticket_'.$appid, $jsapi_ticket);//放入缓存
        }
        $string = array(
            'jsapi_ticket' => $jsapi_ticket['ticket'],
            'noncestr'     => get_rand_num('str', 10),
            'timestamp'    => config_item('sys_time'),
            'url'          => urldecode(get_now_url())
        );
        //组合字符串
        $connect = '';
        foreach($string as $val=>$key){
            $str .= $connect.$val.'='.$key;
            $connect = '&';
        }
        $signature = sha1($str);
        $string['signature'] = $signature;
        $string['appid']     = $appid;//print_r($string);
        return $string;
    }
}

/**
 * 获取微信所有用户信息
 */
if( ! function_exists('get_userinfo')) {
    function get_userinfo($appid = '', $secret = '')
    {
        if(empty($appid))$appid = config_item('appid');//appid不存在调用默认
        if(empty($secret))$secret = config_item('secret');//secret不存在调用默认

        $CI = &get_instance();
        $openid = $CI->input->cookie('wx_userinfo_n'.$appid);
        $user_data = cache('get', 'ca_wx_userinfo_n'.$openid);
        if($openid=='' || $user_data==''){
            $code = $CI->input->get('code');
            if($code == '')
            {
                $redirect_uri = urlencode(get_now_url());//授权后的跳转连接
                $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_userinfo&state=STATE#wechat_redirect';
                header("location:$url");exit;
            }else{
                $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
                $get_token = curl_get($url);
                $token = json_decode($get_token,true);//通过code换取网页授权access_token
                curl_get('https://api.weixin.qq.com/sns/oauth2/refresh_token?appid='.$appid.'&grant_type=refresh_token&refresh_token='.$token['refresh_token']);//刷新access_token
                $get_user = curl_get('https://api.weixin.qq.com/sns/userinfo?access_token='.$token['access_token'].'&openid='.$token['openid'].'&lang=zh_CN');
                $user_data = json_decode($get_user,true);
                if($user_data['openid']==''){
                    msg('用户信息获取失败', 'stop');
                }else{
                    $CI->input->set_cookie('wx_userinfo_n'.$appid, $user_data['openid'], 60*60*24);
                    cache('set', 'ca_wx_userinfo_n'.$user_data['openid'], $user_data, 6000);
                }
            }
        }
        return $user_data;
    }
}

/**
 * 只获取微信用户openid
 */
if( ! function_exists('get_openid')) {
    function get_openid($appid = '', $secret = '')
    {
        if(empty($appid))$appid = config_item('appid');//appid不存在调用默认
        if(empty($secret))$secret = config_item('secret');//secret不存在调用默认

        $CI = &get_instance();
        $openid = encrypt($CI->input->cookie('wx_openid_'.$appid), 'D');
        if(empty($openid)){
            $code = $CI->input->get('code');
            if($code == '')
            {
                $redirect_uri = urlencode(get_now_url());//授权后的跳转连接
                $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri='.$redirect_uri.'&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect';
                header("location:$url");exit;
            }else{
                $url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';
                $get_token = curl_get($url);
                $token = json_decode($get_token,true);//通过code换取网页授权access_token
                if($token['openid']==''){
                    msg('用户信息获取失败', 'stop');
                }else{
                    $openid = $token['openid'];
                    $CI->input->set_cookie('wx_openid_'.$appid, encrypt($openid, 'E'), 60*60*24);
                }
            }
        }
        return $openid;
    }
}



/**
 * smarty获取列表
 * @param str $model 表名
 * @param array $data 参数
 * @param int $limit 分页大小
 * @paran int $page 页码，不填写的时候自动获取地址上的，要是填写了1就不自动获取了
 * @paran str $orderby 排序
 * return array
 */
if( ! function_exists('ym_list'))
{
	function ym_list($model, $data = array(), $limit = 0, $page = 1, $orderby = 'sortnum asc,id desc')
	{
		if(!empty($model))
		{
			$CI =& get_instance();
			//计算页数start
			$segment = $CI->uri->segment_array();
			$page_str = $segment[count($segment)];
			if($page=='')
			{
				if(strpos($page_str, 'p') > 0)
				{
					$page = substr($page_str, 2);
				}
			}
			//页数计算end
			//计算开始查询位置start
			if($page>1)
			{
				$offset = $limit*($page-1);
			}
			else
			{
				$offset = '';
			}
			$CI->load->model('loop_model');
			$list = $CI->loop_model->get_list($model, $data, $limit, $offset, $orderby);//返回查询数据
			$arr = array();
			foreach($list as $key){
				$arr[] = $key;
			}
			return $arr;
		}
		else
		{
			return false;
		}
	}
}


/**
 * smarty获取单条信息
 * @param str $model 表名
 * @param array $data 参数
 * @param str $orderby 排序
 * return array
 */
if( ! function_exists('ym_view'))
{
	function ym_view($model, $data = array(), $orderby = '')
	{
		if(!empty($model))
		{
			$CI =& get_instance();
			$CI->load->model('loop_model');
			$row = $CI->loop_model->get_one($model, $data, $orderby);//返回查询数据
			return $row;
		}
		else
		{
			return false;
		}
	}
}

/**
 * smarty获取分页，静态的
 * @param str $model 表名
 * @param array $data 参数
 * @param int $pagesize 分页大小
 * @paran int $addnum 中奖页数量
 * return str
 */
if( ! function_exists('ym_page'))
{
	function ym_page($model, $data = array(), $pagesize = 20, $addnum = '')
	{
		if(!empty($model))
		{
			$CI =& get_instance();
			//计算页数start
			$segment = $this->uri->segment_array();
			$page_str = $segment[count($segment)];
			if(strpos($page_str, 'p') > 0)
			{
				$page = substr($page_str, 2);
				unset($segment[count($segment)]);
			}
			else
			{
				$page = 1;
			}
			//页数计算end
			$link = implode('/', $segment);
			$CI->load->model('loop_model');
			$total_rows = $CI->loop_model->get_list_num($model, $data);//返回添加下数据总数
			$pagecount = web_page($link, $total_rows, $page, $pagesize, $addnum);//调用分页
			return $pagecount;
		}
		else
		{
			return false;
		}
	}
}