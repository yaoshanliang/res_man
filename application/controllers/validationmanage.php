<?php 
	class validationmanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->view('validation/main');
		}

		public function show()
		{
			$res = $this->db->get('validation');
			$data['validation'] = $res->result();
			$this->load->view('validation/list',$data);
		}

		public function add()
		{
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$achievement = $this->input->post('achievement');
			$time = $this->input->post('time');
			$institute = $this->input->post('institute');

			$this->load->model('validation');
			$bool = $this->validation->insertValidation($achievement,$time,$institute);
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
			$number = $this->input->post('number');
			$this->load->model('validation');
			$bool = $this->validation->deleteValidation($number);
			if($bool)
			{
				echo "删除成功";
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
			
			$achievement = $this->input->post('achievement');
			$number = $this->input->post('number');
			$time = $this->input->post('time');
			$institute = $this->input->post('institute');

			$which = $this->input->post('which');
			$this->load->model('validation');
			$bool = $this->validation->updateValidation($number,$achievement,$time,$institute,$which);
			if($bool)
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}

		public function personlist()
		{
			$data['number'] = $_GET['number'];
			$this->load->model('validation');
			$this->load->model('person');
			$this->load->model('validationlist');
			$data['validationlist'] = $this->validationlist->getValidationlist($data['number']);
			$data['person'] = $this->person->getPerson();
			$data['validationname'] = $this->validation->getValidationByNumber($data['number']);
			$this->load->view('validation/personlist',$data);
		}

		public function pe_add()
		{
			$select_person = $this->input->post('select_person');
			$number = $this->input->post('number');
			$this->load->model('validationlist');
			$order = 0;
			if($select_person == null)
			{
				echo "<h1>未选择！</h1>";
				return;
			}
			$this->validationlist->deleteAll($number);
			foreach($select_person as $item)
			{
				$order = $order + 1;
				$this->validationlist->insertValidationlist($item,$number,$order);
			}
			redirect("validationmanage/index",'refresh');
		}

		public function pe_arrange()
		{
			$number = $this->input->post('number');
			$this->load->model('validationlist');
			$res = $this->validationlist->getValidationlist($number);
			foreach($res as $item)
			{
				$this->validationlist->reOrder($number,$item->id,$this->input->post($item->id));
				// echo $this->input->post($item->id)."<br/>";
			}
			redirect(site_url('validationmanage/index'),'refresh');
		}

		public function projectlist()
		{
			$data['number'] = $_GET['number'];
			$this->load->model('validation');
			$this->load->model('project');
			$this->load->model('validationprojectlist');
			$data['project'] = $this->project->getProject();
			$data['validationname'] = $this->validation->getValidationByNumber($data['number']);
			$this->load->view('validation/projectlist',$data);
		}

		public function pr_add()
		{
			$select_project = $this->input->post('select_project');
			$number = $this->input->post('number');
			$this->load->model('validationprojectlist');
			if($select_project == null)
			{
				echo "<h1>未选择！</h1>";
				return;
			}
			$this->validationprojectlist->deleteAll($number);
			foreach($select_project as $item)
			{
				$this->validationprojectlist->insertValidationprojectlist($item,$number);
			}
			redirect("validationmanage/index",'refresh');
		}
	}