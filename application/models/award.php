<?php
	// create table award(
	// projectid int not null,
	// id int not null,
	// `order` int not null, 
	// time text not null, 
	// foreign key(id) REFERENCES person(id)
	// );
	class Award extends CI_Model
	{
		public function insertAward($projectid,$id,$order,$time)
		{
			$data = array(
				'projectid'=>$projectid,
				'id'=>$id,
				'order'=>$order,
				'time'=>$time
				);
			$bool = $this->db->insert('award',$data);
			return $bool;
		}

		public function getAwardByID($id)
		{
			$res = $this->db->where('projectid',$id)->get('award');
			return $res->result();
		}

		public function updateAward($projectid,$id,$order,$time)
		{
			$bool = $this->db->update('award',array('id'=>$id,'order'=>$order,'time'=>$time),array('projectid'=>$projectid));
			return $bool;
		}

		public function deleteAward($projectid,$id)
		{
			$bool = $this->db->delete('award',array('projectid'=>$projectid,'id'=>$id));
			return $bool;
		}
	}
?>