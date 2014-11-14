<?php 
	class awardmanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->view('award/main');
		}

		public function show()
		{
			$res = $this->db->get('award');
			$data['award'] = $res->result();
			$this->load->view('award/list',$data);
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
			$name = $this->input->post('name');
			$level = $this->input->post('level');

			$this->load->model('award');
			$bool = $this->award->insertAward($achievement,$time,$name,$level);
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
			$this->load->model('award');
			$bool = $this->award->deleteAward($number);
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
			$name = $this->input->post('name');
			$level = $this->input->post('level');

			$which = $this->input->post('which');
			$this->load->model('award');
			$bool = $this->award->updateAward($number,$achievement,$time,$name,$level,$which);
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
			$this->load->model('award');
			$this->load->model('person');
			$this->load->model('awardlist');
			$data['awardlist'] = $this->awardlist->getAwardlist($data['number']);
			$data['person'] = $this->person->getPerson();
			$data['awardname'] = $this->award->getAwardByNumber($data['number']);
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