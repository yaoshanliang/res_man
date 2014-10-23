<?php 
	class personmanage extends CI_Controller
	{
		public function add()
		{
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$name = $_GET['name'];
			$duties = $_GET['duties'];
			$this->load->model('person');
			if($this->person->insertPerson($name,$duties))
			{
				echo "Success<br/>";
			}

		}
	}