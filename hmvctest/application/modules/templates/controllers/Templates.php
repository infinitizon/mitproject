<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Templates extends MX_Controller {

	function index() {
		echo "Testing";
	}
	function auth($data){
		$this->load->view('auth',$data);
	}
	function general($data){
		$this->load->view('general',$data);
	}
	function admin($data){
		$this->load->view('admin',$data);
	}
}
