<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Candidate_model extends CI_Model
{ 
	/**
	 * Candidate_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch candidate
	 * @description fetch candidate's information 
	 * @return array candidate's information
	 */
	public function fetch_candidate()
	{
		$this->db->select('*');
		$this->db->from('candidate');
		$this->db->join('student', 'candidate.candidate = student.student_id');
		$this->db->join('position', 'position.position_id = candidate.position');;
		$this->db->join('organization', 'organization.organization_id = candidate.organization');
		return $this->db->get();
	}

	/**
	 * Insert Candidate
	 * @description insert new candidate 
	 * @param array $candidate_info data of the candidate
	 * @return int number of affected rows
	 */ 
	public function insert_candidate($candidate_info)
	{
		$this->db->insert('candidate', $candidate_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get Candidate
	 * @description get specific data of candidate
	 * @param int $candidate_id use to select specific data 
	 * @return array specific information of the candidate base on the parameter which is the candidate id
	 */  
	public function get_candidate($candidate_id)
	{
		$this->db->from('candidate');
		$this->db->join('student', 'candidate.candidate = student.student_id');
		$this->db->join('position', 'position.position_id = candidate.position');;
		$this->db->join('organization', 'organization.organization_id = candidate.organization');
		$this->db->where('candidate.candidate_id', $candidate_id);
		$query =  $this->db->get();
		return $query->result_array()[0];
	}

	/**
	 * Update Candidate
	 * @description update the selected candidate
	 * @param array $candidate_info data of the candidate to be updated
	 * @return bool 
	 */
	public function update_candidate($candidate_info)
	{
		$this->db->where('candidate_id', $candidate_info['candidate_id']);
		$query = $this->db->update('candidate', $candidate_info);
		return $query;
	}

	/**
	 * Delete Candidate
	 * @description delete the selected candidate
	 * @param array $candidate_info data of the candidate to be deleted
	 * @return int number of affected rows
	 */
	public function delete_candidate($candidate_info)
	{
		$this->db->where($candidate_info);
		$query = $this->db->delete('candidate');
		return $this->db->affected_rows();
	}

	/**
	 * Vote
	 * @description update the vote of the candidate
	 * @param array $data data of the selected candidates
	 * @return bool
	 */ 
	public function vote($data)
	{
		for ($i = 0; $i < sizeof($data); $i++) {
			$vote = $this->get_vote($data[$i]) + 1;
			// return false if something went wrong
			if (!$this->update_vote($data[$i], $vote)) {
				return false;
			}
		}
		return true;
	}

	/**
	 * Get Candidate's Vote
	 * @description get the vote of the selected candidate
	 * @param int $candidate_id use to select the specific information of the candidate 
	 * @return int candidate's vote
	 */ 
	private function get_vote($candidate_id)
	{
		$this->db->where('candidate_id', $candidate_id);
		$vote = $this->db->get('candidate')->result_array()[0]['vote'];
		return $vote;
	}

	/**
	 * Update Candidate's Vote
	 * @description get the vote of the selected candidate
	 * @param int $candidate_id use to update the vote of the selected candidate
	 * @param int $vote update the candidate's vote
	 * @return bool
	 */ 
	private function update_vote($candidate_id, $vote)
	{
		$update_vote = array(
			'vote' => $vote,
		);
		$this->db->where('candidate_id', $candidate_id);
		$query = $this->db->update('candidate', $update_vote);
		return $query;
	}
}
