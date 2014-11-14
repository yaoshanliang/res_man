<?php
	class projectmanage extends MY_Controller
	{
		
		public function index()
		{
			$res = $this->db->get('source');
			$data['project_source'] = $res->result();
			$this->load->view('project/main',$data);
		}
		public function show()
		{
			$res = $this->db->get('project');
			$data['project'] = $res->result();
			$this->load->view('project/list',$data);
		}

		public function add()
		{
			$name = $this->input->post('name');
			// 对于项目来源的处理
			$source = $this->input->post('source');
			$this->load->model('source');
			if($this->source->getSourceByName($source)==null)
			{
				// 来源不存在，则加入
				$this->source->addSource($source);
			}
			// 存编号
			$source = $this->source->getSourceByName($source)->number;

			// 对于负责人处理，存编号
			$principal = $this->input->post('principal');
			$this->load->model('person');
			if($this->person->getPersonByName($principal)==null)
			{
				echo "添加姓名不存在";
				return;
			}
			$principal = $this->person->getPersonByName($principal)->id;

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$money = $this->input->post('money');
			$currency = $this->input->post('currency');
			$contract = $this->input->post('contract');
			$credit = $this->input->post('credit');
			$type = $this->input->post('type');
			$this->load->model('project');
			if($this->project->insertProject($name,$source,$principal,$start,$end,$money,$currency,$contract,$credit,$type))
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
			}
		}

		public function delete()
		{
			$this->load->model('project');
			$projectid = $this->input->post('projectid');
			if($this->project->deleteProject($projectid))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}

		public function modify()
		{
			$projectid = $this->input->post('projectid');
			$name = $this->input->post('name');
			// 对于项目来源的处理
			$source = $this->input->post('source');
			$this->load->model('source');
			if($this->source->getSourceByName($source)==null)
			{
				// 来源不存在，则加入
				$this->source->addSource($source);
			}
			// 存编号
			$source = $this->source->getSourceByName($source)->number;
			// 对于负责人处理，存编号
			$principal = $this->input->post('principal');
			$this->load->model('person');
			if($this->person->getPersonByName($principal)==null)
			{
				echo "修改姓名不存在";
				return;
			}
			$principal = $this->person->getPersonByName($principal)->id;

			$start = $this->input->post('start');
			$end = $this->input->post('end');
			$money = $this->input->post('money');
			$currency = $this->input->post('currency');
			$contract = $this->input->post('contract');
			$credit = $this->input->post('credit');
			$type = $this->input->post('type');
			$which = $this->input->post('which');
			$this->load->model('project');
			if($currency =="" || $currency == null) $currency="DEFAULT";
			if($this->project->updateProject($projectid,$name,$source,$principal,$start,$end,$money,$currency,$contract,$credit,$type,$which))
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
			$this->load->model('project');
			$this->load->model('person');
			$this->load->model('projectlist');
			$data['projectlist'] = $this->projectlist->getProjectlist($data['number']);
			$data['person'] = $this->person->getPerson();
			$data['projectname'] = $this->project->getProjectByName($data['number']);
			$this->load->view('project/personlist',$data);
		}

		public function pe_add()
		{
			$select_person = $this->input->post('select_person');
			$number = $this->input->post('number');
			$this->load->model('projectlist');
			$order = 0;
			if($select_person == null)
			{
				echo "<h1>未选择！</h1>";
				return;
			}
			$this->projectlist->deleteAll($number);
			foreach($select_person as $item)
			{
				$order = $order + 1;
				$this->projectlist->insertProjectlist($item,$number,$order);
			}
			redirect("projectmanage/index",'refresh');
		}

		public function pe_arrange()
		{
			$number = $this->input->post('number');
			$this->load->model('projectlist');
			$res = $this->projectlist->getProjectlist($number);
			foreach($res as $item)
			{
				$this->projectlist->reOrder($number,$item->id,$this->input->post($item->id));
				// echo $this->input->post($item->id)."<br/>";
			}
			redirect(site_url('projectmanage/index'),'refresh');
		}

		public function fundslist()
		{
			$projectid = $_GET['number'];
			$this->load->model('funds');
			$this->load->model('project');

			$project = $this->project->getProjectByID($projectid);

			$data['project'] = $project;
			$data['number'] = $projectid;
			$data['fundslist'] = $this->funds->getFundsByID($projectid);
			$this->load->view('project/fundslist',$data);
		}

		public function new_funds()
		{
			$projectid = $this->input->post("number");
			$this->load->model('funds');
			$this->load->model('project');
			$this->funds->deleteAll($projectid);
			$project = $this->project->getProjectByID($projectid);

			$start_int = intval($project->start);
			$end_int = intval($project->end);
			for($i=$start_int;$i < $end_int + 1; $i++)
			{
				$others = $this->input->post($i."_others");
				$this->funds->insertFunds($projectid,$this->input->post($i),$i,$others);
			}	
			redirect(site_url('projectmanage/index'),'refresh');
		}
	}
?>