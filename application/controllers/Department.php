<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Department extends CI_Controller
{ 
	/**
	 * Department constructor 
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
	 * @description redirect to "department" page under admin folder
	 * @return mixed
	 */ 
	public function index()
	{
		return $this->load->view('admin/department');
	}

	/**
	 * Load Department
	 * @description diplay the department list
	 * @return json a data that use to display in "department" page
	 */
	public function load_department()
	{
		$department = $this->department_model->fetch_department();
		$output     = '';

		$output .= '
			<table id="department_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Dept. Code</th>
						<th>Department</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($department->num_rows() > 0) {
			foreach ($department->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['department_id'] . '</td>
						<td>' . $row['department_code'] . '</td>
						<td>' . $row['department_name'] . '</td>
						<td><a title="Edit" href="' . base_url() . 'department/edit_department/' . $row['department_id'] . '" class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['department_id'] . '" class="text-danger text-lg delete_department"><i class="fa fa-trash"></i></a></td>
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
	 * Add Department
	 * @description redirect to "add department" page under admin folder
	 * @return mixed
	 */
	public function add_department()
	{
		return $this->load->view('admin/add_department');
	}

	/**
	 * Insert Department
	 * @description add new department
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_department()
	{
		$department_info = array(
			'department_code' => $_POST['department_code'],
			'department_name' => $_POST['department_name'],
		);

		$insert_department = $this->department_model->insert_department($department_info);
		if ($insert_department > 0) {
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
	 * Edit Department
	 * @description redirect to "edit department" page under admin folder
	 * @param int $department_id use to select specific data
	 * @return mixed
	 */  
	public function edit_department($department_id)
	{
		$data['department']  = $this->department_model->get_department($department_id);
		return $this->load->view('admin/edit_department', $data);
	}

	/**
	 * Update Department
	 * @description update selected department
	 * @param int $department_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */
	public function update_department($department_id)
	{
		$department_info = array(
			'department_id'   => $department_id,
			'department_code' => $_POST['department_code'],
			'department_name' => $_POST['department_name'],
		);

		$update_department = $this->department_model->update_department($department_info);
		if ($update_department) {
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
	 * Delete Department
	 * @description delete selected department
	 * @param int $department_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function delete_department($department_id)
	{
		$department_info = array(
			'department_id' => $department_id
		);

		$delete_department = $this->department_model->delete_department($department_info);
		if ($delete_department > 0) {
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
