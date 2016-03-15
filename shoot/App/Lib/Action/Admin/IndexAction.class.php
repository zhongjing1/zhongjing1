<?php

class IndexAction extends CommonAction {
    public function index(){
      $this->checkUser();
      $addlist=D("category")->query("select * from __TABLE__ a where mid<>3 and (SELECT count(id) from __TABLE__ b where b.pid=a.id)=0");
      $this->addlist=$addlist;
        cookie('_currentUrl_', U("Index/main"));
      $this->display();
    }
    public function main(){
        $this->checkUser();
        $cat = D("Category")->where("1=1");
        $cat=$cat->order($cat->sortby);
        $list = $cat->select();

        $this->cat=$list;
        $this->display();
    }
	
	public function left(){
        $this->checkUser();
		 $cat=M('category')->where("ch=1 and pid=0")->order('ordernum asc')->select();
      $this->assign('cat',$cat);
	  
	  $cat2=M('category')->where('ch=2 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat2',$cat2);
			  
	  $cat3=M('category')->where('ch=3 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat3',$cat3);
			  	  
	  $cat4=M('category')->where('ch=4 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat4',$cat4);
	  
	  $cat5=M('category')->where('ch=5 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat5',$cat5);
	  
	  $cat6=M('category')->where('ch=6 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat6',$cat6);
	  
	  $cat7=M('category')->where('ch=7 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat7',$cat7);
	  
      $cat8=M('category')->where('ch=8 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat8',$cat8);	
	  	  
      $cat9=M('category')->where('ch=9 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat9',$cat9);	
	  
      $cat10=M('category')->where('ch=10 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat10',$cat10);		
	  
      $cat11=M('category')->where('ch=11 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat11',$cat11);	
	  
      $cat12=M('category')->where('ch=12 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat12',$cat12);	
	  
      $cat13=M('category')->where('ch=13 and pid=0')->order('ordernum asc')->select();
	  $this->assign('cat13',$cat13);		  
	  
	  
	  
      $cat100=M('category')->where("ch=100 and pid=0")->order('ordernum desc')->select();
      $this->assign('cat100',$cat100);
	  
      $cat101=M('category')->where("ch=101 and pid=0")->order('ordernum desc')->select();
      $this->assign('cat101',$cat101);
	  	  
	  $cat102=M('category')->where('ch=102 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat102',$cat102);
			  
	  $cat103=M('category')->where('ch=103 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat103',$cat103);
			  	  
	  $cat104=M('category')->where('ch=104 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat104',$cat104);
	  
	  $cat105=M('category')->where('ch=105 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat105',$cat105);
	  
	  $cat106=M('category')->where('ch=106 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat106',$cat106);
	  
	  $cat107=M('category')->where('ch=107 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat107',$cat107);
	  
      $cat108=M('category')->where('ch=108 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat108',$cat108);	
	  	  
      $cat109=M('category')->where('ch=109 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat109',$cat109);	
	  
      $cat110=M('category')->where('ch=110 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat110',$cat110);		
	  
      $cat111=M('category')->where('ch=111 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat111',$cat111);	
	  
      $cat112=M('category')->where('ch=112 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat112',$cat112);	
	  
      $cat113=M('category')->where('ch=113 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat113',$cat113);	
	  
	  
	  
	  
      $cat50=M('category')->where('ch=50 and pid=0')->order('ordernum desc')->select();
	  $this->assign('cat50',$cat50);		  
	  
	  	  
		
        $this->display();
    }
	
	public function top(){
        $this->checkUser();
        $this->display();
    }	
	
    public function verify() {
        $type	 =	 isset($_GET['type'])?$_GET['type']:'gif';
        import("@.ORG.Util.Image");
        Image::buildImageVerify(4,1,$type,48,28);
    }
    public function login() {
        if(!is_file( DATA_PATH.'sys.config.php')){
           savecache('config');
        }
        if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->display();
        }else{
            $this->redirect('Index/index');
        }
    }
	
    public function checkLogin() {
        if(empty($_POST['account'])) {
            $this->error('帐号错误！');
        }elseif (empty($_POST['password'])){
            $this->error('密码必须！');
        }elseif (empty($_POST['verify'])){
            $this->error('验证码必须！');
        }
        //生成认证条件
        $map            =   array();
        // 支持使用绑定帐号登录
        $map['account']	= $_POST['account'];
        $map["status"]	=	array('gt',0);
        if(session('verify') != md5($_POST['verify'])) {
            $this->error('验证码错误！');
        }
        import ( '@.ORG.Util.RBAC' );
        $authInfo = RBAC::authenticate($map);
        //使用用户名、密码和状态的方式进行认证
        if(false === $authInfo) {
            $this->error('帐号不存在或已禁用！');
        }else {
			 
            if($authInfo['password'] != pwdHash($_POST['password'])) {
                $this->error('密码错误！');
            }
            $_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['id'];
            $_SESSION['email']	=	$authInfo['email'];
            $_SESSION['loginUserName']		=	$authInfo['nickname'];
            $_SESSION['lastLoginTime']		=	$authInfo['last_login_time'];
            $_SESSION['login_count']	=	$authInfo['login_count'];
            if($authInfo['account']=='fccms') {
                $_SESSION['administrator']=true;
            }
            //保存登录信息
            $User	=	M('User');
            $ip		=	get_client_ip();
            $time	=	time();
            $data = array();
            $data['id']	=	$authInfo['id'];
            $data['last_login_time']	=	$time;
            $data['login_count']	=	array('exp','login_count+1');
            $data['last_login_ip']	=	$ip;
            $User->save($data);

            // 缓存访问权限
            RBAC::saveAccessList();
         //   $this->redirect(U("index/index"));
            $this->success('登录成功！',__URL__.'/index/');

        }
    }

    public function logout() {
         
        if(isset($_SESSION[C('USER_AUTH_KEY')])) {
            unset($_SESSION[C('USER_AUTH_KEY')]);
            unset($_SESSION);
            session_start();

            $this->success('登出成功！',__URL__.'/login/');
        }else {
            $this->error('已经登出！');
        }
    }
    protected function checkUser() {
        if(!isset($_SESSION[C('USER_AUTH_KEY')])) {
            $this->error('没有登录',U('index/login'));
        }
    }
    public function clearCache(){
        dir_delete(RUNTIME_PATH);
        $this->success('更新缓存成功!',cookie('_currentUrl_'));
    }

}