<?php 
	class copyrightfile extends CI_Controller
	{
		public function file_download()
		{
			$this->load->helper('download');
			$file = $_GET['file'];
			$data = file_get_contents('./uploads/'.$file);
			$name = $file;
			force_download($name,$data);
		}

		public function file_upload()
		{
			$config['upload_path'] = './uploads/';
		  	$config['allowed_types'] = 'gif|jpg|png';
		 	$config['max_size'] = '100';
		  	$config['max_width']  = '1024';
		  	$config['max_height']  = '768';

		  	$this->load->library('upload', $config);

		 	$number = $this->input->post('number');
		 	$this->load->model('copyright');

		  	if ( ! $this->upload->do_upload())
		  	{
		   		$error = array('error' => $this->upload->display_errors());
		   		// $this->load->view('upload_form', $error);
		  	} 
		  	else
		  	{
		   		$data = $this->upload->data();
		   		// $this->load->view('upload_success', $data);
		   		$this->copyright->addFile($number,$data['file_name']);
		  	}
		}
	}
?>