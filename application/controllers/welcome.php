<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->model("Data");
		$data['pet'] = $this->Data->getData();
		$this->load->view("bootstrap-template",$data);
	}
	
}
?>

