<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organization extends CI_Controller
{
	/**
	 * Organization constructor 
	 */
	public function __construct()
	{
		parent::__construct();
		// redirect to login page if user not login
		if (!$this->session->userdata('student_id') && !$this->session->userdata('admin_id')) {
			redirect('login');
		}
	} 
	
	/**
	 * Index
	 * @description redirect to "organization" page under admin folder
	 * @return mixed
	 */ 
	public function index()
	{
		return $this->load->view('admin/organization');
	}

	/**
	 * Load Organization
	 * @description diplay the organization list
	 * @return json a data that use to display in "organization" page
	 */
	public function load_organization()
	{
		$organization = $this->organization_model->fetch_organization();
		$output       = '';

		$output .= '
			<table id="organization_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>organization</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($organization->num_rows() > 0) {
			foreach ($organization->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['organization_id'] . '</td>
						<td>' . $row['organization'] . '</td>
						<td><a title="Edit" href="' . base_url() . 'organization/edit_organization/' . $row['organization_id'] . '" class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['organization_id'] . '" class="text-danger text-lg delete_organization"><i class="fa fa-trash"></i></a></td>
					</tr>
				';
			}
		}


		$output .= '
				</tbody>
			</table>
		';

		echo json_encode($output);
	}

	/**
	 * Add Organization
	 * @description redirect to "add organization" page under admin folder
	 * @return mixed
	 */
	public function add_organization()
	{
		return $this->load->view('admin/add_organization');
	}

	/**
	 * Insert organization
	 * @description add new organization
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_organization()
	{
		$organization_info = array(
			'organization' => $_POST['organization'],
		);

		$insert_organization = $this->organization_model->insert_organization($organization_info);
		if ($insert_organization > 0) {
			$data = [
				'response' => true,
				'title'    => "Successfully Added",
				'content'  => "New Record Successfully Added!",
				'icon'     => 'fa fa-check',
				'type'     => 'green',
				'btnClass' => 'btn-success',
			];
		} else {
			$data = [
				'response' => false,
				'title'    => "Error!",
				'content'  => "Something went wrong",
				'icon'     => 'fa fa-warning',
				'type'     => 'red',
				'btnClass' => 'btn-danger',
			];
		}

		echo json_encode($data);
	}

	/**
	 * Edit Organization
	 * @description redirect to "edit organization" page under admin folder
	 * @param int $organization_id use to select specific data
	 * @return mixed
	 */  
	public function edit_organization($organization_id)
	{
		$data['organization']  = $this->organization_model->get_organization($organization_id);
		return $this->load->view('admin/edit_organization', $data);
	}

	/**
	 * Update Oragnization
	 * @description update selected oragnization
	 * @param int $oragnization_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function update_organization($organization_id)
	{
		$organization_info = array(
			'organization_id' => $organization_id,
			'organization'    => $_POST['organization'],
		);

		$update_organization = $this->organization_model->update_organization($organization_info);
		if ($update_organization) {
			$data = [
				'response' => true,
				'title'    => "Successfully Updated",
				'content'  => "New Record Successfully Updated!",
				'icon'     => 'fa fa-check',
				'type'     => 'green',
				'btnClass' => 'btn-success',
			];
		} else {
			$data = [
				'response' => false,
				'title'    => "Error!",
				'content'  => "Something went wrong",
				'icon'     => 'fa fa-warning',
				'type'     => 'red',
				'btnClass' => 'btn-danger',
			];
		}

		echo json_encode($data);
	}
	
	/**
	 * Delete Organization
	 * @description delete selected organization
	 * @param int $organization_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function delete_organization($organization_id)
	{
		$organization_info = array(
			'organization_id' => $organization_id
		);

		$delete_organization = $this->organization_model->delete_organization($organization_info);
		if ($delete_organization > 0) {
			$data = [
				'response' => true,
				'title'    => "Successfully Deleted",
				'content'  => "New Record Successfully Deleted!",
				'icon'     => 'fa fa-check',
				'type'     => 'green',
				'btnClass' => 'btn-success',
			];
		} else {
			$data = [
				'response' => false,
				'title'    => "Error!",
				'content'  => "Something went wrong",
				'icon'     => 'fa fa-warning',
				'type'     => 'red',
				'btnClass' => 'btn-danger',
			];
		}

		echo json_encode($data);
	}
}
