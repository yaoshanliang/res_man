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

		public function getPatentlist($identifier)
		{
			$res = $this->db->where('identifier',$identifier)->get('patentlist');
			return $res->result();
		}

		public function deleteAll($number)
		{
			$this->db->delete('patentlist',array('identifier'=>$number));
		}

		public function reOrder($number,$id,$order)
		{
			$this->db->update('patentlist',array('order'=>$order),array('identifier'=>$number,'id'=>$id));
			// echo $this->db->last_query();
		}
	}
?>