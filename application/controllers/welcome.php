<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	//显示Login界面
	public function index()
	{
		//生成验证码
		$this->load->helper("captcha");
		$vals = array(
		    'word' => rand(1000,9999),
		    'img_path' => './captcha/',
		    'img_url' => base_url()."captcha/",
		    'img_width' => '150',
		    'img_height' => 30,
		    'expiration' => 7200
	    );
	    $cap = create_captcha($vals);
		$this->load->view("login",$cap);
	}

	public function show()
	{
		$this->load->model("Project");
		$data['project']=$this->Project->getName();
		$this->load->view("bootstrap-template",$data);
	}

	public function verify()
	{
		//获取输入的用户名及密码（MD5加密后的结果存储在数据库）
		$user = $this->input->post("user");
		$passwd = md5($this->input->post("password"));
		//从数据库获得数据
		$this->load->model("Admin");
		if($user == $this->Admin->getUser() && $passwd == $this->Admin->getPasswd())
		{
			//直接调用本Controller的方法
			$this -> show();
		}else
		{
			echo "<h3>用户名或者密码错误</h3>";
			$this -> index();
		}
	}

	public function modify()
	{
		$this->input->post("user");
		$this->input->post("passwd");
	}
	
}
?>

