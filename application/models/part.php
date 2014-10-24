<?php
// create table part(
// 	name text not null,
// 	duty text not null,
// 	start text not null,
// 	end text not null,
// 	id int not null,
// 	foreign key(id) references person(id)
// );
	class Part extends CI_Model
	{
		public function insertPart($name,$duty,$start,$end,$id)
		{
			$data = array(
				'name'=>$name,
				'duty'=>$duty,
				'start'=>$start,
				'end'=>$end,
				'id'=>$id
				);
			return $this->db->insert('part',$data);
		}

		public function getPart()
		{
			$res = $this->db->get('part');
			return $res->result();
		}

		public function deletePart($name,$duty,$id)
		{
			$bool = $this->db->delete('part',array('name'=>$name,'duty'=>$duty,'id'=>$id));
			return $bool;
		}
	}
?>