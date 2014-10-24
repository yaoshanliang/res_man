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

		public function deleteLearn($institute,$content)
		{
			$bool = $this->db->delete('learn',array('institute'=>$institute,'content'=>$content));
			return $bool;
		}
	}
?>