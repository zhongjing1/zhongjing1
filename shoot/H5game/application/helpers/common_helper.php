<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 自定义全局函数
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//开启调试
$CI = &get_instance();
$CI->output->enable_profiler(false);

/**
 ***************************************************************
 * curl请求操作
 ***************************************************************
 */

/**
 * curl以get方式请求
 */
if( ! function_exists('curl_get'))
{
    function curl_get($url)
    {
        //初始化curl
        $ch = curl_init();
        //设置超时
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        //运行curl
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}

/**
 * curl以post放上请求
 * @url 提交的地址
 * @data 提交数据
 */
if( ! function_exists('curl_post'))
{
    function curl_post($url, $data)
    {
        $ch = curl_init(); //初始化curl
        curl_setopt($ch, CURLOPT_URL, $url);//设置链接
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//设置是否返回信息
        //curl_setopt($ch, CURLOPT_HTTPHEADER, $header);//设置HTTP头
        curl_setopt($ch, CURLOPT_POST, 1);//设置为POST方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);//POST数据
        $res = curl_exec($ch);//接收返回信息
        curl_close($ch); //关闭curl链接
        return $res;
    }
}
/**
 ***************************************************************
 * smarty模板操作
 ***************************************************************
 */

/**
 * smarty 加载模板
 * @param str $tmp_name 模板地址
 */
if( ! function_exists('display'))
{
	function display($tmp_name = FALSE)
	{
		if($tmp_name !== FALSE)
		{
			$CI = &get_instance();
			$CI->load->library('my_smarty');
			$CI->my_smarty->display($tmp_name);
		}
	}
}

/**
 * smarty 加载变量
 * @param str $name  变量名
 * @param str $data  变量值
 */
if( ! function_exists('assign'))
{
	function assign($name = FALSE , $data = FALSE)
	{
		if($name !== FALSE)
		{
			$CI = &get_instance();
			$CI->load->library('my_smarty');
			$CI->my_smarty->assign($name , $data);
		}
	}
}


/**
 ***************************************************************
 * url操作
 ***************************************************************
 */
/**
 * 取得url分段
 * @pmram int $n 段数
 * @retun str
 */
if( ! function_exists('get_segment'))
{
	function get_segment($n = 1)
	{
		$CI = &get_instance();
		return $CI->uri->segment($n);
	}
}

/**
 * 得到当前页面的网址
 */
if( ! function_exists('get_now_url'))
{
	function get_now_url()
	{
        $pageURL = 'http';

        $pageURL .= "://";

        if ($_SERVER["SERVER_PORT"] != "80")
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
        }
        else
        {
            $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
        }
        return $pageURL;
        return urlencode($pageURL);
	}
}

/**
 * 返回错误信息json格式
 * @param str $info 提示信息
 * @param str $status 状态
 * @return json
 */
if ( ! function_exists('error_json'))
{
	function error_json($info = '信息错误' , $status = 'n')
	{
		if($info == 'y')
		{
			exit(json_encode(array('status'=>'y')));
		}
		else
		{
			exit(json_encode(array('info'=>$info,'status'=>$status)));
		}
	}
}

/**
 * json 编码
 *
 * 解决中文经过 json_encode() 处理后显示不直观的情况
 * 如默认会将“中文”变成"\u4e2d\u6587"，不直观
 * 如无特殊需求，并不建议使用该函数，直接使用 json_encode 更好，省资源
 * json_encode() 的参数编码格式为 UTF-8 时方可正常工作
 *
 * @param array|object $data
 * @return array|object
 */
if( ! function_exists('ch_json_encode')) {
    function ch_json_encode($data)
    {
        $ret = wphp_urlencode($data);
        $ret = json_encode($ret);
        return urldecode($ret);
    }
}

/**
 * 对数组和标量进行 urlencode 处理
 * 通常调用 wphp_json_encode()
 * 处理 json_encode 中文显示问题
 * @param array $data
 * @return string
 */
