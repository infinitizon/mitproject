<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends MX_Controller {
	public function index()
	{
		$data['module'] = "landing";
		$data['view_file'] = "index"; 
		
		$this->load->model('Landing');
		echo "<pre>";
		var_dump($this->Landing);
		echo "</pre>";
		// $data['sidebar'] = $this->Landing->multi_menu();
		$data['content'] = $this->Landing->get_home_content();
		$data['title'] = "Test"; 
		echo Modules::run("templates/general", $data);
	}
}
