<?php

class RoleAction extends CommonAction {
    function _initialize(){

    }
    function user($roleid=0){
        $list=D('user')->select();
        $this->list=$list;
        $group   =  D('Role');
        $applist=$group->getGroupUserList($roleid);
        $this->applist=$applist;
        $this->roleid=$roleid;
        $this->display();
    }
    public function douser() {
        $id     = $_POST['c1_id'];
        $groupId	=$_POST['roleid'];
        $group    =   D('Role');
        $group->delGroupUser($groupId);
        $result = $group->setGroupUsers($groupId,$id);
        if($result===false) {
            $this->error('项目授权失败！');
        }else {
            $this->success('项目授权成功！');
        }

    }
    function node($roleid=0){
       $list=D('Node')->select();

       $this->list=$list;
        $group   =  D('Role');
       $applist= $group->getGroupAppList($roleid);
        $this->applist=$applist;
       $this->roleid=$roleid;
       $this->display();
    }
    public function donode() {
        $id     = $_POST['c1_id'];
        $groupId	=$_POST['roleid'];
        $group    =   D('Role');
        $group->delGroupApp($groupId);
        $result = $group->setGroupApps($groupId,$id);
        if($result===false) {
            $this->error('项目授权失败！');
        }else {
            $this->success('项目授权成功！');
        }

    }
}