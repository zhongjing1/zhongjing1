<?php
// +----------------------------------------------------------------------
// | ThinkPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2007 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id: common.php 2601 2012-01-15 04:59:14Z liu21st $

//公共函数
function toDate($time, $format = 'Y-m-d H:i:s') {
	if (empty ( $time )) {
		return '';
	}
	$format = str_replace ( '#', ':', $format );
	return date ($format, $time );
}
function getBool($status) {
    switch ($status) {
        case 0 :
            $showText = '否';
            break;
        default :
            $showText = '是';
    }
    return $showText;

}

function getStatus($status, $imageShow = true) {
	switch ($status) {
		case 0 :
			$showText = '禁用';
			$showImg = '<IMG SRC="__PUBLIC__/images/locked.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="禁用">';
			break;
		case 2 :
			$showText = '待审';
			$showImg = '<IMG SRC="__PUBLIC__/images/prected.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="待审">';
			break;
		case - 1 :
			$showText = '删除';
			$showImg = '<IMG SRC="__PUBLIC__/images/del.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="删除">';
			break;
		case 1 :
		default :
			$showText = '正常';
			$showImg = '<IMG SRC="__PUBLIC__/images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="正常">';

	}
	return ($imageShow === true) ?  $showImg  : $showText;

}
function getCheck($id,$groupId) {
    $list=M()->query('select b.id,b.title,b.name from '.C("DB_PREFIX").'access as a ,'.C("DB_PREFIX").'node as b where a.node_id=b.id and  b.pid=0 and a.role_id='.$groupId.' and a.node_id='.$id.' ');
    $str="";

    if(($list)){
        $str="checked='checked'";
    }
    return $str;
}
function getUserCheck($id,$groupId) {
    $list=M()->query('select b.id,b.nickname,b.email from '.C("DB_PREFIX").'role_user as a ,'.C("DB_PREFIX").'user as b where a.user_id=b.id and  a.role_id='.$groupId.' and b.id='.$id.' ');
    $str="";

    if(($list)){
        $str="checked='checked'";
    }
    return $str;
}
function getName($id,$name='category',$key='title') {
    $cat = D( $name );
    $str=$cat->where("id=".$id)->getField($key);
    return $str;
}

function getCount($mid,$catid){
     $name=getName($mid,"mode","name");

     $str=1;
    if($name!="Sinpage"){
        $str=D($name)->where("catid=$catid")->count(id);
    }

    return $str;
}
function getCateCount($id){
    $model=D("category");
    $count=$model->where("pid=$id")->count("id");
    return $count;
}
function savecache($name = '') {
    $Model = M ( $name );
    $list = $Model->where("groupid=1")->select();
    $data=$sysdata=$temp=$memberconfig=array();
    foreach($list as $key=>$r) {
        $sysdata[$r['varname']]=$r['value'];
    }

    F('sys.config',$sysdata);
}

function getUrl($name){
    $cat = D( "category" );
    $str='123';
    if(is_numeric($name)){
    $str=$cat->where("id=".$name)->getField("url");
    }else{
        $str=$cat->where("title='".$name."'")->getField("url");
    }

    return U($str);
}

function getCateKong($name){
    $list=explode(' ',$name);
    $val='';
    $count=count($list);
    if($count>2){
    $val="|".str_repeat("--", $count-2);
    }
    return $val;
}
function getRoleName($id){
    $role=D("Role");
    $role_user=D("Role_user");
    $role_id=$role_user->getFieldByUser_id($id,'role_id');
    $role_name=$role->getFieldById($role_id,'name');
    return $role_name;
}

function getTable($where='1=1',$name='Category',$key='title') {
    $cat =D( $name)->where($where);
    $cat=$cat->order($cat->sortby);

    $list = $cat->getField("id,".$key);

    return $list;
}
function getTable1() {
    $cat = D('category');
    $list=$cat->getField("id,title");
    return $list;
}

