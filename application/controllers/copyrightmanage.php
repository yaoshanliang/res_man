<?php 
	class copyrightmanage extends CI_Controller
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
			$this->load->view('copyright/main');
		}

		public function show()
		{
			$this->load->model('copyright');
			$res = $this->copyright->getCopyright();
			$data['copyright'] = $res;
			$this->load->model('copyrightlist');
			$this->load->view('copyright/list',$data);
		}
		public function add()
		{
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$this->load->model('copyright');
			if($this->copyright->insertCopyright($name,$register,$person,$institute,$time))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
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
			$this->load->model('copyright');
			if($this->copyright->updateCopyright($number,$name,$register,$person,$institute,$time,$which))
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
			$this->load->model('copyright');
			if($this->copyright->deleteCopyright($number))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}

		public function copyrightlist()
		{
			$this->load->view("copyright/addlist");
		}

		public function cr_add()
		{
			$id = $this->input->post('id');
			$identifier = $this->input->post('identifier');
			$order = $this->input->post('order');
			$this->load->model('copyrightlist');
			if($this->copyrightlist->insertCopyrightlist($id,$identifier,$order))
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
			}
		}
	}
?>