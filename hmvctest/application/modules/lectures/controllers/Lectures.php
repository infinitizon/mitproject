<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lectures extends MX_Controller {

	public function index() 
	{
		$this->load->model('Common'); $this->Common->check_login();
		if($this->session->userdata('logged_in')->val_dsc == 'STUDENT')
			redirect('profile');

		$data['module'] = "lectures";
		$data['view_file'] = "home"; 
		$data['pageTitle'] = "Lectures";
		$data['styles'] = [];
		$data['scripts'] = [];
		
        $this->db->select("c.r_k, c.record_type, c.create_date
            , (CASE WHEN c.record_type=20200141 THEN CONCAT('Quiz: ',q.quiz_name) ELSE c.menu_name END)menu_name")
            ->from('cms c')
			->join('quiz q', 'c.menu_name=q.r_k', 'left')
			->where_in('record_type',[20200140,20200141]);
			
		$data['lectures'] = $this->db->get();
		echo Modules::run("templates/admin", $data);
	}
	public function create($r_k=null) 
	{
		$this->load->model('Common'); $this->Common->check_login();

		$data['module'] = "lectures";
		$data['view_file'] = "create";  
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/lecture.js",
		];
		$this->Common->setTable('cms');
		$fields = array('r_k' => NULL,'menu_name' => "",'link' => "",'icon' => "",'content' => "",);
		if(isset($r_k)) {
			$data['lecture'] = $this->Common->get_where(['r_k'=>$r_k])->result()[0] ;
			$data['pageTitle'] = "Edit Lecture";
		} else {
			$data['lecture'] = (object)$fields;
			$data['pageTitle'] = "Create Lecture";
		}
		if($this->input->post()){
			// var_dump($_POST);exit;
			$this->load->library('form_validation');
			$this->form_validation->set_rules('course','Course','required|trim');
			$this->form_validation->set_rules('menu_name','Menu Name','required|trim|max_length[150]');
			$this->form_validation->set_rules('link','Link','required|trim');
			$this->form_validation->set_rules('content','Content','required|trim');
			if($this->form_validation->run()) {
				$_POST['users_r_k'] = $this->session->userdata('logged_in')->r_k;
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
