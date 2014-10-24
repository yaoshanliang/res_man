<?php
	// create table person(
	// id int primary key not null auto_increment,
	// name varchar(10) not null,
	// duties text
	// );
	class Person extends CI_Model
	{
		public function insertPerson($id = null,$name,$duties)
		{
			$bool = $this->db->insert('person',array('id'=>$id,'name'=>$name,'duties'=>$duties));
			return $bool;
		}

		public function getPerson()
		{
			$res = $this->db->get('person');
			return $res->result();
		}

		public function modifyPerson($id,$name,$duties)
		{
			$bool = $this->db->update('person',array('name'=>$name,'duties'=>$duties),array('id' => $id));
			return $bool;
		}
	}
?>