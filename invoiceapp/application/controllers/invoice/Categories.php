<?php
	class Categories extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}
		
		public function categories_list(){
			$this->load->model('invoice/categories_model');
			$data['item'] = $this->categories_model->categories_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Categories";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/categories',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function categories_new(){			
			$this->load->model('invoice/categories_model');
			$data['item'] = "CG".$this->categories_model->get_category_id();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Categories";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/categories_new',$data);
			$this->load->view('invoice/footer');

		}

		public function categories_new_add(){			
			$validate = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				)				
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Categories";
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
	       		$this->load->view('invoice/categories_new');
	       		$this->load->view('invoice/footer');
	       	}
	       	else{
	       		$this->load->model('invoice/categories_model');
	       		if($this->categories_model->categories_add())
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');	       		
	       		
				redirect('invoice/categories/categories_list');
	       	}
		}

		public function categories_del($id){
			$this->load->model('invoice/categories_model');

			if($this->categories_model->categories_del($id))
				$this->session->set_userdata('success','true');
	    	else
	    		$this->session->set_userdata('error','true');
			
			redirect('invoice/categories/categories_list');
		}

		public function categories_id($id){		//get data by id
			
			$this->load->model('invoice/categories_model');
			$data['item'] = $this->categories_model->categories_id($id);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Categories";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/categories_update',$data);
			$this->load->view('invoice/footer');
		}

		public function categories_update($id){
			$validate = array(
				array(
					'field' => 'categoryID',
					'label' => 'Category ID',
					'rules' => 'required'
				)				
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Categories";
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
	       		$this->load->view('invoice/categories_id',$id);
	       		$this->load->view('invoice/footer');
	       	}
	       	else{
	       		$this->load->model('invoice/categories_model');
	       		if($this->categories_model->categories_update($id))
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');
	       		
				redirect('invoice/categories/categories_list');
	       	}
		}

	}
?>