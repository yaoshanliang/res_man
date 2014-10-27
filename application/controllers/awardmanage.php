<?php 
	class awardmanage extends CI_Controller
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
		
		public function get($projectid)
		{
			$this->db->where("projecid =",$projectid);
			$res = $this->db->get('award');
			return $res->result();
		}

		public function modify()
		{
			$projectid = $this->input->post('projectid');
			$id = $this->input->post('id');
			$order = $this->input->post('order');
			$time = $this->input->post('time');
			$this->load->model('award');
			if($this->award->updateAward($projectid,$id,$order,$time))
			{
				echo "success";
			}
		}

		public function insert()
		{
			$projectid = $this->input->post('projectid');
			$id = $this->input->post('id');
			$order = $this->input->post('order');
			$time = $this->input->post('time');
			$this->load->model('award');
			if($this->award->insertAward($projectid,$id,$order,$time))
			{
				echo "success";
			}
		}

		public function delete()
		{
			$projectid = $this->input->post('projectid');
			$id = $this->input->post('id');
			$this->load->model('award');
			if($this->award->deleteAward($projectid,$id))
			{
				echo "success";
			}
		}
	}