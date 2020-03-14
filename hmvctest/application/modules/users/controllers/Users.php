<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MX_Controller {
	public function index()
	{
		$this->load->model('Common'); $this->Common->check_login();
		if($this->session->userdata('logged_in')->val_dsc != 'SUPER_ADMIN')
			redirect('profile');
		$data['module'] = "users";
		$data['view_file'] = "index"; 
		$data['pageTitle'] = "Manage Users";

		$data['styles'] = [];
		$data['scripts'] = [];

		$this->load->model('_Users');
		$data['users'] = (object) $this->_Users->getUsers();

		echo Modules::run("templates/admin", $data);
	}
	public function edit($r_k=null)
	{
		$this->load->model('Common'); $this->Common->check_login();
		$data['module'] = "users";
		$data['view_file'] = "edit";

		if($r_k){
			$data['pageTitle'] = "Edit User";
			$this->load->model('_Users');
			$user = (object) $this->_Users->getUsers(['u.r_k'=>$r_k]);
			if($user->success) {
				$data['user'] = $user->message[0];
			}
		} else {
			$data['pageTitle'] = "Create User";
		}

		$data['styles'] = [
			assets_url()."/plugins/sweetalert/css/sweetalert.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/sweetalert/js/sweetalert.min.js",
			assets_url()."/js/admin/users.js",
		];

		
		if($this->input->post()){
			// var_dump($_POST);exit;
			$this->load->library('form_validation');
			$this->form_validation->set_rules('email','Email','required|valid_email|trim');
			$this->form_validation->set_rules('user_type','User Type','required|trim');
			if($this->form_validation->run()) {
				$this->db->trans_start();
					$fields = ['r_k'=>$this->input->post('r_k')?$this->input->post('r_k'):null,
						'email'=>$this->input->post('email'),
						'password'=>md5($this->input->post('password') == ''?'12':$this->input->post('password')),
						'active'=>($this->input->post('active')=='on'?1:0)];
					$this->Common->setTable('users') ;
					$this->Common->_insert_on_duplicate_update($fields) ;
					$insert_id = $this->input->post('r_k')?$this->input->post('r_k'):$this->db->insert_id(); 

					$type=['r_k'=>$this->input->post('ut_r_k')?$this->input->post('ut_r_k'):null,
						'user'=>$insert_id,'user_type'=>$this->input->post('user_type')];
					$this->Common->setTable('users_user_type') ;
					$this->Common->_insert_on_duplicate_update($type) ;
				$this->db->trans_complete();
				$result = array('success'=>true,'message'=>'Details submitted successfully', 'fields'=>$fields);
			}
		}
		echo Modules::run("templates/admin", $data);
	}
	public function update()
	{
		$this->load->model('Common'); $this->Common->check_login();
		if($this->input->post()){
			$this->load->model('Common');
			$this->Common->setTable('users');
			$this->Common->_insert_on_duplicate_update($this->input->post());
			$result = array('success'=>true,'message'=>'Status changed', 'fields'=>$this->input->post());
		}
		echo json_encode($result);
	}
	public function resetPass()
	{
		$this->load->model('Common'); $this->Common->check_login();
		
		if($this->input->post()){
			$newPass = $this->randomPassword(4);
			$_POST['password'] = md5($newPass);
			$this->load->model('Common');
			$this->Common->setTable('users');
			$this->Common->_insert_on_duplicate_update($this->input->post());
			$result = array('success'=>true,'message'=>"{$newPass}");
		}
		echo json_encode($result);
	}
	function randomPassword($length = 5) {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < $length; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
}
