<?php
// create table projectlist(
// 	projectid int not null,
// 	id int not null,
// 	`order` int not null,
// 	foreign key(id) REFERENCES person(id)
// 	);
	class Projectlist extends CI_Model
	{
		public function insertProjectlist($id,$projectid,$order)
		{
			$data = array(
				'id'=>$id,
				'projectid'=>$projectid,
				'order'=>$order
				);
			return $this->db->insert('projectlist',$data);
		}

		public function getProjectlist($projectid)
		{
			$res = $this->db->where('projectid',$projectid)->get('projectlist');
			return $res->result();
		}

		public function deleteAll($number)
		{
			$this->db->delete('projectlist',array('projectid'=>$number));
		}

		public function reOrder($number,$id,$order)
		{
			$this->db->update('projectlist',array('order'=>$order),array('projectid'=>$number,'id'=>$id));
			// echo $this->db->last_query();
		}
	}
?>