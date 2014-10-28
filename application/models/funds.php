<?php
	// create table funds(
	// projectid int not null,
	// payoff float not null,
	// remain float not null,
	// others text
	// );
	class Funds extends CI_Model
	{
		public function insertFunds($projectid,$payoff,$year,$remain,$others = null)
		{
			$data = array(
				'projectid'=>$projectid,
				'year'=>$year,
				'payoff'=>$payoff,
				'remain'=>$remain,
				'others'=>$others
				);
			return $this->db->insert('funds',$data);
		}

		public function getFundsByID($id)
		{
			$res = $this->db->where('projectid',$id)->$get('funds');
			return $res->result();
		}
	}
?>