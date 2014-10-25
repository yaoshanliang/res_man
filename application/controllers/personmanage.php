<?php 
	//维护 个人信息
	class personmanage extends CI_Controller
	{
		public function index()
		{
			$this->load->view('person/main');
		}
		public function show()
		{
			$this->load->model('person');
			$res = $this->person->getPerson();
			$data['person'] = $res;
			$this->load->view('person/list',$data);
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
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			$duties = $this->input->post('duties');
			$this->load->model('person');
			if($this->person->modifyPerson($id,$name,$duties))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}
		public function delete()
		{
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$id = $_GET['id'];
			$this->load->model('person');
		}
	}
?>