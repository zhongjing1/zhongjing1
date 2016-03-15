<?php

class FeedbookAction extends CommonAction {
    function insert() {
        $name = $this->getActionName();
        $model = D($name);
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        //保存当前数据对象
        $list = $model->add();
        if ($list !== false) { //保存成功
           // $this->ajaxReturn($list,"你的反馈提交成功！我们会尽快和您联系。",1);
		   
	/*	   $title=$_POST['title'];
		   $body='姓名:'.$_POST['title'].'<br/>';
		   $body=$body.'姓名:'.$_POST['title'].'<br/>';
		   $body=$body.'公司:'.$_POST['comname'].'<br/>';
		   $body=$body.'联系方式:'.$_POST['phone'].'<br/>';
		   $body=$body.'内容:'.$_POST['remark'].'<br/>';
		   $to="service@china-top.cn";
		   $name= $title;
		   $subject="您收到一份来自".$title."的需求";
		   think_send_mail($to, $name, $subject, $body);*/
            $this->success('您的信息已经提交，我们会尽快和您联系！!',$_SERVER['HTTP_REFERER']);
        } else {
            //失败提示
            $this->ajaxReturn(0,"新增错误！",0);
        }
    }
	
	
  function insert2() {
        $name = $this->getActionName();
        $model = D($name);
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        //保存当前数据对象
        $list = $model->add();
        if ($list !== false) { //保存成功
           // $this->ajaxReturn($list,"你的反馈提交成功！我们会尽快和您联系。",1);
		   
		   $title=$_POST['title'];
		   $body='姓名:'.$_POST['title'].'<br/>';
		   $body=$body.'姓名:'.$_POST['title'].'<br/>';
		   $body=$body.'公司:'.$_POST['comname'].'<br/>';
		   $body=$body.'联系方式:'.$_POST['phone'].'<br/>';
		   $body=$body.'内容:'.$_POST['remark'].'<br/>';
		   $to="hr@china-top.cn";
		   $name= $title;
		   $subject="您收到一份来自".$title."的需求";
		   think_send_mail($to, $name, $subject, $body);
            $this->success('您的应聘已经提交，我们会尽快和您联系！!',$_SERVER['HTTP_REFERER']);
        } else {
            //失败提示
            $this->ajaxReturn(0,"新增错误！",0);
        }
    }	
	
  function insert3() {
        $name = $this->getActionName();
        $model = D($name);
        if (false === $model->create()) {
            $this->error($model->getError());
        }
        //保存当前数据对象
        $list = $model->add();
        if ($list !== false) { //保存成功
           // $this->ajaxReturn($list,"你的反馈提交成功！我们会尽快和您联系。",1);
		   
		   $title=$_POST['title'];
		   $body='姓名:'.$_POST['title'].'<br/>';
		   $body=$body.'姓名:'.$_POST['title'].'<br/>';
		   $body=$body.'公司:'.$_POST['comname'].'<br/>';
		   $body=$body.'联系方式:'.$_POST['phone'].'<br/>';
		   $body=$body.'内容:'.$_POST['remark'].'<br/>';
		   $to="be@china-top.cn";
		   $name= $title;
		   $subject="您收到一份来自".$title."的需求";
		   think_send_mail($to, $name, $subject, $body);
            $this->success('您的需求已经提交，我们会尽快和您联系！!',$_SERVER['HTTP_REFERER']);
        } else {
            //失败提示
            $this->ajaxReturn(0,"新增错误！",0);
        }
    }		
	
	
	public function logincheck(){
		$att1=$_POST['att1'];
		$title=$_POST['title'];
		if($att1==''){
		    $this->error("密码必须填写！",$_SERVER['HTTP_REFERER']);
			}
		if($title==''){
		    $this->error("用户名必须填写！",$_SERVER['HTTP_REFERER']);
			}
				
	    $map['title']=$title;
	    $map['att1']=$att1;
	    $map['status']=1;
        $cntcheckone=M('feedbook')->where($map)->count('id');	
			  if($cntcheckone>=1){
                $this->success('恭喜您! 登录成功 ! ',U('article/download'));
				  session('uname',$title);
				 }	else{
                $this->success('对不起! 登录失败 ! ',$_SERVER['HTTP_REFERER']);
					 }			
    }	
	
}