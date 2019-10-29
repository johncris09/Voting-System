<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Voting_system extends CI_Controller
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
	 * @description redirect to "dashboard" page under admin folder if user is admin else, 
	 * 							redirect to "dashboard" page under student folder
	 * @return mixed
	 */ 
	public function index()
	{
		$data['candidate'] = $this->candidate_model->fetch_candidate();
		if ($this->session->userdata('admin_id') != "") {
			$data['student']   = $this->student_model->fetch_student();
			$data['done_vote'] = $this->student_model->done_vote();
			$data['not_vote']  = $this->student_model->not_vote();
			$data['user']      = $this->user_model->fetch_user();
			return $this->load->view('admin/dashboard', $data);
		} else { 
			return $this->load->view('student/dashboard', $data);
		}
	}
	
	/**
	 * Logout
	 * @description unset all session
	 * @redirect login
	 */ 
	public function logout()
	{
		$all_sessions = $this->session->all_userdata();

		// unset all sessions
		foreach ($all_sessions as $key => $val) {
			$this->session->unset_userdata($key);
		}

		redirect('login');
	}

	/**
	 * Vote
	 * @description student vote
	 * @return json an array that holds the data for jquery confirm plugin 
	 */ 
	public function vote()
	{
		$data = [];
		// convert mix array into single array
		foreach ($_POST as $key => $val) {
			if ($key == "senator") {
				for ($i = 0; $i < sizeof($val); $i++) {
					$data[] = $val[$i];
				}
			} else {
				$data[] = $val;
			}
		}
		
		$vote = $this->candidate_model->vote($data);
		if ($vote) {

			// update student's status after voting
			// is_vote field set to yes
			$this->student_model->update_voter_status();

			$data = [
				'response' => true,
				'title'    => "Successfully Voted",
				'content'  => "Congratsulation",
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
