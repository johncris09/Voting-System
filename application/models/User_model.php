<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 

class User_model extends CI_Model
{
	/**
	 * User_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch User
	 * @description fetch user's information 
	 * @return array user's information
	 */
  public function fetch_user()
  {
		return $this->db->get('admin');
	}

	/**
	 * Insert user
	 * @description insert new user 
	 * @param array $user_info data of the user
	 * @return int number of affected rows
	 */ 
	public function insert_user($user_info)
	{
		$this->db->insert('admin', $user_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get User
	 * @description get specific data of user
	 * @param int $user_id use to select specific user 
	 * @return array specific information of the user base on the parameter which is the user id
	 */ 
	public function get_user($user_id)
  {
		$this->db->where('admin_id', $user_id);
		$query = $this->db->get('admin');
		return $query->result_array()[0];
	}

	/**
	 * Update User
	 * @description update the selected user
	 * @param array $user_info data of the user to be updated
	 * @return bool 
	 */
	public function update_user($user_info)
  {
		$this->db->where('admin_id', $user_info['admin_id']);
		$query = $this->db->update('admin', $user_info);
		return $query;
	}

	/**
	 * Delete User
	 * @description delete the selected user
	 * @param array $user_info data of the user to be deleted
	 * @return int number of affected rows
	 */
	public function delete_user($user_info)
  {
		$this->db->where($user_info);
		$query = $this->db->delete('admin');
		return $this->db->affected_rows(); 
	}  
}
