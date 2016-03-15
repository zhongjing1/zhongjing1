<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 公共查询
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loop_model extends CI_Model {
	public function __construct()
	{
		/**
		 * 载入数据库类
		 */
		$this->load->database();
	}

    /**
     * 添加
     * @param str $table 数据表名称
     * @param array $data 添加数据
     */
    public function insert($table, $data = FALSE)
    {
        if($data !== FALSE)
        {
            $this->db->insert($table, $data);//echo $this->db->last_query();
            return $this->db->insert_id();
        }
    }

	/**
	 * 根据条件查询数据
     * @param str $table 数据表名称
	 * @param array $data
	 * @return array
	 */
	public function get_one($table, $data = FALSE, $orderby = '')
	{
		if($data !== FALSE)
		{
			//排序
			if(!empty($orderby))
			{
				$this->db->order_by($orderby);
			}
			$query = $this->db->get_where($table , $data);//echo $this->db->last_query();//exit;
			return $query->row_array();
		}
	}

    /**
     * 根据ID修改数据
     * @param str $table 数据表名称
     * @param array $data 修改数据
     * @param array $id 数据id，也可以传入一个数组作为in修改
     * @return array
     */
    public function update_id($table, $data = FALSE , $id = FALSE)
    {
        if ($data !== FALSE && !empty($id))
        {
            if(!empty($data['set']))
            {
                $this->db->set($data['set'][0] , $data['set'][1] , false);
                unset($data['set']);
            }
            //判断是否需要in条件
            if(is_array($id))
            {
                $this->db->where_in('id' , $id);
            }
            else
            {
                $this->db->where('id',$id);
            }
            $this->db->update($table, $data);//echo $this->db->last_query();exit;
            return $this->db->affected_rows();
        }
    }

	/**
	 * 查询所有
     * @param str $table 数据表名称
	 * @param array $data 条件
	 * @return array
	 */
	public function get_list($table, $data = array(), $limit = 0, $offset = 0, $orderby = '')
	{
		foreach($data as $val=>$key)
		{
			switch($val){
				case 'and':        if(!empty($key))$this->db->where($key);break;
				case 'or':         if(!empty($key))$this->db->or_where($key);break;
				case 'in':         if(!empty($key))$this->db->where_in($key[0], $key[1]);break;
				case 'or_in':      if(!empty($key))$this->db->or_where_in($key);break;
				case 'not_in':     if(!empty($key))$this->db->where_not_in($key);break;
				case 'or_not_in':  if(!empty($key))$this->db->or_where_not_in($key);break;
				case 'like':       if(!empty($key))$this->db->like($key);break;
				case 'or_like':    if(!empty($key))$this->db->or_like($key);break;
				case 'not_like':   if(!empty($key))$this->db->not_like($key);break;
				case 'or_not_like':if(!empty($key))$this->db->or_not_like($key);break;
				case 'join':       if(!empty($key))$this->db->join($key[0],$key[1],$key[2]);break;
				case 'from':       if(!empty($key))$this->db->from($key);break;
                case 'select':     if(!empty($key))$this->db->select($key);break;
				default:$this->db->where($data);break;//不满足以上条件直接调用where
			}
		}
		//查询数量
		if(!empty($limit))
		{
			$this->db->limit($limit, $offset);
		}
		//排序
		if(!empty($orderby))
		{
			$this->db->order_by($orderby);
		}
		$query = $this->db->get($table);
		$list  = $query->result_array();//echo $this->db->last_query()."<br>";
		return $list;
	}
	/**
	 * 查询所有数据总数
     * @param str $table 数据表名称
	 * @param array $data 条件
	 * @return array
	 */
	public function get_list_num($table, $data = array())
	{
		foreach($data as $val=>$key)
		{
			switch($val){
				case 'and':        if(!empty($key))$this->db->where($key);break;
				case 'or':         if(!empty($key))$this->db->or_where($key);break;
				case 'in':         if(!empty($key))$this->db->where_in($key);break;
				case 'or_in':      if(!empty($key))$this->db->or_where_in($key);break;
				case 'not_in':     if(!empty($key))$this->db->where_not_in($key);break;
				case 'or_not_in':  if(!empty($key))$this->db->or_where_not_in($key);break;
				case 'like':       if(!empty($key))$this->db->like($key);break;
				case 'or_like':    if(!empty($key))$this->db->or_like($key);break;
				case 'not_like':   if(!empty($key))$this->db->not_like($key);break;
				case 'or_not_like':if(!empty($key))$this->db->or_not_like($key);break;
				case 'join':       if(!empty($key))$this->db->join($key[0],$key[1],$key[2]);break;
                case 'select':     if(!empty($key))$this->db->select($key);break;
				default:$this->db->where($data);break;//不满足以上条件直接调用where
			}
		}
        $all_num = $this->db->count_all_results($table);
        //echo $this->db->last_query();
		return $all_num;
	}
	
	/**
	 * 根据ID批量删除
	 * @param str $table 数据表名称
	 * @param array $id 数据id，也可以传入一个数组作为in修改
	 * @return int
	 */
	public  function delete_id($table, $id = FALSE)
	{
		if(!empty($id))
		{
			//判断是否需要in条件
			if(is_array($id))
			{
				$this->db->where_in('id' , $id);
			}
			else
			{
				$this->db->where('id',$id);
			}
			$this->db->delete($table);//echo $this->db->last_query();exit;
			return $this->db->affected_rows();
		}
	}
}
