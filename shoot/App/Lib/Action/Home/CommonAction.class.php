<?php

class CommonAction extends Action {
    function _initialize() {
        $site=D("config")->getField("varname,value");
        $this->assign("site",$site);
		
		 $ad_huandeng=M('link')->where('catid=105')->select();
		 $footlink=M('link')->where('catid=106')->limit("0,6")->select();
		 $sub_leftad=M('link')->where('catid=101')->select();
		 $kefuonline=M('link')->where('catid=107')->limit("0,15")->select();

		 $ad1=M('link')->where('catid=282')->limit("0,1")->select();
		 $ad2=M('link')->where('catid=283')->limit("0,1")->select();
		 $ad3=M('link')->where('catid=284')->limit("0,1")->select();
		 $ad4=M('link')->where('catid=285')->limit("0,1")->select();
		 $ad5=M('link')->where('catid=286')->limit("0,1")->select();
		 $ad6=M('link')->where('catid=287')->limit("0,1")->select();
		 $ad8=M('link')->where('catid=288')->limit("0,3")->select();
         $this->assign('ad1',$ad1);
         $this->assign('ad2',$ad2);
         $this->assign('ad3',$ad3);
         $this->assign('ad4',$ad4);
         $this->assign('ad5',$ad5);
         $this->assign('ad6',$ad6);
         $this->assign('ad8',$ad8);
		 
         $this->assign('ad_huandeng',$ad_huandeng);
         $this->assign('footlink',$footlink);
		 
         $this->assign('sub_leftad',$sub_leftad);
         $this->assign('kefuonline',$kefuonline);
		 
		 
		 $leftnews=M('article')->where('ch=10')->limit('0,5')->order('ordernum desc')->select();		 
         $this->assign("leftnews",$leftnews);
		 				 
		 $cate1=D("Category")->where(' ch=1 ')->order('ordernum asc')->select();
		 $cate2=D("Category")->where(' ch=2 ')->order('ordernum asc')->select();
		 $cate3=D("Category")->where(' ch=3 and mid=1 ')->order('ordernum asc')->select();
		 $cate4=D("Category")->where(' ch=4   and pid=0')->order('ordernum asc')->select();
		 $cate5=D("Category")->where(' ch=5 ')->order('ordernum asc')->select();
		 $cate10=D("Category")->where(' ch=10 ')->order('ordernum asc')->select();
		 $cate6=D("Category")->where(' ch=6 ')->order('ordernum asc')->select();

		 $cate11=D("Category")->where(' ch=11 ')->order('ordernum asc')->select();
		 
		 
		 $leftcontact=D("sinpage")->where(' id=193 ')->select();
		 $copyright=D("sinpage")->where(' id=125 ')->select();
		 
		 
		 
         $this->assign("cate1",$cate1);				 
         $this->assign("cate2",$cate2);				 
         $this->assign("cate3",$cate3);				 
         $this->assign("cate4",$cate4);	
         $this->assign("cate5",$cate5);	
         $this->assign("cate6",$cate6);	
	
         $this->assign("cate10",$cate10);	
         $this->assign("cate11",$cate11);	
		 
		 
         $this->assign("leftcontact",$leftcontact);	
         $this->assign("copyright",$copyright);	
		 
		 
		 $uri = $_SERVER['REQUEST_URI'];  
		 if($uri=='/') $currenthome='class="current"';
		 if(strpos($uri,'index/index.html')) $currenthome='class="current"';
		 if(strpos($uri,'sinpage/index')) $currentabout='class="current"';
		 if(strpos($uri,'sinpage/service')) $currentservice='class="current"';
		 if(strpos($uri,'index/index.html')) $currenthome='class="current"';
		 if(strpos($uri,'article/cases')) $currentcase='class="current"';
		 if(strpos($uri,'article/index')) $currentarticle='class="current"';
		 if(strpos($uri,'article/huodong')) $currenthuodong='class="current"';
		 if(strpos($uri,'sinpage/kefu')) $currentkefu='class="current"';
		 if(strpos($uri,'sinpage/contact')) $currentcontact='class="current"';
		 if(strpos($uri,'sinpage/join')) $currentjoin='class="current"';
		
		 
		 
         $this->assign('currenthome',$currenthome);
         $this->assign('currentabout',$currentabout);
         $this->assign('currentservice',$currentservice);
         $this->assign('currentcase',$currentcase);
         $this->assign('currentarticle',$currentarticle);
         $this->assign('currenthuodong',$currenthuodong);
         $this->assign('currentkefu',$currentkefu);
         $this->assign('currentcontact',$currentcontact);
         $this->assign('currentjoin',$currentjoin);	
		 
		 
		 
		 
    }
    var $aa='';
    var $listRows=20;
    public function index() {
        //列表过滤器，生成查询Map对象

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title"].'-'.$site["sitename"];
        $seo['keywords']=$site["keywords"];
        $seo['description']=$site["description"];
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
        $map["status"]=1;
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }

