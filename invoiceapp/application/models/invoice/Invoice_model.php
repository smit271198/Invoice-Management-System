<?php
	class Invoice_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_invoice_id(){
			$data = $this->db->query("SELECT OptionValue from id_generator where OptionName='InvoiceID' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			return $data[0]['OptionValue'];
		}

		public function invoice_list(){
			$data1 = $this->db->query("SELECT * from invoice where CompanyID = ".$this->session->userdata('ID'))->result_array();
			$data2 = $this->db->query("SELECT * from invoice_product where CompanyID = ".$this->session->userdata('ID'))->result_array();

			return (array($data1,$data2));
		}

		public function invoice_add(){
			$invoice_data = array(
				'InvoiceID' => $this->input->post('invoiceID'),
				'CompanyID' => $this->session->userdata('ID'),
				'Name' => $this->input->post('customer_name'),
				'Order_No' => $this->input->post('purchase'),
				'Description' => $this->input->post('description'),
				'Date' => $this->input->post('date'),
				'Duedate' => $this->input->post('duedate'),
				'Total' => $this->input->post('total'),
			);
			$reminder_data = array(
				'Name' => $this->input->post('customer_name'),
				'InvoiceID' => $this->input->post('invoiceID'),
				'CompanyID' => $this->session->userdata('ID'),
				'Date' => $this->input->post('date'),
				'Duedate' => $this->input->post('duedate')
			);

			$flag1 = $this->db->insert('invoice',$invoice_data);
			$flag2 = $this->db->insert('reminder',$reminder_data);
			
			$count = $this->input->post('hidden_invoice');
			for($i = 1 ; $i <= $count; $i++){
				if($this->input->post('price['.$i.']') != NULL){
					$invoice_product_data = array(
						'InvoiceID' => $invoice_data['InvoiceID'],
						'CompanyID' => $this->session->userdata('ID'),
						'Price'  =>  $this->input->post('price['.$i.']'),
						'Product' => $this->input->post('product_change['.$i.']'),
						'Quantity' => $this->input->post('quantity['.$i.']'),
						'GST'  => $this->input->post('gst['.$i.']'),
						'Subtotal' => $this->input->post('subtotal['.$i.']')
					);
					$flag3 = $this->db->insert('invoice_product',$invoice_product_data);
				}
			}

			$invoiceID = $this->get_invoice_id() + 1;
			$this->db->query("UPDATE id_generator set OptionValue = ".$invoiceID." where OptionName = 'InvoiceID' and CompanyID = ".$this->session->userdata('ID'));
			return($flag1 && $flag2 && $flag3);
		}

		public function invoice_id($id){
			$data1 = $this->db->query("SELECT * from invoice where InvoiceID = '".$id."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$data2 = $this->db->query("SELECT * from invoice_product where InvoiceID = '".$id."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			return (array($data1,$data2));
		}

		public function invoice_update($id){
			$invoice_data = array(
				'InvoiceID' =>$this->input->post('invoiceID'),
				'CompanyID' => $this->session->userdata('ID'),
				'Name' => $this->input->post('customer_name'),
				'Order_No' => $this->input->post('purchase'),
				'Description' => $this->input->post('description'),
				'Date' => $this->input->post('date'),
				'Duedate' => $this->input->post('duedate'),
				'Total' => $this->input->post('total'),
			);
			$where = array(
				'InvoiceID' => $id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($invoice_data);
			$this->db->where($where);
			$flag1 = $this->db->update('invoice',$invoice_data);

			$this->db->query("DELETE from invoice_product where InvoiceID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));

			$count = $this->input->post('hidden_invoice');
			for($i = 1 ; $i <= $count; $i++){
				if($this->input->post('price['.$i.']') != NULL){
					$invoice_product_data = array(
						'InvoiceID' => $id,
						'CompanyID' => $this->session->userdata('ID'),
						'Price'  =>  $this->input->post('price['.$i.']'),
						'Product' => $this->input->post('product_change['.$i.']'),
						'Quantity' => $this->input->post('quantity['.$i.']'),
						'GST'  => $this->input->post('gst['.$i.']'),
						'Subtotal' => $this->input->post('subtotal['.$i.']')
					);
					$flag2 = $this->db->insert('invoice_product',$invoice_product_data);
				}
			}

			$reminder_data = array(
				'Name' => $this->input->post('customer_name'),
				'InvoiceID' => $this->input->post('invoiceID'),
				'CompanyID' => $this->session->userdata('ID'),
				'Date' => $this->input->post('date'),
				'Duedate' => $this->input->post('duedate')
			);
			$where = array(
				'InvoiceID' => $invoice_data['InvoiceID'],
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($reminder_data);
			$this->db->where('InvoiceID',$invoice_data['InvoiceID']);
			$flag3 = $this->db->update('reminder',$reminder_data);
			return ($flag1 && $flag2 && $flag3);
		}

		public function invoice_del($id){
			$flag1 = $this->db->query("DELETE from reminder where InvoiceID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
			$flag2 = $this->db->query("DELETE from invoice where InvoiceID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
			return($flag1 && $flag2);
		}


		/*---------ajax call----------*/
		public function change_price(){
			$product = $this->input->post('selectproduct');
			$name = $this->input->post('selectname');

			$data = $this->db->query("SELECT price_list.Price as Price,GST from product_service,product_price,price_list where product_price.Name = '".$name."' and price_list.Product = '".$product."' and price_list.Product = product_service.Name AND product_price.ID = price_list.ID and price_list.CompanyID = ".$this->session->userdata('ID')." and product_price.CompanyID = ".$this->session->userdata('ID')." and product_service.CompanyID = ".$this->session->userdata('ID'))->result_array();

			if(empty($data)){
				$query = "SELECT price_list.Price as Price,GST from product_service,product_price,price_list where product_service.Name = price_list.Product and price_list.Product='".$product."' and product_price.ID = price_list.ID and product_price.Name =(SELECT Name from group_list where ID = ( SELECT ID from customer_group where Cust_Name = '".$name."' and CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID').") and price_list.CompanyID = ".$this->session->userdata('ID')." and product_price.CompanyID = ".$this->session->userdata('ID')." and product_service.CompanyID = ".$this->session->userdata('ID');
				$data = $this->db->query($query)->result_array();

				if(empty($data)){
					$data = $this->db->query("SELECT Price,GST from product_service where Name ='".$product."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
				}
			}
			return $data;
		}
		/*---------ajax call----------*/
	}
?>