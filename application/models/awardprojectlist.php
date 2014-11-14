<?php
// create table awardprojectlist(
// 	projectid int not null,
// 	identifier int not null,
// 	foreign key(projectid) references project(`projectid`)
// );
	class Awardprojectlist extends CI_Model
	{
		public function insertAwardprojectlist($id,$identifier)
		{
			$data = array(
				'id'=>$id,
				'identifier'=>$identifier
				);
			return $this->db->insert('awardprojectlist',$data);
		}

		public function getAwardprojectlist($identifier)
		{
			$res = $this->db->where('identifier',$identifier)->get('awardprojectlist');
			return $res->result();
		}

		public function deleteAll($number)
		{
			$this->db->delete('awardprojectlist',array('identifier'=>$number));
		}

	}
?>