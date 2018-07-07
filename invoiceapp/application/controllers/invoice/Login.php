<?php
	class Login extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}

		public function index(){
			$data = "";
			if($this->session->has_userdata('ID')){
				redirect('invoice/dashboard');
			}
			if($this->session->has_userdata('invalid')){
				$data['error'] = true;
				$this->session->unset_userdata('invalid');
			}
			$this->load->view('invoice/login_page',$data);
		}

		public function login_check(){
			if($this->input->post('username') == "SuPeraDmIn" && $this->input->post('password') == "admin1212"){
				$this->session->set_userdata('ID',0);
				redirect('invoice/admin/company_list');
			}
			$this->load->model('invoice/login_model');
			$flag = $this->login_model->login_check();
			if($flag){
				redirect('invoice/login/homepage');
			}
			else{
				redirect('invoice/login');
			}
		}

		public function homepage(){
			if($this->session->has_userdata('ID')){
				redirect('invoice/dashboard');
			}
			else{
				redirect('invoice/login');
			}
		}

		public function logout(){
			if($this->session->has_userdata('ID')){
				$this->session->sess_destroy();
			}
			redirect('invoice/login');
		}
	}
?>