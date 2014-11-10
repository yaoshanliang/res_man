<?php 
	//维护 个人信息
	class personmanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->library('session');
			if($this->session->userdata('token') != "in")
			{
				redirect(site_url("welcome/index"), 'refresh');
			}
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
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$name = $this->input->post('name');
			$duties = $this->input->post('duties');
			$position = $this->input->post('position');
			$phonenumber = $this->input->post('phonenumber');
			$email = $this->input->post('email');
			$this->load->model('person');
			if($this->person->insertPerson($name,$duties,$phonenumber,$position,$email))
			{
				echo "Success";
			}
		}
		public function modify()
		{
			$mode = $this->session->userdata('mode');
			if($mode != 1)
			{
				echo "权限错误";
				return;
			}
			$name = $this->input->post('name');
			$id = $this->input->post('id');
			$duties = $this->input->post('duties');
			$position = $this->input->post('position');
			$phonenumber = $this->input->post('phonenumber');
			$email = $this->input->post('email');
			$which = $this->input->post('which');
			$this->load->model('person');
			if($this->person->modifyPerson($id,$name,$duties,$phonenumber,$position,$email,$which))
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}
		public function delete()
		{
			$mode = $this->session->userdata('mode');
			if($mode != 2)
			{
				echo "权限错误";
				return;
			}
			$id = $this->input->post("id");
			$this->load->model('person');
			if($this->person->deletePerson($id))
			{
				echo "删除成功";
			}else
			{
				echo "删除失败";
			}
		}
	}
?>