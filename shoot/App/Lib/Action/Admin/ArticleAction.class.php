<?php
//文章
class ArticleAction extends CommonAction {
    function _initialize(){
        parent::_initialize();
        $catid=$_REQUEST['catid'];
        $demo=getName($catid,"Category","demo");
        $cat=getTable(" demo like '%".$demo."%'","Category","name");
        $this->assign("cat",$cat);
        $catid1=empty($_GET[catid1])?$catid:$_GET[catid1];
        $this->catid1=$catid1;
		$map['id']=$catid;
	    $catcurrent=M('category')->where($map)->select();
		$ch=$catcurrent[0]["ch"];
        $this->assign("ch",$ch);			
        $this->assign("catid",$catid);			
		
    }

    var $aa='';
    var $listRows=10;
    public function index() {
        //列表过滤器，生成查询Map对象
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
        $name = $this->getActionName();
        $model = D($name);
        if (!empty($model)) {
            $this->_list($model, $map,$model->sortby ,$model->sort);
        }
        $this->display();
        return;
    }




    public function _filter(&$map){
        $catid1=$_GET[catid1];
        if(empty($catid1)){
            $catid1=$_GET["catid"];
        }
        if(!empty($catid1)) {
            $cat=M('category');
            $demo=getName($catid1,"category","demo");
            $ids=$cat->query("select id from __TABLE__ where demo like '".$demo."%'");
            $aa1="";
             $i=0;
            if(count($ids)>0){
            while($i<count($ids)){
                $aa1.=$ids[$i]["id"].',';
                $i++;
             }
             $map['catid']=array('in', trim($aa1,',') );
            }
        }
   }
   
    function add() {
        $name = MODULE_NAME;
        $model=M($name);
        $map['catid']= $_REQUEST['catid'];
        $this->vo=$map;
		$catid=$_REQUEST['catid'];
		$map['id']=$catid;
	    $catcurrent=M('category')->where($map)->select();
		$ch=$catcurrent[0]["ch"];
		$mapmax['ch']=$ch;
		$strmax=$model->where($mapmax)->max('ordernum');
		$strmax=$strmax+1;
        $this->assign("strmax",$strmax);			
        $this->display ('edit');
    }
	
