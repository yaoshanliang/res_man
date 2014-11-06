<?php 
	class adminmanage extends MY_Controller
	{
		// 密码修改
		public function modify()
		{
			$user = $this->input->post("user");
			$oldpasswd = md5($this->input->post("oldpassword"));
			$passwd = md5($this->input->post("newpassword"));
			$data['msg'] = 2;
			$this->load->model("Admin");
			if($user)
			{
				if($user == $this->Admin->getUser() && $oldpasswd == $this->Admin->getPasswd())
				{
					if($this->Admin->setPasswd($passwd))
					{
						$data['msg'] = 0;
					}
				}else
				{
					$data['msg'] = 1;
				}
			}
			$this->load->view("user/modify",$data);
		}

		public function logout()
		{
			$this->load->library('session');
			if($this->session->userdata('token') == 'in')
			{
				$this->session->set_userdata('token','out');
			}
			redirect(site_url('welcome/login'),'refresh');
		}
	}
?>