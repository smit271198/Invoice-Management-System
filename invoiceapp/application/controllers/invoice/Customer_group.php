<?php
	class Customer_group extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}

		public function group_list(){
			$this->load->model('invoice/group_model');
			$data['item'] = $this->group_model->group_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Customer Groups";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/group',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function group_new(){
			$this->load->model('invoice/group_model');
			$data['item'] = $this->group_model->group_new();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Customer Groups";

			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/group_new',$data);
			$this->load->view('invoice/footer');
		}

		public function group_new_add(){
			$validate = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				),
				array(
					'field' => 'customer_list[]',
					'label' => 'Customer List',
					'rules' => 'required'
				)				
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/group_model');
				$data['item'] = $this->group_model->group_new();

				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Customer Groups";
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
	       		$this->load->view('invoice/group_new',$data);
	       		$this->load->view('invoice/footer');
	       	}
	       	else{
	       		$this->load->model('invoice/group_model');
	       		if($this->group_model->group_add())
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');
	       		
				redirect('invoice/customer_group/group_list');
	       	}
		}

		public function group_del($id){
			$this->load->model('invoice/group_model');
			if($this->group_model->group_del($id))
				$this->session->set_userdata('success','true');
	       	else
				$this->session->set_userdata('error','true');
			
			redirect('invoice/customer_group/group_list');			
		}

		public function group_id($id){
			$this->load->model('invoice/group_model');
			$data['item'] = $this->group_model->group_id($id);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Customer Groups";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/group_update',$data);
			$this->load->view('invoice/footer');
		}

		public function group_update($id){
			$validate = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				),
				array(
					'field' => 'customer_list[]',
					'label' => 'Customer List',
					'rules' => 'required'
				)				
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/group_model');
				$data['item'] = $this->group_model->group_id($id);

				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Customer Groups";
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
				$this->load->view('invoice/group_update',$data);
				$this->load->view('invoice/footer');
	       	}
	       	else{
				$this->load->model('invoice/group_model');
				if($this->group_model->group_update($id))
					$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');

				redirect('invoice/customer_group/group_list');	
	       	}
		}
	}
?>