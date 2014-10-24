<?php 
	//维护 个人信息
	class personmanage extends CI_Controller
	{
		public function index()
		{
			$this->load->model('person');
			$res = $this->person->getPerson();
			$data['person'] = $res;
			$this->load->view('person/main',$data);
		}
		public function add()
		{
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$name = $_GET['name'];
			$id = $_GET['id'];
			$duties = $_GET['duties'];
			$this->load->model('person');
			if(!is_numeric($id))
				$id = null;
			if($this->person->insertPerson($id,$name,$duties))
			{
				echo "Success<br/>";
			}
		}
		public function modify()
		{
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$name = $_GET['name'];
			$id = $_GET['id'];
			$duties = $_GET['duties'];
			$this->load->model('person');
			if($this->person->modifyPerson($id,$name,$duties))
			{
				echo "success";
			}

		}
		public function delete()
		{

		}
	}
?>