if( ! function_exists('wphp_urlencode')) {
    function wphp_urlencode($data)
    {
        if (is_array($data) || is_object($data)) {
            foreach ($data as $k => $v) {
                if (is_scalar($v)) {
                    if (is_array($data)) {
                        $data[$k] = urlencode($v);
                    } else if (is_object($data)) {
                        $data->$k = urlencode($v);
                    }
                } else if (is_array($data)) {
                    $data[$k] = wphp_urlencode($v); //递归调用该函数
                } else if (is_object($data)) {
                    $data->$k = wphp_urlencode($v);
                }
            }
        }
        return $data;
    }
}

/**
 * 提示信息框,适应手机端页面
 * @param str $msg 提示信息
 * @param str $url 跳转链接
 * @param int $outtime 提示页面停留时间
 *
 */
if( ! function_exists('msg'))
{
	function msg($msg = FALSE , $url = '-1' , $skip_time = '2000')
	{
		if($msg !== FALSE)
		{
			if($url == '-1' || $url == '')
			{
				$url_str = "history.back(-1)";
			}
			else
			{
				$url_str = "window.location.href='$url'";
			}
			$base_url = config_item('base_url');
            //url等于stop时不允许跳转
            if($url!='stop')
            {
                $skip_url = '<script language="javascript">setTimeout("'.$url_str.'",'.$skip_time.');</script>';
            }
            else
            {
                $skip_url = '';
            }
			echo <<<Eof
                <html>
					<head>
						<meta http-equiv="Content-Type" content="text/html; charset=uft-8"/>
						<title>提示信息</title>
						<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
					</head>
					<body>
						<script language="javascript" src="$base_url/public/js/jquery.js"></script>
						<script language="javascript" src="$base_url/public/js/layer/layer.js"></script>
						<script language="javascript">layer.msg("$msg");</script>
                        $skip_url
					</body>
                </html>
Eof;
			exit;
		}
	}
}

/**
 * 字符串加密解密
 * @param str $string 需要加密解密的字符串
 * @param str $operation 判断是加密还是解密:E:加密   D:解密
 */
if( ! function_exists('encrypt')) {
    function encrypt($string, $operation)
    {
        $key = md5($key);
        $key_length = strlen($key);
        $string = $operation == 'D' ? base64_decode($string) : substr(md5($string . $key), 0, 8) . $string;
        $string_length = strlen($string);
        $rndkey = $box = array();
        $result = '';
        for ($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($key[$i % $key_length]);
            $box[$i] = $i;
        }
        for ($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }
        for ($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }
        if ($operation == 'D') {
            if (substr($result, 0, 8) == substr(md5(substr($result, 8) . $key), 0, 8)) {
                return substr($result, 8);
            } else {
                return '';
            }
        } else {
            return str_replace('=', '', base64_encode($result));
        }
    }
}

/**
 * 缓存操作
 * @param str $type
 * @param str $key
 * @param str $value
 * @param int $times
 */
if( ! function_exists('cache')) {
    function cache($type = 'set', $key = false, $value = '', $times = '600')
    {
        if($key!==false)
        {
            $key = md5($key);
            if(config_item('memcache'))
            {
                //Memcache缓存
                $memcache = new Memcache; //创建一个memcache对象
                $memcache->connect('localhost', 11211); //连接Memcached服务器
                if($type=='set')
                {
                    $memcache->set($key, $value, 0, $times);
                }
                elseif($type=='get')
                {
                    return $memcache->get($key);
                }
                elseif($type=='delete')
                {
                    $memcache->delete($key);
                }
            }
            else
            {
                //文件缓存
                $file = 'cache/' . $key . '.txt';
                if ($type == 'set')
                {
                    $cache_arr = array('value'=>$value,'time'=>$times);
                    @file_put_contents($file, serialize($cache_arr));
                }
                elseif($type == 'get')
                {
                    $cache_arr = @unserialize(file_get_contents($file));
                    if((@filemtime($file) + $cache_arr['time']) < config_item('sys_time'))
                    {
                        return '';
                    }
                    else
                    {
                        return $cache_arr['value'];
                    }
                }
                elseif($type == 'delete')
                {
                    @unlink($file);
                }
            }
        }
    }
}

/**
 * 生成一个随机数（随机数里面没有0放置在int类型时首位为0不能保存）
 * @param str $type
 * @param int $nums
 */
