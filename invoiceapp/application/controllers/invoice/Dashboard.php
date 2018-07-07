<?php
	class Dashboard extends CI_Controller{
		public function __construct(){
			parent:: __construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}
		public function index(){
			$this->load->model('invoice/dashboard_model');
			$data['item'] = $this->dashboard_model->dashboard_list();

			$sidebar['active'] = "Dashboard";
			$sidebar['details'] = $this->dashboard_model->company_details();
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/dashboard',$data);
			$this->load->view('invoice/footer');
		}
	}
?>