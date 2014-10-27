<?php
// create table copyrightlist(
// 	id int not null,
// 	identifier int not null,
// 	`order` int not null,
// 	foreign key (id) references person(id)
// );
	class Copyrightlist extends CI_Model
	{
		public function insertCopyrightlist($id,$identifier,$order)
		{
			$data = array(
				'id'=>$id,
				'identifier'=>$identifier,
				'order'=>$order
				);
			return $this->db->insert('copyrightlist',$data);
		}

		public function getCopyrightList($identifier)
		{
			$res = $this->db->where('identifier',$identifier)->get('copyrightlist');
			return $res->result();
		}
	}
?>