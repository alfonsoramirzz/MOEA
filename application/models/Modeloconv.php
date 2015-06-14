<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ModeloConv extends CI_Model {

    public function __construct(){
    	parent::__construct();
    	$this->load->database();
    	}
    public function verConvo(){
    	$this->db->select('convocatoria.idPrograma as id,convocatoria.nombreConv as Convocatoria, convocatoria.fechaInicio,convocatoria.fechaFin,convocatoria.promedioSolicitado as promedio,convocatoria.descripcion, universidad.nombre as Universidad, area.nombreAreaFormacion as Area, grado.nombre as Grado, ciudad.ciudad as Ciudad, paisConvo.pais as Pais');    
		$this->db->from('convocatoria');
		$this->db->join('universidad', 'convocatoria.Universidad_idUniversidad1 = idUniversidad');
		$this->db->join('area', 'convocatoria.Area_idArea = area.idArea');
		$this->db->join('grado', 'convocatoria.Grado_idGrado = grado.idGrado');
		$this->db->join('lugar', 'convocatoria.Lugar_idLugar = lugar.idLugar');
		$this->db->join('ciudad', 'lugar.idCiudadLugar = ciudad.idCiudad');
		$this->db->join('paisConvo', 'lugar.idPaisLugar = paisConvo.idPaisConvo');
		$query = $this->db->get();
		if($query -> num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
    }

    public function insertar($data){
    	$this->db->insert('correo', array('matricula'=> $data ['matricula'], 'idPrograma'=> $data ['idPrograma']));
    }
}