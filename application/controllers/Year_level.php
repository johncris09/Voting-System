<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Year_level extends CI_Controller
{
	/**
	 * Year Level constructor 
	 */
	public function __construct()
	{
		parent::__construct();
		// redirect to login if user not login
		if (!$this->session->userdata('student_id') && !$this->session->userdata('admin_id')) {
			redirect('login');
		}
	}
	
	/**
	 * Index
	 * @description redirect to "year level" page under admin folder
	 * @return mixed
	 */
	public function index()
	{
		return $this->load->view('admin/year_level');
	}

	/**
	 * Load Year Level
	 * @description diplay the year level list
	 * @return json a data that use to display in "year level" page
	 */
	public function load_year_level()
	{
		$year_level = $this->year_level_model->fetch_year_level();
		$output     = '';

		$output .= '
			<table id="year_level_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Dept. Code</th>
						<th>Year Level</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($year_level->num_rows() > 0) {
			foreach ($year_level->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['year_level_id'] . '</td>
						<td>' . $row['department_code'] . '</td>
						<td>' . $row['year_level'] . '</td>
						<td><a title="Edit" href="' . base_url() . 'year_level/edit_year_level/' . $row['year_level_id'] . '" class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['year_level_id'] . '" class="text-danger text-lg delete_year_level"><i class="fa fa-trash"></i></a></td>
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
	 * Add Year Level
	 * @description redirect to "add year level" page under admin folder
	 * @return mixed
	 */
	public function add_year_level()
	{
		$data['department'] = $this->department_model->fetch_department();
		return $this->load->view('admin/add_year_level', $data);
	}

	/**
	 * Insert Year Level
	 * @description add new year level
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_year_level()
	{
		$year_level_info = array(
			'department_id' => $_POST['department'],
			'year_level'    => $_POST['year_level'],
		);

		$insert_year_level = $this->year_level_model->insert_year_level($year_level_info);
		if ($insert_year_level > 0) {
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
	 * Edit Year Level
	 * @description redirect to "edit year level" page under admin folder
	 * @param int $year_level_id use to select specific data
	 * @return mixed
	 */ 
	public function edit_year_level($year_level_id)
	{
		$data['department'] = $this->department_model->fetch_department();
		$data['year_level'] = $this->year_level_model->get_year_level($year_level_id);
		return $this->load->view('admin/edit_year_level', $data);
	}

	/**
	 * Update Year Level
	 * @description update selected year level
	 * @param int $year_level_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */  
	public function update_year_level($year_level_id)
	{
		$year_level_info = array(
			'year_level_id' => $year_level_id,
			'department_id' => $_POST['department'],
			'year_level'    => $_POST['year_level'],
		);

		$update_year_level = $this->year_level_model->update_year_level($year_level_info);
		if ($update_year_level) {
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
	 * Delete Year Level
	 * @description delete selected year level
	 * @param int $year_level_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */  
	public function delete_year_level($year_level_id)
	{
		$year_level_info = array(
			'year_level_id' => $year_level_id
		);

		$delete_year_level = $this->year_level_model->delete_year_level($year_level_info);
		if ($delete_year_level > 0) {
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

	/**
	 * Get Year Level by Department
	 * @description get year level base on selected department
	 * @param int $department_id use to select specific year level
	 * @return json an array that holds the data use to display in "add student" page
	 */  
	public function get_year_level_by_department($department_id)
	{
		$get_year_level_by_department = $this->year_level_model->get_year_level_by_department($department_id);
		$output = '<option value="">Select</option>';
		if ($get_year_level_by_department->num_rows() > 0) {
			foreach ($get_year_level_by_department->result_array() as $row) {
				$output .= '
					<option value="' . $row['year_level_id'] . '">' . $row['year_level'] . '</option>
				';
			}
		}
		echo json_encode($output);
	}

	/**
	 * Get Year Level by Student
	 * @description get department base on selected student
	 * @param int $student_id use to select specific department base on student
	 * @return json an array that holds the data use to display in "edit student" page
	 */
	public function get_year_level_by_student($student_id)
	{ 
		$get_year_level_by_department = $this->year_level_model->get_year_level_by_student($student_id);
		$output = '<option value="">Select</option>';
		if ($get_year_level_by_department->num_rows() > 0) {
			foreach ($get_year_level_by_department->result_array() as $row) {
				$output .= '
					<option value="' . $row['year_level_id'] . '">' . $row['year_level'] . '</option>
				';
			}
		}
		echo json_encode($output);
	}
}
