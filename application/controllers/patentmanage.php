<?php 
	class patentmanage extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
			if($this->session->userdata('token') != 'in')
			{
				redirect(site_url('welcome/login'),'refresh');
			}
		}
		
		public function index()
		{
			$this->load->view('patent/main');
		}

		public function show()
		{
			$this->load->model('patent');
			$res = $this->patent->getPatent();
			$data['patent'] = $res;
			$this->load->view('patent/list',$data);
		}
		public function add()
		{
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$this->load->model('patent');
			if($this->patent->insertPatent($number,$name,$register,$person,$institute,$time))
			{
				echo "Success<br/>";
			}
		}
		public function modify()
		{
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$which = $this->input->post('which');
			$this->load->model('patent');
			if($this->patent->updatePatent($number,$name,$register,$person,$institute,$time,$which))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}

		public function delete()
		{
			$number = $this->input->post('number');
			$this->load->model('patent');
			if($this->patent->deletePatent($number))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}

		public function patentlist()
		{
			$this->load->view('patent/addlist');
		}
		public function p_add()
		{
			$id = $this->input->post('id');
			$identifier = $this->input->post('identifier');
			$order = $this->input->post('order');
			$this->load->model('patentlist');
			if($this->patentlist->insertPatentlist($id,$identifier,$order))
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
			}
		}
	}
?>