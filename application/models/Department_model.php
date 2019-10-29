<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Department_model extends CI_Model
{
	/**
	 * Department_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch department
	 * @description fetch department's information 
	 * @return array department's information
	 */
	public function fetch_department()
	{
		return $this->db->get('department');
	}

	/**
	 * Insert Department
	 * @description insert new department 
	 * @param array $department_info data of the department
	 * @return int number of affected rows
	 */ 
	public function insert_department($department_info)
	{
		$this->db->insert('department', $department_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get Department
	 * @description get specific data of department
	 * @param int $department_id use to select specific department 
	 * @return array specific information of the department base on the parameter which is the department id
	 */ 
	public function get_department($department_id)
	{
		$this->db->where('department_id', $department_id);
		$query = $this->db->get('department');
		return $query->result_array()[0];
	}

	/**
	 * Update Department
	 * @description update the selected department
	 * @param array $department_info data of the department to be updated
	 * @return bool 
	 */
	public function update_department($department_info)
	{
		$this->db->where('department_id', $department_info['department_id']);
		$query = $this->db->update('department', $department_info);
		return $query;
	}

	/**
	 * Delete Department
	 * @description delete the selected department
	 * @param array $department_info data of the department to be deleted
	 * @return int number of affected rows
	 */
	public function delete_department($department_info)
	{
		$this->db->where($department_info);
		$query = $this->db->delete('department');
		return $this->db->affected_rows();
	}
}
