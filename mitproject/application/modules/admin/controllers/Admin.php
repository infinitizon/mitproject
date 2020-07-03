<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MX_Controller {

	public function index() {
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		$data['styles'] = [];
		$data['scripts'] = [];

		$this->load->model('test/tests');
		$data['sidebar'] = $this->tests->multi_menu();
		$data['module'] = "admin";
		$data['view_file'] = "home"; 
		$data['pageTitle'] = "login";
		echo Modules::run("templates/admin", $data);
	}
	public function login($result=array()) {
		if (!empty($result))
			$data['result'] = $result;
		$data['styles'] = [];
		$data['scripts'] = [];
		$data['module'] = "admin";
		$data['view_file'] = "login"; 
		$data['pageTitle'] = "Login"; 
		echo Modules::run("templates/auth", $data);
	}
	public function logout($result=array()) {
		$this->session->unset_userdata('logged_in');
		redirect(site_url('admin'), 'refresh');
	}
	public function p_login() {
		$data['styles'] = [];
		$data['scripts'] = [];
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
		if ($this->form_validation->run()) {
			$this->load->model('login');
			$result = $this->login->user_exists($this->input->post('username'), 
											md5($this->input->post('password')));
// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// return;
			if($result['success']){
				$this->session->set_userdata('logged_in', (object)$result['message']);
				if ($this->session->userdata('redirect')) {
					$redirect = $this->session->userdata('redirect');
					$this->session->unset_userdata('redirect');
					redirect($redirect, 'refresh');
				} else {
					redirect(site_url('profile'), 'refresh');
				}
			}else {
				$this->login($result);
			}
		} else {
			$result = array('success'=>false,'message'=>'Validation errors occured');
			$this->login();
		}
	}
	public function register($result=array()) {
		$data['styles'] = [];
		$data['scripts'] = [];
		if (!empty($result))
			$data['result'] = $result;
		$data['module'] = "admin";
		$data['view_file'] = "register"; 
		$data['pageTitle'] = "Register"; 
		echo Modules::run("templates/auth", $data);
	}
	public function p_register() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
		if ($this->form_validation->run()) {
			$this->load->model('login');
			$result = $this->login->user_exists($this->input->post('username'), 
											md5($this->input->post('password')));
// var_dump($result);
			if($result['success']){
				$this->session->set_userdata('logged_in', (object)$result['message']);
				if ($this->session->userdata('redirect')) {
					$redirect = $this->session->userdata('redirect');
					$this->session->unset_userdata('redirect');
					redirect($redirect, 'refresh');
				} else {
					redirect(site_url('admin'), 'refresh');
				}
			}else {
				$this->login($result);
			}
		} else {
			$result = array('success'=>false,'message'=>'Validation errors occured');
			$this->login();
		}
	}
	public function profile($result=array()) {
		$data['styles'] = [];
		$data['scripts'] = [];
		if($this->uri->segment(3)=='logout') $this->logout();
		if (is_array($result) && !empty($result))
			$data['result'] = $result;

		$this->load->model('profile');
		$data['roles'] = $this->profile->_findAllRoles();
		$user = $this->profile->_findUserById($this->session->userdata('logged_in')->usr_id);
		$data['user'] = $user['success']?(object)$user['message']:'';
		$data['pageTitle'] = "Profile";
		$data['module'] = "profile";
		$data['view_file'] = "profile";
		echo Modules::run("templates/admin", $data);
	}
	public function p_profile() {
		if (!$this->session->userdata('logged_in')) { redirect('admin/login'); }

		$this->load->library('form_validation');
		$this->form_validation->set_rules('usr_fst_nm','First Name','required|trim|alpha|max_length[50]');
		$this->form_validation->set_rules('usr_mdl_nm','Middle Name','alpha|trim|max_length[50]');
		$this->form_validation->set_rules('usr_lst_nm','Last Name','required|trim|alpha|max_length[50]');
		$this->form_validation->set_rules('usr_eml_add','Email Address','required|trim|valid_email');
		$this->form_validation->set_rules('usr_phn_no','Phone','required|trim');
		if($this->form_validation->run()){
			$this->load->model('profile');
			unset($_POST['update']);
			$clauses = array('usr_id'=>$this->input->post('usr_id'));
			$this->profile->_update($clauses, $_POST);
			$result = array('success'=>true,'message'=>'Details updated successfully');
		}else{
			$result = array('success'=>false,'message'=>'Validation errors occured');
		}
		$this->profile($result);
	}
	public function users($result=array()) {
		if (!$this->session->userdata('logged_in')) { redirect('admin/login'); }

		if (is_array($result) && !empty($result))
			$data['result'] = $result;

		$this->load->model('User');
		if($this->uri->segment(3)=='edit' || $this->uri->segment(3)=='new'){
			$this->load->model('IX_User');
			$user = $this->uri->segment(4) ? $this->User->findUsers($this->uri->segment(4)) : $this->IX_User;
			if(isset($_POST['submit'])){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('usr_fst_nm','First Name','required|trim|alpha|max_length[50]');
				$this->form_validation->set_rules('usr_mdl_nm','Middle Name','alpha|trim|max_length[50]');
				$this->form_validation->set_rules('usr_lst_nm','Last Name','required|trim|alpha|max_length[50]');
				$this->form_validation->set_rules('usr_eml_add','Email Address','required|trim|valid_email');
				$this->form_validation->set_rules('usr_phn_no','Phone','required|trim');
				unset($_POST['submit']);
				$this->load->model('Common');
				$this->Common->setTable('tbl_01_usr');
				if($this->form_validation->run()){
					if($this->input->post('usr_id') ) {
						$clauses = ['usr_id'=>$this->input->post('usr_id')];
						$this->Common->_update($clauses,$_POST);
					} else {
						$this->Common->_insert($_POST) ;
					}
					$result = array('success'=>true,'message'=>'Data submitted successfully');
				}else{
					$result = array('success'=>false,'message'=>'Validation errors occured');
				}
				$data['user'] = (object) $_POST;
				$data['result'] = $result;
			} else {
				$data['user'] = $this->uri->segment(4) ? $user->result()[0] : $user;
			}
		} else {
			$data['users'] = $this->User->findUsers();
		}
		$this->load->model('profile');
		$data['styles'] = [];
		$data['scripts'] = [];
		$data['roles'] = $this->profile->_findAllRoles();
		$data['pageTitle'] = "Users";
		$data['module'] = "user";
		$data['view_file'] = "index";
		echo Modules::run("templates/admin", $data);
	}
	public function questions($result=null) {
		echo "here";
	}
}
