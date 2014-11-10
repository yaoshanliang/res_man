<?php
	class partmanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->view('part/main');
		}

		public function show()
		{
			$res = $this->db->get('part');
			$data['part'] = $res->result();
			$this->load->view('part/list',$data);
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
			$duty = $this->input->post('duty');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			// 对于人员处理，存编号
			$id = $this->input->post('person');
			$this->load->model('person');
			if($this->person->getPersonByName($id)==null)
			{
				echo "添加姓名不存在";
				return;
			}
			$id = $this->person->getPersonByName($id)->id;

			$this->load->model('part');
			$bool = $this->part->insertPart($name,$duty,$start,$end,$id);
			if($bool)
			{
				echo "添加成功";
			}else
			{
				echo "添加失败";
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
			$number = $this->input->post('number');
			$this->load->model('part');
			$bool = $this->part->deletePart($number);
			if($bool)
			{
				echo "success";
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
			$number = $this->input->post('number');
			$duty = $this->input->post('duty');
			$start = $this->input->post('start');
			$end = $this->input->post('end');
			// 对于人员处理，存编号
			$id = $this->input->post('person');
			$this->load->model('person');
			if($this->person->getPersonByName($id)==null)
			{
				echo "添加姓名不存在";
				return;
			}
			$id = $this->person->getPersonByName($id)->id;

			$which = $this->input->post('which');
			$this->load->model('part');
			$bool = $this->part->updatePart($number,$name,$duty,$start,$end,$id,$which);
			if($bool)
			{
				echo "修改成功";
			}else
			{
				echo "修改失败";
			}
		}
	}
?>