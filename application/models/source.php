<?php
	class Source extends CI_Model
	{
		//添加一个来源
		public function addSource($usr)
		{
			$bool = $this->db->insert('source',array("name"=>$usr));
			return $bool;
		}

		public function getAllSource()
		{
			$res = $this->db->get('source');
			return $res->result();
		}

		public function updateSource($oldusr,$newusr)
		{
			$bool = $this->db->update('source',array('name'=>$newusr),array("name"=>$oldusr));
			return $bool;
		}
	}
?>