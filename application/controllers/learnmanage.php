<?php
	class learnmanage extends MY_Controller
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
			$person = $this->input->post('person');
			$this->load->model('learn');
			$bool = $this->learn->insertLearn($institute,$content,$start,$end,$person);
			if($bool)
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
			}
		}

		public function modify()
		{
			$institute = $this->input->post('institute');
			$content = $this->input->post('content');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$person = $this->input->post('person');
			$number = $this->input->post('number');
			$which = $this->input->post('which');
			$this->load->model('learn');
			$bool = $this->learn->updateLearn($number,$institute,$content,$start,$end,$person,$which);
			if($bool)
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
			$this->load->model('learn');
			$bool = $this->learn->deleteLearn($number);
			if($bool)
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}
	}
?>