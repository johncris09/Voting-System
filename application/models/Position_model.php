<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Position_model extends CI_Model 
{
	/**
	 * Position_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch Position
	 * @description fetch position's information 
	 * @return array position's information
	 */
  public function fetch_position()
  {
		return $this->db->get('position');
	}

	/**
	 * Insert Position
	 * @description insert new position 
	 * @param array $position_info data of the position
	 * @return int number of affected rows
	 */ 
	public function insert_position($position_info)
	{
		$this->db->insert('position', $position_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get Position
	 * @description get specific data of position
	 * @param int $position_id use to select specific position 
	 * @return array specific information of the position base on the parameter which is the position id
	 */ 
	public function get_position($position_id)
  {
		$this->db->where('position_id', $position_id);
		$query = $this->db->get('position');
		return $query->result_array()[0];
	}

	/**
	 * Update Position
	 * @description update the selected position
	 * @param array $position_info data of the position to be updated
	 * @return bool 
	 */
	public function update_position($position_info)
  {
		$this->db->where('position_id', $position_info['position_id']);
		$query = $this->db->update('position', $position_info);
		return $query;
	}

	/**
	 * Delete Position
	 * @description delete the selected position
	 * @param array $position_info data of the position to be deleted
	 * @return int number of affected rows
	 */
	public function delete_position($position_info)
  {
		$this->db->where($position_info);
		$query = $this->db->delete('position');
		return $this->db->affected_rows(); 
	}  
}
