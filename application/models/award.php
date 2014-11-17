<?php
	// create table award(
	// `number` int not null primary key auto_increment,
	// achievement text not null,
	// time text not null,
	// name text not null,
	// level text not null
	// );
	class award extends CI_Model
	{
		public function insertAward($achievement,$time,$name,$level)
		{
			$data = array(
				 'number'=>null,
				 'achievement'=>$achievement,
				 'time'=>$time,
				 'name'=>$name,
				 'level'=>$level
				);
			$bool = $this->db->insert('award',$data);
			return $bool;
		}

		public function getAward()
		{
			$res = $this->db->get('award');
			return $res->result();
		}

		public function getAwardByNumber($number)
		{
			$res = $this->db->where('number',$number)->get('award')->row()->name;
			return $res;
		}

		public function getAwardByIdentifier($number)
		{
			$res = $this->db->where('number',$number)->get('award')->row();
			return $res;
		}

		public function updateAward($number,$achievement,$time,$name,$level,$which)
		{
			$data = array(
				$which => $$which,
				);
			$bool = $this->db->update('award',$data,array('number'=>$number));
			return $bool;
		}

		public function deleteAward($number)
		{
			$bool = $this->db->delete('award',array('number'=>$number));
			$bool &= $this->db->delete('awardlist',array('identifier'=>$number));
			$bool &= $this->db->delete('awardprojectlist',array('identifier'=>$number));
			return $bool;
		}
	}
?>