function getNodeGroupName($id) {
	if (empty ( $id )) {
		return '未分组';
	}
	if (isset ( $_SESSION ['nodeGroupList'] )) {
		return $_SESSION ['nodeGroupList'] [$id];
	}
	$Group = D ( "Group" );
	$list = $Group->getField ( 'id,title' );
	$_SESSION ['nodeGroupList'] = $list;
	$name = $list [$id];
	return $name;
}

function showStatus($status, $id) {
	switch ($status) {
		case 0 :
			$info = '<a href="javascript:resume(' . $id . ')">恢复</a>';
			break;
		case 2 :
			$info = '<a href="javascript:pass(' . $id . ')">批准</a>';
			break;
		case 1 :
			$info = '<a href="javascript:forbid(' . $id . ')">禁用</a>';
			break;
		case - 1 :
			$info = '<a href="javascript:recycle(' . $id . ')">还原</a>';
			break;
	}
	return $info;
}


function getGroupName($id) {
	if ($id == 0) {
		return '无上级组';
	}
	if ($list = F ( 'groupName' )) {
		return $list [$id];
	}
	$dao = D ( "Role" );
	$list = $dao->select( array ('field' => 'id,name' ) );
	foreach ( $list as $vo ) {
		$nameList [$vo ['id']] = $vo ['name'];
	}
	$name = $nameList [$id];
	F ( 'groupName', $nameList );
	return $name;
}

function pwdHash($password, $type = 'md5') {
    $code=C("ADMIN_ACCESS");
    if(empty($code)){
        $code=getName(8,"config","value");
    }
	return hash ( $type, $password.$code);
}

function template_file($module='',$path='',$ext='html'){

    $path= $path ? $path : TMPL_PATH.'Home/'.C("DEFAULT_THEME").'/';
    $tempfiles = dir_list($path,$ext);
    foreach ($tempfiles as $key=>$file){
        $dirname = basename($file);
        if($module){
            if(strstr($dirname,$module.'_')) {
                $arr[$key]['name'] =  substr($dirname,0,strrpos($dirname, '.'));
                $arr[$key]['value'] =  substr($arr[$key]['name'],strpos($arr[$key]['name'], '_')+1);
                $arr[$key]['filename'] = $dirname;
                $arr[$key]['filepath'] = $file;
            }
        }else{
            $arr[$key]['name'] = substr($dirname,0,strrpos($dirname, '.'));
            $arr[$key]['value'] =  substr($arr[$key]['name'],strpos($arr[$key]['name'], '_')+1);
            $arr[$key]['filename'] = $dirname;
            $arr[$key]['filepath'] = $file;
        }
    }
    return  $arr;
}
function dir_list($path, $exts = '', $list= array()) {
    $path = dir_path($path);
    $files = glob($path.'*');
    foreach($files as $v) {
        $fileext = fileext($v);
        if (!$exts || preg_match("/\.($exts)/i", $v)) {
            $list[] = $v;
            if (is_dir($v)) {
                $list = dir_list($v, $exts, $list);
            }
        }
    }
    return $list;
}
function fileext($filename) {
    return strtolower(trim(substr(strrchr($filename, '.'), 1, 10)));
}
function dir_path($path) {
    $path = str_replace('\\', '/', $path);
    if(substr($path, -1) != '/') $path = $path.'/';
    return $path;
}
function dir_delete($dir) {
    $dir = dir_path($dir);
    if (!is_dir($dir)) return FALSE;
    $list = glob($dir.'*');
    foreach((array)$list as $v) {
        is_dir($v) ? dir_delete($v) : @unlink($v);
    }
    return @rmdir($dir);
}
function strcut($sourcestr,$cutlength,$suffix='...')
{
    $str_length = strlen($sourcestr);
    if($str_length <= $cutlength) {
        return $sourcestr;
    }
    $returnstr='';
    $n = $i = $noc = 0;
    while($n < $str_length) {
        $t = ord($sourcestr[$n]);
        if($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
            $i = 1; $n++; $noc++;
        } elseif(194 <= $t && $t <= 223) {
            $i = 2; $n += 2; $noc += 2;
        } elseif(224 <= $t && $t <= 239) {
            $i = 3; $n += 3; $noc += 2;
        } elseif(240 <= $t && $t <= 247) {
            $i = 4; $n += 4; $noc += 2;
        } elseif(248 <= $t && $t <= 251) {
            $i = 5; $n += 5; $noc += 2;
        } elseif($t == 252 || $t == 253) {
            $i = 6; $n += 6; $noc += 2;
        } else {
            $n++;
        }
        if($noc >= $cutlength) {
            break;
        }
    }
    if($noc > $cutlength) {
        $n -= $i;
    }
    $returnstr = substr($sourcestr, 0, $n);


    if ( substr($sourcestr, $n, 6)){
        $returnstr = $returnstr . $suffix;//超过长度时在尾处加上省略号
    }
    return $returnstr;
}
function IP($ip='',$file='UTFWry.dat') {
    import("@.ORG.IpLocation");
    $iplocation = new IpLocation($file);
    $location = $iplocation->getlocation($ip);
    return $location;
}
function dir_create($path, $mode = 0777) {
	if(is_dir($path)) return TRUE;
	$ftp_enable = 0;
	$path = dir_path($path);
	$temp = explode('/', $path);
	$cur_dir = '';
	$max = count($temp) - 1;
	for($i=0; $i<$max; $i++) {
		$cur_dir .= $temp[$i].'/';
		if (@is_dir($cur_dir)) continue;
		@mkdir($cur_dir, 0777,true);
		@chmod($cur_dir, 0777);
	}
	return is_dir($path);
}

