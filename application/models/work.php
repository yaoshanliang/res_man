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

		public function updateWork($name,$publisher,$publishdate,$personlist,$which)
		{
			$data = array(
				$which => $$which
				);
			return $this->db->update('work',$data,array('name'=>$name));
		}

		public function deleteWork($name)
		{
			$bool = $this->db->delete('work',array('name'=>$name));
			return $bool;
		}
	}
?>