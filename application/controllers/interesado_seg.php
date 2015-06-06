<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interesado_seg extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Seguimiento_model');
		$this->load->helper('text');
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
	}

	public function index()
	{
		$this->data['user'] = $this->ion_auth->user()->row();
		/*$this->data['convocatorias'] = array(
			"convocatoria1" => array("id"=>"1", "descripcion"=>"Esta es una prueba. Esta es una prueba muy sencilla que se hace cada vez grande. la anterior convocatoria es mas grande que la anterior. Esta es una prueba muy sencilla que se hace cada vez grande. la anterior convocatoria es mas grande que la anterior. Esta es una prueba muy sencilla que se hace cada vez grande. la anterior convocatoria es mas grande que la anterior."),
			"convocatoria2" => array("id"=>"2",  "descripcion"=> "Esta es una prueba muy sencilla"),
			"convocatoria 3"=>array("id"=>"3", "descripcion"=>"Esta es una prueba muy sencilla que se hace "),
			"convocatoria 4"=>array("id"=>"4", "descripcion"=>"Esta es una prueba muy sencilla que se hace cada vez"),
			"convocatoria 5"=>array("id"=>"5", "descripcion"=>"Esta es una prueba muy sencilla que se hace cada vez grande. la anterior convocatoria es mas grande que la anterior"),
			"convocatoria 6"=>array("id"=>"6", "descripcion"=>"Esta es una prueba")
		);*/
		//echo "id=".$this->data['user']->id."<br>";
		$matricula = $this->Seguimiento_model->obtenerMatricula($this->data['user']->id);
		
		//echo $matricula;
		
		$this->data['convocatorias'] = $this->Seguimiento_model->obtenerConvocatorias($matricula);
		/*if ($this->data['convocatorias'] !=FALSE){
			foreach($this->data['convocatorias']->result() as $convocatoria){
				echo $convocatoria->nombre."<br>";
			}
		}else{
			echo "vacio";
		}*/

		$this->load->view('seguimiento/principal_view', $this->data);
	}

	public  function encuesta(){
    //id de favoritos
		$id=$this->uri->segment(3);
		$datos= array('id' => $id );
    //echo $id;
		$this->load->view('seguimiento/encuesta', $datos);
	}
	/**
	* Esta funcion guarda la encuesta de la convocatoria favorita 
	*/
	public function guarda(){
		$id=$_POST["id"];
		$r1=$_POST["p1"];
		$r2=$_POST["p2"];
		$r3=$_POST["p3"];
		$datos= array('idFavoritos' => $id, "respuesta1" => $r1, "respuesta2" => $r2, "respuesta3" =>$r3 );
		$this->Seguimiento_model->guardaCuestionario($datos);
		$this->load->view("seguimiento/continuar");
	}

}
