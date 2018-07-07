<?php 
	class Dashboard_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function dashboard_list(){
			$customer_rows = $this->db->query("SELECT * from customer where CompanyID =".$this->session->userdata('ID'))->num_rows();
			$ps_rows = $this->db->query("SELECT * from product_service where CompanyID =".$this->session->userdata('ID'))->num_rows();
			$invoice_rows = $this->db->query("SELECT * from invoice where CompanyID =".$this->session->userdata('ID'))->num_rows();
			$receipt_rows = $this->db->query("SELECT * from receipt where CompanyID =".$this->session->userdata('ID'))->num_rows();

			$invoice_data = $this->db->query("SELECT * from invoice where CompanyID =".$this->session->userdata('ID'))->result_array();
			
			for($i=0 ; $i < $invoice_rows ;$i++) {
				$receipt_data = $this->db->query("SELECT * from receipt where invoiceID = '".$invoice_data[$i]['InvoiceID']."' and CompanyID =".$this->session->userdata('ID'))->result_array();
				foreach ($receipt_data as $res_receipt) {
					$invoice_data[$i]['Total'] -= $res_receipt['Amount'];
				}
			}
			return array($customer_rows,$ps_rows,$invoice_rows,$receipt_rows,$invoice_data);
		}

		public function company_details(){
			return $this->db->query("SELECT Name,City from companies where 	ID = ".$this->session->userdata('ID'))->result_array();
		}
	}
?>