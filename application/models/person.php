<?php
	class Person extends CI_Model
	{
		public function insertPerson($name,$duties)
		{
			$bool = $this->db->insert('person',array('name'=>$name,'duties'=>$duties));
			return $bool;
		}

		public function getPerson()
		{
			$res = $this->db->get('person');
			return $res->result();
		}
	}
?>