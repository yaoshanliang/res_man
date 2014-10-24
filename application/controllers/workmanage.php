<?php 
	class workmanage extends CI_Controller
	{
		public function index()
		{
			$this->load->model('work');
			$res = $this->work->getWork();
			$data['work'] = $res;
			$this->load->view('work/main',$data);
		}
		public function add()
		{
			$name = $this->input->post('name');
			$publisher = $this->input->post('publisher');
			$publishdate = $this->input->post('publishdate');
			$personlist = $this->input->post('personlist');
			$this->load->model('work');
			if($this->work->insertWork($name,$publisher,$publishdate,$personlist))
			{
				echo "Success<br/>";
			}
		}
		public function modify()
		{
			$name = $this->input->post('name');
			$publisher = $this->input->post('publisher');
			$publishdate = $this->input->post('publishdate');
			$personlist = $this->input->post('personlist');
			$this->load->model('work');
			if($this->work->updateWork($name,$publisher,$publishdate,$personlist))
			{
				echo "success";
			}

		}
	}
?>