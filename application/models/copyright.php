<?php
	// create table copyright(
	// number int not null primary key auto_increment,
	// name text not null,
	// register text not null,
	// person int not null,
	// institute text not null,
	// time text not null
	// );
	class Copyright extends CI_Model
	{
		public function insertCopyright($name,$register,$person,$institute,$time)
		{
			$data = array(
				'number'=>null,
				'name'=>$name,
				'register'=>$register,
				'person'=>$person,
				'institute'=>$institute,
				'time'=>$time
				);
			return $this->db->insert('copyright',$data);
		}

		public function getCopyright()
		{
			$res = $this->db->get('copyright');
			return $res->result();
		}

		public function getCopyrightByNumber($number)
		{
			$res = $this->db->where('number',$number)->get('copyright')->row()->name;
			return $res;
		}

		public function getCopyrightByIdentifier($number)
		{
			$res = $this->db->where('number',$number)->get('copyright');
			return $res->row();
		}

		public function getCopyrightByYear($year)
		{
			$data = array();
			$res = $this->db->get('copyright')->result();
			foreach($res as $item)
			{
				if(intval($item->time) == $year)
					$data[] = $item;
			}
			return $data;
		}

		public function updateCopyright($number,$name,$register,$person,$institute,$time,$which)
		{
			$data = array(
				$which => $$which
				);
			return $this->db->update('copyright',$data,array('number'=>$number));
		}

		public function deleteCopyright($number)
		{
			$res = $this->db->delete('copyright',array('number'=>$number));
			$res &= $this->db->delete('copyrightlist',array('identifier'=>$number));
			return $res;
		}

		public function addFile($id,$file)
		{
			$res = $this->db->update('copyright',array('file'=>$file),array('number'=>$id));
		}
	}
?>