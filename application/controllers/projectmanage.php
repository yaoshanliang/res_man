<?php
	class projectmanage extends CI_Controller
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
			$this->load->view('project/main');
		}
		public function show()
		{
			$res = $this->db->get('project');
			$data['project'] = $res->result();
			$this->load->view('project/list',$data);
		}

		public function add()
		{
			$name = $this->input->post('name');
			$source = $this->input->post('source');
			$level = $this->input->post('level');
			$principal = $this->input->post('principal');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$money = $this->input->post('money');
			$currency = $this->input->post('currency');
			$contract = $this->input->post('contract');
			$credit = $this->input->post('credit');
			$type = $this->input->post('type');
			$this->load->model('project');
			if($this->project->insertProject($name,$source,$level,$principal,$start,$end,$money,$currency,$contract,$credit,$type))
			{
				echo "success";
			}
		}
		public function delete()
		{
			$this->load->model('project');
			if($this->project->deleteProject($projectid))
			{
				echo "success";
			}
		}
		public function modify()
		{
			$projectid = $this->input->post('projectid');
			$name = $this->input->post('name');
			$source = $this->input->post('source');
			$level = $this->input->post('level');
			$principal = $this->input->post('principal');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$money = $this->input->post('money');
			$currency = $this->input->post('currency');
			$contract = $this->input->post('contract');
			$credit = $this->input->post('credit');
			$type = $this->input->post('type');
			$this->load->model('project');
			if($this->project->updateProject($name,$source,$level,$principal,$start,$end,$money,$currency,$contarct,$credit,$type))
			{
				echo "success";
			}
		}

	}
?>