<?php

function assets_url(){
	return base_url().'assets';
}
function webroot_url(){
	return "http".(!empty($_SERVER['HTTPS'])?"s":"")."://".$_SERVER['HTTP_HOST'];
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
function buildMenu($parent, $menu, $options) {
	$html = "";
	if (isset($menu['parents'][$parent])) {
		$html .= ($options['startMenuBuild']?"<ul class='metismenu' id='menu'>\n\r":"\n\r<ul aria-expanded='false'>\n\r");
		$startMenuBuild = false;
		foreach ($menu['parents'][$parent] as $itemId) {
			if(!isset($menu['parents'][$itemId])) {
				$options['current_parent'] = $itemId;
				if($menu['items'][$itemId]['link'] == 'link-label') 
					$html .= '<li class="nav-label">'.$menu['items'][$itemId]['menu_name']."</li>\n\r";
				else
					$html .= '<li> <a href="'.($menu['items'][$itemId]['record_type']==20200141?'javascript:;':base_url().$menu['items'][$itemId]['link']).'" '.($menu['items'][$itemId]['record_type']==20200141?'data-quiz="'.$menu['items'][$itemId]['quiz'].'" data-toggle="modal" data-target="#exampleModalCenter" data-backdrop="static" data-keyboard="false"':'').'>'.
							($menu['items'][$itemId]['par_id']==0 && $menu['items'][$itemId]['icon'] ? 
								'<i class="'.$menu['items'][$itemId]['icon'].'"></i>'.'<span class="nav-text">'.$menu['items'][$itemId]['menu_name'].'</span>' :
								$menu['items'][$itemId]['menu_name']).
					// @$options['current_parent']."-".$itemId."-".$menu['items'][$itemId]['menu_name'].
					"</a></li>\n\r";
			}
			if(isset($menu['parents'][$itemId])) {
				$html .= "<li>\n\r
					<a class='has-arrow' href='javascript:void()' aria-expanded='false'>
						".($menu['items'][$itemId]['icon']?"<i class='{$menu['items'][$itemId]['icon']}'></i>":"")."
						<span class='nav-text'>".
							$menu['items'][$itemId]['menu_name'].
						"</span>
					</a>";
					$options['startMenuBuild'] = false;
					$html .= buildMenu($itemId, $menu, $options);
				$html .= "\n\r</li>\n\r";
			}
		}
		$html .= "</ul>";
	}
	return $html;
}