<?php
//文章
class CategoryAction extends CommonAction {
    function _initialize(){
        parent::_initialize();
        $strpid = $_REQUEST ['pid'];
		$ch = M('Category')->where('id='.$strpid.'')->getField('ch');
        $cat=getTable("ch=".$ch."","Category",'name');
		$strch=$_REQUEST ['ch'];
		if($strch!='' and $strpid!=""){
		    $pcate=M('Category')->where('ch='.$strch.' and id='.$strpid.' ')->select();
			}
        $this->assign("pcate",$pcate);
        $this->assign("cat",$cat);
        $mode=getTable("1=1","Mode");
        $this->assign("mode",$mode);
        $this->listRows=200;
    }
	
    public function index() {
        //列表过滤器，生成查询Map对象
        $map = $this->_search();
        if (method_exists($this, '_filter')) {
            $this->_filter($map);
        }
		
        $name = $this->getActionName();
        $model = D($name);
		$ch=$_REQUEST['ch'];
		$map['ch']=$_REQUEST['ch'];
		$map['pid']=0;
        if (!empty($model)) {
           $this->_list($model,$map,$model->sortby ,$model->sort);
        }
        $this->assign("ch",$ch);
        $this->display();
        return;
    }
		
		
    function insert() {
        $name = $this->getActionName();
        $model = D($name);
        if (false === $model->create()) {
            $this->error($model->getError());
        }
		$ch=$_REQUEST['ch'];
        //保存当前数据对象
        $list = $model->add();
        if ($list !== false) { //保存成功
            $demo=getName($_REQUEST['pid'],"category","demo");
            if(empty($demo))
                $demo='0';
            $demo=$demo." ".$list;
            $name1=getCateKong($demo).$_REQUEST['title'];
            $model->where('id='.$list)->setField("demo",$demo);
            $model->where('id='.$list)->setField("name",$name1);
            $model->where('id='.$list)->setField("ch",$ch);
            //$url='/'.$model['name'];
            $model->where('id='.$list)->setField("url",$url);
            $this->success('新增成功!',cookie('_currentUrl_'));
        } else {
            //失败提示
            $this->error('新增失败!');
        }
    }
	
	
    function edit(){
        $name = $this->getActionName();
        $model = M($name);
        $id = $_REQUEST [$model->getPk()];
        $vo = $model->getById($id);
        $this->assign('vo', $vo);
		
		if($vo["id"]!=0){
			   $pcate1=M('Category')->where(' id='.$vo["pid"].' ')->select();
               $this->assign('pcate1', $pcate1);
			}
        $this->display();
    }	
	
    function update() {
    $name = $this->getActionName();
    $model = M("category");
    if (false === $model->create()) {
        $this->error($model->getError());
    }
	$ch=$_POST['ch'];
    // 更新数据
     $demo=getName($model->pid ,"category","demo");
     if(empty($demo)) $demo='0';
     $demo=$demo." ".$model->id;
     $model->demo=$demo;
     $model->url="/".$model->name;
     $model->name=getCateKong($demo).$model->title;

     $list = $model->save();
    if (false !== $list) {

         $this->success('编辑成功!',cookie('_currentUrl_'));
    } else {
        //错误提示
        $this->error('编辑失败!');
    }
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


            $voList = $model->where($map)->order( "ordernum asc")->limit($p->firstRow . ',' . $p->listRows)->select();

			  foreach ($voList as $key => $val) {
                if (is_array($val)) {
					$voList[$key]['sublist']=$model->where('pid='.$voList[$key]["id"].'')->order( $order ." " . $sort)->select();
                }
            }
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
