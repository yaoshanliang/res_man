<?php
	// create table validation(
	// `number` int not null primary key auto_increment,
	// achievement text not null,
	// time text not null,
	// institute text not null
	// );
	class validation extends CI_Model
	{
		public function insertValidation($achievement,$time,$institute)
		{
			$data = array(
				 'number'=>null,
				 'achievement'=>$achievement,
				 'time'=>$time,
				 'institute'=>$institute
				);
			$bool = $this->db->insert('validation',$data);
			return $bool;
		}

		public function getValidation()
		{
			$res = $this->db->get('validation');
			return $res->result();
		}

		public function getValidationByNumber($number)
		{
			$res = $this->db->where('number',$number)->get('validation')->row()->achievement;
			return $res;
		}

		public function getValidationByIdentifier($number)
		{
			$res = $this->db->where('number',$number)->get('validation')->row();
			return $res;
		}

		public function getValidationByYear($year)
		{
			$data = array();
			$res = $this->db->get('validation')->result();
			foreach($res as $item)
			{
				if(intval($item->time) == $year)
					$data[] = $item;
			}
			return $data;
		}

		public function updateValidation($number,$achievement,$time,$institute,$which)
		{
			$data = array(
				$which => $$which,
				);
			$bool = $this->db->update('validation',$data,array('number'=>$number));
			return $bool;
		}

		public function deleteValidation($number)
		{
			$bool = $this->db->delete('validation',array('number'=>$number));
			$bool &= $this->db->delete('validationlist',array('identifier'=>$number));
			$bool &= $this->db->delete('validationprojectlist',array('identifier'=>$number));
			return $bool;
		}
	}
?>