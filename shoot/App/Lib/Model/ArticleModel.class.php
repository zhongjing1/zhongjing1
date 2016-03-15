<?php
class ArticleModel extends CommonModel {
    // 自动验证设置
    protected $_validate	 =	 array(
        array('title','require','标题必须！',1),
        array('content','require','内容必须'),
        //array('ordernum','','排序必须唯一',0,'unique',3),
        );
    // 自动填充设置
    protected $_auto	 =	 array(
        array('status','1',1),
        array('createtime','time',1,'function'),
        array('updatetime','time',3,'function'),
        );

}