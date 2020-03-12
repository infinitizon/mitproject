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
			assets_url()."/plugins/sweetalert/css/sweetalert.css",
			webroot_url()."/assets/css/toggle-switch.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			assets_url()."/plugins/sweetalert/js/sweetalert.min.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/admin/cbt.js",
		];
		$data['quiz_r_k'] = $quiz_r_k;

		$data['module'] = "cbt";
		$data['view_file'] = "quiz";
// var_dump($this->input->post());
		if($this->input->post()){
			if($this->input->post('question_order') == 1) {
				$fields = ['r_k'=>($this->input->post('quiz_attempt')?$this->input->post('quiz_attempt'):null)
					, 'quiz_r_k'=>$quiz_r_k, 'user_r_k'=>$this->session->userdata('logged_in')->r_k];
				$this->Common->setTable('quiz_attempt');
				$this->Common->_insert_on_duplicate_update($fields) ;
				$data['quiz_attempt'] = $this->input->post('quiz_attempt')?$this->input->post('quiz_attempt'):$this->db->insert_id();
			} else {
				$data['quiz_attempt'] = $this->input->post('quiz_attempt');
				$fields = ['r_k'=>($this->input->post('attempt_answer')?$this->input->post('attempt_answer'):null)
					, 'quiz_attempt'=>$data['quiz_attempt']
					, 'questions_r_k'=>$this->input->post('questions_r_k')
					, 'answer_given'=>$this->input->post('answers')];
				$this->Common->setTable('attempt_answer');
				$this->Common->_insert_on_duplicate_update($fields) ;
			}	
		}

		$data['question_count'] = $this->input->post('question_count');
		if($this->input->post('quiz_completed') == 'true') {
			$data['quiz_completed'] = true;
		}
		// var_dump($this->input->post());
		if($this->input->post('question_order') > $this->input->post('question_count') || $this->input->post('question_order')==0) {
			$data['question'] = (object) $this->input->post();
			$data['quiz_summary'] = (object)$this->getQuizSummary($this->input->post('quiz_attempt'));
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
		$this->db->select("q.r_k, aa.r_k attempt_answer, q.question_type, q.question, qq.question_order, l.val_id optionType, IFNULL(aa.answer_given,q.answers) answers")
            ->from('questions q')
			->join('quiz_questions qq', 'q.r_k=qq.questions_r_k')
			->join('t_wb_lov l', 'q.question_type=l.r_k', 'left')
			->join('quiz_attempt qa', 'qq.quiz_r_k=qa.quiz_r_k', 'left')
			->join('attempt_answer aa', 'qa.r_k=aa.quiz_attempt AND aa.questions_r_k=q.r_k', 'left')
			->where('qq.quiz_r_k',$quiz_r_k)
			->where('qq.question_order',$question_order);

		return $this->db->get();
	}
	private function getQuizSummary($quiz_attempt)
	{
		$this->db->select("aa.r_k, aa.answer_given, l.val_id ")
            ->from('attempt_answer aa')
			->join('questions q', 'aa.questions_r_k=q.r_k', 'left')
			->join('t_wb_lov l', 'q.question_type=l.r_k', 'left')
			->where('aa.quiz_attempt',$quiz_attempt);
		$attempts = $this->db->get();
		$data['pass'] = 0; $data['totalPassScore'] = 0; $data['totalScore'] = 0;
		if($attempts->num_rows() > 0){
			foreach($attempts->result() as $attempt){
				$attempt->answer_given = json_decode($attempt->answer_given);
				$multi = false; $valid=0; $totalCorrectOption=0;
				$multiPass = false;
				$multiFail = false;
				foreach ($attempt->answer_given as $answer) {
					if ($attempt->val_id == 'MCSA') {
						if ($answer->exm_qst_vld=='true' && $answer->atmt_ans_gvn) {
							$pass++;$valid++;$totalCorrectOption++;
						}
					}
					if ($attempt->val_id == 'MCMA') {
						$multi = true;
						if ($answer->exm_qst_vld=='true')$totalCorrectOption++;
						if ($answer->exm_qst_vld=='true' && $answer->atmt_ans_gvn) {
							$multiPass = true;
							// (!$row['scr_vld_ans'] && $valid===0)?$valid++:$valid++;
							$valid++;
						}
						elseif (!$answer->exm_qst_vld=='true' && $answer->atmt_ans_gvn) $multiFail = true;
					}
				}
				$score = 0;
                if ($multi && $multiPass && !$multiFail) {
                    $data['pass']++; $score=1;
                }
				$longAnswerPresent = false;
				if ($attempt->val_id === 'LA') {
					$longAnswerPresent = true;
				}else{
					$data['totalPassScore'] += 1;
					$data['totalScore'] += $score;
				}
			}
		}
		return $data;
	}
	
}