    /**
      +----------------------------------------------------------
     * 取得操作成功后要返回的URL地址
     * 默认返回当前模块的默认操作
     * 可以在action控制器中重载
      +----------------------------------------------------------
     * @access public
      +----------------------------------------------------------
     * @return string
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
    function getReturnUrl() {
        return __URL__ . '?' . C('VAR_MODULE') . '=' . MODULE_NAME . '&' . C('VAR_ACTION') . '=' . C('DEFAULT_ACTION');
    }

    /**
      +----------------------------------------------------------
     * 根据表单生成查询条件
     * 进行列表过滤
      +----------------------------------------------------------
     * @access protected
      +----------------------------------------------------------
     * @param string $name 数据对象名称
      +----------------------------------------------------------
     * @return HashMap
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
    protected function _search($name = '') {
        //生成查询条件
        if (empty($name)) {
            $name = $this->getActionName();
        }
        $name = $this->getActionName();
        $model = D($name);
        $map = array();
        foreach ($model->getDbFields() as $key => $val) {
            if (isset($_REQUEST [$val]) && $_REQUEST [$val] != '') {
                $map [$val] = $_REQUEST [$val];
            }
        }
        return $map;
    }

    /**
      +----------------------------------------------------------
     * 根据表单生成查询条件
     * 进行列表过滤
      +----------------------------------------------------------
     * @access protected
      +----------------------------------------------------------
     * @param Model $model 数据对象
     * @param HashMap $map 过滤条件
     * @param string $sortBy 排序
     * @param boolean $asc 是否正序
      +----------------------------------------------------------
     * @return void
      +----------------------------------------------------------
     * @throws ThinkExecption
      +----------------------------------------------------------
     */
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
    function add() {
        $name = MODULE_NAME;
        $this->display ('edit');
    }

    function read() {
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);

        $site=D("config")->getField("varname,value");
        $seo['title']=$site["title"].'-'.$site["sitename"];
        $seo['keywords']=$site["keywords"];
        $seo['description']=$site["description"];
        if(!empty($vo["catid"])){
            $cat=D("Category")->find($vo["catid"]);
            if(!empty($cat)){
                $seo['title']=$cat["title"].'-'.$seo['title'];
                $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
                $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];
            }
        }

		$catenews=D("Category")->where(' ch=4 ')->select();
        $this->assign("catenews",$catenews);
		
		
        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);
		
		
		$articlemod=D('article');
		$frontsql="ordernum>=".$vo['ordernum']." and id<>".$id."  and  catid=47 ";
		$artersql="ordernum<=".$vo['ordernum']."  and id<>".$id." and catid=47 ";	
		$front=$articlemod->where($frontsql)->order('ordernum asc')->limit('0,1')->find();
		$this->assign('front',$front);
		//下一篇
		$after=$articlemod->where($artersql)->order('ordernum desc')->limit('0,1')->find();
		$this->assign('after',$after);


        $this->assign("seo",$seo);

        $this->assign('row', $vo);
        $this->display();
    }
}

