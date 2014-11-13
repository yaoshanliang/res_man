<?php 
	class patentfile extends CI_Controller
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
		 	$this->load->model('patent');

		  	if ( ! $this->upload->do_upload())
		  	{
		   		$error = array('error' => $this->upload->display_errors());
		   		echo "<h1>".$error['error']."</h1>";
		  	} 
		  	else
		  	{
		   		$data = $this->upload->data();
		   		$this->patent->addFile($number,$data['file_name']);
		   		redirect(site_url('patentmanage/index'),'refresh');
		  	}
		}
	}
?>