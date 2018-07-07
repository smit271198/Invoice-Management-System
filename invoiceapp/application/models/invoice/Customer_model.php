<?php
	class Customer_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function cust_add(){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'Name' => $this->input->post('name'),
				'State' => $this->input->post('state'),
				'State_Code' => $this->input->post('state_code'),
				'City' => $this->input->post('city'),
				'Address' => $this->input->post('address'),
				'Pin_Code' => $this->input->post('pincode'),
				'GSTIN_No' => $this->input->post('GSTIN_no'),
				'Pan_No' => $this->input->post('PAN_no'),
				'Contact_No1' => $this->input->post('contact_no_1'),
				'Contact_No2' => $this->input->post('contact_no_2'),
				'Details' => $this->input->post('details')
			);

			return $this->db->insert('customer',$data);
		}

		public function cust_list(){
			$res = $this->db->query("SELECT ID,Name,State_Code,GSTIN_No,Pan_No,Contact_No1 FROM customer where CompanyID = ".$this->session->userdata('ID'));
			return $res->result_array();
		}

		public function cust_del($id){
			$data = $this->db->query("SELECT Name,Pan_No from customer where ID =".$id." and CompanyID =".$this->session->userdata('ID'))->result_array();
			foreach ($data as $res) {
				$cnt = $this->db->query("SELECT count(ID) as cnt FROM customer_group where ID in (select ID from customer_group where Pan_No = '".$res['Pan_No']."' and CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID'))->result_array();
				foreach ($cnt as $count) {
					if($count['cnt'] == 1)
						$this->db->query("DELETE from group_list where ID = (select ID from customer_group where Pan_No = '".$res['Pan_No']."' and CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID'));
					else
						$this->db->query("DELETE from customer_group where Pan_No = '".$res['Pan_No']."' and CompanyID = ".$this->session->userdata('ID'));
				}
				$this->db->query("DELETE from product_price where Name = '".$res['Name']."' and CompanyID = ".$this->session->userdata('ID'));
			}
			$delete = "delete from customer where ID = '".$id."'";
			return $this->db->query($delete);
		}

		public function cust_id($id){		//get customer using id
			$res = $this->db->query("SELECT * FROM customer where ID = '".$id."' and CompanyID = ".$this->session->userdata('ID'));
			return $res->result_array();
		}

		public function cust_update($id){		//update data in the database
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'Name' => $this->input->post('name'),
				'State' => $this->input->post('state'),
				'State_Code' => $this->input->post('state_code'),
				'City' => $this->input->post('city'),
				'Address' => $this->input->post('address'),
				'Pin_Code' => $this->input->post('pincode'),
				'GSTIN_No' => $this->input->post('GSTIN_no'),
				'Pan_No' => $this->input->post('PAN_no'),
				'Contact_No1' => $this->input->post('contact_no_1'),
				'Contact_No2' => $this->input->post('contact_no_2'),
				'Details' => $this->input->post('details')
			);

			$where = array(
				'ID'=>$id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($data);
			$this->db->where($where);
			return $this->db->update('customer',$data);
		}
	}
?>
