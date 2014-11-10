<?php
// create table work(
// 	name text not null,
// 	publisher text not null,
// 	publishdate text not null,
// 	personlist text not null
// );
	class Work extends CI_Model
	{
		public function insertWork($name,$publisher,$publishdate,$personlist)
		{
			$data = array(
				'number'=>null,
				'name'=>$name,
				'publisher'=>$publisher,
				'publishdate'=>$publishdate,
				'personlist'=>$personlist
				);
			return $this->db->insert('work',$data);
		}

		public function getWork()
		{
			$res = $this->db->get('work');
			return $res->result();
		}

		public function updateWork($number,$name,$publisher,$publishdate,$personlist,$which)
		{
			$data = array(
				$which => $$which
				);
			return $this->db->update('work',$data,array('number'=>$number));
		}

		public function deleteWork($number)
		{
			$bool = $this->db->delete('work',array('number'=>$number));
			return $bool;
		}
	}
?>