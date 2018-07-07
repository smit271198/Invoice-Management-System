<?php
	class Product_price extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}
		
		public function prod_price_list(){
			$this->load->model('invoice/product_price_model');
			$data['item'] = $this->product_price_model->prod_price_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Product Price";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/prod_price',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function prod_price_new(){
			$this->load->model('invoice/ps_model');
			$data['item'] = $this->ps_model->ps_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Product Price";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/prod_price_new',$data);
			$this->load->view('invoice/footer');
		}

		public function prod_price_new_add(){
       		$this->load->model('invoice/product_price_model');
       		if($this->product_price_model->prod_price_add())
       			$this->session->set_userdata('success','true');
       		else
       			$this->session->set_userdata('error','true');
	       	redirect('invoice/Product_price/prod_price_list');
		}

		public function prod_price_id($id){
			$this->load->model('invoice/product_price_model');
			$data1= $this->product_price_model->prod_price_id($id);

			foreach($data1[0] as $type){
				if($type['Type'] == "Group"){
					$data2 = $this->product_price_model->group_list($id);
				}
				else{
					$data2 = $this->product_price_model->cust_list($id);
				}
			}
			$data['item'] = array($data1[0],$data1[1],$data2);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Product Price"; 
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/prod_price_update',$data);
			$this->load->view('invoice/footer');
		}

		public function prod_price_update($id){
			$this->load->model('invoice/product_price_model');
			if($this->product_price_model->prod_price_update($id))
				$this->session->set_userdata('success','true');
       		else
       			$this->session->set_userdata('error','true');
			redirect('invoice/product_price/prod_price_list');
		}

		public function prod_price_del($id){
			$this->load->model('invoice/product_price_model');
			if($this->product_price_model->prod_price_del($id))
				$this->session->set_userdata('success','true');
	       	else
	       		$this->session->set_userdata('error','true');

			redirect('invoice/Product_price/prod_price_list');
		}





		/*------Ajax file-------*/
			public function change_radio(){
				$this->load->model('invoice/product_price_model');
				$data = $this->product_price_model->change_radio();
				$html = "<option value='' disabled selected hidden>Select</option>";
				foreach ($data as $name) {
					$html .= "<option value='".$name['Name']."''>".$name['Name']."</option>";
				}
				echo $html;

			}
		/*------Ajax File--------*/
	}
?>