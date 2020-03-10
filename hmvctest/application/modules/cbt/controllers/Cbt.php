<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cbt extends MX_Controller {
	public function quiz($r_k)
	{
		$this->load->model('Common'); $this->Common->check_login();
		$data['styles'] = [];
		$data['scripts'] = [];
		
		$this->db->select('q.*,qa.r_k quiz_attempt, COUNT(qq.r_k) question_count')
				->from('quiz q')
				->join('quiz_attempt qa', 'q.r_k=qa.quiz_r_k AND qa.user_r_k='.$this->session->userdata('logged_in')->r_k, 'left')
				->join('quiz_questions qq', 'q.r_k=qq.quiz_r_k', 'left')
				->where("q.r_k",$r_k)
				->group_by("q.r_k");
		$data['quiz_r_k'] = $r_k;
		$data['quiz'] = $this->db->get()->result()[0];

		$data['module'] = "cbt";
		$data['view_file'] = "home"; 
		echo Modules::run("templates/auth", $data);
	}
	public function next($quiz_r_k)
	{
		$this->load->model('Common'); $this->Common->check_login();
		$data['pageTitle'] = "Next Quiz";
	
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/cbt.js",
		];
		$data['quiz_r_k'] = $quiz_r_k;

		$data['module'] = "cbt";
		$data['view_file'] = "quiz";

		if($this->input->post()){
			if($this->input->post('question_order') == 1) {
				$fields = ['r_k'=>($this->input->post('quiz_attempt')?$this->input->post('quiz_attempt'):null)
					, 'quiz_r_k'=>$quiz_r_k, 'user_r_k'=>$this->session->userdata('logged_in')->r_k];
				$this->Common->setTable('quiz_attempt');
				$this->Common->_insert_on_duplicate_update($fields) ;
				$data['quiz_attempt'] = $this->input->post('quiz_attempt')?$this->input->post('quiz_attempt'):$this->db->insert_id();
			} else {
				$data['quiz_attempt'] = $this->input->post('quiz_attempt');
				$fields = ['r_k'=>null, 'quiz_attempt'=>$data['quiz_attempt']
					, 'questions_r_k'=>$this->input->post('questions_r_k')
					, 'answer_given'=>$this->input->post('answers')];
				$this->Common->setTable('attempt_answer');
				$this->Common->_insert_on_duplicate_update($fields) ;
			}	
		}

		$data['question_count'] = $this->input->post('question_count');
		if($this->input->post('question_order') > $this->input->post('question_count') ) {
			echo "Stop there";
		} else {
			$question = $this->getNext($quiz_r_k, $this->input->post('question_order'));
			$result = $question->result()[0];
			$result->answers = json_decode($result->answers);
			$data['question'] = $result;
		}
		
		echo Modules::run("templates/auth", $data);
	}
	
	private function getNext($quiz_r_k, $question_order)
	{
		$this->db->select("q.r_k, q.question_type, q.question, qq.question_order, l.val_id, q.answers")
            ->from('questions q')
			->join('quiz_questions qq', 'q.r_k=qq.questions_r_k')
			->join('t_wb_lov l', 'q.question_type=l.r_k', 'left')
			->where('qq.quiz_r_k',$quiz_r_k)
			->where('qq.question_order',$question_order);

		return $this->db->get();
	}
	
}
