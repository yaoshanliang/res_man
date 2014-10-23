<?php 
	class Session extends CI_Controller
	{
		public function index()
		{
			$this->load->library('session');
			$this->session->set_userdata("hehe","what");
			echo $this->session->userdata['session_id'];
		}

		public function get()
		{
			$this->load->library('session');
			echo $this->session->userdata['hehe'];
		}
	}
?>