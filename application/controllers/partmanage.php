<?php
	class partmanage extends CI_Controller
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
			$this->load->view('part/main');
		}

		public function show()
		{
			$res = $this->db->get('part');
			$data['part'] = $res->result();
			$this->load->view('part/list',$data);
		}
		public function add()
		{
			$name = $this->input->post('name');
			$duty = $this->input->post('duty');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$id = $this->input->post('id');
			$this->load->model('part');
			$bool = $this->part->insertPart($name,$duty,$start,$end,$id);
			if($bool)
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
			}
		}

		public function delete()
		{
			$number = $this->input->post('number');
			$this->load->model('part');
			$bool = $this->part->deletePart($number);
			if($bool)
			{
				echo "success";
			}
		}

		public function modify()
		{
			$name = $this->input->post('name');
			$number = $this->input->post('number');
			$duty = $this->input->post('duty');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$which = $this->input->post('which');
			$this->load->model('part');
			$bool = $this->part->updatePart($number,$name,$duty,$start,$end,$which);
			if($bool)
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}
	}
?>