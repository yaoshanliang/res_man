<?php
	// create table funds(
	// projectid int not null,
	// payoff float not null,
	// remain float not null,
	// others text
	// );
	class Funds extends CI_Model
	{
		public function insertFunds($projectid,$payoff,$year,$others = null)
		{
			$data = array(
				'projectid'=>$projectid,
				'year'=>$year,
				'payoff'=>$payoff,
				'others'=>$others
				);
			return $this->db->insert('funds',$data);
		}

		public function getFundsByID($id)
		{
			$res = $this->db->where('projectid',$id)->get('funds');
			return $res->result();
		}

		// public function getFundsByYear($projectid,$year)
		// {
		// 	$res = $this->db->where(array('projectid'=>$projectid,'year'=>$year))->get('funds');
		// 	if($res == null)
		// 	{
		// 		return 0;
		// 	}
		// 	return $res->result()->payoff;
		// }

		public function deleteAll($projectid)
		{
			$bool = $this->db->where('projectid',$projectid)->delete('funds');
			return $bool;
		}
	}
?>