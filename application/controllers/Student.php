<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Student extends CI_Controller
{
	/**
	 * Student constructor 
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
	 * @description redirect to "student" page under admin folder
	 * @return mixed
	 */
	public function index()
	{
		return $this->load->view('admin/student');
	}

	/**
	 * Load Student
	 * @description diplay the student list
	 * @return json a data that use to display in "student" page
	 */
	public function load_student()
	{
		$student = $this->student_model->fetch_student();
		$output  = '';

		$output .= '
			<table id="student_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>ID #</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Gender</th>
						<th>Birthdate</th>
						<th>Mobile #</th>
						<th>Year Level</th>
						<th>is Vote</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($student->num_rows() > 0) {
			foreach ($student->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['student_id'] . '</td>
						<td>' . $row['id_number'] . '</td>
						<td>' . $row['last_name'] . '</td>
						<td>' . $row['first_name'] . '</td>
						<td>' . $row['middle_name'] . '</td>
						<td>' . $row['gender'] . '</td>
						<td>' . $row['birthdate'] . '</td>
						<td>' . $row['mobile_number'] . '</td>
						<td>' . $row['year_level'] . '</td>
						<td>' . $row['is_vote'] . '</td> 
						<td><a title="Edit" href="' . base_url() . 'student/edit_student/' . $row['student_id'] . '" class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['student_id'] . '" class="text-danger text-lg delete_student"><i class="fa fa-trash"></i></a></td>
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
	 * Add Student
	 * @description redirect to "add student" page under admin folder
	 * @return mixed
	 */
	public function add_student()
	{
		$data['department'] = $this->department_model->fetch_department();
		return $this->load->view('admin/add_student', $data);
	}

	/**
	 * Insert Student
	 * @description add new student
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_student()
	{
		$student_info = array(
			'id_number'     => $_POST['id_number'],
			'last_name'     => $_POST['last_name'],
			'first_name'    => $_POST['first_name'],
			'middle_name'   => $_POST['middle_name'],
			'gender'        => $_POST['gender'],
			'birthdate'     => $_POST['birthdate'],
			'mobile_number' => $_POST['mobile_number'],
			'year_level'    => $_POST['year_level'],
			'is_vote'       => "No",
		);

		$insert_student = $this->student_model->insert_student($student_info);
		if ($insert_student > 0) {
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
	 * Edit Student
	 * @description redirect to "edit student" page under admin folder
	 * @param int $student_id use to select specific data
	 * @return mixed
	 */ 
	public function edit_student($student_id)
	{
		$data = array(
			'department'         => $this->department_model->fetch_department(),
			'student'            => $this->student_model->get_student($student_id),
			'student_department' => $this->year_level_model->get_department_by_student($student_id),
			'year_level'         => $this->year_level_model->get_year_level_by_student($student_id),
		);
		return $this->load->view('admin/edit_student', $data);
	}

	/**
	 * Update Student
	 * @description update selected student
	 * @param int $student_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function update_student($student_id)
	{
		$student_info = array(
			'student_id'    => $student_id,
			'id_number'     => $_POST['id_number'],
			'last_name'     => $_POST['last_name'],
			'first_name'    => $_POST['first_name'],
			'middle_name'   => $_POST['middle_name'],
			'gender'        => $_POST['gender'],
			'birthdate'     => $_POST['birthdate'],
			'mobile_number' => $_POST['mobile_number'],
			'year_level'    => $_POST['year_level'],
			'is_vote'       => "No",
		);

		$update_student = $this->student_model->update_student($student_info);
		if ($update_student) {
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
	 * Delete Student
	 * @description delete selected student
	 * @param int $student_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */  
	public function delete_student($student_id)
	{
		$student_info = array(
			'student_id' => $student_id
		);

		$delete_student = $this->student_model->delete_student($student_info);
		if ($delete_student > 0) {
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
