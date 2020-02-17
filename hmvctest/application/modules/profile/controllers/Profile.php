<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {
	public function index()
	{
		$data['module'] = "profile";
		$data['view_file'] = "index"; 
		
		$this->load->model('test/tests');
		$data['sidebar'] = $this->tests->multi_menu();
		$data['content'] = $this->tests->get_home_content();
		$data['title'] = "Test"; 
		echo Modules::run("templates/general", $data);
	}
}
