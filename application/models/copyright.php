<?php
	// create table copyright(
	// number int not null primary key auto_increment,
	// name text not null,
	// register text not null,
	// person int not null,
	// institute text not null,
	// time text not null
	// );
	class Copyright extends CI_Model
	{
		public function insertCopyright($number,$name,$register,$person,$institute,$time)
		{
			$data = array(
				'number'=>$number,
				'name'=>$name,
				'register'=>$register,
				'person'=>$person,
				'institute'=>$institute,
				'time'=>$time
				);
			return $this->db->insert('copyright',$data);
		}

		public function getCopyright()
		{
			$res = $this->db->get('copyright');
			return $res->result();
		}
	}
?>