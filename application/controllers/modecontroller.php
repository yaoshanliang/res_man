<?php
	class modecontroller extends MY_Controller
	{
		public function changemode()
		{
			$this->load->library('session');
			
			$mode = $this->input->post('mode');
			$from = $this->input->post('from');

			if($mode >=0 && $mode <3)
			{
				$this->session->set_userdata('mode',$mode);
			}

			// $this->db->update('Admin',array('mode'=>$mode));

			redirect($from,'refresh');
		}
	}
?>