<?php
	class Person extends CI_Model
	{
		public function insertPerson($name,$duties)
		{
			$bool = $this->db->insert('person',array('name'=>$name,'duties'=>$duties));
			return $bool;
		}
	}
?>