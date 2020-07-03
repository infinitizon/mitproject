<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {
	function __construct() {
		parent::__construct();
	}
	public function index()
	{
		
    }

    public function check_login() {
        if (!$this->session->has_userdata('logged_in') || $this->session->logged_in !== true) {
            if (!empty($_SERVER['QUERY_STRING'])) {
                $uri = uri_string() . '?' . $_SERVER['QUERY_STRING'];
            } else {
                $uri = uri_string();
            }
            $this->session->set_userdata('redirect', $uri);
            redirect('admin/login');
        }
    }
}
