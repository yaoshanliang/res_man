<?php 
	class session extends CI_Controller
	{
		public function index()
		{
			$this->session->set_userdata("hehe","what");
			echo $this->session->userdata['session_id'];
		}

		public function get()
		{
			echo $this->session->userdata['hehe'];
		}
	}
?>