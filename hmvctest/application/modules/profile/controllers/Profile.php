<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {
	public function index()
	{
		$data['module'] = "profile";
		$data['view_file'] = "index"; 
		
		$this->load->model('profiles');
		// $data['sidebar'] = $this->Landing->multi_menu();
		$data['content'] = $this->profiles->get_home_content();
		$data['title'] = "Test"; 
		echo Modules::run("templates/general", $data);
	}
}
