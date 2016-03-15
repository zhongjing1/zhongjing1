<?php

class HomeAction extends CommonAction {

    public function index($name) {
        //列表过滤器，生成查询Map对象

        $site=D("config")->getField("varname,value");;
        $seo['title']=$site["title"].'-'.$site["sitename"];
        $seo['keywords']=$site["keywords"];
        $seo['description']=$site["description"];
        $data["name"]=$name;
        $cat=D("category")->where($data)->find();

        if(!empty($cat)){
            $catid=$cat['id'];
            $this->assign("catid",$catid);
             $seo['title']=$cat["title"].'-'.$seo['title'];
             $seo["keywords"]=(empty($cat["keywords"])?$cat["title"]:$cat["keywords"]).','.$seo["keywords"];
             $seo["description"]=(empty($cat["description"])?$cat["title"]:$cat["description"]).','.$seo["description"];

            $this->assign("seo",$seo);
            $mode=D("mode")->find($cat['mid']);

            if($cat['mid']=='3'){
                $model = D("Sinpage");
                $id =$cat['id'];
                $vo = $model->getById($id);
                $this->assign('row', $vo);
            }else{
                $map = $this->_search();
                if (method_exists($this, '_filter')) {
                     $this->_filter($map);
                }
                $map['catid']=$catid;


                $model = D($mode['name']);
                if (!empty($model)) {
                   $this->_list($model, $map,$model->sortby ,$model->sort);
                 }
            }

        $this->display($mode['name'].":index");
        }
    }

    function read($name,$id) {
        $cat=D("category")->where("name='"+$name+"'")->find();
        if(!empty($cat)){
        $mode=D("mode")->find($cat['mid']);
        $model = M($mode['name']);
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

        $seo['title']=$vo["title"].'-'.$seo['title'];
        $seo["keywords"]=(empty($vo["keywords"])?$vo["title"]:$vo["keywords"]).','.$seo["keywords"];
        $seo["description"]=(empty($vo["description"])? strcut(trim(strip_tags($vo["content"])),200,""):$cat["description"]);

        $this->assign("seo",$seo);

        $this->assign('row', $vo);
        $this->display($mode['name'].":read");
        }
    }
}