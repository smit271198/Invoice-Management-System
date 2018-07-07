<?php
	class Receipt_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function receipt_list(){
			return $this->db->query("SELECT * from receipt where CompanyID = ".$this->session->userdata('ID')." order by InvoiceID")->result_array();
		}

		public function invoice_data(){
			return $this->db->query("SELECT * from invoice where CompanyID = ".$this->session->userdata('ID'))->result_array();
		}

		public function receipt_add(){
			$data = array(
				'Name' => $this->input->post('receipt_name'), 
				'InvoiceID' => $this->input->post('invoiceID'),
				'CompanyID' => $this->session->userdata('ID'),
				'Date' => $this->input->post('date'),
				'Amount' => $this->input->post('amount'),
				'Mode' => $this->input->post('mode'),
				'Details' => $this->input->post('details'),
			);
			$flag = $this->db->insert('receipt',$data);

			$invoice_data = $this->db->query("SELECT Total from invoice where InvoiceID = '".$data['InvoiceID']."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$total = 0;
			foreach ($invoice_data as $res) {
				$total = $res['Total'];
			}

			$receipt_data = $this->db->query("SELECT SUM(Amount) as Amount from receipt where InvoiceID = '".$data['InvoiceID']."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$amount = 0;
			foreach ($receipt_data as $res) {
				$amount = $res['Amount'];
			}
			if($amount == $total){
				$this->db->query("DELETE from reminder where InvoiceID = '".$data['InvoiceID']."' and CompanyID = ".$this->session->userdata('ID'));
			}
			return $flag;
		}

		public function receipt_id($id){
			return $this->db->query('SELECT * from receipt where ID = '.$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
		}

		public function receipt_update($id){
			$data = array(
				'Name' => $this->input->post('receipt_name'), 
				'InvoiceID' => $this->input->post('invoiceID'),
				'CompanyID' => $this->session->userdata('ID'),
				'Date' => $this->input->post('date'),
				'Amount' => $this->input->post('amount'),
				'Mode' => $this->input->post('mode'),
				'Details' => $this->input->post('details'),
			);
			$where = array(
				'ID' => $id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($data);
			$this->db->where($where);
			$flag = $this->db->update('receipt',$data);

			$invoice_data = $this->db->query("SELECT Total from invoice where InvoiceID = '".$data['InvoiceID']."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$total = 0;
			foreach ($invoice_data as $res) {
				$total = $res['Total'];
			}

			$receipt_data = $this->db->query("SELECT SUM(Amount) as Amount from receipt where InvoiceID = '".$data['InvoiceID']."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$amount = 0;
			foreach ($receipt_data as $res) {
				$amount = $res['Amount'];
			}
			if($amount == $total){
				$this->db->query("DELETE from reminder where InvoiceID = '".$data['InvoiceID']."' and CompanyID = ".$this->session->userdata('ID'));
			}
			return $flag;
		}

		public function receipt_del($id){
			return $this->db->query('DELETE from receipt where ID = '.$id." and CompanyID = ".$this->session->userdata('ID'));
		}



		/*-------------------------AJAX Functions-----------------------*/
		public function change_invoiceID(){		/*To show remaining amount on the dashboard for every customer*/
			$name = $this->input->post('name');
			$receipt_data = $this->db->query("SELECT InvoiceID,Amount from receipt where Name = '".$name."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$invoice_data = $this->db->query("SELECT InvoiceID,Total from invoice where Name = '".$name."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			if(empty($receipt_data)){
				return $invoice_data;
			}
			$total = 0;
			$invoiceID = "";
			foreach ($invoice_data as $res) {
				$total = $res['Total'];
				$invoiceID = $res['InvoiceID'];
			}
			foreach ($receipt_data as $res) {
				$total -= $res['Amount'];	
			}
			
			return array(
				array(
					'InvoiceID' => $invoiceID,
					'Total' => $total
				)
			);
		}
		/*-------------------------AJAX Functions ends-----------------------*/

	}
?>