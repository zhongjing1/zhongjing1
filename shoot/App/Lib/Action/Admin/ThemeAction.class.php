<?php
//文章
class ThemeAction extends CommonAction {

    protected $filepath,$publicpath;
    function _initialize()
    {
        parent::_initialize();
        $this->filepath = TMPL_PATH.'Home/'.C('DEFAULT_THEME').'/';
        $this->tplpath = TMPL_PATH.'Home/';
    }

    public function index()
    {

        $filed = glob($this->tplpath.'*');
        foreach ($filed as $key=>$v) {
            $arr[$key]['name'] =  basename($v);
            if(is_file($this->tplpath.$arr[$key]['name'].'/preview.jpg')){
                $arr[$key]['preview']=ltrim( $this->tplpath,'.').$arr[$key]['name'].'/preview.jpg';
            }else{
                $arr[$key]['preview']=__ROOT__.'/Public/Images/nopic.jpg';
            }
            $sys_config=F("sys.config");
            if($sys_config['DEFAULT_THEME']==$arr[$key]['name']) $arr[$key]['use']=1;
        }

        $this->assign( 'themes',$arr );
        $this->display ();
    }
    public function chose()
    {
        $theme = $_GET['theme'];
        if($theme){
            $Model = M('Config');
            $r = $Model->where("varname='DEFAULT_THEME'")->setField('value',$theme);
            savecache('Config');
            $this->success("模板设置成功");
        }else{
            $this->error('模板设置失败');
        }
    }
    public function upload()
    {
        $this->display ();
    }


}
