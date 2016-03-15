<?php
//单页
class SinpageAction extends CommonAction {

    public function index() {
        $name=getName($this->_get('catid'),'sinpage');
        if(empty($name)){
            $model=M("Sinpage");
            $model->id=$this->_get('catid');
            $model->title=$name;
            $model->add();
        }
		
        cookie('_currentUrl_', U('category/index'));
        $model = D("Sinpage");
        $id = $_REQUEST ["catid"];
        $vo = $model->getById($id);
        $this->assign('vo', $vo);
        $this->display();
    }
	
	 function update() {
        $name = $this->getActionName();
        $model = D($name);
        if (false === $model->create()) {
            $this->error($model->getError());
        }
		$reurl="";
		if($_POST["catid"]!=""){
			$catid=$_POST["catid"];
			$ch=$_POST["ch"];
			$reurl= U('sinpage/index',array("catid"=>$catid,"ch"=>$ch));
			}
        // 更新数据
        $list = $model->save();
        if (false !== $list) {
            //成功提示
            $this->success('编辑成功!',$reurl);
        } else {
            //错误提示
            $this->error('编辑失败!');
        }
    }
	
	
	
	
	
	
	

}