    function insert() {
        $name = $this->getActionName();
        $model = D($name);
		$ordernum=$_POST['ordernum'];
		$picfile_edit=$_POST['picfile_edit'];
		$ch=$_POST['ch'];
	         $map2['ordernum']=$ordernum;
			 $map2['ch']=$ch;
			 $cntcheckone=$model->where($map2)->count('id');	
			  if($cntcheckone>=1){
					  $this->error('对不起，排序必须唯一，谢谢！',$_SERVER['HTTP_REFERER']);
				  }			
        if (false === $model->create()) {
            $this->error($model->getError());
        }
		
		    if($picfile_edit!=''){
				 $model->picfile = $picfile_edit;
				}else{
					 $movie_pic = $_FILES['picfile'];
					 if (! empty ( $movie_pic )) {
						$savepath='Uploads/files/'.date('Y-m-d');
						$result = savelocalfile($movie_pic,$savepath,
								  array('width'=>'100','height'=>'136'),
								  array('jpg','jpeg','png','pdf','doc','docx','doc','rar','zip','flv'));
						if (!$result ['error']) {
							$model->picfile = $result['file'];
						}
				 	  }							
					}
		
        //保存当前数据对象
        $list = $model->add();
        if ($list !== false) { //保存成功
            $catName=getName($_POST['catid'],"category",'name');
            $url= '/'.$catName."/".$list;
            $model->where('id='.$list)->setField("url",$url);
            $this->success('新增成功!',cookie('_currentUrl_'));
        } else {
            //失败提示
            $this->error('新增失败!');
         }
    }
	
	
    function update() {
        $name = $this->getActionName();
        $model = M($name);
		$strtitle=$_POST['title'];
		$strid=$_POST['id'];
		$ordernum=$_POST['ordernum'];
		$picfile_edit=$_POST['picfile_edit'];
		$ch=$_POST['ch'];
			 $cntcheckone=$model->where('ordernum='.$ordernum.' and ch='.$ch.' and id<>'.$strid.'')->count('id');	
			  if($cntcheckone>=1){
					  $this->error('对不起，排序必须唯一，谢谢！',$_SERVER['HTTP_REFERER']);
				  }			
        if (false === $model->create()) {
            $this->error($model->getError());
        }
					$movie_pic = $_FILES['picfile'];
					if (!empty($movie_pic['name'])){
						$savepath='Uploads/files/'.date('Y-m-d');
						$result = savelocalfile($movie_pic,$savepath,
								  array('width'=>'100','height'=>'136'),
								  array('jpg','jpeg','png','pdf','doc','docx','doc','rar','zip','flv'));
							  if (!$result ['error']) {
								  $model->picfile = $result['file'];
							  }
							  else{
								   $id=$_REQUEST['id'];
								   $map['id']=$id;
								   $currentitem=$model->where($map)->select();
								   $model->picfile = $currentitem[0]['picfile'];
								  }
				 	}
						else{
							 $model->picfile = $picfile_edit;
						  }				
		
        // 更新数据
		  $catName=getName($model->catid,"category",'name');
		  $model->url='/'.$catName."/".$model->id;
		  $list = $model->save();
		  if (false !== $list) {
  
			  $this->success('编辑成功!',cookie('_currentUrl_'));
		  } else {
			  //错误提示
			  $this->error('编辑失败!');
		  }
    }
	
	
    function up() {
		 $ch=$_REQUEST['ch'];
         $id=$_REQUEST['id'];
		 $strcatid=$_REQUEST['catid'];
		 $currentarticle=M('article')->where('id='.$id.'')->select();
		 $old_ordernum=$currentarticle[0]['ordernum'];
		if($strcatid!=''){
			$frontsql="ordernum>=".$old_ordernum." and id<>".$id."  and ch=".$ch." and catid=".$strcatid."";
			}else{
			$frontsql="ordernum>=".$old_ordernum." and id<>".$id." and  ch=".$ch." ";
			}
		 $frontpro=M('article')->where($frontsql)->order('ordernum asc')->limit('0,1')->select();
		 $new_ordernum=$frontpro[0]['ordernum'];
		 $new_id=$frontpro[0]['id'];
		 if($new_id!=''){
			   M('article')->query("update es_article set ordernum=$new_ordernum where id=$id");
			   M('article')->query("update es_article set ordernum=$old_ordernum where id=$new_id");
		 			 }
         $this->success('操作成功!',cookie('_currentUrl_'));
    }	
	
	
    function down() {
		$ch=$_REQUEST['ch'];
         $id=$_REQUEST['id'];
		 $strcatid=$_REQUEST['catid'];		
		 $currentarticle=M('article')->where('id='.$id.'')->select();
		 $old_ordernum=$currentarticle[0]['ordernum'];
		 if($strcatid!=''){
		$artersql="ordernum<=".$old_ordernum."  and id<>".$id." and ch=".$ch." and catid=".$strcatid."";
			}else{
		$artersql="ordernum<=".$old_ordernum."  and id<>".$id." and ch=".$ch." ";	
				}
		$afterpro=M('article')->where($artersql)->order('ordernum desc')->limit('0,1')->select();
		 $new_ordernum=$afterpro[0]['ordernum'];
		 $new_id=$afterpro[0]['id'];
		 if($new_id!=''){
			   M('article')->query("update es_article set ordernum=$new_ordernum where id=$id");
			   M('article')->query("update es_article set ordernum=$old_ordernum where id=$new_id");
		 			 }
         $this->success('操作成功!',cookie('_currentUrl_'));
    }		
	
	
    function tags(){
        $list=D('tags')->select();
        $this->list=$list;
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
            import("@.ORG.Util.Page");
            //创建分页对象
            if (!empty($_REQUEST ['listRows'])) {
                $listRows = $_REQUEST ['listRows'];
            } else {
               $listRows=$this->listRows;
            }

            $p = new Page($count, $listRows);
            //分页查询数据

             

            //$voList = $model->where($map)->order( $order ." " . $sort)->limit($p->firstRow . ',' . $p->listRows)->select();
             $voList = $model->where($map)->order( 'ordernum desc,id desc')->limit($p->firstRow . ',' . $p->listRows)->select();
             //echo $model->getlastsql();
            //分页跳转的时候保证查询条件
            foreach ($map as $key => $val) {
                if (!is_array($val)) {
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
        cookie('_currentUrl_', __SELF__  );

        return;
    }	
	
	
}
