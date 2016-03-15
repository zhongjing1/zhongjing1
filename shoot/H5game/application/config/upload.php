<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//注意：修改路径需要注意system/libraries/upload.php 603行有变动
$config['upload_path'] = './uploads/'.date('Ymd',time()).'/';
if(!file_exists($config['upload_path']))mkdir($config['upload_path']);
$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc|docx|xls|xlsx|rar|zip';
$config['overwrite'] = FALSE;
$config['max_size'] = '100000';
$config['encrypt_name'] = TRUE;
$config['remove_spaces'] = TRUE;

/* End of file upload.php */
/* Location: ./application/config/upload.php */