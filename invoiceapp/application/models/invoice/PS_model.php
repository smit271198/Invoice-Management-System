<?php
	class PS_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function ps_list(){
			$res = $this->db->query("SELECT categories.CategoryID,categories.Name as Category_Name,product_service.ID,product_service.Name,HSN_SAC,Price,GST from categories,product_service where categories.CategoryID = product_service.CategoryID and categories.CompanyID = ".$this->session->userdata('ID')." and product_service.CompanyID = ".$this->session->userdata('ID'))->result_array();
			return $res;
		}

		public function ps_add(){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'CategoryID' => $this->input->post('categoryID'),
				'Name' => $this->input->post('name'),
				'HSN_SAC' => $this->input->post('HSN_SAC'),
				'Price' => $this->input->post('price'),
				'GST' => $this->input->post('gst'),
				'Details' => $this->input->post('details')
			);
			return $this->db->insert('Product_Service',$data);
		}

		public function ps_del($id){
			$data = $this->db->query("SELECT Name from product_service where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$name = "";
			foreach ($data as $res) {
				$name = $res['Name'];
			}
			$this->db->query("DELETE from price_list where Product = '".$name."' and CompanyID = ".$this->session->userdata('ID'));
			return $this->db->query("delete from Product_Service where ID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
		}

		public function ps_id($id){
			$res = $this->db->query("SELECT * FROM product_service where ID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
			return $res->result_array();
		}

		public function ps_update($id){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'CategoryID' => $this->input->post('categoryID'),
				'Name' => $this->input->post('name'),
				'HSN_SAC' => $this->input->post('HSN_SAC'),
				'Price' => $this->input->post('price'),
				'GST' => $this->input->post('gst'),
				'Details' => $this->input->post('details')
			);
			$where = array(
				'ID' => $id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($data);
			$this->db->where($where);
			return $this->db->update('product_service',$data);
		}


		/*-------------AJAX call-------------*/
		public function ps_new_invoice(){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'categoryID' => $this->input->post('categoryID'),
				'Name' => $this->input->post('productName'),
				'HSN_SAC' => $this->input->post('HSN_SAC'),
				'Price' => $this->input->post('price'),
				'GST' => $this->input->post('gst'),
				'Details' => $this->input->post('details')
			);
			return $this->db->insert('product_service',$data);
		}
		/*-------------AJAX call-------------*/
	}
?>