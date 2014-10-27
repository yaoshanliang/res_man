<?php 
	class patentmanage extends CI_Controller
	{
		public function index()
		{
			$this->load->view('patent/main');
		}

		public function show()
		{
			$this->load->model('patent');
			$res = $this->patent->getPatent();
			$data['patent'] = $res;
			$this->load->view('patent/list',$data);
		}
		public function add()
		{
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$this->load->model('patent');
			if($this->patent->insertPatent($number,$name,$register,$person,$institute,$time))
			{
				echo "Success<br/>";
			}
		}
		public function modify()
		{
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$this->load->model('patent');
			if($this->patent->updatePatent($number,$name,$register,$person,$institute,$time))
			{
				echo "success";
			}

		}
	}
?>