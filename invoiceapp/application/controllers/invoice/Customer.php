<?php
	class Customer extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}

		public static $success = "";
		
		public function cust_list(){
			$this->load->model('invoice/Customer_model');
			$data['item'] = $this->Customer_model->cust_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Customer";

			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/customer',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function cust_new(){
			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Customer"; 
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/customer_new');
			$this->load->view('invoice/footer');
		}

		public function cust_new_add(){
			$validate = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				),
				array(
					'field' => 'address',
					'label' => 'Address',
					'rules' => 'required'
				),
				array(
					'field' => 'pincode',
					'label' => 'Pin Code',
					'rules' => 'required'
				),
				array(
					'field' => 'state',
					'label' => 'State',
					'rules' => 'required'
				),
				array(
					'field' => 'city',
					'label' => 'City',
					'rules' => 'required'
				),
				array(
					'field' => 'contact_no_1',
					'label' => 'Contact No. 1',
					'rules' => 'required'
				),
				array(
					'field' => 'state_code',
					'label' => 'State Code',
					'rules' => 'required'
				),
				array(
					'field' => 'GSTIN_no',
					'label' => 'GSTIN No.',
					'rules' => 'required'
				),
				array(
					'field' => 'PAN_no',
					'label' => 'Pan No.',
					'rules' => 'required'
				),
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Customer"; 
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
	       		$this->load->view('invoice/customer_new');
	       		$this->load->view('invoice/footer');
	       	}
	       	else{
	       		$this->load->model('invoice/customer_model');
	       		if($this->customer_model->cust_add())
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');
	       		redirect('invoice/customer/cust_list');
	       	}
		}


		public function cust_del($id){
			$this->load->model('invoice/Customer_model');
			if($this->Customer_model->cust_del($id))
				$this->session->set_userdata('success','true');
			else
	       		$this->session->set_userdata('error','true');
			redirect('invoice/Customer/cust_list');
		}


		public function cust_id($id){ //to get data with pan number
			
			$this->load->model('invoice/Customer_model');
			$data['item'] = $this->Customer_model->cust_id($id);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Customer"; 
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/Customer_update',$data);
			$this->load->view('invoice/footer');
		}

		public function cust_update($id){
			$this->load->model('invoice/Customer_model');
			if($this->Customer_model->cust_update($id))
				$this->session->set_userdata('success','true');
			else
	       		$this->session->set_userdata('error','true');
			redirect('invoice/customer/cust_list');
		}
	}
?>