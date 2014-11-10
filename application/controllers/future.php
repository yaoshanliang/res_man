<?php
	class future extends CI_Controller
	{
		public function index()
		{
			$this->load->library('session');
			$data['mode'] = $this->session->userdata('mode');
			$this->load->view('future/index',$data);
		}

		public function changemode()
		{
			$this->load->library('session');
			// $this->session->set_userdata('mode',2);
			echo $this->input->post('mode');
			echo $this->input->post('from');
		}
	}
?>