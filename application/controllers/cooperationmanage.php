<?php
	class cooperationmanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->view('cooperation/main');
		}
		public function show()
		{
			$res = $this->db->get('cooperation');
			$data['cooperation'] = $res->result();
			$this->load->view('cooperation/list',$data);
		}
		public function add()
		{
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$category = $this->input->post('category');
			$list = $this->input->post('list');
			$number = $this->input->post('number');
			$place = $this->input->post('place');
			$purpose = $this->input->post('purpose');
			$url = $this->input->post('url');
			$news = $this->input->post('news');
			$picture = $this->input->post('picture');
			$report = $this->input->post('report');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$this->load->model('cooperation');
			$bool = $this->cooperation->insertCooperation($category,$list,$number,$place,$purpose,$url,$news,$picture,$report,$start,$end);
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
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$id = $this->input->post('id');
			$this->load->model('cooperation');
			$bool = $this->cooperation->deleteCooperation($id);
			if($bool)
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}

		public function modify()
		{
			$mode = $this->session->userdata('mode');
			if($mode != 1)
			{
				echo "权限错误";
				return;
			}
			$category = $this->input->post('category');
			$id = $this->input->post('id');
			$list = $this->input->post('list');
			$number = $this->input->post('number');
			$place = $this->input->post('place');
			$purpose = $this->input->post('purpose');
			$url = $this->input->post('url');
			$news = $this->input->post('news');
			$picture = $this->input->post('picture');
			$report = $this->input->post('report');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$which = $this->input->post('which');

			$this->load->model('cooperation');
			if($this->cooperation->updateCooperation($id,$category,$list,$number,$place,$purpose,$url,$news,$picture,$report,$start,$end,$which))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}
	}
?>