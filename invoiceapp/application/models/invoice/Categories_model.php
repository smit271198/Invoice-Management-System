<?php
	class Categories_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function get_category_id(){
			$data = $this->db->query("SELECT OptionValue from ID_generator where OptionName='CategoryID' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			return $data[0]['OptionValue'];
		}

		public function categories_list(){
			$res = $this->db->query("SELECT * from categories where CompanyID = ".$this->session->userdata('ID'));
			return $res->result_array();
		}

		public function categories_add(){
			$data = array(
					'CompanyID' => $this->session->userdata('ID'),
					'CategoryID'  => $this->input->post('categoryID'),
					'Name'  => $this->input->post('name'),
					'Details' => $this->input->post('details')
			);
			$id = $this->get_category_id()+1;
			$this->db->query("UPDATE id_generator set OptionValue = ".$id." where OptionName = 'CategoryID' and CompanyID = ".$this->session->userdata('ID'));
			return $this->db->insert('categories',$data);
		}

		public function categories_del($id){
			$this->db->query("DELETE FROM price_list where Product in(SELECT Name from product_service where CategoryID = '".$id."' and CompanyID = ".$this->session->userdata('ID').") and CompanyID= ".$this->session->userdata('ID'));
			return $this->db->query("DELETE from categories where CategoryID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
		}

		public function categories_id($id){
			$res = $this->db->query("SELECT * FROM categories where CategoryID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
			return $res->result_array();
		}

		public function	categories_update($id){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'CategoryID' => $this->input->post('categoryID'),
				'Name' => $this->input->post('name'),
				'Details' => $this->input->post('details')
			);
			$where = array(
				'CategoryID' => $id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($data);
			$this->db->where($where);
			return $this->db->update('categories',$data);
		}
	}
?>