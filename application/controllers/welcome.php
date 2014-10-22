<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->database();
		$this->load->model("Project");
		$data['project']=$this->Project->getName();
		$this->load->view("bootstrap-template",$data);
	}
	
}
?>

