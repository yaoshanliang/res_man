<?php
// create table awardlist(
// 	id int not null,
// 	identifier int not null,
// 	`order` int not null,
// 	foreign key (id) references person(id)
// );
	class Awardlist extends CI_Model
	{
		public function insertAwardlist($id,$identifier,$order)
		{
			$data = array(
				'id'=>$id,
				'identifier'=>$identifier,
				'order'=>$order
				);
			return $this->db->insert('awardlist',$data);
		}

		public function getAwardlist($identifier)
		{
			$res = $this->db->where('identifier',$identifier)->get('awardlist');
			return $res->result();
		}

		public function getAwardlistByID($id)
		{
			$res = $this->db->where('id',$id)->get('awardlist');
			return $res->result();
		}

		public function deleteAll($number)
		{
			$this->db->delete('awardlist',array('identifier'=>$number));
		}

		public function reOrder($number,$id,$order)
		{
			$this->db->update('awardlist',array('order'=>$order),array('identifier'=>$number,'id'=>$id));
			// echo $this->db->last_query();
		}
	}
?>