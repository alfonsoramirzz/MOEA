<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interesado_seg extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	public function index()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		$this->load->view('seguimiento/principal_view', $this->data);
	}
	
	public  function encuesta(){
		$id=$this->uri->segment(3);
		$datos= array('id' => $id );
		$this->load->view('seguimiento/encuesta', $datos);
	}

}