<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class Student_model extends CI_Model 
{
	/**
	 * Student_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch Student
	 * @description fetch student's information 
	 * @return array student's information
	 */
  public function fetch_student()
  {
		return $this->db->get('student');
	}

	/**
	 * Insert Student
	 * @description insert new student 
	 * @param array $student_info data of the student
	 * @return int number of affected rows
	 */ 
	public function insert_student($student_info)
	{
		$this->db->insert('student', $student_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get Student
	 * @description get specific data of student
	 * @param int $student_id use to select specific student 
	 * @return array specific information of the student base on the parameter which is the student id
	 */ 
	public function get_student($student_id)
  {
		$this->db->where('student_id', $student_id);
		$query = $this->db->get('student');
		return $query->result_array()[0];
	}

	/**
	 * Update Student
	 * @description update the selected student
	 * @param array $student_info data of the student to be updated
	 * @return bool 
	 */
	public function update_student($student_info)
  {
		$this->db->where('student_id', $student_info['student_id']);
		$query = $this->db->update('student', $student_info);
		return $query;
	}

	/**
	 * Delete Student
	 * @description delete the selected student
	 * @param array $student_info data of the student to be deleted
	 * @return int number of affected rows
	 */
	public function delete_student($student_info)
  {
		$this->db->where($student_info);
		$query = $this->db->delete('student');
		return $this->db->affected_rows(); 
	} 

	/**
	 * Update Voter's Status
	 * @description update the status of the voter
	 * @description set is_vote field to "yes" 
	 */
	public function update_voter_status()
	{ 
		$is_vote = array(
			'is_vote' =>  "Yes",
		);
		
		$this->db->where('student_id',$this->session->userdata("student_id"));  
		$this->db->update('student', $is_vote);
	}

	/**
	 * Done Vote
	 * @description select those students who done voting 
	 */ 
	public function done_vote()
	{ 
		$this->db->where('is_vote', "yes");
		return $this->db->get('student');
	}

	/**
	 * Not Vote
	 * @description select those students who does not vote 
	 */ 
	public function not_vote()
	{  
		$this->db->where('is_vote', "no");
		return $this->db->get('student');
	} 
} 
