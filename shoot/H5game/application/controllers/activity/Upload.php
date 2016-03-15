<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 活动用户文件上传
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller {
    public function __construct()
    {
    	parent::__construct();
    }

    /**
     * 开始上传
     */
	public function upload()
    {
        $callback = $this->input->get('callback');
        //上传文件域名称
        $file_name = $this->input->get('file_name');
        if($file_name == '')
        {
            $file_name = 'upfile';
        }
        //开始上传
        $this->load->library('upload');
        if($this->upload->do_upload($file_name))
        {
            $image = $this->upload->data();
            //是否需要压缩
            $width = $this->input->get('width');
            $height = $this->input->get('height');
            //$exif = exif_read_data(dirname(__file__).'/../../../'.$image['full_path']);
            if(!empty($image['full_path']) && ($width>0 || $height>0))
            {
                $config['image_library'] = 'gd2';
                $config['source_image'] = dirname(__file__).'/../../../'.$image['full_path'];
                $config['create_thumb'] = TRUE;
                $config['maintain_ratio'] = TRUE;
                if(!empty($width))$config['width'] = $width;
                if(!empty($height))$config['height'] = $height;
                $config['quality'] = 70;//图片质量
                $config['master_dim'] = 'auto';
                //开始处理图片
                $this->load->library('image_lib', $config);
                if ($this->image_lib->resize())
                {
                    $new_path = explode('.',$image['full_path']);
                    $image['full_path'] = $new_path[0].'_thumb.'.$new_path[1];//新文件地址
                }
            }
            $info = array(
                "originalName" => $image['orig_name'] ,
                "name"         => $image['file_name'] ,
                "url"          => $image['full_path'] ,
                "size"         => $image['file_size'] ,
                "type"         => $image['file_ext'] ,
                "rand_num"     => time() ,
                //"Orientation"  => $exif['Orientation'],
                "state"        => 'SUCCESS'
            );
        }
        else
        {
            $info = array(
                "state"  => $this->upload->display_errors()
            );
        }
        /**
         * 返回数据
         */
        if($callback)
        {
            echo '<script>'.$callback.'('.json_encode($info).')</script>';
        }
        else
        {
            echo json_encode($info);
        }
    }

    //旋转头像
    public function rotate()
    {
        $full_path = $this->input->get_post('pic_url');
        $rotation_angle = $this->input->get_post('rotation_angle');
        if(!empty($full_path) && !empty($rotation_angle))
        {
            $config['image_library'] = 'gd2';
            $config['source_image'] = dirname(__file__).'/../../../'.$full_path;
            $config['rotation_angle'] = $rotation_angle;
            //开始处理图片
            $this->load->library('image_lib', $config);
            if ($this->image_lib->rotate())
            {
                return true;
            }else{
                echo $this->image_lib->display_errors();
            }
        }
    }
}