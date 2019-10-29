<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Year_level_model extends CI_Model
{
	/**
	 * Year_level_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch Year Level
	 * @description fetch year level's information 
	 * @return array year level's information
	 */
	public function fetch_year_level()
	{
		$this->db->select('*');
		$this->db->from('year_level');
		$this->db->join('department', 'department.department_id = year_level.department_id');
		return $this->db->get();
	}

	/**
	 * Insert Year Level
	 * @description insert new year level 
	 * @param array $year_level_info data of the year level
	 * @return int number of affected rows
	 */ 
	public function insert_year_level($year_level_info)
	{
		$this->db->insert('year_level', $year_level_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get Year Level
	 * @description get specific data of year level
	 * @param int $year_level_id use to select specific year level 
	 * @return array specific information of the year level base on the parameter which is the year level id
	 */ 
	public function get_year_level($year_level_id)
	{
		$this->db->select('*');
		$this->db->from('year_level');
		$this->db->join('department', 'department.department_id = year_level.department_id');
		$this->db->where('year_level.year_level_id', $year_level_id);
		$query = $this->db->get();
		return $query->result_array()[0];
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
	 * Get Department
	 * @description update the selected year level
	 * @param int $year_level_info use to update specific year level 
	 * @return bool
	 */ 
	public function update_year_level($year_level_info)
	{
		$this->db->where('year_level_id', $year_level_info['year_level_id']);
		$query = $this->db->update('year_level', $year_level_info);
		return $query;
	}

	/**
	 * Delete Year Level
	 * @description delete the selected year level
	 * @param array $year_level_info data of the year level to be deleted
	 * @return int number of affected rows
	 */
	public function delete_year_level($year_level_info)
	{
		$this->db->where($year_level_info);
		$query = $this->db->delete('year_level');
		return $this->db->affected_rows();
	}

	/**
	 * Get Year Level base on the department
	 * @description get all year level base on selected department
	 * @param int $department_id use to select all year level under on the department
	 * @return array specific information of the year level 
	 */ 
	public function get_year_level_by_department($department_id)
	{
		$this->db->from('year_level');
		$this->db->join('department', 'department.department_id = year_level.department_id');
		$this->db->where('department.department_id', $department_id);
		return $this->db->get();
	}

	/**
	 * Get Department base on the student
	 * @description get all department of the student
	 * @param int $student_id use to select all year level base on select student
	 * @return array specific information of the year level 
	 */ 
	public function get_department_by_student($student_id)
	{
		// get the year level of that student
		$this->db->select('year_level');
		$this->db->from('student');
		$this->db->where('student_id', $student_id);
		$year_level = $this->db->get()->result_array()[0];

		$this->db->select('year_level.*');
		$this->db->from('year_level ');
		$this->db->where('year_level_id ', $year_level['year_level']);
		$year_level = $this->db->get()->result_array()[0];
		return $year_level;
	}

	/**
	 * Get Year Level base on the department 
	 * @param int $student_id 
	 * @return array specific information of the year level 
	 */ 
	public function get_year_level_by_student($student_id)
	{
		// select student.year_level from student where student_id = $student_id
		$this->db->select('year_level');
		$this->db->from('student');
		$this->db->where('student_id', $student_id);
		$year_level = $this->db->get()->result_array()[0];

		// select year_level.* from year_level where year_level_id = $year_level
		$this->db->select('year_level.*');
		$this->db->from('year_level ');
		$this->db->where('year_level_id ', $year_level['year_level']);
		$department_id = $this->db->get()->result_array()[0];

		// select department.* from department where department_id = $department_id
		$this->db->select('department.*');
		$this->db->from('department');
		$this->db->where('department_id', $department_id['department_id']);
		$department = $this->db->get()->result_array()[0];
		
		// select * from year_level, department where department.department_id = year_level.department_id and department.department_id = $department
		$this->db->from('year_level');
		$this->db->join('department', 'department.department_id = year_level.department_id');
		$this->db->where('department.department_id', $department['department_id']);
		$year_level = $this->db->get();
		return $year_level;
	}
}
