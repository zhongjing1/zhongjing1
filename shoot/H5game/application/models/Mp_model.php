<?php
/**
 * @author wanghui <whlives@qq.com>
 * @version 1.0
 * @package 公众号
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Mp_model extends CI_Model {
	public function __construct()
	{
		/**
		 * 载入数据库类
		 */
		$this->load->database();
	}
	/**
	 * 添加
	 * @param array $data 添加数据
	 */
	public function insert($data = FALSE)
	{
		if($data !== FALSE)
		{
			$this->db->insert('mp' , $data);
			return $this->db->insert_id();
		}
	}

	/**
	 * 根据条件查询数据
	 * @param array $data
	 * @return array
	 */
	public function get_one($data = FALSE)
	{
		if($data !== FALSE)
		{
			$query = $this->db->get_where('mp' , $data);
			return $query->row_array();
		}
	}


	/**
	 * 根据ID修改数据
	 * @param array $data 修改数据
	 * @param array $id 数据id，也可以传入一个数组作为in修改
	 * @return array
	 */
	public function update_id($data = FALSE , $id = FALSE)
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
			$this->db->update('mp', $data);//echo $this->db->last_query();exit;
			return $this->db->affected_rows();
		}
	}


	/**
	 * 根据ID批量删除
	 * @param array $id 数据id，也可以传入一个数组作为in修改
	 * @return int
	 */
	public  function delete_id($id = FALSE)
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
			$this->db->delete('member');//echo $this->db->last_query();exit;
			return $this->db->affected_rows();
		}
	}

	/**
	 * 后台查询所有
	 * @param array $data 条件
	 * @return array
	 */
	public function get_mp_list($data = array(), $limit = 0, $offset = 0, $orderby = 'id desc')
	{
		if(!empty($data['username']))$this->db->like('username', $data['username']);
		if(!empty($data['title']))$this->db->like('title', $data['title']);
		if(!empty($data['status']))$this->db->where('status', $data['status']);
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
		$query = $this->db->get('mp');
		$list  = $query->result_array();//echo $this->db->last_query()."<br>";
		return $list;
	}
	/**
	 * 后台查询所有数据总数
	 * @param array $data 条件
	 * @return array
	 */
	public function get_mp_list_num($data = array())
	{
        if(!empty($data['username']))$this->db->like('username', $data['username']);
        if(!empty($data['title']))$this->db->like('title', $data['title']);
        if(!empty($data['status']))$this->db->where('status', $data['status']);
		return $this->db->count_all_results('mp');
	}
}
