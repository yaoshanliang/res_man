<?php
// create table validationlist(
// 	id int not null,
// 	identifier int not null,
// 	`order` int not null,
// 	foreign key (id) references person(id)
// );
	class Validationlist extends CI_Model
	{
		public function insertValidationlist($id,$identifier,$order)
		{
			$data = array(
				'id'=>$id,
				'identifier'=>$identifier,
				'order'=>$order
				);
			return $this->db->insert('validationlist',$data);
		}

		public function getValidationlist($identifier)
		{
			$res = $this->db->where('identifier',$identifier)->get('validationlist');
			return $res->result();
		}

		public function deleteAll($number)
		{
			$this->db->delete('validationlist',array('identifier'=>$number));
		}

		public function reOrder($number,$id,$order)
		{
			$this->db->update('validationlist',array('order'=>$order),array('identifier'=>$number,'id'=>$id));
			// echo $this->db->last_query();
		}
	}
?>