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
				'number'=>null,
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

		public function deletePart($number)
		{
			$bool = $this->db->delete('part',array('number'=>$number));
			return $bool;
		}

		public function updatePart($number,$name,$duty,$start,$end,$which)
		{
			$data = array(
				$which => $$which
			);
			$bool = $this->db->update('part',$data,array('number'=>$number));
			return $bool;
		}

	}
		
?>