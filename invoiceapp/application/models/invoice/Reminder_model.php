<?php
	class Reminder_model extends CI_Model{

		public function __construct(){
			$this->load->database();
			$this->db->query("DELETE FROM reminder WHERE DATE(Duedate) < CURDATE() and CompanyID = ".$this->session->userdata('ID'));
		}

		public function reminder_list(){
			return $this->db->query("SELECT * FROM reminder where CompanyID = ".$this->session->userdata('ID')." order by Duedate")->result_array();
		}

		public function reminder_update($id){
			return $this->db->query("UPDATE reminder SET Duedate='".$this->input->post('setdate')."' WHERE ID=".$id." and CompanyID = ".$this->session->userdata('ID'));
		}

/*---------------------AJAX call------------------------------------*/
		public function reminder_change(){
			return $this->db->query("SELECT * from reminder where (DATE(Duedate) = CURDATE() or DATE(Duedate) = CURDATE()+1) and CompanyID = ".$this->session->userdata('ID'))->result_array();
		}
/*---------------------AJAX call------------------------------------*/

	}
?>