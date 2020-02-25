<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends MX_Controller {

	public function index() 
	{
		// echo 'here';exit;
		if (!$this->session->userdata('logged_in')) redirect('admin/login');

		$data['module'] = "questions";
		$data['view_file'] = "home"; 
		$data['title'] = "Questions";
		$data['styles'] = [];
		$data['scripts'] = [];
		
		// $this->load->model('Common');
		// $this->Common->setTable('cms');
		// $data['lectures'] = $this->Common->get_where(['is_course'=>2]) ;
		echo Modules::run("templates/admin", $data);
	}
	public function create($r_k=null) 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		$data['module'] = "lectures";
		$data['view_file'] = "create";  
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/lecture.js",
		];
		$this->load->model('Common');
		$this->Common->setTable('cms');
		$fields = array('r_k' => NULL,'menu_name' => "",'link' => "",'icon' => "",'content' => "",);
		if(isset($r_k)) {
			$data['lecture'] = $this->Common->get_where(['r_k'=>$r_k])->result()[0] ;
			$data['title'] = "Edit Lecture";
		} else {
			$data['lecture'] = (object)$fields;
			$data['title'] = "Create Lecture";
		}
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('course','Course','required|trim');
			$this->form_validation->set_rules('menu_name','Menu Name','required|trim|max_length[150]');
			$this->form_validation->set_rules('link','Link','required|trim');
			$this->form_validation->set_rules('content','Content','required|trim');
			if($this->form_validation->run()) {
				$_POST['users_r_k'] = $this->session->userdata('logged_in')->r_k;
				$_POST['is_course'] = 2;
				$_POST['link'] = $this->input->post('course_name').'/'.$this->input->post('link');
				$_POST['par_id'] = $this->input->post('course');
				unset($_POST['course_name']);
				unset($_POST['course']);
				$this->Common->_insert_on_duplicate_update($_POST) ;
				$result = array('success'=>true,'message'=>'Details submitted successfully', 'fields'=>$fields);
			}else{
				$fields = array(
					'course' => form_error('course'),
					'menu_name' => form_error('menu_name'),
					'link' => form_error('link'),
					'content' => form_error('content'),);
				$result = array('success'=>false,'message'=>$fields);
			}
			echo json_encode($result);
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
}
