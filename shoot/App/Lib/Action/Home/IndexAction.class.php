<?php

class IndexAction extends CommonAction {
    function _initialize(){
        parent::_initialize();
	     $this->single_mod=M("sinpage");
	     $this->link_mod=M("link");
	     $this->article_mod=M("article");
		 $this->cate_mod=M("Category");
		}	
		
 public function index() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title"].'-'.$site["sitename"];
        $seo['keywords']=$site["keywords"];
        $seo['description']=$site["description"];
		$videoid=$_GET['videoid'];
		if($videoid!=''){
		 $currentvideo=$this->article_mod->where('id='.$videoid.'')->limit('0,1')->select();
			}else{
		 $currentvideo=$this->article_mod->where('catid=82 and thumb<>"" ')->limit('0,1')->select();
				}
		
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
		
        $this->assign("seo",$seo);
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
		
		
		 $homeaboutus=$this->single_mod->where('id=245')->select();
		 $homecontact=$this->single_mod->where('id=246')->select();
		 
		 $link1=$this->article_mod->where('catid=279')->limit('0,56')->order('ordernum desc')->select();

		 
		 $pro=$this->article_mod->where('ch=5 and catid=269')->limit('0,15')->order('ordernum desc')->select();
		 
		 
		 $catyewu=$this->cate_mod->where('ch=4')->limit('0,9')->order('ordernum desc')->select();
		 
		 $news=$this->article_mod->where('ch=10 and is_recommend=1')->limit('0,7')->order('ordernum desc')->select();	
		 $newstop=$this->article_mod->where('ch=10 ')->limit('0,5')->order('ordernum desc')->select();	
		 	 
		 
		 $huodong=$this->article_mod->where('ch=5 and thumb<>""')->limit('0,15')->order('ordernum desc')->select();		 


         $this->assign('huodong',$huodong);
		 
         $this->assign('homeaboutus',$homeaboutus);
         $this->assign('homecontact',$homecontact);
		 
         $this->assign('pro',$pro);
         $this->assign('catyewu',$catyewu);
		 
         $this->assign('newstop',$newstop);
         $this->assign('news',$news);
		 
         $this->assign('link1',$link1);
		
        $map["status"]=1;
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }
	
	

	

	
 
	
	
	
	
 public function contact() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title"].'-'.$site["sitename"];
        $seo['keywords']=$site["keywords"];
        $seo['description']=$site["description"];
        if(!empty($_GET['id'])){
            $catid=$_GET['id'];
            $this->assign("id",$id);
            $cat=D("Category")->find($_GET["id"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		 $catestr=D("category")->where(' ch=5 ')->select();
		 $id=$_GET["id"];
		 if($id!=''){
			 $sql=" id=".$id."";
			 }
			 else{
			    $sql="id=".$catestr[0]["id"];
				 }
         $this->assign("catestr",$catestr);		
         $this->assign("cattitle",$cat["title"]);		
         $this->assign("seo",$seo);
		 $contact=D("sinpage")->where($sql)->limit("0,1")->select();
         $this->assign('contact',$contact);
         $this->display();
         return;
    }		
		

	
	
 public function cncontact() {
        //列表过滤器，生成查询Map对象
        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title"].'-'.$site["sitename"];
        $seo['keywords']=$site["keywords"];
        $seo['description']=$site["description"];
        if(!empty($_GET['id'])){
            $catid=$_GET['id'];
            $this->assign("id",$id);
            $cat=D("Category")->find($_GET["id"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }
		 $catestr=D("category")->where(' ch=15 ')->select();
		 $id=$_GET["id"];
		 if($id!=''){
			 $sql=" id=".$id."";
			 }
			 else{
			    $sql="id=".$catestr[0]["id"];
				 }
         $this->assign("catestr",$catestr);		
         $this->assign("cattitle",$cat["title"]);		
         $this->assign("seo",$seo);
		 $contact=D("sinpage")->where($sql)->limit("0,1")->select();
         $this->assign('contact',$contact);
         $this->display();
         return;
   
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

            $voList = $model->where($map)->order( $order ." " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
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