if( ! function_exists('get_rand_num'))
{
	function get_rand_num($type = 'str', $nums = '6')
	{


		if($type == 'str')
		{
			$str="abcdefghjkmnpqrstuvwsyzABCDEFGHJKMNPQRSTUVWSYZ123456789";
		}
		else
		{
			$str="123456789";
		}
		$rand_num = '';
		for($i=0;$i<$nums;$i++)
		{
			$rand_num .= substr($str , rand(0,strlen($str)-1) , 1);
		}
		return $rand_num;
	}
}

/**
 * 截取中文字符串
 * @param str $string 要截取的字符串
 * @param int $length 长度
 * @param str $dian 超出后显示
 */
if( ! function_exists('cn_substr')) {
	function cn_substr($string, $length, $dian = '')
	{
		preg_match_all("/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/", $string, $info);
		$j = '';
		$wordscut = '';
		for ($i = 0; $i < count($info[0]); $i++) {
			$wordscut .= $info[0][$i];
			$j = ord($info[0][$i]) > 127 ? $j + 2 : $j + 1;
			if ($j > $length - 3) {
				return $wordscut . $dian;
			}
		}
		return join('', $info[0]);
	}
}


/**
 * 后台分页
 * @param str $page_link 链接
 * @param int $allnum 总记录数
 * @param int $page 总当前页数
 * @param int $pagesize 分页大小
 * @param int $addnum 中间显示数量
 * @param int $skip 是否跳转
 */
if( ! function_exists('page')) {
	function page($page_link = FALSE, $allnum, $page = '1', $pagesize = '20', $addnum = '5',$skip = '1')
	{
		$maxpage = ceil($allnum / $pagesize);//总页数
		if(empty($page)) $page = 1;//当前页数
		if(strpos($page_link, '?') > 0)
		{
			$link = $page_link;
		}
		else
		{
			$link = $page_link . '?';
		}
		$pagecount = '';
		$page <= 1 ? $uppage = 1 : $uppage = $page - 1;//第一页
		$pagecount .= <<<end
			<div class="page"><a class="page_one" href="$link&page=1">首页</a>
end;
		$pagecount .= <<<end
			<a class="page_prev" href="$link&page=$uppage"><<上一页</a>
end;
		/*中间显示数量控制*/
		if($addnum<1)
		{
			if($page <= $addnum)
			{
				$start = 1;
				$max = $page + $addnum;
			}
			elseif($page > ($maxpage - $addnum))
			{
				$start = $page - $addnum;
				$max = $maxpage;
			}
			else
			{
				$start = $page - $addnum;
				$max = $page + $addnum;
			}
			if ($max > $maxpage)$max = $maxpage;
			/*中间显示数量控制结束*/
			for ($i = $start; $i <= $max; $i++) {
				if($page == $i)
				{
					$pagecount .= <<<end
					<a class="page_now" href="$link&page=$i">$i</a>
end;
				}
				else
				{
					$pagecount .= <<<end
					<a href="$link&page=$i">$i</a>
end;
				}
			}
		}
		$page >= $maxpage ? $downpage = $maxpage : $downpage = $page + 1;//最后一页
		$pagecount .= <<<end
			<a class="page_next" href="$link&page=$downpage">下一页>></a>
			<a class="page_last" href="$link&page=$maxpage">尾页</a>
end;
		if($skip==1)
		{
			$pagecount .= <<<end
			共$allnum 条,共$maxpage 页，转到<input size="5" type="text" id="skip_page_nums" name="current" class="input_page" />页<button type="button" class="sub_pages" onclick="skip_page()">确定</button>
			</div>
			<script language="javascript">
				function skip_page(){
					var skip_page_num = document.getElementById("skip_page_nums").value
					if(skip_page_num>$maxpage || skip_page_num<1){alert("页码超出范围，请重新填写。"); return false;}
					window.location.href="$link&page="+skip_page_num
				}
			</script>
end;
		}
		return $pagecount;
	}
}

/**
 * 前端分页
 * @param str $page_link 链接
 * @param int $allnum 总记录数
 * @param int $page 总当前页数
 * @param int $pagesize 分页大小
 * @param int $addnum 中间显示数量
 * @param int $skip 是否跳转
 */
