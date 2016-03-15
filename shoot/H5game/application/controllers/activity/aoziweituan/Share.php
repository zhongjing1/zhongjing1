<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 圣诞节
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Share extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('loop_model');
        $this->load->helpers('activity_helper');
        $this->weixin_data = get_weixin_data();//获取微信信息，jssdk信息
        //获得用户。不是后台管理的时候才启用
        if(!strstr(get_segment(4),'admin'))
        {
            $this->openid  = get_openid($this->appid, $this->appsecret);
            //$this->openid  = 1234;
            //$this->userinfo  = get_userinfo($this->appid, $this->appsecret);
            //$this->userinfo = array('openid'=>123,'nickname'=>'淘','headimgurl'=>'http://wx.qlogo.cn/mmopen/MIOjkW0mCTjpjfgJQZia07q6WIrypic654ibgjzanTWP6Zs4KBXt43KtADh19GBEaK7nVyufo0XaVvHLXs6v4JHXXoF9ibMhicia5m/0');
            assign('userinfo', $this->userinfo);
        }
        $this->end_time = 20160207;//活动结束时间
        $this->probability = 20;//中奖概率当前数字的分之一,比如填写100就是1/100,
        $this->prize_list = array(
            1=>'米莱珠宝Acare智能指环',
            2=>'膳魔师保温杯',
            3=>'亿滋产品礼包',
        );
        assign('prize_list',$this->prize_list);
    }



    /**
     * 首页
     */
    public function index()
    {
        $my_data = $this->get_user_openid();
        if(!empty($my_data['prize']) && $my_data['prize']!=888){
            header('location:'.site_url($this->weixin_data['index_dir'].'/prize'));
            exit;
        }
        else
        {
            display($this->weixin_data['index_dir'].'/index.html');
        }
    }

    /**
     * 保存提交信息
     */
    public function ajax_prize()
    {
        if(date('Ymd')>$this->end_time)
        {
            error_json('活动已经结束');
        }
        else
        {
            $my_data = $this->get_user_openid();
            if(!empty($my_data))
            {
                if(!empty($my_data['prize']) && $my_data['prize']!=888)
                {
                    error_json('已经参与抽奖,请刷新页面查看结果');
                }
                else
                {
                    //查询抽奖机会是否已经用完
                    $log_row = $this->loop_model->get_list_num($this->weixin_data['table_name'].'_log',array('and'=>array('user_id'=>$my_data['id'])));
                    if($log_row<2)
                    {
                        //还可以抽奖
                        $rand_num = rand(1,$this->probability);
                        if($rand_num==1)
                        {
                            //中奖开始抽取奖品
                            $prize_data = $this->loop_model->get_one($this->weixin_data['table_name'].'_prize', array('user_id'=>'0','prize'=>3),'rand()');
                            if(!empty($prize_data))
                            {
                                //抽到奖品了
                                $prize_num = $prize_data['prize'];
                                //奖品锁定
                                $u_id = $this->loop_model->update_id($this->weixin_data['table_name'].'_prize', array('user_id'=>$my_data['id']), $prize_data['id']);
                                cache('delete', $this->weixin_data['table_name'].'_'.$my_data['openid']);//清除缓存
                                cache('delete', $this->weixin_data['table_name'].'_'.$my_data['id']);//清除缓存
                                if(empty($u_id))
                                {
                                    //奖品锁定失败
                                    $prize_num = 998;
                                }
                            }
                            else
                            {
                                //没有抽到
                                $prize_num = 999;
                            }
                        }
                        else
                        {
                            $prize_num = 1000;
                        }
                        $insert_data = array(
                            'user_id'   => $my_data['id'],
                            'prize_num' => $prize_num,
                            'addtime'   => config_item('sys_time'),
                        );
                        $insert_id = $this->loop_model->insert($this->weixin_data['table_name'].'_log', $insert_data);
                        if(!empty($insert_id))
                        {
                            //开始记录奖品,如果是第二次不管中奖还是没有中奖都需要记录
                            if($log_row==1 || ($prize_num>=1 && $prize_num<=3))
                            {
                                $re_up = $this->loop_model->update_id($this->weixin_data['table_name'], array('prize'=>$prize_num), $my_data['id']);
                                if(!empty($re_up))
                                {
                                    error_json($prize_num,'y');
                                }
                                else
                                {
                                    error_json(1000,'y');//奖品记录失败
                                }
                            }
                            else
                            {
                                $re_up = $this->loop_model->update_id($this->weixin_data['table_name'], array('prize'=>'888'), $my_data['id']);
                                error_json($prize_num,'y');
                            }
                        }
                        else
                        {
                            error_json('1000','y');//抽奖记录登记失败
                        }
                    }
                    else
                    {
                        error_json('您的抽奖机会已经用完');
                    }
                }
            }
        }
    }


    /**
     * 我的奖品
     */
    public function prize()
    {
        $user_data = $this->get_user_openid();
        if(!empty($user_data) && !empty($user_data['prize'])) {
            assign('user_data',$user_data);
            if($user_data['prize']>=1 && $user_data['prize']<=3)
            {
                //已经中奖
                if(empty($user_data['tel']))
                {
                    //已经提交电话
                    display($this->weixin_data['index_dir'].'/add_tel.html');
                }
                else
                {
                    //还没有提交电话
                    display($this->weixin_data['index_dir'].'/prize.html');
                }
            }
            else
            {
                //没有中奖
                display($this->weixin_data['index_dir'].'/no_prize.html');
            }
        }
        else
        {
            header('location:'.site_url($this->weixin_data['index_dir']));
            exit;
        }
    }


    /**
     * 保存提交信息
     */
    public function save_add_tel()
    {
        $my_data = $this->get_user_openid();
        if($my_data['prize']>=1 && $my_data['prize']<=4)
        {
            if(empty($my_data['tel']))
            {
                $username = $this->input->post('username');
                $tel      = $this->input->post('tel');
                $address  = $this->input->post('address');
                if(empty($tel) || empty($username) || empty($address))error_json('请填写姓名、电话和地址');
                $tel_data = $this->loop_model->get_one($this->weixin_data['table_name'], array('tel'=>$tel));
                if(!empty($tel_data))
                {
                    error_json('该手机号码已经登记');
                }
                else
                {
                    $up_data = array(
                        'username' => $username,
                        'tel'      => $tel,
                        'address'  => $address,
                    );
                    $up_id = $this->loop_model->update_id($this->weixin_data['table_name'], $up_data, $my_data['id']);
                    if($up_id>0)
                    {
                        cache('delete', $this->weixin_data['table_name'].'_'.$my_data['openid']);//清除缓存
                        cache('delete', $this->weixin_data['table_name'].'_'.$my_data['id']);//清除缓存
                        error_json('y');
                    }
                    else
                    {
                        error_json('信息保存失败');
                    }
                }
            }
            else
            {
                error_json('已经登记了手机号码');
            }
        }
        else
        {
            error_json('你没有中奖');
        }
    }


    /**
     ***************************************************************
     * 获取用户信息
     ***************************************************************
     */

    /**
     * 根据openid获取用户信息
     */
    public function get_user_openid()
    {
        $openid = $this->openid;
        $cache_name = $this->weixin_data['table_name'].'_'.$openid;//缓存名称
        //$user_data = cache('get', $cache_name);
        if(empty($user_data))
        {
            $user_data = $this->loop_model->get_one($this->weixin_data['table_name'], array('openid'=>$openid));
            if(empty($user_data))
            {
                $user_data = array(
                    'openid'     => $openid,
                    'addtime'    => config_item('sys_time'),
                );
                $insert_id = $this->loop_model->insert($this->weixin_data['table_name'], $user_data);
                $user_data['id'] = $insert_id;
            }
            cache('set', $cache_name, $user_data);
        }
        return $user_data;
    }

    /**
     * 根据openid获取用户信息
     * @param $id
     */
    public function get_user_id($id)
    {
        $cache_name = $this->weixin_data['table_name'].'_'.$id;//缓存名称
        //$user_data = cache('get', $cache_name);
        if(empty($user_data))
        {
            $user_data = $this->loop_model->get_one($this->weixin_data['table_name'], array('id'=>$id));
            cache('set', $cache_name, $user_data);
        }
        return $user_data;
    }


    /**
     ***************************************************************
     * 后台操作
     ***************************************************************
     */

    /**
     * 后台管理
     */
    public function admin()
    {
        $mp_id = activity_user_login();//判断是否登录
        if($mp_id!='')
        {
            $pagesize = 20;
            $page = $this->input->get('page');
            $page < 1 ? $page = 1 : $page = $page;//当前页数
            //搜索条件
            $username = $this->input->get_post('username');
            $tel      = $this->input->get_post('tel');
            assign('username', $username);
            assign('tel', $tel);
            if(!empty($username))$where_and = array('username'=>$username);
            if(!empty($tel))$where_and = array('tel'=>$tel);
            $where_and['prize >='] = '1';
            $where_and['prize <='] = '4';
            $where_data = array(
                'and' => $where_and,
            );
            $list = $this->loop_model->get_list($this->weixin_data['table_name'], $where_data, $pagesize, $pagesize*($page-1));//查询所有
            assign('list', $list);
            $total_rows = $this->loop_model->get_list_num($this->weixin_data['table_name'], $where_data);//计算所有数据
            $link = site_url($this->weixin_data['index_dir'].'/admin').'?username='.$username.'&tel='.$tel;
            $pagecount = page($link, $total_rows, $page, $pagesize);//分页
            assign('pagecount', $pagecount);
            display($this->weixin_data['index_dir'].'/admin_list.tpl');
        }
    }

    /**
     * 保存提交信息
     */
    public function admin_prize_ok()
    {
        $id = (int)$this->input->post('id');
        $user_data = $this->loop_model->get_one($this->weixin_data['table_name'], array('id'=>$id));
        if(empty($user_data))
        {
            error_json('错误');
        }
        else
        {
            if($user_data['prize_ok']==1)
            {
                error_json('已经兑换');
            }
            else
            {
                $up_id = $this->loop_model->update_id($this->weixin_data['table_name'], array('prize_ok'=>'1'), $id);
                if($up_id>0)
                {
                    error_json('y');
                }
                else
                {
                    error_json('信息保存失败');
                }
            }
        }
    }
}