function dir_copy($fromdir, $todir) {
	$fromdir = dir_path($fromdir);
	$todir = dir_path($todir);
	if (!is_dir($fromdir)) return FALSE;
	if (!is_dir($todir)) dir_create($todir);
	$list = glob($fromdir.'*');
	if (!empty($list)) {
		foreach($list as $v) {
			$path = $todir.basename($v);
			if(is_dir($v)) {
				dir_copy($v, $path);
			} else {
				copy($v, $path);
				@chmod($path, 0777);
			}
		}
	}
    return TRUE;
}


function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){
    $config = C('THINK_EMAIL');
    vendor('PHPMailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
    $mail             = new PHPMailer(); //PHPMailer对象
    $mail->CharSet    = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();  // 设定使用SMTP服务
    $mail->SMTPDebug  = 0;                     // 关闭SMTP调试功能
                                               // 1 = errors and messages
                                               // 2 = messages only
    $mail->SMTPAuth   = true;                  // 启用 SMTP 验证功能
    $mail->SMTPSecure = 'ssl';                 // 使用安全协议
    $mail->Host       = $config['SMTP_HOST'];  // SMTP 服务器
    $mail->Port       = $config['SMTP_PORT'];  // SMTP服务器的端口号
    $mail->Username   = $config['SMTP_USER'];  // SMTP服务器用户名
    $mail->Password   = $config['SMTP_PASS'];  // SMTP服务器密码
    $mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);
    $replyEmail       = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];
    $replyName        = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject    = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to, $name);
    if(is_array($attachment)){ // 添加附件
        foreach ($attachment as $file){
            is_file($file) && $mail->AddAttachment($file);
        }
    }
    return $mail->Send() ? true : $mail->ErrorInfo;
 }
//生成随机数(1数字,0字母数字组合)
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' ? mt_srand ( ( double ) microtime () * 1000000 ) : mt_srand ();
	$seed = base_convert ( md5 ( print_r ( $_SERVER, 1 ) . microtime () ), 16, $numeric ? 10 : 35 );
	$seed = $numeric ? (str_replace ( '0', '', $seed ) . '012340567890') : ($seed . 'zZ' . strtoupper ( $seed ));
	$hash = '';
	$max = strlen ( $seed ) - 1;
	for($i = 0; $i < $length; $i ++) {
		$hash .= $seed [mt_rand ( 0, $max )];
	}
	return $hash;
}

