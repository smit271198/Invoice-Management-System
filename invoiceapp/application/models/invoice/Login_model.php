<?php
	class Login_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function login_check(){
			$flag = false;
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = $this->db->query("SELECT * from login_data")->result_array();
			foreach ($data as $res) {
				if($username == $res['Username']  && $password == $res['Password']){
					$this->session->set_userdata('ID',$res['ID']);
					$flag = true;
					break;
				}
			}
			if(!$flag)
				$this->session->set_userdata('invalid','true');
			return $flag;
		}
	}
?>