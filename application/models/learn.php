<?php
// create table learn(
// 	institute text not null,
// 	content text not null,
// 	start text not null,
// 	end text not null,
// 	list text not null
// );
	class Learn extends CI_Model
	{
		public function insertLearn($institute,$content,$start,$end,$list)
		{
			$data = array(
				'number'=>null,
				'institute'=>$institute,
				'content'=>$content,
				'start'=>$start,
				'end'=>$end,
				'list'=>$list
				);
			return $this->db->insert('learn',$data);
		}

		public function getLearn()
		{
			$res = $this->db->get('learn');
			return $res->result();
		}

		public function updateLearn($number,$institute,$content,$start,$end,$list,$which)
		{
			$data = array(
				$which => $$which
			);
			$bool = $this->db->update('learn',$data,array('number'=>$number));
			return $bool;
		}

		public function deleteLearn($number)
		{
			$bool = $this->db->delete('learn',array('number'=>$number));
			return $bool;
		}
	}
?>