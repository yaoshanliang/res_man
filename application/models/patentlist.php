<?php
	// create table patentlist(
	// 	id int not null,
	// 	identifier int not null,
	// 	`order` int not null,
	// 	foreign key (id) references person(id)
	// );
	class Patentlist extends CI_Model
	{
		public function insertPatentlist($id,$identifier,$order)
		{
			$data = array(
				'id'=>$id,
				'identifier'=>$identifier,
				'order'=>$order
				);
			return $this->db->insert('patentlist',$data);
		}

		public function getPatentlist()
		{
			$res = $this->db->get('patentlist');
			return $res->result();
		}
	}
?>