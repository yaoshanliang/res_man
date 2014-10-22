<?php
	class Project extends CI_Model
	{
		public function getName()
		{
			$result = $this->db->get("project");
			return $result->result();
		}
		public function getResource()
		{

		}
		public function getAdministrator()
		{

		}
		public function getStartTime()
		{

		}
		public function getEndTime()
		{

		}
		public function getMoney()
		{

		}
		public function getContract()
		{

		}
		public function getFunds()
		{

		}
		public function getType()
		{

		}
	}
?>