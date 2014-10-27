<?php
	class partmanage extends CI_Controller
	{
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
				echo "success";
			}
		}

		public function delete()
		{
			$name = $this->input->post('name');
			$duty = $this->input->post('duty');
			$id = $this->input->post('id');
			$this->load->model('part');
			$bool = $this->part->deletePart($name,$duty,$id);
			if($bool)
			{
				echo "success";
			}
		}
	}
?>