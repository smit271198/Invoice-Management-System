<?php
	class Receipt extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}
		
		public function receipt_list(){
			$this->load->model('invoice/receipt_model');
			$data['item'] = $this->receipt_model->receipt_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Payment Receipts";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/receipt',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}
		public function receipt_new(){
			$this->load->model('invoice/receipt_model');
			$data['item'] = $this->receipt_model->invoice_data();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Payment Receipt";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/receipt_new',$data);
			$this->load->view('invoice/footer');
		}
		public function receipt_new_add(){
			$validate = array(
				array(
					'field' => 'receipt_name',
					'label' => 'Customer Name',
					'rules' => 'required'
				),
				array(
					'field' => 'date',
					'label' => 'Received Date',
					'rules' => 'required'
				),
				array(
					'field' => 'mode',
					'label' => 'Payment Mode',
					'rules' => 'required'
				),
				array(
					'field' => 'amount',
					'label' => 'Received Amount',
					'rules' => 'required'
				)
			);
			$this->form_validation->set_rules($validate);
			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/receipt_model');
				$data['item'] = $this->receipt_model->invoice_data();

				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Payment Receipts"; 
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/receipt_new',$data);
			$this->load->view('invoice/footer');
		}
		else{
			$this->load->model('invoice/receipt_model');
			if($this->receipt_model->receipt_add())
				$this->session->set_userdata('success','true');
	       	else
	       		$this->session->set_userdata('error','true');

			redirect('invoice/receipt/receipt_list');
		}
		}

		public function receipt_id($id){
			$this->load->model('invoice/receipt_model');
			$data1 = $this->receipt_model->receipt_id($id);

			$this->load->model('invoice/receipt_model');
			$data2 = $this->receipt_model->invoice_data();

			$data['item'] = array($data1,$data2);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Payment Receipts"; 
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/receipt_update',$data);
		$this->load->view('invoice/footer');
		}

		public function receipt_update($id){
			$validate = array(
				array(
					'field' => 'receipt_name',
					'label' => 'Customer Name',
					'rules' => 'required'
				),
				array(
					'field' => 'date',
					'label' => 'Received Date',
					'rules' => 'required'
				),
				array(
					'field' => 'mode',
					'label' => 'Payment Mode',
					'rules' => 'required'
				),
				array(
					'field' => 'amount',
					'label' => 'Received Amount',
					'rules' => 'required'
				)
			);
			$this->form_validation->set_rules($validate);
			if($this->form_validation->run()==FALSE){
				$this->load->model('invoice/receipt_model');
				$data1 = $this->receipt_model->receipt_id($id);

				$this->load->model('invoice/receipt_model');
				$data2 = $this->receipt_model->invoice_data();

				$data['item'] = array($data1,$data2);

				$this->load->model('invoice/dashboard_model');
				$sidebar['details'] = $this->dashboard_model->company_details();
				$sidebar['active'] = "Payment Receipts"; 
				$this->load->view('invoice/header');
				$this->load->view('invoice/sidebar',$sidebar);
				$this->load->view('invoice/receipt_update',$data);
				$this->load->view('invoice/footer');
			}
			else{
				$this->load->model('invoice/receipt_model');
				if($this->receipt_model->receipt_update($id))
					$this->session->set_userdata('success','true');
	       		else
	       			$this->session->set_userdata('error','true');

				redirect('invoice/receipt/receipt_list');
			}
		}

		public function receipt_del($id){
			$this->load->model('invoice/receipt_model');
			if($this->receipt_model->receipt_del($id))
				$this->session->set_userdata('success','true');
	       	else
	       		$this->session->set_userdata('error','true');

			redirect('invoice/receipt/receipt_list');
		}

		/*-------------------------AJAX Functions-----------------------*/
		public function change_invoiceID(){
			$this->load->model('invoice/receipt_model');
			$data = $this->receipt_model->change_invoiceID();
			$invoice_data = array();
			foreach ($data as $res) {
				$invoice_data['invoiceID'] = $res['InvoiceID'];
				$invoice_data['amount'] = $res['Total'];
			}
			echo json_encode($invoice_data);
		}
		/*-------------------------AJAX Functions ends-----------------------*/
	}
?>