<?php
	class Admin extends CI_Model
	{
		public function getUser()
		{
			$res = $this->db->get("Admin");
			$obj = $res->result();
			return $obj[0]->Name;
		}

		public function getPasswd()
		{
			$res = $this->db->get("Admin");
			$obj = $res->result();
			return $obj[0]->Password;
		}

		public function setUser($user)
		{

			$res = $this->db->update("update Admin set Name=".$user);
			return $res;
		}

		public function setPasswd($passwd)
		{
			$res = $this->db->update("update Admin set Password=".$passwd);
			return $res;
		}
	}
?>