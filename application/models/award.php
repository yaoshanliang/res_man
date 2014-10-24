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

		public function getAward()
		{
			$res = $this->db->get('award');
			return $res->result();
		}
	}
?>