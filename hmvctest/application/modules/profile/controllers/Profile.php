<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {
	public function index()
	{
		$this->load->model('Common'); $this->Common->check_login();
		$data['module'] = "profile";
		$data['view_file'] = "index"; 
		$data['pageTitle'] = "My Profile"; 

		$data['styles'] = [
			assets_url()."/plugins/sweetalert/css/sweetalert.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/sweetalert/js/sweetalert.min.js",
			assets_url()."/js/admin/profile.js",
		];

		// First get currently logged in user
		$this->db->select("u.*")
			->from('users u')
			->where('u.r_k', $this->session->userdata('logged_in')->r_k);
		$data['user'] = $this->db->get()->result()[0];
		
		if($this->input->post()){
			$this->load->library('form_validation');
			if($this->input->post('email') != '')
				$this->form_validation->set_rules('email','Email','valid_email|trim');
			if($this->input->post('cpass')) {
				if(md5($this->input->post('cpass')) != $data['user']->password){
					$fields = array('cpass' => 'Current password entered is incorrect');
					$result = array('success'=>false,'message'=>$fields);
					echo json_encode($result); exit;
				} elseif ($this->input->post('npass') != $this->input->post('npassAgain')) {
					$fields = array('npass' => 'New passwords entered do not match');
					$result = array('success'=>false,'message'=>$fields);
					echo json_encode($result); exit;
				}
			} 
			
			if($this->form_validation->run()) {
				$fields = array(
					'r_k' => $this->session->userdata('logged_in')->r_k,
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('npass')),);
				$this->Common->setTable('users');
				$this->Common->_insert_on_duplicate_update($fields) ;
				$result = array('success'=>true,'message'=>'Profile updated successfully', 'fields'=>$_POST);
			}else{
				$fields = array(
					'email' => form_error('email'),
					'cpass' => form_error('cpass'),
					'npass' => form_error('npass'),
					'npassAgain' => form_error('npassAgain'),);
				$result = array('success'=>false,'message'=>$fields);
			}
			echo json_encode($result);
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
}
