<?php 
	class workmanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->view('work/main');
		}

		public function show()
		{
			$this->load->model('work');
			$res = $this->work->getWork();
			$data['work'] = $res;
			$this->load->view('work/list',$data);
		}
		public function add()
		{
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$name = $this->input->post('name');
			$publisher = $this->input->post('publisher');
			$publishdate = $this->input->post('publishdate');
			$personlist = $this->input->post('personlist');
			$this->load->model('work');
			if($this->work->insertWork($name,$publisher,$publishdate,$personlist))
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
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
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$publisher = $this->input->post('publisher');
			$publishdate = $this->input->post('publishdate');
			$personlist = $this->input->post('personlist');
			$which = $this->input->post('which');
			$this->load->model('work');
			if($this->work->updateWork($number,$name,$publisher,$publishdate,$personlist,$which))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
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
			$number = $this->input->post('number');
			$this->load->model('work');
			if($this->work->deleteWork($number))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}
	}
?>