<?php
// create table validationprojectlist(
// 	projectid int not null,
// 	identifier int not null,
// 	foreign key(projectid) references project(`projectid`)
// );
	class Validationprojectlist extends CI_Model
	{
		public function insertValidationprojectlist($id,$identifier)
		{
			$data = array(
				'projectid'=>$id,
				'identifier'=>$identifier
				);
			return $this->db->insert('validationprojectlist',$data);
		}

		public function deleteAll($number)
		{
			$this->db->delete('validationprojectlist',array('identifier'=>$number));
		}

		public function getIdentifierByProjectid($projectid)
		{
			$res = $this->db->where('projectid',$projectid)->get('validationprojectlist');
			return $res->result();
		}
	}
?>