<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Questions extends MX_Controller {

	public function index() 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		if($this->session->userdata('logged_in')->val_dsc == 'STUDENT')
			redirect('profile');

		$data['module'] = "questions";
		$data['view_file'] = "home"; 
		$data['pageTitle'] = "Questions";
		$data['styles'] = [];
		$data['scripts'] = [];
	
		$this->db->select('q.r_k,q.question_type,l.val_id,l.val_dsc, q.question, q.answers, q.create_date')
				->from('questions q')
				->join('t_wb_lov l', 'q.question_type=l.r_k')
				->where("q.users_r_k",$this->session->userdata('logged_in')->r_k);
		$data['questions'] = $this->db->get();
		echo Modules::run("templates/admin", $data);
	}
	public function create($r_k=null) 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/question.js",
		];
		if(isset($r_k)) {
			$data['pageTitle'] = "Edit Question";
		} else {
			$data['pageTitle'] = "Create Question";
		}
		$data['module'] = "questions";
		$data['view_file'] = "create";  
		if($this->input->post() && $this->input->post('isQuestion')) {
			$data['view_file'] = "edit";

			$this->load->library('form_validation');
			$this->form_validation->set_rules('question','Question','required|trim');
			$fields = [
				'r_k'=>$this->input->post('r_k'),
				'question'=>$this->input->post('question'),
				'question_type'=>$this->input->post('questionType'),
				'answers'=>json_encode($this->input->post('answers')),
			];
			
			if($this->form_validation->run()) {
				$fields['users_r_k'] = $this->session->userdata('logged_in')->r_k;
				$this->load->model('Common');
				$this->Common->setTable('questions');
				$this->Common->_insert_on_duplicate_update($fields) ;
				$result = array('success'=>true,'message'=>'Details submitted successfully', 'fields'=>$fields);
			}else{
				$fields = array( 'question' => form_error('question'), );
				$result = array('success'=>false,'message'=>$fields);
			}
			echo json_encode($result);
		} elseif($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('questionType','Question Type','required|trim');
			$this->form_validation->set_rules('noOfOptions','Number of options','required|trim');
			if($this->form_validation->run()) {
				$data['view_file'] = "edit";
				echo Modules::run("templates/admin", $data);
			}else{
				echo Modules::run("templates/admin", $data);
			}
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
	public function edit($r_k=null) 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/question.js",
		];
		$data['pageTitle'] = "Edit Question";
		if(isset($r_k)) {
			
			$this->db->select('q.r_k,q.question_type,l.val_id, q.question, q.answers, q.create_date')
				->from('questions q')
				->join('t_wb_lov l', 'q.question_type=l.r_k')
				->where("q.r_k",$r_k);
			$question = $this->db->get();
			if($question->num_rows() > 0){
				$result = $question->result()[0];
				$result->answers = json_decode($result->answers);
				$_POST['questionType'] = $result->question_type;
				$_POST['optionType'] = $result->val_id;
				$_POST['noOfOptions'] = count($result->answers);
				$data['result'] = $result;
			}
		} 
		$data['module'] = "questions";
		$data['view_file'] = "edit"; 
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('questionType','Question Type','required|trim');
			$this->form_validation->set_rules('noOfOptions','Number of options','required|trim');
			if($this->form_validation->run()) {
				$data['view_file'] = "edit";
				echo Modules::run("templates/admin", $data);
			}else{
				echo Modules::run("templates/admin", $data);
			}
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
}
