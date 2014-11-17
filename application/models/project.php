<?php
	// create table project(
	// `projectid` int primary key not null auto_increment,
	// name text not null,`source` text not null,
	// `level` text,
	// `principal` int not null,
	// `start` text not null,
	// `end` text not null,
	// `money` float not null,
	// `currency` varchar(10) not null default "RMB",
	// `contract` text not null,
	// credit text not null,
	// `type` text not null,
	// foreign key(principal) references person(id)
	// );
	class Project extends CI_Model
	{
		public function insertProject($name,$source,$principal,$start,$end,$money,$currency,$contract,$credit,$type)
		{
			$data = array(
				'projectid'=>null,
				'name'=>$name,
				'source'=>$source,
				'principal'=>$principal,
				'start'=>$start,
				'end'=>$end,
				'money'=>$money,
				'currency'=>$currency,
				'contract'=>$contract,
				'credit'=>$credit,
				'type'=>$type);
			$bool = $this->db->insert('project',$data);
			return $bool;
		}

		public function getProject()
		{
			$res = $this->db->get('project');
			return $res->result();
		}

		public function getProjectViaName($name)
		{
			$res = $this->db->where('name',$name)->get('project');
			return $res->row();
		}

		public function getProjectByName($projectid)
		{
			$res = $this->db->where('projectid',$projectid)->get('project');
			return $res->row()->name;
		}

		public function getProjectByID($projectid)
		{
			$res = $this->db->where('projectid',$projectid)->get('project');
			return $res->row();
		}

		public function updateProject($projectid,$name,$source,$principal,$start,$end,$money,$currency,$contract,$credit,$type,$which)
		{
			$data = array(
				$which => $$which
				);
			$bool = $this->db->update('project',$data,array('projectid'=>$projectid));
			return $bool;

		}

		public function deleteProject($projectid)
		{
			$bool = $this->db->delete('project',array('projectid'=>$projectid));
			$bool = $bool && $this->db->delete('funds',array('projectid'=>$projectid));
			return $bool;
		}

	}
?>