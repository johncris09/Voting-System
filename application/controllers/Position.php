<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Position extends CI_Controller
{
	/**
	 * Position constructor 
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
	 * @description redirect to "position" page under admin folder
	 * @return mixed
	 */ 
	public function index()
	{
		if ($this->session->userdata('admin_id') != "") {
			return $this->load->view('admin/position');
		} else {
			return $this->load->view('student/dashboard');
		}
	}

	/**
	 * Load Position
	 * @description diplay the position list
	 * @return json a data that use to display in "position" page
	 */
	public function load_position()
	{
		$position = $this->position_model->fetch_position();
		$output   = '';

		$output .= '
			<table id="position_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Position</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($position->num_rows() > 0) {
			foreach ($position->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['position_id'] . '</td>
						<td>' . ucwords($row['position']) . '</td>
						<td><a title="Edit" href="' . base_url() . 'position/edit_position/' . $row['position_id'] . '" class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['position_id'] . '" class="text-danger text-lg delete_position"><i class="fa fa-trash"></i></a></td>
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
	 * Add Position
	 * @description redirect to "add position" page under admin folder
	 * @return mixed
	 */
	public function add_position()
	{
		return $this->load->view('admin/add_position');
	}

	/**
	 * Insert Position
	 * @description add new position
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_position()
	{
		$position_info = array(
			'position' => $_POST['position'],
		);

		$insert_position = $this->position_model->insert_position($position_info);
		if ($insert_position > 0) {
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
	 * Edit Position
	 * @description redirect to "edit position" page under admin folder
	 * @param int $position_id use to select specific data
	 * @return mixed
	 */ 
	public function edit_position($position_id)
	{
		$data['position']  = $this->position_model->get_position($position_id);
		return $this->load->view('admin/edit_position', $data);
	}

	/**
	 * Update Position
	 * @description update selected position
	 * @param int $position_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function update_position($position_id)
	{
		$position_info = array(
			'position_id' => $position_id,
			'position'    => $_POST['position'],
		);

		$update_position = $this->position_model->update_position($position_info);
		if ($update_position) {
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
	 * Delete Position
	 * @description delete selected position
	 * @param int $position_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */  
	public function delete_position($position_id)
	{
		$position_info = array(
			'position_id' => $position_id
		);

		$delete_position = $this->position_model->delete_position($position_info);
		if ($delete_position > 0) {
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
