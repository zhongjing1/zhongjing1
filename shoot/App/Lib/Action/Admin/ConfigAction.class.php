<?php
//单页
class ConfigAction extends CommonAction {


    public function index() {
        $model=M("config")->where("groupid=0")->select();
        $this->list=$model;
        $this->display();
    }
    public function update() {

        $model=M("config");
        foreach($_POST as $key=>$value){
            $data['value']=$value;
            $f = $model->where("varname='".$key."'")->save($data);
        }
        $this->success('更新成功!',U("config/index"));

    }

}
