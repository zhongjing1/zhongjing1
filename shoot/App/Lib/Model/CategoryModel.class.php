<?php
class CategoryModel extends CommonModel {
    // 自动验证设置
    var $sortby='demo,ordernum';
    var $sort=true;
    protected $_validate	 =	 array(
        array('title','require','标题必须！',1),
        //array('title','','标题已经存在',0,'unique',3),
        );
    // 自动填充设置
    protected $_auto	 =	 array(
        array('status','1',1),
        array('createtime','time',3,'function'),
        );

}