<?php 
	//维护 个人信息
	class personmanage extends CI_Controller
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
			$this->load->library('session');
			if($this->session->userdata('token') != "in")
			{
				redirect(site_url("welcome/index"), 'refresh');
			}
			$this->load->view('person/main');
		}
		public function show()
		{
			$this->load->model('person');
			$res = $this->person->getPerson();
			$data['person'] = $res;
			$this->load->view('person/list',$data);
		}
		public function add()
		{
			$name = $this->input->post('name');
			$duties = $this->input->post('duties');
			$this->load->model('person');
			if($this->person->insertPerson($name,$duties))
			{
				echo "Success";
			}
		}
		public function modify()
		{
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			$duties = $this->input->post('duties');
			$this->load->model('person');
			if($this->person->modifyPerson($id,$name,$duties))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}
		public function delete()
		{
			$id = $this->input->post("id");
			$this->load->model('person');
			if($this->person->deletePerson($id))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}

		}
	}
?>