<?php
	// create table patent(
	// number int not null primary key auto_increment,
	// name text not null,
	// register text not null,
	// person int not null,
	// institute text not null,
	// time text not null
	// );
	class Patent extends CI_Model
	{
		public function insertPatent($number,$name,$register,$person,$institute,$time)
		{
			$data = array(
				'number'=>$number,
				'name'=>$name,
				'register'=>$register,
				'person'=>$person,
				'institute'=>$institute,
				'time'=>$time
				);
			return $this->db->insert('patent',$data);
		}

		public function getPatent()
		{
			$res = $this->db->get('patent');
			return $res->result();
		}

		public function updatePatent($number,$name,$register,$person,$institute,$time)
		{
			$data = array(
				'number'=>$number,
				'name'=>$name,
				'person'=>$person,
				'institute'=>$institute,
				'time'=>$time
				);
			return $this->db->update('patent',$data,array('register'=>$register));
		}
	}
?>