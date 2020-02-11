<?php

function assets_url(){
	return base_url().'assets';
}
function webroot_url(){
	return 'http://localhost:81/Mitproject';
}

function email_config(){
	
	return Array(
		'protocol' => 'smtp',
		'smtp_host' => "smtp.mailtrap.io",
		'smtp_user' => "6fc4bcec3a2887",
		'smtp_pass' => "e2400389734a22",
		'smtp_port' => 2525,
		'mailtype'  => 'html',
		'charset' => 'utf-8',
		'newline' => "\r\n",
		'crlf' => "\r\n",
		'wordwrap' => TRUE
	);
}

function fileTypes(){
	return Array(
		'tbl_01_usr' => 1017,
		'tbl_00_cat' => 1018,
		'tbl_str_prd' => 1019
	);
}