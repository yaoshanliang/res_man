<?php 
	class copyrightmanage extends MY_Controller
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
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$name = $this->input->post('name');
			$register = $this->input->post('register');
			$person = $this->input->post('person');

			$this->load->model('person');
			if($this->person->getPersonByName($person)==null)
			{
				echo "添加姓名不存在";
				return;
			}
			$person = $this->person->getPersonByName($person)->id;
			
			$institute = $this->input->post('institute');
			$time = $this->input->post('time');
			$this->load->model('copyright');
			if($this->copyright->insertCopyright($name,$register,$person,$institute,$time))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
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

			$this->load->model('copyright');
			if($this->copyright->updateCopyright($number,$name,$register,$person,$institute,$time,$which))
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
			$this->load->model('copyright');
			if($this->copyright->deleteCopyright($number))
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
			$this->load->model('copyright');
			$this->load->model('person');
			$this->load->model('copyrightlist');
			$data['copyrightlist'] = $this->copyrightlist->getCopyrightlist($data['number']);
			$data['person'] = $this->person->getPerson();
			$data['copyrightname'] = $this->copyright->getCopyrightByNumber($data['number']);
			$this->load->view('copyright/fileandlist',$data);
		}

		public function cr_add()
		{
			$select_person = $this->input->post('select_person');
			$number = $this->input->post('number');
			$this->load->model('copyrightlist');
			$order = 0;
			if($select_person == null)
			{
				echo "<h1>未选择！</h1>";
				return;
			}
			$this->copyrightlist->deleteAll($number);
			foreach($select_person as $item)
			{
				$order = $order + 1;
				$this->copyrightlist->insertCopyrightlist($item,$number,$order);
			}
			redirect("copyrightmanage/index",'refresh');
		}

		public function cr_arrange()
		{
			$number = $this->input->post('number');
			$this->load->model('copyrightlist');
			$res = $this->copyrightlist->getPatentlist($number);
			foreach($res as $item)
			{
				$this->copyrightlist->reOrder($number,$item->id,$this->input->post($item->id));
				// echo $this->input->post($item->id)."<br/>";
			}
			redirect(site_url('copyrightmanage/index'),'refresh');
		}
	}
?>