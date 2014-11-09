<?php
// create table cooperation(
// 	category text not null,
// 	list text not null,
// 	`number` int not null,
// 	place int not null,
// 	purpose text not null,
// 	url text not null,
// 	news char(1) not null,
// 	picture char(1) not null
// );
	class Cooperation extends CI_Model
	{
		public function insertCooperation($category,$list,$number,$place,$purpose,$url,$news,$picture,$report,$start,$end)
		{
			$data = array(
				'category'=>$category,
				'list'=>$list,
				'number'=>$number,
				'start'=>$start,
				'end'=>$end,
				'place'=>$place,
				'purpose'=>$purpose,
				'url'=>$url,
				'news'=>$news,
				'picture'=>$picture,
				'report'=>$report
				);
			return $this->db->insert('cooperation',$data);
		}

		public function getCooperation()
		{
			$res = $this->db->get('cooperation');
			return $res->result();
		}

		public function deleteCooperation($id)
		{
			$bool= $this->db->delete('cooperation',array('id'=>$id));
			return $bool;
		}

		public function updateCooperation($id,$category,$list,$number,$place,$purpose,$url,$news,$picture,$start,$start,$end,$which)
		{
			$data = array(
				$which => $$which
			);
			$bool = $this->db->update('cooperation',$data,array('id'=>$id));
			return $bool;
		}
	}
?>