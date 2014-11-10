<?php
	class Source extends CI_Model
	{
		//添加一个来源
		public function addSource($usr)
		{
			$bool = $this->db->insert('source',array("name"=>$usr,'number'=>null));
			return $bool;
		}

		public function getSource()
		{
			$res = $this->db->get('source');
			return $res->result();
		}

		public function updateSource($oldusr,$newusr)
		{
			$bool = $this->db->update('source',array('name'=>$newusr),array("name"=>$oldusr));
			return $bool;
		}

		public function getSourceById($number)
		{
			$res = $this->db->where('number',$number)->get('source')->row()->name;
			return $res;
		}

		public function getSourceByName($name)
		{
			$res = $this->db->where('name',$name)->get('source')->row();
			return $res;
		}
	}
?>