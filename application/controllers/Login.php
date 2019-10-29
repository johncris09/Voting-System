<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{ 
	/**
	 * Login constructor 
	 */
	public function __construct()
	{
		parent::__construct();
		// redirect to dashboard if user already login
		if ($this->session->userdata('student_id') || $this->session->userdata('admin_id')) {
			redirect('voting_system');
		}
	} 
	
	/**
	 * Index
	 * @description redirect to "login" page under admin folder
	 * @return mixed
	 */ 
	public function index()
	{
		return $this->load->view('login');
	}

	/**
	 * Index
	 * @description redirect to "dashboard" page under admin folder
	 * @return json an array that holds the data for jquery confirm plugin  
	 */ 
	public function sign_in()
	{
		// get user type
		$user_type = $_POST['user_type'];

		// check if user's user type is admin or voter
		if ($user_type == "Voter") {
			// Voter
			$voter_info = array(
				'id_number' => $_POST['student_id_number'],
			);

			// check if voter is already voted or not
			$is_vote = $this->login_model->is_vote($voter_info);
			if ($is_vote > 0) {

				$data = [
					'response' => false,
					'title'    => "Voted Already",
					'content'  => "You've already voted!",
					'icon'     => 'fa fa-warning',
					'type'     => 'red',
					'btnClass' => 'btn-danger',
				];
			} else {
				// login
				$voter_login = $this->login_model->voter_login($voter_info);
				if ($voter_login > 0) {
					// fetch voter's info
					$fetch_voter_info = $this->login_model->fetch_voter_info($voter_info);
					foreach ($fetch_voter_info as $row) {
						$array = array(
							'student_id'    => $row->student_id,
							'id_number'     => $row->id_number,
							'last_name'     => $row->last_name,
							'first_name'    => $row->first_name,
							'middle_name'   => $row->middle_name,
							'gender'        => $row->gender,
							'birthdate'     => $row->birthdate,
							'mobile_number' => $row->mobile_number,
							'year_level'    => $row->year_level,
							'is_vote'       => $row->is_vote,
						);
					}
					// set session of the voter
					$this->session->set_userdata($array);  
					$data = [
						'response' => true,
					];
				} else {
					$data = [
						'response' => false,
						'title'    => "Login Failed",
						'content'  => "Invalid Credentials. Please Try again!",
						'icon'     => 'fa fa-warning',
						'type'     => 'red',
						'btnClass' => 'btn-danger',
					];
				}
			}
		} else {
			// Administrator
			$admin_info = array(
				'username' => $_POST['username'],
				'password' => md5($_POST['password']),
			);

			$admin_login = $this->login_model->admin_login($admin_info);
			if ($admin_login > 0) {
				// fetch admin's info
				$fetch_admin_info = $this->login_model->fetch_admin_info($admin_info);
				foreach ($fetch_admin_info as $row) {
					$array = array(
						'admin_id'    => $row->admin_id,
						'last_name'   => $row->last_name,
						'first_name'  => $row->first_name,
						'middle_name' => $row->middle_name,
						'username'    => $row->username,
					);
				}
				// set session of the admin
				$this->session->set_userdata($array);
				$data = [
					'response' => true,
				];
			} else {
				$data = [
					'response' => false,
					'title'    => "Login Failed",
					'content'  => "Invalid Credentials. Please Try again!",
					'icon'     => 'fa fa-warning',
					'type'     => 'red',
					'btnClass' => 'btn-danger',
				];
			}
		}
		echo json_encode($data);
	}
}
