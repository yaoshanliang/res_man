<?php
// create table learn(
// 	institute text not null,
// 	content text not null,
// 	start text not null,
// 	end text not null,
// 	number int not null primary key auto_incerement,
//  person int
// );
	class Learn extends CI_Model
	{
		public function insertLearn($institute,$content,$start,$end,$person)
		{
			$data = array(
				'number'=>null,
				'institute'=>$institute,
				'content'=>$content,
				'start'=>$start,
				'end'=>$end,
				'person'=>$person
				);
			return $this->db->insert('learn',$data);
		}

		public function getLearn()
		{
			$res = $this->db->get('learn');
			return $res->result();
		}

		public function getLearnByID($id)
		{
			$res = $this->db->where('person',$id)->get('learn');
			if($res == null)
				return null;
			return $res->result();
		}

		public function getLearnByYear($year)
		{
			$data = array();
			$res = $this->db->get('learn')->result();
			foreach($res as $item)
			{
				if(intval($item->start) <= $year && intval($item->end) >= $year)
					$data[] = $item;
			}
			return $data;
		}

		public function updateLearn($number,$institute,$content,$start,$end,$person,$which)
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