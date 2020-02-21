<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends MX_Controller {

	public function index() {
		if (!$this->session->userdata('logged_in')) redirect('admin/login');

		$this->load->model('test/tests');
		$data['sidebar'] = $this->tests->multi_menu();
		$data['module'] = "courses";
		$data['view_file'] = "home"; 
		$data['title'] = "Create Courses";
		$data['styles'] = [];
		$data['scripts'] = [];
		echo Modules::run("templates/admin", $data);
	}
	public function create($result=array()) {
		
		if (!empty($result))
			$data['result'] = $result;
		$this->load->model('test/tests');
		$data['sidebar'] = $this->tests->multi_menu();
		$data['module'] = "courses";
		$data['view_file'] = "create"; 
		$data['title'] = "Create Courses"; 
		$data['styles'] = [
			assets_url()."/plugins/summernote/dist/summernote.css",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/css/fontawesome-iconpicker.min.css",
		];
		$data['scripts'] = [
			assets_url()."/plugins/summernote/dist/summernote.min.js",
			assets_url()."/plugins/summernote/dist/summernote-init.js",
			webroot_url()."/assets/vendor/fontawesome-iconpicker/3.0.0/dist/js/fontawesome-iconpicker.min.js",
			assets_url()."/js/course.js",
		];
		if($this->input->post()){
			$this->load->library('form_validation');
			$this->form_validation->set_rules('menu_name','Menu Name','required|trim|max_length[150]');
			$this->form_validation->set_rules('link','Link','required|trim');
			$this->form_validation->set_rules('icon','Icon','required|trim');
			$this->form_validation->set_rules('content','Summary','required|trim');
			if($this->form_validation->run()) {
				$this->load->model('Common');
				$this->Common->setTable('cms');
				// var_dump($this->session->userdata('logged_in')->r_k);
				$_POST['users_r_k'] = $this->session->userdata('logged_in')->r_k;
				$this->Common->_insert($_POST) ;
				$fields = array('menu_name' => "",'link' => "",'icon' => "",'content' => "",);
				$result = array('success'=>true,'message'=>'Details submitted successfully', 'fields'=>$fields);
			}else{
				$fields = array(
					'menu_name' => form_error('menu_name'),
					'link' => form_error('link'),
					'icon' => form_error('icon'),
					'content' => form_error('content'),);
				$result = array('success'=>false,'message'=>$fields);
			}
			echo json_encode($result);
		} else {
			echo Modules::run("templates/admin", $data);
		}
	}
	public function logout($result=array()) {
		$this->session->unset_userdata('logged_in');
		redirect(site_url('admin'), 'refresh');
	}
	public function p_login() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
		if ($this->form_validation->run()) {
			$this->load->model('login');
			$result = $this->login->user_exists($this->input->post('username'), 
											md5($this->input->post('password')));
	// var_dump($result);
			if($result['success']){
				$this->session->set_userdata('logged_in', (object)$result['message']);
				if ($this->session->userdata('redirect')) {
					$redirect = $this->session->userdata('redirect');
					$this->session->unset_userdata('redirect');
					redirect($redirect, 'refresh');
				} else {
					redirect(site_url('profile'), 'refresh');
				}
			}else {
				$this->login($result);
			}
		} else {
			$result = array('success'=>false,'message'=>'Validation errors occured');
			$this->login();
		}
	}
	public function register($result=array()) {
		if (!empty($result))
			$data['result'] = $result;
		$data['module'] = "admin";
		$data['view_file'] = "register"; 
		$data['title'] = "Register"; 
		echo Modules::run("templates/auth", $data);
	}
	public function p_register() {
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[50]');
		if ($this->form_validation->run()) {
			$this->load->model('login');
			$result = $this->login->user_exists($this->input->post('username'), 
											md5($this->input->post('password')));
// var_dump($result);
			if($result['success']){
				$this->session->set_userdata('logged_in', (object)$result['message']);
				if ($this->session->userdata('redirect')) {
					$redirect = $this->session->userdata('redirect');
					$this->session->unset_userdata('redirect');
					redirect($redirect, 'refresh');
				} else {
					redirect(site_url('admin'), 'refresh');
				}
			}else {
				$this->login($result);
			}
		} else {
			$result = array('success'=>false,'message'=>'Validation errors occured');
			$this->login();
		}
	}
	public function profile($result=array()) {
		if($this->uri->segment(3)=='logout') $this->logout();
		if (is_array($result) && !empty($result))
			$data['result'] = $result;

		$this->load->model('profile');
		$data['roles'] = $this->profile->_findAllRoles();
		$user = $this->profile->_findUserById($this->session->userdata('logged_in')->usr_id);
		$data['user'] = $user['success']?(object)$user['message']:'';
		$data['title'] = "Profile";
		$data['module'] = "profile";
		$data['view_file'] = "profile";
		echo Modules::run("templates/admin", $data);
	}
	public function p_profile() {
		if (!$this->session->userdata('logged_in')) { redirect('admin/login'); }

		$this->load->library('form_validation');
		$this->form_validation->set_rules('usr_fst_nm','First Name','required|trim|alpha|max_length[50]');
		$this->form_validation->set_rules('usr_mdl_nm','Middle Name','alpha|trim|max_length[50]');
		$this->form_validation->set_rules('usr_lst_nm','Last Name','required|trim|alpha|max_length[50]');
		$this->form_validation->set_rules('usr_eml_add','Email Address','required|trim|valid_email');
		$this->form_validation->set_rules('usr_phn_no','Phone','required|trim');
		if($this->form_validation->run()){
			$this->load->model('profile');
			unset($_POST['update']);
			$clauses = array('usr_id'=>$this->input->post('usr_id'));
			$this->profile->_update($clauses, $_POST);
			$result = array('success'=>true,'message'=>'Details updated successfully');
		}else{
			$result = array('success'=>false,'message'=>'Validation errors occured');
		}
		$this->profile($result);
	}
	public function users($result=array()) {
		if (!$this->session->userdata('logged_in')) { redirect('admin/login'); }

		if (is_array($result) && !empty($result))
			$data['result'] = $result;

		$this->load->model('User');
		if($this->uri->segment(3)=='edit' || $this->uri->segment(3)=='new'){
			$this->load->model('IX_User');
			$user = $this->uri->segment(4) ? $this->User->findUsers($this->uri->segment(4)) : $this->IX_User;
			if(isset($_POST['submit'])){
				$this->load->library('form_validation');
				$this->form_validation->set_rules('usr_fst_nm','First Name','required|trim|alpha|max_length[50]');
				$this->form_validation->set_rules('usr_mdl_nm','Middle Name','alpha|trim|max_length[50]');
				$this->form_validation->set_rules('usr_lst_nm','Last Name','required|trim|alpha|max_length[50]');
				$this->form_validation->set_rules('usr_eml_add','Email Address','required|trim|valid_email');
				$this->form_validation->set_rules('usr_phn_no','Phone','required|trim');
				unset($_POST['submit']);
				$this->load->model('Common');
				$this->Common->setTable('tbl_01_usr');
				if($this->form_validation->run()){
					if($this->input->post('usr_id') ) {
						$clauses = ['usr_id'=>$this->input->post('usr_id')];
						$this->Common->_update($clauses,$_POST);
					} else {
						$this->Common->_insert($_POST) ;
					}
					$result = array('success'=>true,'message'=>'Data submitted successfully');
				}else{
					$result = array('success'=>false,'message'=>'Validation errors occured');
				}
				$data['user'] = (object) $_POST;
				$data['result'] = $result;
			} else {
				$data['user'] = $this->uri->segment(4) ? $user->result()[0] : $user;
			}
		} else {
			$data['users'] = $this->User->findUsers();
		}
		$this->load->model('profile');
		$data['roles'] = $this->profile->_findAllRoles();
		$data['title'] = "Users";
		$data['module'] = "user";
		$data['view_file'] = "index";
		echo Modules::run("templates/admin", $data);
	}
	
	public function category($result=array()) {
		if (!$this->session->userdata('logged_in')) { redirect('admin/login'); }

		if (is_array($result) && !empty($result))
			$data['result'] = $result;

		$this->load->model('AdminCategory');
		if($this->uri->segment(3)=='edit' || $this->uri->segment(3)=='new'){
			$this->load->model('IX_Category');
			$cat_id = $this->uri->segment(4);
			$where = array("cat_id"=>$cat_id);
			$category = $this->uri->segment(4) ? $this->AdminCategory->findCategories($where) : $this->IX_Category;
			$this->load->model('Files');
			if(isset($_POST['submit'])){
				unset($_POST['fileAction']);
				$this->load->library('form_validation');
				$this->form_validation->set_rules('cat_00_nm','Category Name','required|trim|max_length[50]');
				$this->form_validation->set_rules('cat_00_dsc','Category Description','required|trim');
				unset($_POST['submit']);
				$this->load->model('Common');
				$this->Common->setTable('tbl_00_cat');
				if($this->form_validation->run()){
					$_POST['tbl_01_usr_id'] = $this->session->userdata('logged_in')->usr_id;
					$postToInsert = $this->Common->prepareInsertArrayFromTableInfo($this->Common->getTable(), $_POST);
					if($this->input->post('cat_id') ) {
						var_dump($this->input->post());
						$clauses = ['cat_id'=>$this->input->post('cat_id')];
						$cat_id=$this->input->post('cat_id');
						$this->Common->_update($clauses,$postToInsert);
						echo "Here";
					} else {
						$this->Common->_insert($_POST) ;
						$cat_id=$this->db->insert_id();
					}
					if(isset($_FILES)) {
						foreach ($_FILES as $key => $file){
							$current = explode("-", $key);
							$fl_ius_yn = $_POST['fl_ius_yn-'.$current[1]];

							$config['upload_path']          = './assets/images/uploads/';
							$config['allowed_types']        = 'jpg|png';
							$this->load->library('upload', $config);
							$this->upload->do_upload($key);

							$options = array('source_image'=>$this->upload->data()['file_name'], 'width'=>200, 'height'=>200);
							$this->load->model('Thumbs');
							$this->Thumbs->doThumb($options);
							
							$this->Files->ìnsert(fileTypes()['tbl_00_cat'], $cat_id, $this->upload->data(), ($fl_ius_yn=='true'?1:0));
						}
					}

					$result = array('success'=>true,'message'=>'Data submitted successfully');
				}else{
					$result = array('success'=>false,'message'=>array(
						'cat_00_nm' => form_error('cat_00_nm', '<p class="mt-3 text-danger">', '</p>'),
						'cat_00_dsc' => form_error('cat_00_dsc', '<p class="mt-3 text-danger">', '</p>')
					));				
				}
				echo json_encode($result);
				exit;
				$data['category'] = (object) $_POST;
				$data['result'] = $result;
			} else {
				$data['category'] = $this->uri->segment(4) ? $category->result()[0] : $category;
			}
			$f_clauses = array('obj_00_tp'=>fileTypes()['tbl_00_cat'],'obj_fl_id'=>$cat_id);
			$data['files'] = $this->Files->findAllFiles($f_clauses );
		} else {
			$data['categories'] = $this->AdminCategory->findCategories();
			// echo $this->db->last_query();
		}
		$where = array("IFNULL(cat_par_id,0)"=>0);
		$data['parentCategories'] = $this->AdminCategory->findCategories($where);
		$data['title'] = "Categories";
		$data['module'] = "admin";
		$data['view_file'] = "category";
		echo Modules::run("templates/admin", $data);
	}
	
	public function products($result=array()) {
		if (!$this->session->userdata('logged_in')) { redirect('admin/login'); }

		if (is_array($result) && !empty($result))
			$data['result'] = $result;

		$this->load->model('AdminProducts');
		if($this->uri->segment(3)=='edit' || $this->uri->segment(3)=='new'){
			$this->load->model('IX_Product');
			$prd_id = $this->uri->segment(4);
			$where = array("prd_id"=>$prd_id);
			$product = $this->uri->segment(4) ? $this->AdminProducts->findProducts($where) : $this->IX_Product;

			$this->load->model('Files');
			if(isset($_POST['submit'])){
				unset($_POST['fileAction']);
				$this->load->helper('security');
				$this->load->library('form_validation');
				$this->form_validation->set_rules('tbl_00_cat_cat_id','Category','required|trim|numeric|xss_clean');
				$this->form_validation->set_rules('prd_00_nm','Category Name','required|trim|max_length[100]');
				$this->form_validation->set_rules('prd_00_prc','Current Price','required|trim|numeric|xss_clean');
				$this->form_validation->set_rules('prd_old_prc','Old Price','trim|numeric|xss_clean');
				$this->form_validation->set_rules('prd_avl_qty','Available Quantity','required|trim|numeric|xss_clean');
				$this->form_validation->set_rules('prd_prc_curr','Product Currency','required|trim|numeric|xss_clean');
				$this->form_validation->set_rules('prd_00_dsc','Product Description','required|trim|xss_clean');
				$this->load->model('Common');
				$this->Common->setTable('tbl_str_prd');
				if($this->form_validation->run()){
					$_POST['tbl_01_usr_id'] = $this->session->userdata('logged_in')->usr_id;
					$postToInsert = $this->Common->prepareInsertArrayFromTableInfo($this->Common->getTable(), $_POST);
					if($this->input->post('prd_id') ) {
						if(isset($_POST['fl_id']) ){
							foreach($_POST['fl_id'] as $key => $val){
								$clauses = array('fl_id'=>$val);
								$this->Files->update($clauses,array('fl_ius_yn'=>($_POST['fl_ius_yn'][$key]=='true'?1:0)));
							}
						}
						$clauses = ['prd_id'=>$this->input->post('prd_id')];
						$prd_id=$this->input->post('prd_id');
						$this->Common->_update($clauses,$postToInsert);
					} else {
						$this->Common->_insert($postToInsert) ;
						$prd_id=$this->db->insert_id();
					}
					if(isset($_FILES)) {
						foreach ($_FILES as $key => $file){
							$current = explode("-", $key);
							$fl_ius_yn = $_POST['fl_ius_yn-'.$current[1]];

							$config['upload_path']          = './assets/images/uploads/';
							$config['allowed_types']        = 'jpg|png';
							$this->load->library('upload', $config);
							$this->upload->do_upload($key);

							$options = array('source_image'=>$this->upload->data()['file_name'], 'width'=>200, 'height'=>200);
							$this->load->model('Thumbs');
							$this->Thumbs->doThumb($options);
							
							$this->Files->ìnsert(fileTypes()['tbl_str_prd'], $prd_id, $this->upload->data(), ($fl_ius_yn=='true'?1:0));
						}
					}
					$result = array('success'=>true,'message'=>'Data submitted successfully');
				}else{
					$result = array('success'=>false,'message'=>array(
						'tbl_00_cat_cat_id' => form_error('tbl_00_cat_cat_id', '<p class="mt-3 text-danger">', '</p>'),
						'prd_00_nm' => form_error('prd_00_nm', '<p class="mt-3 text-danger">', '</p>'),
						'prd_00_prc' => form_error('prd_00_prc', '<p class="mt-3 text-danger">', '</p>'),
						'prd_old_prc' => form_error('prd_old_prc', '<p class="mt-3 text-danger">', '</p>'),
						'prd_avl_qty' => form_error('prd_avl_qty', '<p class="mt-3 text-danger">', '</p>'),
						'prd_prc_curr' => form_error('prd_prc_curr', '<p class="mt-3 text-danger">', '</p>'),
						'prd_00_dsc' => form_error('prd_00_dsc', '<p class="mt-3 text-danger">', '</p>'),
					));
				}
				echo json_encode($result);
				exit;
				$data['product'] = (object) $_POST;
				$data['result'] = $result;
			} else {
			
				$data['product'] = $this->uri->segment(4) ? $product->result()[0] : $product;
			}
			$f_clauses = array('obj_00_tp'=>fileTypes()['tbl_str_prd'],'obj_fl_id'=>$prd_id);
			$data['files'] = $this->Files->findAllFiles($f_clauses );
		} else {
			$data['products'] = $this->AdminProducts->findProducts();
		}
		$this->load->model('AdminCategory');
		$data['categories'] = $this->AdminCategory->findCategories();
		$data['currencies'] = $this->AdminProducts->findCurrecies();
		$data['title'] = "Products";
		$data['module'] = "admin";
		$data['view_file'] = "product";
		echo Modules::run("templates/admin", $data);
	}
}
