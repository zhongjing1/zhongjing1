<?php
class LinkModel extends CommonModel {
    // 自动验证设置
    var $sortby='orderid,id';
    var $sort=true;
    protected $_validate	 =	 array(
        array('title','require','标题必须！',1),
        array('url','require','链接必须！',1),
        array('orderid','require','位置必须！',1),
       // array('title','','标题已经存在',0,'unique',3),
        );
    // 自动填充设置
    protected $_auto	 =	 array(
        array('status','1',1),
        array('createtime','time',1,'function'),
        array('updatetime','time',3,'function'),
        );

}