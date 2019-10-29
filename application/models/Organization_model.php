<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organization_model extends CI_Model 
{
	/**
	 * Organization_model constructor 
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Fetch organization
	 * @description fetch organization's information 
	 * @return array organization's information
	 */
  public function fetch_organization()
  {
		return $this->db->get('organization');
	}

	/**
	 * Insert Organization
	 * @description insert new organization 
	 * @param array $organization_info data of the organization
	 * @return int number of affected rows
	 */ 
	public function insert_organization($organization_info)
	{
		$this->db->insert('organization', $organization_info);
		return $this->db->affected_rows();
	}

	/**
	 * Get Organization
	 * @description get specific data of organization
	 * @param int $organization_id use to select specific organization 
	 * @return array specific information of the organization base on the parameter which is the organization id
	 */ 
	public function get_organization($organization_id)
  {
		$this->db->where('organization_id', $organization_id);
		$query = $this->db->get('organization');
		return $query->result_array()[0];
	}

	/**
	 * Update Organization
	 * @description update the selected organization
	 * @param array $organization_info data of the organization to be updated
	 * @return bool 
	 */
	public function update_organization($organization_info)
  {
		$this->db->where('organization_id', $organization_info['organization_id']);
		$query = $this->db->update('organization', $organization_info);
		return $query;
	}

	/**
	 * Delete Organization
	 * @description delete the selected organization
	 * @param array $organization_info data of the organization to be deleted
	 * @return int number of affected rows
	 */
	public function delete_organization($organization_info)
  {
		$this->db->where($organization_info);
		$query = $this->db->delete('organization');
		return $this->db->affected_rows();
		
	} 
	

}
