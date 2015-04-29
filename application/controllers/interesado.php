<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Interesado extends CI_Controller {

	public function index()
	{}


	function verConvocatorias()
	{
		
	}
		
		$datos=
			array(
				'etapa' => 1
			);
			
		$this->load->view('interezado/cabeza',$datos);
		$this->load->view('interezado/principal');
		$this->load->view('interezado/pie');
	}
	
	
	public  function detalle_convocatoria(){
		$datos=
			array(
				'etapa' => 1
			);
			
		$this->load->view('interezado/cabeza',$datos);
		$this->load->view('interezado/detalle_convocatoria');
		$this->load->view('interezado/pie');
	}
	
	public  function detalle_convocatoria_documentacion(){
		$datos=
			array(
				'etapa' => 1
			);
			
		$this->load->view('interezado/cabeza',$datos);
		$this->load->view('interezado/detalle_convocatoria_documentacion');
		$this->load->view('interezado/pie');
	}
	
	public  function misconvocatorias(){
		$datos=
			array(
				'etapa' => 3
			);
			
		$this->load->view('interezado/cabeza',$datos);
		$this->load->view('interezado/misconvocatorias');
		$this->load->view('interezado/pie');
	}
	public function informacion(){
		$id = $this->uri->segment(3);
		
		
		if ($id>0){
			$datos['asunto']='Más informacion del verano de investigación del cimat';
			$datos['para']='coordinador';		
		}else{
			$datos['asunto']='';
			$datos['para']='';		
		}
		
		$datos['etapa']=2;
			
		$this->load->view('interezado/cabeza',$datos);
		$this->load->view('interezado/informacion',$datos);
		$this->load->view('interezado/pie');
	}
	
	public function mensaje(){
		$id = $this->uri->segment(3);
		
		
		if ($id>0){
			$datos['asunto']='Más informacion del verano de investigación del cimat';
			$datos['para']='coordinador';		
		}else{
			$datos['asunto']='';
			$datos['para']='';		
		}
		
		$datos['etapa']=2;
			
		$this->load->view('interezado/cabeza',$datos);
		$this->load->view('interezado/mensaje',$datos);
		$this->load->view('interezado/pie');
	}
	

}