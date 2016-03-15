<?php

class SinpageAction extends CommonAction {

    public function index(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=101 and mid in (1,3,4) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }
        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
	
	
    public function yinsi(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where('  id in (301,302) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }
        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }	
	
	
	
	    public function caifu(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=102 and mid in (1,3,4) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }
        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
	
	
	
	    public function zichan(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=104 and mid in (1,3,4) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }
        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
		
		
		
		
    public function fuwu(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=103 and mid in (1,3,4) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }
        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }	
	
	
	
	
	    public function kefu(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=106 and mid in (1,3,4) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }
        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
		
	
	
	

	
	
    public function partners(){
         //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        $id = $_REQUEST ["catid"];
		if(!empty($_GET['catid'])){
            $catid=$_GET['catid'];
            $this->assign("catid",$catid);
            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		$map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
		$map['catid']=106;
        $model = D('link');
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
		
		$catenews=D("Category")->where(' ch=5 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $this->assign("catenews",$catenews);
        $this->assign("id",$id);
        $this->assign("cattitle",$cat["title"]);
        $this->assign("seo",$seo);
		 //$zhengshu=M('link')->where('catid=46')->select();
         //$this->assign('zhengshu',$zhengshu);
	    $this->display();
	    return;
		 
    }	
		
	
    public function link(){
         //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        $id = $_REQUEST ["catid"];
		if(!empty($_GET['catid'])){
            $catid=$_GET['catid'];
            $this->assign("catid",$catid);
            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		$map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
		$map['catid']=$id;
        $model = D('link');
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
		$catabout=D("Category")->where(' ch=3 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $this->assign("catabout",$catabout);
        $this->assign("id",$id);
        $this->assign("cattitle",$cat["title"]);
         $this->assign("seo",$seo);
		 //$zhengshu=M('link')->where('catid=46')->select();
         //$this->assign('zhengshu',$zhengshu);
         $this->display();
         return;
		 
    }		
		
		
	

		
  public function register(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);
		$catabout=D("Category")->where(' ch=11 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
	
	
	
	
	
  public function order(){
		if($_SESSION['uname']==''){
		$this->error('对不起，您还没有登录，请先登录，谢谢！',U('sinpage/login'));
		}	
        $model = D("Sinpage");
        $catid = $_REQUEST ["catid"];
        $proid = $_REQUEST ["id"];
        $vo = $model->getById($id);
		$pvo=M("article")->getById($proid);
		
        $this->assign('row', $vo);
        $this->assign('pvo', $pvo);
				
		$catabout=D("Category")->where(' ch=11 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("catid",$catid);
		
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }			
		
		
		
		
 public function login(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);
		$catabout=D("Category")->where(' ch=11 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
				
		
		
	
  public function business(){
		
		
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=4 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }	
	
	
  public function gzreg(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);
		$catabout=D("Category")->where(' ch=4 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }	
	
  public function reg(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);
		$catabout=D("Category")->where(' ch=5 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }	
		

	
	
	public function contact(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);

		$catabout=D("Category")->where(' ch=111 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
	
	
	  public function guestbook(){
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('row', $vo);
		$catabout=D("Category")->where(' ch=11 and mid in (1,3,4,5) ')->order('ordernum asc')->select();
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($_GET['catid'])){

            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            }
        }

        $this->assign("id",$id);
        $this->assign("catabout",$catabout);
        $this->assign("seo",$seo);
        $this->display();
    }
		
	
	
			
	var $aa='';
    var $listRows=18;
	
	 public function kehu() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        $id = $_REQUEST ["catid"];
		if(!empty($_GET['catid'])){
            $catid=$_GET['catid'];
            $this->assign("catid",$catid);
            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		$map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
		$map['catid']=46;
        $model = D('link');
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
		
		
		$catabout=D("Category")->where(' ch=1 and mid in (1,3,4) ')->select();
        $this->assign("catabout",$catabout);
        $this->assign("id",$id);
         $this->assign("seo",$seo);
		 //$zhengshu=M('link')->where('catid=46')->select();
         //$this->assign('zhengshu',$zhengshu);
         $this->display();
         return;
		 
    }
 public function video() {
	    $listRows=10;
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        $id = $_REQUEST ["catid"];
		if(!empty($_GET['catid'])){
            $catid=$_GET['catid'];
            $this->assign("catid",$catid);
            $cat=D("Category")->find($_GET["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		$map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
		$map['catid']=75;
        $model = D('article');
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
		$catabout=D("Category")->where(' ch=1 and mid in (1,3,4) ')->select();
        $this->assign("catabout",$catabout);
        $this->assign("id",$id);
         $this->assign("seo",$seo);
		 //$zhengshu=M('link')->where('catid=46')->select();
         //$this->assign('zhengshu',$zhengshu);
         $this->display();
         return;
		 
    }		
		
	
	
}