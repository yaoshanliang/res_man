<?php
	class sourcemanage extends MY_Controller
	{
		
		public function index()
		{
			$this->load->view("source/add");
		}
		// 添加项目来源
		public function add()
		{
			//使用GET方法 使用其避免 XSS
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$usr = $_GET['source'];
			//判断是否已经加入
			$this->load->model('source');
			$res = $this -> source ->getSource();
			foreach($res as $item)
			{
				// 已加入
				if($usr == $item->name) die("yicunzai");
			}
			//加入数据库
			$this->source->addSource($usr);
		}
		// 获得所有项目来源
		public function get()
		{
			//获取所有数据
			$this->load->model("source");
			$res = $this->source->getSource();
			foreach($res as $item)
			{
				echo $item->name."<br/>";
			}
		}
		//修改项目来源名称
		public function modify()
		{
			parse_str($_SERVER['QUERY_STRING'], $_GET);
			$oldusr = $_GET['oldusr'];
			$newusr = $_GET['newusr'];
			$this->load->model('source');
			if($this->source->updateSource($oldusr,$newusr))
			{
				echo "Success<br/>";
			}
		}
	}
?>