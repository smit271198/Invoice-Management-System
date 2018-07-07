<?php
	class Admin extends CI_Controller{
		public function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}

		public function company_list(){
			$this->load->model('invoice/admin_model');
			$data['item'] = $this->admin_model->company_list();

			$this->load->view('invoice/header');
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/company_list',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function company_new(){
			$this->load->view('invoice/header');
			$this->load->view('invoice/company_new');
			$this->load->view('invoice/footer');
		}

		public function company_new_add(){
			$this->load->model('invoice/admin_model');
	       	if($this->admin_model->company_add())
	       		$this->session->set_userdata('success','true');
	 		else
	 			$this->session->set_userdata('error','true');
	    	redirect('invoice/admin/company_list');
		}

		public function company_id($id){
			$this->load->model('invoice/admin_model');
			$data['item'] = $this->admin_model->company_id($id);

			$this->load->view('invoice/header');
			$this->load->view('invoice/company_update',$data);
			$this->load->view('invoice/footer');
		}

		public function company_update($id){
			$this->load->model('invoice/admin_model');
			if($this->admin_model->company_update($id))
				$this->session->set_userdata('success','true');
			else
	       		$this->session->set_userdata('error','true');
			redirect('invoice/admin/company_list');
		}

		public function company_del($id){
			$this->load->model('invoice/admin_model');
			if($this->admin_model->company_del($id))
				$this->session->set_userdata('success','true');
			else
	 			$this->session->set_userdata('error','true');
	    	redirect('invoice/admin/company_list');
		}


		/*-------------------------AJAX call---------------------------*/
		public function check_username(){
			$this->load->model('invoice/admin_model');
			if($this->admin_model->check_username())
				echo true;
			else
				echo false;
		}
		/*-------------------------AJAX call---------------------------*/
	}
?>