<?php
	class Data extends CI_Model
	{
		public function getData()
		{
			$result = $this->db->get("pet");
			return $result->result();
		}

	}
?>