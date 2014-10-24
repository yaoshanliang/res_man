<?php 
	class admin extends CI_Controller
	{
		// 用户名密码修改
		public function modify()
		{
			$user = $this->input->post("usr");
			$passwd = $this->input->post("passwd");
			if($user && $passwd)
			{
				$this -> load -> model("Admin");
				if($this -> Admin -> setUser($user))
					echo "用户名修改成功";
				if($this -> Admin -> setPasswd($passwd))
					echo "密码修改成功";
			}else
			{
				$this -> load -> view("user/modify");
			}
		}
	}
?>