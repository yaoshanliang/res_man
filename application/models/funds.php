<?php
	// create table funds(
	// projectid int not null,
	// payoff float not null,
	// remain float not null,
	// others text
	// );
	class Funds extends CI_Model
	{
		public function insertFunds($projectid,$payoff,$remain,$others = null)
		{
			$data = array(
				'projectid'=>$projectid,
				'payoff'=>$payoff,
				'remain'=>$remain,
				'others'=>$others
				);
			return $this->db->insert('funds',$data);
		}

		public function getFunds()
		{
			$res = $this->db->get('funds');
			return $res->result();
		}
	}
?>