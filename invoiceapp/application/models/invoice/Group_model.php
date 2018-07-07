<?php
	class Group_model extends CI_Model{

		public function __construct(){
			$this->load->database();
		}

		public function group_list(){	//to show group list on group.php
			$data = $this->db->query("SELECT Name,Cust_Name FROM group_list,customer_group WHERE group_list.ID = customer_group.ID and group_list.CompanyID = ".$this->session->userdata('ID')." and customer_group.CompanyID = ".$this->session->userdata('ID'))->result_array();
			$names = $this->db->query("SELECT ID,Name FROM group_list where CompanyID = ".$this->session->userdata('ID'))->result_array();
			return array($data,$names);
		}

		public function group_new(){		//to show customer list in add group form
			$res = $this->db->query("SELECT ID,Name,GSTIN_No,Pan_No FROM customer WHERE Name not IN ( select Cust_Name from customer_group where CompanyID  = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID'));
			return $res->result_array();
		}

		public function group_add(){
			$id = "";
			$name= "";
			$pan = "";
			$data1 = array(
				'CompanyID' => $this->session->userdata('ID'),
				'Name'    => $this->input->post('name'),
				'Details' => $this->input->post('details'),
			);
			$flag1 = $this->db->insert('group_list',$data1);


			$get_id = $this->db->query("SELECT ID from group_list WHERE Name ='".$data1['Name']."' and CompanyID = ".$this->session->userdata('ID'))->result_array();
			foreach ($get_id as $res) {
				$id = $res['ID'];
			}

			$data2 = $this->input->post('customer_list');

			$n = count($data2);
			for($i = 0; $i < $n ; $i++){
				$get_name = $this->db->query("SELECT Name,Pan_No from customer where ID =".$data2[$i]." and CompanyID = ".$this->session->userdata('ID'))->result_array();
				foreach($get_name as $res){
					$name = $res['Name'];
					$pan = $res['Pan_No'];
				}
				$data = array(
					'ID'  => $id,
					'CompanyID' => $this->session->userdata('ID'),
					'Cust_Name' => $name,
					'Pan_No' => $pan
				);
				$flag2 = $this->db->insert('customer_group',$data);
			}
			return ($flag1 && $flag2);
		}

		public function group_del($id){		//to delete the group
			$data = $this->db->query("SELECT Name from group_list where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
			foreach ($data as $res) {
				$flag1 = $this->db->query("DELETE from product_price where Name = '".$res['Name']."' and CompanyID = ".$this->session->userdata('ID'));
			}
			$flag2 = $this->db->query("DELETE FROM group_list where ID ='".$id."' and CompanyID = ".$this->session->userdata('ID'));
			return ($flag1 && $flag2);
		}

		public function group_id($id){	//to show data in group_update view
			$data1 = $this->db->query("SELECT ID,Name,Details from group_list where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();

			$pan = $this->db->query("SELECT Pan_No from customer_group where ID = ".$id." and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$count = count($pan);
			$pn = "";
			foreach ($pan as $res) {
				if($count != 1)
					$pn = $pn."'".$res['Pan_No']."',";
				else
					$pn = $pn."'".$res['Pan_No']."'";
				$count--;
			}
			$data2 = $this->db->query("SELECT Name,Pan_No,GSTIN_No from customer where Pan_No in (".$pn.") and CompanyID = ".$this->session->userdata('ID'))->result_array();
			$data3 = $this->db->query("SELECT Name,Pan_No,GSTIN_No FROM customer WHERE Name not IN ( select Cust_Name from customer_group where CompanyID = ".$this->session->userdata('ID').") and CompanyID = ".$this->session->userdata('ID'))->result_array();

			return (array($data1,$data2,$data3));
		}

		public function group_update($id){
			$data = array(
				'CompanyID' => $this->session->userdata('ID'),
				'Name' 	  => $this->input->post('name'),
				'Details' => $this->input->post('Details')
			);
			$where = array(
				'ID' => $id,
				'CompanyID' => $this->session->userdata('ID')
			);
			$this->db->set($data);
			$this->db->where($where);
			$flag1 = $this->db->update('group_list',$data);

			$this->db->query("DELETE from customer_group where ID=".$id." and CompanyID = ".$this->session->userdata('ID'));

			$data2 = $this->input->post('customer_list');

			$name = "";
			$pan = "";
			$n = count($data2);
			for($i = 0; $i < $n ; $i++){
				$get_name = $this->db->query("SELECT Name,Pan_No from customer where Pan_No = '".$data2[$i]."' AND CompanyID = ".$this->session->userdata('ID'))->result_array();
				foreach($get_name as $res){
					$name = $res['Name'];
					$pan = $res['Pan_No'];
				}
				$data = array(
					'ID'  => $id,
					'CompanyID' => $this->session->userdata('ID'),
					'Cust_Name' => $name,
					'Pan_No' => $pan
				);
				$flag2 = $this->db->insert('customer_group',$data);
			}
			return ($flag1 && $flag2);
		}
	}
?>