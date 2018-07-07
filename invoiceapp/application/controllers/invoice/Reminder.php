<?php
	class Reminder extends CI_Controller{
		function __construct(){
			parent::__construct();
			if(! $this->session->has_userdata('ID')){
				redirect('invoice/login');
			}
		}

		public function reminder_list(){
			$this->load->model('invoice/reminder_model');
			$data['item'] = $this->reminder_model->reminder_list();

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Payment Reminders";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			if($this->session->has_userdata('success'))
				$this->load->view('invoice/success_message');
			elseif($this->session->has_userdata('error'))
				$this->load->view('invoice/error_message');
			$this->load->view('invoice/reminder',$data);
			$this->load->view('invoice/footer');

			$this->session->unset_userdata('success');
			$this->session->unset_userdata('error');
		}

		public function reminder_id($id){
			$this->load->model('invoice/reminder_model');
			$data1 = $this->reminder_model->reminder_list();
			$data['item'] = array($data1,$id);

			$this->load->model('invoice/dashboard_model');
			$sidebar['details'] = $this->dashboard_model->company_details();
			$sidebar['active'] = "Payment Reminders";
			$this->load->view('invoice/header');
			$this->load->view('invoice/sidebar',$sidebar);
			$this->load->view('invoice/reminder_update',$data);
			$this->load->view('invoice/footer');
		}

		public function reminder_update($id){
			$this->load->model('invoice/reminder_model');
			if($this->reminder_model->reminder_update($id))
				$this->session->set_userdata('success','true');
	       	else
	       		$this->session->set_userdata('error','true');
			redirect('invoice/reminder/reminder_list');
		}



		/*-----------------AJAX call---------------*/
		public function reminder_change(){
			$this->load->model('invoice/reminder_model');
			$data = $this->reminder_model->reminder_change();
			$html = "";
			if(! $data){
				$html = "<li class='media'><div class='media-body container-fluid'>";
				$html .= "<p>No reminder for next 2 days</p>";
				$html .= "</div></li>";
			}
			foreach ($data as $res) {
				$html .= "<li class='media'><div class='media-body container-fluid'>";
				$html .= "<p>".$res['Name']."<span style='float:right'>".$res['Duedate']."</span><br>".$res['InvoiceID']."</p>";
				$html .= "</div></li>";
			}
			echo $html;
		}
		/*-----------------AJAX call---------------*/
	}
?>