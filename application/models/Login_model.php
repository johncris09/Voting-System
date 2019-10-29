<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_model extends CI_Model
{
	/**
	 * Login_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Admin Login
	 * @description check if admin's information exist in the databaes
	 * @return int 
	 */
	public function admin_login($admin_info)
	{
		$this->db->where($admin_info);
		$query = $this->db->get('admin');
		return $query->num_rows();
	}

	/**
	 * Voter Login
	 * @description check if voter's information exist in the databaes
	 * @return int 
	 */
	public function voter_login($voter_info)
	{
		$this->db->where($voter_info);
		$query = $this->db->get('student');
		return $query->num_rows();
	}
 
	/**
	 * is Vote
	 * @description check if voter already vote
	 * @param array $voter_info use to select the specific information of the voter
	 * @return int 
	 */
	public function is_vote($voter_info)
	{
		$this->db->where($voter_info);
		$this->db->where('is_vote', 'yes');
		$query = $this->db->get('student');
		return $query->num_rows();
	}

	/**
	 * Fetch Voter's Information
	 * @description fetch the inforamtion of the voter
	 * @param array $voter_info use to select the specific information of the voter
	 * @return array
	 */
	public function fetch_voter_info($voter_info)
	{
		$this->db->where($voter_info);
		$query = $this->db->get('student');
		return $query->result();
	}

	/**
	 * Fetch Sdmin's Information
	 * @description fetch the inforamtion of the admin
	 * @param array $admin_info use to select the specific information of the admin
	 * @return array
	 */
	public function fetch_admin_info($admin_info)
	{
		$this->db->where($admin_info);
		$query = $this->db->get('admin');
		return $query->result();
	}
}
