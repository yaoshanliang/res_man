<?php 
	class copyrightmanage extends CI_Controller
	{
		public function index()
		{
			$this->load->view('copyright/main');
		}

		public function show()
		{
			$this->load->model('copyright');
			$res = $this->copyright->getCopyright();
			$data['copyright'] = $res;
			$this->load->model('copyrightlist');
			$this->load->view('copyright/list',$data);
		}
		public function add()
		{
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$this->load->model('copyright');
			if($this->copyright->insertCopyright($number,$name,$register,$person,$institute,$time))
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
			$this->load->model('copyright');
			if($this->copyright->updateCopyright($number,$name,$register,$person,$institute,$time))
			{
				echo "success";
			}

		}
	}
?>