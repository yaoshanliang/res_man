<?php
	class cooperationmanage extends CI_Controller
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
			$category = $this->input->post('category');
			$list = $this->input->post('list');
			$number = $this->input->post('number');
			$place = $this->input->post('place');
			$purpose = $this->input->post('purpose');
			$url = $this->input->post('url');
			$news = $this->input->post('news');
			$picture = $this->input->post('picture');
			$this->load->model('cooperation');
			$bool = $this->cooperation->insertCooperation($category,$list,$number,$place,$purpose,$url,$news,$picture);
			if($bool)
			{
				echo "success";
			}
		}

		public function delete()
		{
			$category = $this->input->post('category');
			$place = $this->input->post('place');
			$number = $this->input->post('number');
			$purpose = $this->input->post('purpose');
			$this->load->model('cooperation');
			$bool = $this->cooperation->deleteCooperation($category,$number,$place,$purpose);
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