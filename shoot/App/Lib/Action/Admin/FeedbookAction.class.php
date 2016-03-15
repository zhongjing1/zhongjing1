<?php
//文章
class FeedbookAction extends CommonAction {
    function _initialize(){
        parent::_initialize();
        $catid=$_REQUEST['catid'];
        $demo=getName($catid,"Category","demo");
        $cat=getTable(" demo like '%".$demo."%'","Category");
        $this->assign("cat",$cat);
        $this->assign("catid",$_GET['catid']);

    }

    public function _filter(&$map){
        if(!empty($_GET['catid'])) {
              $cat=M('category');
            $demo=getName($_GET['catid'],"category","demo");
            $ids=$cat->query("select id from __TABLE__ where demo like '".$demo."%'");
            $aa1="";
             $i=0;

            if(count($ids)>1){
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
        $this->display ('edit');
    }

}
