<?php 
	class PS extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}
		
		public function ps_list(){
			$this->load->model('invoice/PS_model');
			$data['item'] = $this->PS_model->ps_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Product/Service";

			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/PS',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function ps_new(){
			$this->load->model('invoice/categories_model');
			$data['item'] = $this->categories_model->categories_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Product/Service";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/PS_new',$data);
			$this->load->view('invoice/footer');
		}

		public function ps_new_add(){
			$validate = array(
				array(
					'field' => 'categoryID',
					'label' => 'CategoryID',
					'rules' => 'required'
				),
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				),
				array(
					'field' => 'HSN_SAC',
					'label' => 'HSN Number',
					'rules' => 'required'
				),
				array(
					'field' => 'price',
					'label' => 'Price',
					'rules' => 'required'
				),
				array(
					'field' => 'gst',
					'label' => 'GST',
					'rules' => 'required'
				),
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/categories_model');
				$data['item'] = $this->categories_model->categories_list();

				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Product/Service";
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
	       		$this->load->view('invoice/ps_new',$data);
	       		$this->load->view('invoice/footer');
	       	}
	       	else{
	       		$this->load->model('invoice/PS_model');
	       		if($this->PS_model->ps_add())
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');
	       		
	       		redirect('invoice/ps/ps_list');
	       	}
		}

		public function ps_del($id){
			$this->load->model('invoice/PS_model');
			if($this->PS_model->ps_del($id))
				$this->session->set_userdata('success','true');
       		else
	       		$this->session->set_userdata('error','true');
			
			redirect('invoice/ps/ps_list');			
		}

		public function ps_id($id){
			
			$this->load->model('invoice/PS_model');
			$data1 = $this->PS_model->ps_id($id);

			$this->load->model('invoice/categories_model');
			$data2 = $this->categories_model->categories_list();

			$data['item'] = array($data1,$data2);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Product/Service";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/ps_update',$data);
			$this->load->view('invoice/footer');
		}

		public function ps_update($id){
			$validate = array(
				array(
					'field' => 'name',
					'label' => 'Name',
					'rules' => 'required'
				),
				array(
					'field' => 'HSN_SAC',
					'label' => 'HSN Number',
					'rules' => 'required'
				),
				array(
					'field' => 'price',
					'label' => 'Price',
					'rules' => 'required'
				),
				array(
					'field' => 'gst',
					'label' => 'GST',
					'rules' => 'required'
				),
			);

			$this->form_validation->set_rules($validate);

			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/PS_model');
				$data1 = $this->PS_model->ps_id($id);

				$this->load->model('invoice/categories_model');
				$data2 = $this->categories_model->categories_list();

				$data['item'] = array($data1,$data2);

				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Product/Service";
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
				$this->load->view('invoice/ps_update',$data);
				$this->load->view('invoice/footer');
			}
			else{
				$this->load->model('invoice/PS_model');
				if($this->PS_model->ps_update($id))
					$this->session->set_userdata('success','true');
		       	else
		    		$this->session->set_userdata('error','true');

				redirect('invoice/ps/ps_list');
			}
		}



		/*-------------AJAX File -----------*/
		public function ps_new_invoice(){
	    	$this->load->model('invoice/ps_model');
	       	$this->ps_model->ps_new_invoice();

	       	$data = $this->input->post('productName');

			$html = "<option value='".$data."'>".$data."</option>";
			echo $html;
		}
		/*-------------AJAX File -----------*/
	}	
?>