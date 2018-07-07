<?php
	class Admin_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function company_list(){
			return $this->db->query("SELECT * from companies")->result_array();
		}

		public function company_add(){
			$data = array(
				'Name' => $this->input->post('name'),
				'Username' => $this->input->post('username'),
				'Password' => $this->input->post('password'),
				'State' => $this->input->post('state'),
				'Country' => $this->input->post('country'),
				'City' => $this->input->post('city'),
				'Address' => $this->input->post('address'),
				'Pin_Code' => $this->input->post('pincode'),
				'GSTIN_No' => $this->input->post('GSTIN_no'),
				'Pan_No' => $this->input->post('PAN_no'),
				'Contact_No1' => $this->input->post('contact_no_1'),
				'Contact_No2' => $this->input->post('contact_no_2'),
				'Notes' => $this->input->post('details')
			);

			$flag1 = $this->db->insert('companies',$data);

			$id = $this->db->query("SELECT ID from companies where Username = '".$data['Username']."' and Password = '".$data['Password']."'")->result_array();
			$login_data = array(
				'ID' => $id[0]['ID'],
				'Username' => $data['Username'],
				'Password' => $data['Password']
			);
			$flag2 = $this->db->insert('login_data',$login_data);

			$id_generator_data = array(
					'CompanyID' => $id[0]['ID'],
					'OptionName' => 'InvoiceID',
					'OptionValue' => 1
				);
			$flag3 = $this->db->insert('id_generator',$id_generator_data);

			$id_generator_data = array(
					'CompanyID' => $id[0]['ID'],
					'OptionName' => 'CategoryID',
					'Optionvalue' => 1
				);
			$flag3 = $this->db->insert('id_generator',$id_generator_data);
			return ($flag1 && $flag2);
		}

		public function company_id($id){
			return $this->db->query("SELECT * from companies where ID = ".$id)->result_array();
		}

		public function company_update($id){		//update data in the database
			$data = array(
				'Name' => $this->input->post('name'),
				'Username' => $this->input->post('username'),
				'Password' => $this->input->post('password'),
				'State' => $this->input->post('state'),
				'Country' => $this->input->post('country'),
				'City' => $this->input->post('city'),
				'Address' => $this->input->post('address'),
				'Pin_Code' => $this->input->post('pincode'),
				'GSTIN_No' => $this->input->post('GSTIN_no'),
				'Pan_No' => $this->input->post('PAN_no'),
				'Contact_No1' => $this->input->post('contact_no_1'),
				'Contact_No2' => $this->input->post('contact_no_2'),
				'Notes' => $this->input->post('details')
			);

			$this->db->set($data);
			$this->db->where('ID',$id);
			$flag1 = $this->db->update('companies',$data);

			$login_data = array(
				'ID' => $id,
				'Username' => $this->input->post('username'),
				'Password' => $this->input->post('password'),
			);

			$this->db->set($data);
			$this->db->where('ID',$id);
			$flag2 = $this->db->update('login_data',$login_data);
			return ($flag1 && $flag2);
		}

		public function company_del($id){
			return $this->db->query("DELETE from companies where ID = ".$id);
		}


		/*-------------------------AJAX call---------------------------*/
		public function check_username(){
			$username = $this->input->post('username');
			$data = $this->db->query("SELECT Username from companies")->result_array();

			foreach ($data as $res) {
				if($username == $res['Username'])
					return true;
			}
			return false;
		}
		/*-------------------------AJAX call---------------------------*/
	}
?>