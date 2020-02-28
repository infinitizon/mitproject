<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MX_Controller {
	public function index()
	{
		$data['module'] = "profile";
		$data['view_file'] = "index"; 
		
		$this->load->model('test/tests');
		$data['pageTitle'] = "My Profile"; 
		echo Modules::run("templates/general", $data);
	}
}
