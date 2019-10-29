<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Candidate extends CI_Controller
{
	/**
	 * Candidate constructor 
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
	 * @description redirect to "candidate" page under admin folder
	 * @return mixed
	 */ 
	public function index()
	{
		return $this->load->view('admin/candidate');
	}

	/**
	 * Load Candidate
	 * @description diplay the candidate list
	 * @return json a data that use to display in "candidate" page
	 */
	public function load_candidate()
	{
		$candidate = $this->candidate_model->fetch_candidate();
		$output    = '';

		$output .= '
			<table id="candidate_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Candidate</th>
						<th>Position</th>
						<th>Organization</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($candidate->num_rows() > 0) {
			foreach ($candidate->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['candidate_id'] . '</td>
						<td>' . ucwords($row['last_name'] . ', ' . $row['first_name'] . ' ' . $row['middle_name']) . '</td>
						<td>' . ucfirst($row['position']) . '</td>
						<td>' . ucfirst($row['organization']) . '</td>
						<td><a title="Edit" href=' . base_url() . 'candidate/edit_candidate/' . $row['candidate_id'] . ' class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['candidate_id'] . '" class="text-danger text-lg delete_candidate"><i class="fa fa-trash"></i></a></td>
					</tr>
				';
			}
		}


		$output .= '
				<tfoot>
					<tr>
						<th></th>
						<th></th>
						<th>Position</th>
						<th>Organization</th>
						<th></th>
						<th></th>
					</tr>
				</tfoot>
				</tbody>
			</table>
		';

		echo json_encode($output);
	}

	/**
	 * Add Candidate
	 * @description redirect to "add candidate" page under admin folder
	 * @return mixed
	 */
	public function add_candidate()
	{
		$data['student']      = $this->student_model->fetch_student();
		$data['position']     = $this->position_model->fetch_position();
		$data['organization'] = $this->organization_model->fetch_organization();
		return $this->load->view('admin/add_candidate', $data);
	}

	/**
	 * Insert Candidate
	 * @description add new candidate
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_candidate()
	{
		$candidate_info = array(
			'candidate'    => $_POST['candidate'],
			'position'     => $_POST['position'],
			'organization' => $_POST['organization'],
		);

		$insert_candidate = $this->candidate_model->insert_candidate($candidate_info);
		if ($insert_candidate > 0) {
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
	 * Edit Candidate
	 * @description redirect to "edit candidate" page under admin folder
	 * @param int $candidate_id use to select specific data
	 * @return mixed
	 */  
	public function edit_candidate($candidate_id)
	{
		$data['student']      = $this->student_model->fetch_student();
		$data['position']     = $this->position_model->fetch_position();
		$data['organization'] = $this->organization_model->fetch_organization();
		$data['candidate']    = $this->candidate_model->get_candidate($candidate_id);
		return $this->load->view('admin/edit_candidate', $data);
	}

	/**
	 * Update Candidate
	 * @description update selected candidate
	 * @param int $candidate_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */
	public function update_candidate($candidate_id)
	{
		$candidate_info = array(
			'candidate_id' => $candidate_id,
			'candidate'    => $_POST['candidate'],
			'position'     => $_POST['position'],
			'organization' => $_POST['organization'],
		);

		$update_candidate = $this->candidate_model->update_candidate($candidate_info);
		if ($update_candidate) {
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
	 * Delete Candidate
	 * @description delete selected candidate
	 * @param int $candidate_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function delete_candidate($candidate_id)
	{
		$candidate_info = array(
			'candidate_id' => $candidate_id
		);

		$delete_candidate = $this->candidate_model->delete_candidate($candidate_info);
		if ($delete_candidate > 0) {
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
