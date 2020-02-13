<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MX_Controller {
	public function index()
	{
		$data['module'] = "test";
		$data['view_file'] = "index"; 
		$data['title'] = "Test"; 
		
		$this->load->model('tests');
		$data['sidebar'] = $this->tests->multi_menu();
		
		// echo "<pre>";
		// var_dump($this->uri);
		// echo "</pre>";
		$data['content'] = $this->tests->get_home_content($this->uri->uri_string);
		echo Modules::run("templates/general", $data);
	}
}
