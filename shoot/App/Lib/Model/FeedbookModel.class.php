<?php
class FeedbookModel extends CommonModel {
    // 自动验证设置

    protected $_validate	 =	 array(
        array('title','require','姓名必须填写！',1),
        array('mobile','require','手机必须填写！',1),

        );
    // 自动填充设置
    protected $_auto	 =	 array(
        array('status','1',1),
        array('createtime','time',1,'function'),
        );

}