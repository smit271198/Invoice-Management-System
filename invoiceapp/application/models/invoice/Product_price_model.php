<?php
	class Product_price_model extends CI_Model{	
		
		public function __construct(){
			$this->load->database();
		}

		public function prod_price_list(){
			$data1 = $this->db->query("SELECT * from product_price where CompanyID = ".$this->session->userdata('ID'))->result_array();
			$data2 = $this->db->query("SELECT * from price_list where CompanyID = ".$this->session->userdata('ID'))->result_array();
			return array($data1 , $data2);
		}


		public function prod_price_add(){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'Type' => $this->input->post('type'),
				'Name' => $this->input->post('g_c_name'),
			);
			$flag1 = $this->db->insert('product_price',$data);

			$id = $this->db->query("SELECT ID from product_price where Name = '".$data['Name']."' and Type = '".$data['Type']."' and CompanyID = ".$this->session->userdata('ID'))->result_array();

			$count = $this->db->query("SELECT * from product_service where CompanyID = ".$this->session->userdata('ID'))->num_rows();
			$product = $this->input->post('product');
			for($i = 1 ; $i <= $count ; $i++){
				$data = array(
					'ID' => $id[0]['ID'],
					'CompanyID' => $this->session->userdata('ID'),
					'Product' => $product[$i-1],
					'Price' => $this->input->post('price['.$i.']')
				);
				$flag2 = $this->db->insert('price_list',$data);
			}

			return ($flag1 && $flag2);
		}

		public function prod_price_id($id){
			$data1 = $this->db->query("SELECT * from Product_price where ID =".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$data2 = $this->db->query("SELECT * from price_list where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
			return array($data1 , $data2);
		}
		public function group_list($id){
			return $this->db->query("SELECT Name from group_list where Name not in(SELECT Name from product_price where CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID')." UNION SELECT Name from product_price where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();	
		}
		public function cust_list($id){
			return $this->db->query("SELECT Name from customer where Name not in (SELECT Cust_Name from customer_group where CompanyID = ".$this->session->userdata('ID')." UNION SELECT Name from product_price where CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID')." UNION SELECT Name from product_price where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
		}

		public function prod_price_update($id){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'Type' => $this->input->post('type'),
				'Name' => $this->input->post('g_c_name'),
			);
			$where = array(
				'ID' => $id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($data);
			$this->db->where($where);
			$flag1 = $this->db->update('product_price',$data);

			$flag2 = $this->db->query("DELETE from price_list where ID = ".$id." and CompanyID =".$this->session->userdata('ID'));

			$count = $this->db->query("SELECT * from product_service where CompanyID = ".$this->session->userdata('ID'))->num_rows();
			$product = $this->input->post('product');
			for($i = 1 ; $i <= $count ; $i++){
				$data = array(
					'ID' => $id,
					'CompanyID' => $this->session->userdata('ID'),
					'Product' => $product[$i-1],
					'Price' => $this->input->post('price['.$i.']')
				);
				$flag3 = $this->db->insert('price_list',$data);
			}

			return array($flag1 && $flag2 && $flag3);
		}

		public function prod_price_del($id){
			return $this->db->query("DELETE from product_price where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'));
		}



		/*-------------AJAX call----------*/
		public function change_radio(){
			$radio_value = $this->input->post();
			if($radio_value['radiovalue'] == "Group"){
				return $this->db->query("SELECT Name from group_list where Name not in(SELECT Name from product_price where CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID'))->result_array();
			}
			else{
				return $this->db->query("SELECT Name from customer where Name not in (SELECT Cust_Name from customer_group where CompanyID = ".$this->session->userdata('ID')." UNION SELECT Name from product_price where CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID'))->result_array();
			}
		}
		/*-------------AJAX call----------*/
	}
?>