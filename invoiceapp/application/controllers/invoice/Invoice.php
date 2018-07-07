<?php
	class Invoice extends CI_controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}

		public function invoice_list(){
			$this->load->model('invoice/invoice_model');
			$data['item'] = $this->invoice_model->invoice_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Invoice";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/invoice',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function invoice_new(){
			$this->load->model('invoice/customer_model');
			$data1 = $this->customer_model->cust_list();

			$this->load->model('invoice/categories_model');
			$data2 = $this->categories_model->categories_list();

			$this->load->model('invoice/invoice_model');
			$data3 = "IN".date('Y').$this->invoice_model->get_invoice_id();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$data['item'] = array($data1,$data2,$data3);
			$sidebar['active'] = "Invoice";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/invoice_new',$data);
			$this->load->view('invoice/footer');
		}

		public function invoice_new_add(){
	       		$this->load->model('invoice/invoice_model');
	       		if($this->invoice_model->invoice_add())
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');

	       		redirect('invoice/invoice/invoice_list');
		}

		public function invoice_id($id){
			$this->load->model('invoice/invoice_model');
			$invoice = $this->invoice_model->invoice_id($id);

			$this->load->model('invoice/customer_model');
			$customer = $this->customer_model->cust_list();

			$this->load->model('invoice/ps_model');
			$product = $this->ps_model->ps_list();

			$this->load->model('invoice/categories_model');
			$categories = $this->categories_model->categories_list();

			$data['item'] = array($invoice[0],$customer,$product,$invoice[1],$categories);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Invoice";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/invoice_update',$data);
			$this->load->view('invoice/footer');			
		}

		public function invoice_update($id){
	       		$this->load->model('invoice/invoice_model');
	       		if($this->invoice_model->invoice_update($id))
	       			$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');

	       		redirect('invoice/invoice/invoice_list');
		}

		public function invoice_del($id){
			$this->load->model('invoice/invoice_model');
			if($this->invoice_model->invoice_del($id))
				$this->session->set_userdata('success','true');
	       	else
	       		$this->session->set_userdata('error','true');

			redirect('invoice/invoice/invoice_list');
		}




		/*-------------AJAX File -----------*/
		public function change_product(){
			$this->load->model('invoice/ps_model');
			$data  = $this->ps_model->ps_list();

			$html = "<option value='' disabled selected hidden>select</option>";
			foreach ($data as $product) {
				$html .= "<option value='".$product['Name']."'>".$product['Name']."</option>";
			}
			echo $html;
		}

		public function change_price(){
			$result = array();
			$this->load->model('invoice/invoice_model');
			$data = $this->invoice_model->change_price();
			foreach ($data as $res) {
				$result['price'] = $res['Price'];
				$result['gst'] = $res['GST'];
			}
			echo json_encode($result);
		}
		/*-------------AJAX File -----------*/
	}
?>