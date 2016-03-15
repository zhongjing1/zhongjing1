<?php

class ArticleAction extends CommonAction {
   function _initialize(){
        parent::_initialize();
		}	
		
    var $aa='';
    var $listRows=10;
    public function index() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
		$catid=$_GET['catid'];
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
		
		$catenews=D("Category")->where(' ch=110 ')->order('ordernum asc')->select();
        $this->assign("catenews",$catenews);
        $this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
        $map["ch"]=110;
		if($catid!='') $map['catid']=$catid;
        $this->assign("catid",$catid);
		
		$cattitle=$cat["title"];
		if($cattitle=="") $cattitle="All";
		
        $this->assign("cattitle",$cattitle);
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }
	
	
		
		
	  function read() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
		$catid=$vo["catid"];

        $cat=D("Category")->find($catid);
        $cattitle=$cat["title"];

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($vo["catid"])){
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }



		$catenews=D("Category")->where(' ch=110 ')->select();
        $this->assign("catenews",$catenews);
		
		
        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		
		
		$articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=110 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=110  and catid=".$strcatid."";
			}else{
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=110 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and  ch=110 ";	
				}
		
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);		
		
		

        $this->assign("catid",$catid);
        $this->assign("cattitle",$cattitle);
        $this->assign("seo",$seo);
        $this->assign('row', $vo);
        $this->display();
    }
	
	
    public function videos() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
		$catid=$_GET['catid'];
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
		
		$catenews=D("Category")->where(' ch=2 ')->order('ordernum asc')->select();
        $this->assign("catenews",$catenews);
        $this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
        $map["ch"]=2;
		if($catid!='') $map['catid']=$catid;
        $this->assign("catid",$catid);
		
		$cattitle=$cat["title"];
		if($cattitle=="") $cattitle="全部";
		
        $this->assign("cattitle",$cattitle);
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }
	
	
		
		
	  function videos_read() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
		$catid=$vo["catid"];

        $cat=D("Category")->find($catid);
        $cattitle=$cat["title"];

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($vo["catid"])){
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		

		$catenews=D("Category")->where(' ch=2 ')->select();
        $this->assign("catenews",$catenews);
		
        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		
		$articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=2 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=2  and catid=".$strcatid."";
			}else{
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=2 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and  ch=2 ";	
				}
		
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);		
		
		

        $this->assign("catid",$catid);
        $this->assign("cattitle",$cattitle);
        $this->assign("seo",$seo);
        $this->assign('row', $vo);
        $this->display();
    }



   public function products() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
		$catid=$_GET['catid'];
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
		
		$catenews=D("Category")->where(' ch=5 ')->order('ordernum asc')->select();
        $this->assign("catenews",$catenews);
        $this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
        $map["ch"]=5;
		if($catid!='') $map['catid']=$catid;
        $this->assign("catid",$catid);
		
		$cattitle=$cat["title"];
		if($cattitle=="") $cattitle="全部";
		
        $this->assign("cattitle",$cattitle);
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }
	
	
		
		
	  function products_read() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
		$catid=$vo["catid"];

        $cat=D("Category")->find($catid);
        $cattitle=$cat["title"];

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($vo["catid"])){
			$vocatid=$vo["catid"];
			$relist=M("article")->where("catid=$vocatid")->select();
            $this->assign("relist",$relist);			
			
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		

		$catenews=D("Category")->where(' ch=5 ')->select();
        $this->assign("catenews",$catenews);
		
        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		
		$articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=5 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=5  and catid=".$strcatid."";
			}else{
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=5 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and  ch=5 ";	
				}
		
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);		
		
		

        $this->assign("catid",$catid);
        $this->assign("cattitle",$cattitle);
        $this->assign("seo",$seo);
        $this->assign('row', $vo);
        $this->display();
    }



  public function photo() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
		$catid=$_GET['catid'];
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
		
		$catenews=D("Category")->where(' ch=5 ')->order('ordernum asc')->select();
        $this->assign("catenews",$catenews);
        $this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
        $map["ch"]=5;
		if($catid!='') $map['catid']=$catid;
        $this->assign("catid",$catid);
		
		$cattitle=$cat["title"];
		if($cattitle=="") $cattitle="全部";
		
        $this->assign("cattitle",$cattitle);
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }
	
	
		
		
	  function photo_read() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
		$catid=$vo["catid"];

        $cat=D("Category")->find($catid);
        $cattitle=$cat["title"];

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($vo["catid"])){
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		

		$catenews=D("Category")->where(' ch=5 ')->select();
        $this->assign("catenews",$catenews);
		
        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		
		$articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=5 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=5  and catid=".$strcatid."";
			}else{
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=5 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and  ch=5 ";	
				}
		
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);		
		
		

        $this->assign("catid",$catid);
        $this->assign("cattitle",$cattitle);
        $this->assign("seo",$seo);
        $this->assign('row', $vo);
        $this->display();
    }











	
  public function pruducts() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
		$catid=$_GET['catid'];
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
		
		 $catpro=M('category')->where('ch=3  and pid =0  and mid=1')->order('ordernum asc')->select();
			foreach ($catpro as $key => $val) {
                if (is_array($val)) {
					 $catpro[$key]['sublist']=M('category')->where('pid='.$catpro[$key]["id"].' and ch=3')->order('ordernum asc')->select();
                 }
            }
			
		 $strcatid=$_GET['catid'];
		 $pid=$_GET['pid'];
		 
		 
		 
		 if($pid=='') $pid=$strcatid;		 
		   if($pid!=''){
		       $subcatpro=M('category')->where('ch=3 and pid='.$pid.'')->select();	
			  }else{
		       $subcatpro=M('category')->where('ch=3 ')->select();	
			 }
		
        $this->assign("catpro",$catpro);
        $this->assign("subcatpro",$subcatpro);
		
        $this->assign("id",$_GET["catid"]);
        $this->assign("pid",$pid);
		
		$this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
        $map["ch"]=3;
		if($catid!='') $map['catid']=$catid;
        $this->assign("catid",$catid);
		
		$cattitle=$cat["title"];
		if($cattitle=="") $cattitle="全部";		
        $this->assign("cattitle",$cattitle);
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }	
	
    public function pruducts_read() {
        //列表过滤器，生成查询Map对象
	  
		if($_SESSION['uname']==''){
		$this->error('对不起，您还没有登录，请先登录，谢谢！',U('sinpage/login'));
		}		  
	  
	  
	    $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
		$catid=$vo["catid"];

        $cat=D("Category")->find($catid);
        $cattitle=$cat["title"];
      

        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);



 $catpro=M('category')->where('ch=3  and pid =0 and mid=1')->order('ordernum asc')->select();
			foreach ($catpro as $key => $val) {
                if (is_array($val)) {
					 $catpro[$key]['sublist']=M('category')->where('pid='.$catpro[$key]["id"].' and ch=3')->order('ordernum asc')->select();
                 }
            }
			
		 $strcatid=$_GET['catid'];
		 $pid=$_GET['pid'];
		 
		 if($pid=='') $pid=$strcatid;		 
		   if($pid!=''){
		       $subcatpro=M('category')->where('ch=3 and pid='.$pid.'')->select();	
			  }else{
		       $subcatpro=M('category')->where('ch=3 ')->select();	
			 }
		
		
		
        $this->assign("catpro",$catpro);
        $this->assign("subcatpro",$subcatpro);


		
		$articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=3 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=3  and catid=".$strcatid."";
			}else{
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=3 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and  ch=3 ";	
				}
		
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);		
		
		

        $this->assign("catid",$catid);
        $this->assign("cattitle",$cat["title"]);
        $this->assign("seo",$seo);
        $this->assign('row', $vo);
        $this->display();
    }	
	

	

    public function download() {
        //列表过滤器，生成查询Map对象
		
		if($_SESSION['uname']==''){
            $this->error('对不起，您还没有登录，请先登录，谢谢！',U('sinpage/login'));
			}		
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
		$catid=$_GET['catid'];
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
		$catestr=D("Category")->where(' ch=13 ')->select();
        $this->assign("catestr",$catestr);
        $this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $map["status"]=1;
        $map["ch"]=13;
		if($catid!='') $map['catid']=$catid;
        $this->assign("catid",$catid);
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }	
	
	
	
	  function download_read() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
		$catid=$_GET["catid"];

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($vo["catid"])){
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }



		$catestr=D("Category")->where(' ch=13 ')->select();
        $this->assign("catestr",$catestr);
		
		
        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		
		
		$articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=13 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=13  and catid=".$strcatid."";
			}else{
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=13 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and  ch=13 ";	
				}
		
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);		
		
		

        $this->assign("catid",$catid);
        $this->assign("seo",$seo);
        $this->assign('row', $vo);
        $this->display();
    }	
	

	

 function video_show() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title_en"].'-'.$site["sitename_en"];
        $seo['keywords']=$site["keywords_en"];
        $seo['description']=$site["description_en"];
        if(!empty($vo["catid"])){
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }

        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		$dian=M('link')->where('catid=74')->select();
       
	    $articlemod=M('article');
		$strcatid=$_GET["catid"];
		$frontsql='';
		$artersql='';
		if($strcatid!=''){
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and ch=3 and catid=".$strcatid."";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and ch=3  and catid=".$strcatid."";
			}else{
				
			$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id." and ch=3 ";
			$artersql="ordernum<=".$vo['ordernum']." and id<>".$id." and  ch=3 ";
				
				}
		
		$videocate=D("Category")->where(' ch=3 and mid in (1,3,4) ')->select();
        $this->assign("videocate",$videocate);	
				
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);
	   
	    $catpro=M('category')->where('ch=3 and id<>74')->select();		
	    $this->assign("catpro",$catpro);
		
	    $this->assign("dian",$dian);
        $this->assign("seo",$seo);

        $this->assign('row', $vo);
        $this->display();
    }
	

	    protected function _list($model, $map, $sortBy = '', $asc = false) {
        //排序字段 默认为主键名
        if (isset($_REQUEST ['_order'])) {
            $order = $_REQUEST ['_order'];
        } else {
            $order = !empty($sortBy) ? $sortBy : $model->getPk();
        }
        //排序方式默认按照倒序排列
        //接受 sost参数 0 表示倒序 非0都 表示正序
        if (isset($_REQUEST ['_sort'])) {
            $sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
        } else {
            $sort = $asc ? 'asc' : 'desc';
        }
        //取得满足条件的记录数
        $count = $model->where($map)->count('id');
        if ($count > 0) {
            import("@.ORG.Util.Page2");
            //创建分页对象
            if (!empty($_REQUEST ['listRows'])) {
                $listRows = $_REQUEST ['listRows'];
            } else {
               $listRows=$this->listRows;
            }

            $p = new Page($count, $listRows);
            //分页查询数据
           $map['status']=1;
            //$voList = $model->where($map)->order( $order ." " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
            $voList = $model->where($map)->order('ordernum desc,id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
			
            //echo $model->getlastsql();
            //分页跳转的时候保证查询条件
            foreach ($map as $key => $val) {
                if (!is_array($val)&&$key!='status') {
                    $p->parameter .= "$key=" . urlencode($val) . "&";
                }
            }
            //分页显示
            $page = $p->show();
            //列表排序显示
            $sortImg = $sort; //排序图标
            $sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
            $sort = $sort == 'desc' ? 1 : 0; //排序方式
            //模板赋值显示
            $this->assign('list', $voList);
            $this->assign('sort', $sort);
            $this->assign('order', $order);
            $this->assign('sortImg', $sortImg);
            $this->assign('sortType', $sortAlt);
            $this->assign("page", $page);
        }

        return;
    }
	
	
	 protected function _list2($model, $map, $sortBy = '', $asc = false) {
        //排序字段 默认为主键名
        if (isset($_REQUEST ['_order'])) {
            $order = $_REQUEST ['_order'];
        } else {
            $order = !empty($sortBy) ? $sortBy : $model->getPk();
        }
        //排序方式默认按照倒序排列
        //接受 sost参数 0 表示倒序 非0都 表示正序
        if (isset($_REQUEST ['_sort'])) {
            $sort = $_REQUEST ['_sort'] ? 'asc' : 'desc';
        } else {
            $sort = $asc ? 'asc' : 'desc';
        }
        //取得满足条件的记录数
        $count = $model->where($map)->count('id');
        if ($count > 0) {
            import("@.ORG.Util.Page");
            //创建分页对象
            if (!empty($_REQUEST ['listRows'])) {
                $listRows = $_REQUEST ['listRows'];
            } else {
               $listRows=$this->listRows;
            }

            $p = new Page($count, $listRows);
            //分页查询数据
           $map['status']=1;
            //$voList = $model->where($map)->order( $order ." " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
            $voList = $model->where($map)->order('ordernum desc,id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
			
            //echo $model->getlastsql();
            //分页跳转的时候保证查询条件
            foreach ($map as $key => $val) {
                if (!is_array($val)&&$key!='status') {
                    $p->parameter .= "$key=" . urlencode($val) . "&";
                }
            }
            //分页显示
            $page = $p->show();
            //列表排序显示
            $sortImg = $sort; //排序图标
            $sortAlt = $sort == 'desc' ? '升序排列' : '倒序排列'; //排序提示
            $sort = $sort == 'desc' ? 1 : 0; //排序方式
            //模板赋值显示
            $this->assign('list', $voList);
            $this->assign('sort', $sort);
            $this->assign('order', $order);
            $this->assign('sortImg', $sortImg);
            $this->assign('sortType', $sortAlt);
            $this->assign("page", $page);
        }

        return;
    }
	



}