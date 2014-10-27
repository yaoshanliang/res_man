<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
		
	//登录验证
	public function login()
	{
		$this->load->library('session');
		//生成验证码
		$this->load->helper("captcha");
		$vals = array(
		    'word' => rand(1000,9999),
		    'img_path' => './captcha/',
		    'img_url' => base_url()."captcha/",
		    'expiration' => 60
	    );
	    $cap = create_captcha($vals);
	    $data = array(
	    'captcha_time' => $cap['time'],
	    'ip_address' => $this->input->ip_address(),
	    'word' => $cap['word']
	    );
	    //产生的验证码插入数据库
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);
		//获取输入的用户名及密码（MD5加密后的结果存储在数据库）
		$user = $this->input->post("user");
		$passwd = md5($this->input->post("password"));
		$captcha = $this->input->post("captcha");
		//删除过期的验证码
		$expiration = time()-60; // 2分钟限制
		$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration); 
		// 再看是否有验证码存在
		$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
		$binds = array($captcha, $this->input->ip_address(), $expiration);
		$query = $this->db->query($sql, $binds);
		$row = $query->row();
		//从数据库获得数据
		$this->load->model("Admin");
		if($user == $this->Admin->getUser() && $passwd == $this->Admin->getPasswd() && $row->count != 0)
		{
			$this->session->set_userdata('username',$user);
			$this->session->set_userdata('token','in');
			/*验证成功*/
			redirect(site_url('welcome/home'),'refresh');
		}else
		{	
			/*验证失败*/
			$data['image'] = $cap['image'];
			$this->load->view("user/login",$data);
		}
	}
	
	// 主界面
	public function home()
	{
		$this->load->library('session');
		// 验证是否登陆
		if($this->session->userdata('token') != 'in')
		{
			redirect(site_url('welcome/login'),'refresh');
			return;
		}
		// 获取所有人员
		$this->db->select('id,name');
		$res = $this->db->get('person');
		$data['person'] = $res->result();
		// 获取所有项目
		$this->db->select('name,source,principal');
		$res = $this->db->get('project');
		$data['project'] = $res->result();
		// 获取所有国际合作
		$this->db->select('category,list,place,purpose');
		$res = $this->db->get('cooperation');
		$data['cooperation'] = $res->result();
		// 获取所有专利
		$this->db->select('name,person,time');
		$res = $this->db->get('patent');
		$data['patent'] = $res->result();
		// 获取所有著作权
		$this->db->select('name,person,time');
		$res = $this->db->get('copyright');
		$data['copyright'] = $res->result();
		// 获取所有著作
		$this->db->select('name,publisher,personlist');
		$res = $this->db->get('work');
		$data['work'] = $res->result();
		// 获取所有人员兼职情况
		$this->db->select('name,duty,id');
		$res = $this->db->get('part');
		$data['part'] = $res->result();
		// 获取所有人员进修学习情况
		$this->db->select('institute,content,list');
		$res = $this->db->get('learn');
		$data['learn'] = $res->result();
		// 输出到home_page
		$this->load->view("home_page",$data);
	}

}
?>