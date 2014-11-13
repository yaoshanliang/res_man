<?php 
	class patentmanage extends MY_Controller
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
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
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
			$mode = $this->session->userdata('mode');
			if($mode != 1)
			{
				echo "权限错误";
				return;
			}
			$number = $this->input->post('number');
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$which = $this->input->post('which');

			$this->load->model('patent');
			if($this->patent->updatePatent($number,$name,$register,$person,$institute,$time,$which))
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
			$this->load->model('patent');
			if($this->patent->deletePatent($number))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}

		public function fileandlist()
		{	
			$data['number'] = $_GET['number'];
			$this->load->model('patent');
			$this->load->model('person');
			$this->load->model('patentlist');
			$data['patentlist'] = $this->patentlist->getPatentlist($data['number']);
			$data['person'] = $this->person->getPerson();
			$data['patentname'] = $this->patent->getPatentByNumber($data['number']);
			$this->load->view('patent/fileandlist',$data);
		}

		public function p_add()
		{
			$select_person = $this->input->post('select_person');
			$number = $this->input->post('number');
			$this->load->model('patentlist');
			$order = 0;
			if($select_person == null)
			{
				echo "<h1>未选择！</h1>";
				return;
			}
			$this->patentlist->deleteAll($number);
			foreach($select_person as $item)
			{
				$order = $order + 1;
				$this->patentlist->insertPatentlist($item,$number,$order);
			}
			redirect("patentmanage/index",'refresh');
		}

		public function p_arrange()
		{
			$number = $this->input->post('number');
			$this->load->model('patentlist');
			$res = $this->patentlist->getPatentlist($number);
			foreach($res as $item)
			{
				$this->patentlist->reOrder($number,$item->id,$this->input->post($item->id));
				// echo $this->input->post($item->id)."<br/>";
			}
			redirect(site_url('patentmanage/index'),'refresh');
		}

	}
?>