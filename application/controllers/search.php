<?php

	class search extends MY_Controller
	{
		public function index()
		{
			$this->load->view("search/main");
		}

		public function aboutPerson()
		{
			$this->load->model('person');
			$this->load->model('projectlist');
			$this->load->model('project');
			$this->load->model('cooperation');
			$this->load->model('learn');
			$this->load->model('part');
			$this->load->model('patent');
			$this->load->model('patentlist');
			$this->load->model('copyright');
			$this->load->model('copyrightlist');
			$this->load->model('work');
			$this->load->model('award');
			$this->load->model('awardlist');
			$this->load->model('validation');
			$this->load->model('validationlist');

			$personname = $this->input->post("person");
			$person = $this->person->getPersonByName($personname);
			if($person == null)
			{
				echo "人员不存在";
				return ;
			}
			$id = $person->id;
			// 获得参与项目
			$res = $this->projectlist->getProjectID($id);
			$project = array();
			foreach($res as $item)
			{
				$project[] = ($this->project->getProjectByID($item->projectid));
			}
			// 参与国际合作
			$cooperation = array();
			$res = $this->cooperation->getCooperation();
			foreach($res as $item)
			{
				if(preg_match("/$person->name/",$item->list))
					$cooperation[] = $item;
			}
			// 学术兼职
			$part = $this->part->getPartByID($id);
			// 进修学习
			$learn = $this->learn->getLearnByID($id);
			// 专利权
			$res = $this->patentlist->getPatentID($id);
			$patent = array();
			foreach($res as $item)
			{
				$patent[] = $this->patent->getPatentByIdentifier($item->identifier);
			}
			// 著作权
			$res = $this->copyrightlist->getCopyrightByID($id);
			$copyright = array();
			foreach($res as $item)
			{
				$copyright[] = $this->copyright->getCopyrightByIdentifier($item->identifier);
			}
			// 出版专著
			$work = array();
			$res = $this->work->getWork();
			foreach($res as $item)
			{
				if(preg_match("/$person->name/",$item->personlist))
					$work[] = $item;
			}
			// 鉴定
			$res = $this->validationlist->getValidationlistByID($id);
			$validation = array();
			foreach($res as $item)
			{
				$validation[] = $this->validation->getValidationByNumber($item->identifier);
			}
			// 获奖
			$res = $this->awardlist->getAwardlistByID($id);
			$award = array();
			foreach($res as $item)
			{
				$award[] = $this->award->getAwardByNumber($item->identifier);
			}

			$data['person'] = $person;
			$data['project'] = $project;
			$data['cooperation'] = $cooperation;
			$data['part'] = $part;
			$data['learn'] = $learn;
			$data['patent'] = $patent;
			$data['copyright'] = $copyright;
			$data['work'] = $work;
			$data['validation'] = $validation;
			$data['award'] = $award;

			$this->load->view('search/person',$data);

		}

		public function project()
		{
			$this->load->view('search/projectsearch');
		}

		public function aboutProject()
		{
			$this->load->model('projectlist');
			$this->load->model('project');
			$this->load->model('award');
			$this->load->model('awardlist');
			$this->load->model('awardprojectlist');
			$this->load->model('validation');
			$this->load->model('validationlist');
			$this->load->model('validationprojectlist');

			$projectname = $this->input->post("project");
			$project = $this->project->getProjectViaName($projectname);
			if($project == null)
			{
				echo "项目不存在";
				return ;
			}
			$projectid = $project->projectid;
			// 鉴定
			$res = $this->validationprojectlist->getIdentifierByProjectid($projectid);
			$validation = array();
			foreach($res as $item)
			{
				$validation[] = $this->validation->getValidationByIdetifier($item->identifier);
			}
			
			// 获奖
			$res = $this->awardprojectlist->getIdentifierByProjectid($projectid);
			$award = array();
			foreach($res as $item)
			{
				$award[] = $this->award->getAwardByIdentifier($item->identifier);
			}

			$data['project'] = $project;
			$data['validation'] = $validation;
			$data['award'] = $award;

			$this->load->view('search/project',$data);
		}

		public function aboutYear()
		{

		}
	}
?>