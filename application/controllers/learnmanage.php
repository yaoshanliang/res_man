<?php
	class learnmanage extends CI_Controller
	{
		public function index()
		{
			$this->load->view('learn/main');
		}

		public function show()
		{
			$res = $this->db->get('learn');
			$data['learn'] = $res->result();
			$this->load->view('learn/list',$data);
		}

		public function add()
		{
			$institute = $this->input->post('institute');
			$content = $this->input->post('content');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$list = $this->input->post('list');
			$this->load->model('learn');
			$bool = $this->learn->insertLearn($institute,$content,$start,$end,$list);
			if($bool)
			{
				echo "success";
			}
		}

		public function delete()
		{
			$institute = $this->input->post('institute');
			$content = $this->input->post('content');
			$this->load->model('learn');
			$bool = $this->learn->deleteLearn($institute,$content);
			if($bool)
			{
				echo "success";
			}
		}
	}
?>