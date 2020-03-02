<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends MX_Controller {

	public function index() 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');

		$data['module'] = "quiz";
		$data['view_file'] = "home"; 
		$data['pageTitle'] = "Quizes";
		$data['styles'] = [];
		$data['scripts'] = [];
	
		$this->load->model('Common');
		$this->Common->setTable('quiz');
		$data['quizes'] = $this->Common->get_where(['users_r_k'=>$this->session->userdata('logged_in')->r_k]) ;
		echo Modules::run("templates/admin", $data);
	}
	public function create($r_k=null) 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			assets_url()."/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css",
			assets_url()."/plugins/clockpicker/dist/jquery-clockpicker.min.css",
			assets_url()."/plugins/jquery-asColorPicker-master/css/asColorPicker.css",
			assets_url()."/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css",
			assets_url()."/plugins/timepicker/bootstrap-timepicker.min.css",
			assets_url()."/plugins/bootstrap-daterangepicker/daterangepicker.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			assets_url()."/plugins/moment/moment.js",
			assets_url()."/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js",
			assets_url()."/plugins/clockpicker/dist/jquery-clockpicker.min.js",
			assets_url()."/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js",
			assets_url()."/plugins/timepicker/bootstrap-timepicker.min.js",
			assets_url()."/plugins/bootstrap-daterangepicker/daterangepicker.js",
			assets_url()."/js/plugins-init/form-pickers-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/quiz.js",
		];

		$data['module'] = "quiz";
		$data['view_file'] = "create"; 
		$fields = ["quiz_name"=> "", "start_date"=> "", "end_date"=> "", "duration"=> ""
			, "max_attempts"=> "", "min_pass_pct"=> "", "correct_scr"=> "", "incorrect_scr"=> ""
			, "allowed_ip"=> "", "view_ans_after"=> "", "description"=> ""];

		if(isset($r_k)) {
			$data['pageTitle'] = "Edit Quiz";
			$this->load->model('Common');
			$this->Common->setTable('quiz');
			$quiz = $this->Common->get_where(['r_k'=>$r_k]);
			if($quiz->num_rows() > 0){
				$data['quiz'] = $quiz->result()[0];
			}

			$this->db->select('q.r_k,qq.r_k quiz_questions,q.question_type,l.val_id,l.val_dsc, q.question, q.answers, q.create_date')
				->from('questions q')
				->join('t_wb_lov l', 'q.question_type=l.r_k')
				->join('quiz_questions qq', 'q.r_k=qq.questions_r_k AND qq.quiz_r_k='.$r_k, 'LEFT');
			$data['quiz_questions'] = $this->db->get();
		} else {
			$data['pageTitle'] = "Create Quiz";
		}
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('quiz_name','Quiz Name','required|trim');
			$this->form_validation->set_rules('start_date','Start Date','required|trim');
			$this->form_validation->set_rules('end_date','End Date','required|trim');
			$this->form_validation->set_rules('min_pass_pct','Minimum Percentage','integer|is_natural|less_than[101]');
			if($this->form_validation->run()) {
				$data['view_file'] = "addQuestion";
				$_POST['view_ans_after'] = $_POST['view_ans_after']=="true"?true:false;
				$_POST['open_quiz'] = $_POST['open_quiz']=="true"?true:false;
				$this->load->model('Common');
				$this->Common->setTable('quiz');
				$this->Common->_insert_on_duplicate_update($_POST) ;
				$insert_id = $this->db->insert_id();
				$fields['r_k'] = $this->db->insert_id();
				$result = array('success'=>true,'message'=>$fields);
			}else{
				$fields = [
					'quiz_name' => form_error('quiz_name'),
					'start_date' => form_error('start_date'),
					'end_date' => form_error('end_date'),
					'duration' => form_error('duration'),
					'max_attempts' => form_error('max_attempts'),
					'min_pass_pct' => form_error('min_pass_pct'),
					'correct_scr' => form_error('correct_scr'),
					'incorrect_scr' => form_error('incorrect_scr'),
					'allowed_ip' => form_error('allowed_ip'),
					'view_ans_after' => form_error('view_ans_after'),
					'description' => form_error('description'),];
				$result = array('success'=>false,'message'=>$fields);
			}
			echo json_encode($result);
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
	public function addQuestion($r_k) 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		
		$data['styles'] = [];
		$data['scripts'] = [
			assets_url()."/js/admin/addQuestion.js",
		];
		$data['pageTitle'] = "Add question to quiz";
		$data['module'] = "quiz";
		$data['view_file'] = "addQuestion";

		$this->load->model('Common');
		$this->Common->setTable('quiz');
		$quiz = $this->Common->get_where(['r_k'=>$r_k]);
		$data['quiz'] = $quiz->result()[0];

		$this->db->select('q.r_k,qq.r_k quiz_questions,q.question_type,l.val_id,l.val_dsc, q.question, q.answers, q.create_date')
			->from('questions q')
			->join('t_wb_lov l', 'q.question_type=l.r_k')
			->join('quiz_questions qq', 'q.r_k=qq.questions_r_k AND qq.quiz_r_k='.$r_k, 'LEFT');
		$data['questions'] = $this->db->get();
		echo Modules::run("templates/admin", $data);
	}
	public function addToQuiz() 
	{
		if (!$this->session->userdata('logged_in')) redirect('admin/login');
		
		$data['pageTitle'] = "Add question to quiz";
		$data['module'] = "quiz";
		$data['view_file'] = "addQuestion";

		if($this->input->post()){
			$this->load->model('Common');
			$this->Common->setTable('quiz_questions');
			$quiz = $this->Common->count_where(['quiz_r_k'=>$this->input->post('quiz_r_k')]);
			$_POST['question_order'] = $quiz+1;

			$this->load->model('Common');
			$this->Common->setTable('quiz_questions');
			$this->Common->_insert_on_duplicate_update($_POST) ;

			$result = array('success'=>true,'message'=>"Added");
		} else {
			$result = array('success'=>false,'message'=>"You must have landed here mistakenly");
		}
		echo json_encode($result);
	}
}
