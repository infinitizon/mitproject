<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {
	public function index()
	{
		$data['module'] = "test";
		$data['view_file'] = "index"; 
		$data['title'] = "Test"; 
		
		$this->load->model('tests');
		$result = $this->tests->multi_menu();
		$data['result'] = $result;
		echo Modules::run("templates/general", $data);
	}
}
