<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	public function index()
	{
		$data['module'] = "home";
		$data['view_file'] = "index"; 
		$data['title'] = "Welcome"; 
		echo Modules::run("templates/general", $data);
	}
}
