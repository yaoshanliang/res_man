<?php
	// create table detail(
	// projectid int not null,
	// year int not null,
	// currency varchar(10) not null default "RMB",
	// figure float not null
	// );
	class Detail extends CI_Model
	{
		public function insertDetail($projectid,$year,$currency,$figure)
		{
			$data = array(
				'projectid'=>$projectid,
				'year'=>$year,
				'currency'=>$currency,
				'figure'=>$figure
				);
			return $this->db->insert('detail',$data);
		}

		public function getDetail()
		{
			$res = $this->db->get('detail');
			return $res->result();
		}
	}
?>