function savelocalfile($filearr, $savepath='', $thumb='', $arrext='',  $save_rule='', $objfile='', $havethumb=1) {

	if(empty($filearr) || empty($savepath)){
		return array('error'=>'请选择要上传的文件！');
	}
	$patharr = $deault = array();
	//debug 传入参数
	$filename = strip_tags($filearr['name']);
	$tmpname = str_replace('\\', '\\\\', $filearr['tmp_name']);
	//debug 文件后缀
	$ext = fileext($filename) == 'gif' ? 'jpg': fileext($filename);
	$patharr['name'] = addslashes($filename);
	$patharr['type'] = $ext;
	$patharr['size'] = $filearr['size'];
	
	
	if($patharr['size']/1024 > 20480){
		return array('error'=>'您上传的图片大小是：'.round($patharr['size']/1024).'文件不超过20480KB');
	}
	

	//debug 文件名
	if($objfile) {
		$newfilename = $objfile;
		$isimage = 0;
		$patharr['file'] = $patharr['thumb'] = $objfile;
		
	} else {
		if(empty($arrext)) $arrext = array('jpg', 'jpeg', 'gif', 'png', 'rar', 'doc', 'pdf');
			if(in_array($ext, $arrext)) {
		/*	$imageinfo = @getimagesize($tmpname);
			list($width, $height, $type) = !empty($imageinfo) ? $imageinfo : array('', '', '');
			if(!in_array($type, array(1,2,3,6,13))) {
				return $deault;
			}*/
			$isimage = 1;
		} else {
			//$isimage = 0;
			//$ext = 'attach';
			
			return array('error'=>'您上传的文件类型不对！');
		}
		//文件名称
		if(empty($save_rule)){
			$filemain = date('YmdHis').random(4);
		}else{
			$filemain = $save_rule;
		}
		//得到存储目录
		$dirpath = getattachdir($savepath);
		$patharr['filename'] = $filemain.'.'.$ext;
		$patharr['file'] = $dirpath.'/'.$filemain.'.'.$ext;
		$patharr['path'] = $dirpath.'/';
		//上传
		$newfilename = $patharr['file'];

	}
	if(@copy($tmpname, $newfilename)) {
	} elseif((function_exists('move_uploaded_file') && @move_uploaded_file($tmpname, $newfilename))) {
	} elseif(@rename($tmpname, $newfilename)) {
	} else {
		return $deault;
	}
	@unlink($tmpname);
	
	//debug 缩略图水印
/*	if($isimage && empty($objfile)) {
		//缩略图
		if($havethumb == 1) {
			// 如果$thumb是字符串			
			if(is_array($thumb)){
				$arrThumbWidth = explode(',',$thumb['width']);
				$arrThumbHeight = explode(',',$thumb['height']);
				foreach($arrThumbWidth as $key => $item){
					 $patharr['img_'.$item.'_'.$arrThumbHeight[$key]] = makethumb($patharr['file'],array($item,$arrThumbHeight[$key]));
				}
			}
		}
	}*/
	return $patharr;
}


function getattachdir($dirpatharr) {
	$dirs =$_SERVER['DOCUMENT_ROOT'];
	$subarr = array();
	$dirarr = explode('/', $dirpatharr);
	foreach ($dirarr as $value) {
		$dirs .= '/'.$value;
		if(smkdir($dirs)) {
			$subarr[] = $value;
		} else {
			break;
		}
	}
	return implode('/', $subarr);
}

function smkdir($dirname, $ismkindex=1){
	$mkdir = false;
		if(!is_dir($dirname)) {
		if(@mkdir($dirname, 0777)) {
			if($ismkindex) {
				@fclose(@fopen($dirname.'/index.htm', 'w'));
			}
			$mkdir = true;
		}
	} else {
		$mkdir = true;
	}
	return $mkdir;
}

//utf-8截取
function getsubstrutf8($string, $start = 0, $sublen, $append = true) {
	$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
	preg_match_all ( $pa, $string, $t_string );
	if (count ( $t_string [0] ) - $start > $sublen && $append == true) {
		return join ( '', array_slice ( $t_string [0], $start, $sublen ) ) . "...";
	} else {
		return join ( '', array_slice ( $t_string [0], $start, $sublen ) );
	}
}


?>