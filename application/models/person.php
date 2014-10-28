<?php
	// create table person(
	// id int primary key not null auto_increment,
	// name varchar(10) not null,
	// duties text
	// );
	class person extends CI_Model
	{
		public function insertPerson($name,$duties)
		{
			$bool = $this->db->insert('person',array('id'=>null,'name'=>$name,'duties'=>$duties));
			return $bool;
		}

		public function getPerson()
		{
			$res = $this->db->get('person');
			return $res->result();
		}

		public function modifyPerson($id,$name,$duties)
		{
			if($name)
			{
				$bool = $this->db->update('person',array('name'=>$name),array('id' => $id));
			}else
			{
				$bool = $this->db->update('person',array('duties'=>$duties),array('id' => $id));
			}
			return $bool;
		}

		public function getPersonById($id)
		{
			$res = $this->db->where('id',$id)->get('person');
			return $res->row()->name;
		}

		public function getPersonByName($name)
		{
			$res = $this->db->where('name',$name)->get('person');
			return $res->row()->id;
		}

		public function deletePerson($id)
		{
			// 有外键约束的 无法删除
			$bool = $this->db->delete('person',array('id'=>$id));
			return $bool;
		}
	}
?>