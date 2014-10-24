<?php 
	// create table validation(
	// projectid int not null,
	// time text not null,
	// institute text not null,
	// others text,
	// foreign key(projectid) references project(projectid)
	// );
	class Validation extends CI_Model
	{
		public function insertValidation($projectid,$time,$institute,$others = null)
		{
			$data = array(
				'projectid'=>$projectid,
				'time'=>$time,
				'institute'=>$institute,
				'others'=>$others
				);
			return $this->db->insert('validation',$data);
		}

		public function getValidation()
		{
			$res = $this->db->get('validation');
			return $res->result();
		}
	}
?>