if( ! function_exists('web_page')) {
	function web_page($page_link = FALSE, $allnum, $page = '1', $pagesize = '20', $addnum = '5',$skip = '1')
	{
		$maxpage = ceil($allnum / $pagesize);//总页数
		if(empty($page)) $page = 1;//当前页数
		if(strpos($page_link, '?') > 0)
		{
			$link = $page_link;
		}
		else
		{
			$link = $page_link . '?';
		}
		$pagecount = '';
		$page <= 1 ? $uppage = 1 : $uppage = $page - 1;//第一页
		$pagecount .= <<<end
			<a class="page_prev" href="$link&page=$uppage"><<上一页</a>
end;
		$page >= $maxpage ? $downpage = $maxpage : $downpage = $page + 1;//最后一页
		$pagecount .= <<<end
			<a class="page_next" href="$link&page=$downpage">下一页>></a>
end;
		return $pagecount;
	}
}

/**
 ***************************************************************
 * 文件加载操作
 ***************************************************************
 */
/**
 * 加载编辑器js
 */
if( ! function_exists('load_editer_js'))
{
	function load_editer_js()
	{
		$base_url = base_url();
		echo <<<Eof
                <link href="$base_url/public/umeditor/themes/default/css/umeditor.css" type="text/css" rel="stylesheet">
                <!-- 配置文件 -->
                <script type="text/javascript" src="$base_url/public/umeditor/umeditor.config.js"></script>
                <!-- 编辑器源码文件 -->
                <script type="text/javascript" src="$base_url/public/umeditor/umeditor.min.js"></script>
Eof;

	}
}

/**
 * 加载一个编辑器
 * @param str $link 填充数据
 * @param str $name 名称
 * @param int $initialFrameWidth 宽度
 * @param int $initialFrameHeight 高度
 */
if( ! function_exists('load_editer'))
{
	function load_editer($name = 'desc', $data = FALSE, $initialFrameWidth = 700, $initialFrameHeight = 300)
	{
		echo <<<Eof
                <!-- 加载编辑器的容器 -->
                <script id="$name" name="$name" type="text/plain">$data</script>
                <!-- 实例化编辑器 -->
                <script type="text/javascript">
                    var um = UM.getEditor('$name', {
						initialFrameWidth :$initialFrameWidth,
						initialFrameHeight :$initialFrameHeight,
					});
                </script>
Eof;

	}
}

/**
 * 加载js
 * @param str $file_name 文件名
 * @param str $file 路径
 */
if( ! function_exists('load_js'))
{
	function load_js($file_name = FALSE, $file = 'public')
	{
		if($file_name!==false)
		{
			//根据不同file加载不同目录
			switch($file)
			{
				case 'public':$file = base_url().'public/js';break;
				case 'manager':$file = base_url().'views/manager/js';break;
				case 'default':$file = base_url().'views/default/js';break;
			}
			echo <<<Eof
                <script type="text/javascript" src="$file/$file_name.js"></script>
Eof;
		}
	}
}

/**
 * 加载css
 * @param str $file_name 文件名
 * @param str $file 路径
 */
if( ! function_exists('load_css'))
{
	function load_css($file_name = FALSE, $file = 'public')
	{
		if($file_name!==false)
		{
			//根据不同file加载不同目录
			switch($file)
			{
				case 'public':$file = base_url().'public/css';break;
				case 'manager':$file = base_url().'views/manager/css';break;
				case 'default':$file = base_url().'views/default/css';break;
			}
			echo <<<Eof
                <link href="$file/$file_name.css" type="text/css" rel="stylesheet">
Eof;
		}
	}
}

/**
 * 加载图片
 * @param str $file_name 文件名
 * @param str $file 路径
 * @param int $width 宽
 * @param int $height 高
 */
if( ! function_exists('load_img'))
{
	function load_img($file_name = FALSE, $file = 'public')
	{
		if($file_name!==false)
		{
			//根据不同file加载不同目录
			switch($file)
			{
				case 'public':$file = base_url().'public/images';break;
				case 'manager':$file = base_url().'views/manager/images';break;
				case 'default':$file = base_url().'views/default/images';break;
			}
			echo $file.'/'.$file_name;
		}
	}
}