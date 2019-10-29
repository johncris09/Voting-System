<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller 
{ 
	/**
	 * User constructor 
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
	 * @description redirect to "user page" page under admin folder
	 * @return mixed
	 */
	public function index()
	{
		return $this->load->view('admin/user');
	}

	/**
	 * Load User
	 * @description diplay the user list
	 * @return json a data that use to display in "user" page
	 */
	public function load_user()
	{
		$user = $this->user_model->fetch_user();
		$output     = '';

		$output .= '
			<table id="user_data" class="table " cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Last Name</th>
						<th>First Name</th>
						<th>Middle Name</th>
						<th>Username</th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
		';

		if ($user->num_rows() > 0) {
			foreach ($user->result_array() as $row) {
				$output .= '
					<tr>
						<td>' . $row['admin_id'] . '</td>
						<td>' . $row['last_name'] . '</td>
						<td>' . $row['first_name'] . '</td>
						<td>' . $row['middle_name'] . '</td>
						<td>' . $row['username'] . '</td>
						<td><a title="Edit" href="' . base_url() . 'user/edit_user/' . $row['admin_id'] . '" class="text-warning text-lg"><i class="fa fa-edit"></i></a></td>
						<td><a title="Delete"  id="' . $row['admin_id'] . '" class="text-danger text-lg delete_user"><i class="fa fa-trash"></i></a></td>
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
	 * Add User
	 * @description redirect to "add user" page under admin folder
	 * @return mixed
	 */
	public function add_user()
	{
		return $this->load->view('admin/add_user');
	}

	/**
	 * Insert User
	 * @description add new user
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function insert_user()
	{
		$user_info = array(
			'last_name'   => $_POST['last_name'],
			'first_name'  => $_POST['first_name'],
			'middle_name' => $_POST['middle_name'],
			'username'    => $_POST['username'],
			'password'    => md5($_POST['password']),
		);

		$insert_user = $this->user_model->insert_user($user_info);
		if ($insert_user > 0) {
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
	 * Edit User
	 * @description redirect to "edit user" page under admin folder
	 * @param int $user_id use to select specific data
	 * @return mixed
	 */ 
	public function edit_user($user_id)
	{
		$data['user']  = $this->user_model->get_user($user_id);
		return $this->load->view('admin/edit_user', $data);
	}

	/**
	 * Update User
	 * @description update selected user
	 * @param int $admin_id use to update the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function update_user($admin_id)
	{
		$user_info = array(
			'admin_id'    => $admin_id,
			'last_name'   => $_POST['last_name'],
			'first_name'  => $_POST['first_name'],
			'middle_name' => $_POST['middle_name'],
			'username'    => $_POST['username'],
		);

		// add the password to array if it is not empty
		if (!empty($_POST["password"])) {
			$user_info["password"] = md5($_POST["password"]);
		}

		$update_user = $this->user_model->update_user($user_info);
		if ($update_user) {
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
	 * Update User
	 * @description delete selected user
	 * @param int $admin_id use to delete the selected data
	 * @return json an array that holds the data for jquery confirm plugin 
	 */  
	public function delete_user($admin_id)
	{
		$user_info = array(
			'admin_id' => $admin_id
		);

		$delete_user = $this->user_model->delete_user($user_info);
		if ($delete_user > 0) {
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
