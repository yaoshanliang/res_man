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
				$data['errlog'] = "查询人员不存在";
				$this->load->view('template/notfound',$data);
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
				$data['errlog'] = "查询项目不存在";
				$this->load->view('template/notfound',$data);
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

		public function year()
		{
			$this->load->view('search/yearsearch');
		}

		public function aboutYear()
		{
			$year = $this->input->post('year');

			$this->load->model('award');
			$this->load->model('validation');
			$this->load->model('cooperation');
			$this->load->model('learn');
			$this->load->model('part');
			$this->load->model('copyright');
			$this->load->model('patent');
			$this->load->model('project');

			$data['year'] = $year;
			$data['project'] = $this->project->getProjectByYear($year);
			$data['validation'] = $this->validation->getValidationByYear($year);
			$data['cooperation'] = $this->cooperation->getCooperationByYear($year);
			$data['learn'] = $this->learn->getLearnByYear($year);
			$data['part'] = $this->part->getPartByYear($year);
			$data['copyright'] = $this->copyright->getCopyrightByYear($year);
			$data['patent'] = $this->patent->getPatentByYear($year);
			$data['award'] = $this->award->getAwardByYear($year);

			$this->load->view('search/year',$data);
		}

		public function work()
		{
			$this->load->view('search/workcount');
		}

		public function aboutWork()
		{
			$this->load->model('person');
			$this->load->model('source');
			$this->load->model('projectlist');
			$this->load->model('project');
			$this->load->model('patent');
			$this->load->model('patentlist');
			$this->load->model('copyright');
			$this->load->model('copyrightlist');

			$year = $this->input->post('year');
			$personname = $this->input->post("person");
			$person = $this->person->getPersonByName($personname);
			if($person == null)
			{
				$data['errlog'] = "该人员不存在";
				$this->load->view('template/notfound',$data);
				return ;
			}
			$id = $person->id;
			// 获得参与项目
			$project_score = 0.0;
			$res = $this->projectlist->getProjectID($id);
			$project = array();
			foreach($res as $item)
			{
				$project[] = ($this->project->getProjectByID($item->projectid));
			}
			foreach($project as $item)
			{
				if(intval($item->start) <= $year && intval($item->end) >= $year)
				{
					if($item->source == 1) 
					{
						$project_score += $item->money/(intval($item->end)+1-intval($item->start))*12.0;
					}else if($item->source == 2)
					{
						$project_score += $item->money/(intval($item->end)+1-intval($item->start))*10.0;
					}else if($item->source == 3)
					{
						if($item->type == "重大/重点")
							$project_score += $item->money/(intval($item->end)+1-intval($item->start))*8.0;
						else 
							$project_score += $item->money/(intval($item->end)+1-intval($item->start))*5.0;
					}else if($item->source == 4)
					{
						if($item->type == "重大/重点")
							$project_score += $item->money/(intval($item->end)+1-intval($item->start))*4.0;
						else 
							$project_score += $item->money/(intval($item->end)+1-intval($item->start))*2.0;
					}else if($item->source == 5)
					{
						$project_score += $item->money/(intval($item->end)+1-intval($item->start))*1.8;
					}else if($item->source == 6)
					{
						$project_score += $item->money/(intval($item->end)+1-intval($item->start))*1.3;
					}else if($item->source == 7)
					{
						$project_score += $item->money/(intval($item->end)+1-intval($item->start))*1.5;
					}else
					{
						$project_score += $item->money/(intval($item->end)+1-intval($item->start))*1.0;
					}
				}
			}
			// 专利和软件著作权得分
			$patent_score = 0.0;
			$res = $this->patentlist->getPatentID($id);
			foreach($res as $item)
			{
				$patent = $this->patent->getPatentByIdentifier($item->identifier);
				if(intval($patent->time) == $year)
				{
					if($item->order == 1)
					{
						$patent_score += 15;
					}else if($item->order == 2)
					{
						$patent_score += 9;
					}else if($item->order == 3)
					{
						$patent_score += 4.5;
					}else if($item->order == 4)
					{
						$patent_score += 1.5;
					}
				}
			}
			$res = $this->copyrightlist->getCopyrightByID($id);
			foreach($res as $item)
			{
				$copyright = $this->copyright->getCopyrightByIdentifier($item->identifier);
				if(intval($copyright->time) == $year)
				{
					if($item->order == 1)
					{
						$patent_score += 5;
					}else if($item->order == 2)
					{
						$patent_score += 3;
					}else if($item->order == 3)
					{
						$patent_score += 1.5;
					}else if($item->order == 4)
					{
						$patent_score += 0.5;
					}
				}
			}
			$data['personname'] = $personname;
			$data['year']  = $year;
			$data['project_score'] = number_format($project_score, 2, '.', '');
			$data['patent_score'] = number_format($patent_score, 2,'.', '');
			$this->load->view('search/work',$data);

		}
	}
?>