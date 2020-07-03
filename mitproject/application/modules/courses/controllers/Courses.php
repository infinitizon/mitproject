<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends MX_Controller {

	public function index() {
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		if($this->session->userdata('logged_in')->val_dsc != 'SUPER_ADMIN')
			redirect('profile');


		$data['module'] = "courses";
		$data['view_file'] = "home"; 
		$data['pageTitle'] = "Create Courses";
		$data['styles'] = [];
		$data['scripts'] = [];
		
		$this->load->model('Common');
		$this->Common->setTable('cms');
		$data['courses'] = $this->Common->get_where(['record_type'=>20200139]) ;
		echo Modules::run("templates/admin", $data);
	}
	public function create($r_k=null) {
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		$data['module'] = "courses";
		$data['view_file'] = "create"; 
		$data['pageTitle'] = "Create Courses"; 
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/course.js",
		];
		$this->load->model('Common');
		$this->Common->setTable('cms');
		if(isset($r_k)) {
			$data['course'] = $this->Common->get_where(['r_k'=>$r_k])->result()[0] ;
		}
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('menu_name','Menu Name','required|trim|max_length[150]');
			$this->form_validation->set_rules('link','Link','required|trim');
			$this->form_validation->set_rules('icon','Icon','required|trim');
			$this->form_validation->set_rules('content','Summary','required|trim');
			if($this->form_validation->run()) {
				$_POST['par_id'] = 0;
				$_POST['users_r_k'] = $this->session->userdata('logged_in')->r_k;
				$_POST['record_type'] = 20200139;
				$this->Common->_insert_on_duplicate_update($_POST) ;
				$fields = array('menu_name' => "",'link' => "",'icon' => "",'content' => "",);
				$result = array('success'=>true,'message'=>'Details submitted successfully', 'fields'=>$fields);
			}else{
				$fields = array(
					'menu_name' => form_error('menu_name'),
					'link' => form_error('link'),
					'icon' => form_error('icon'),
					'content' => form_error('content'),);
				$result = array('success'=>false,'message'=>$fields);
			}
			echo json_encode($result);
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
}
