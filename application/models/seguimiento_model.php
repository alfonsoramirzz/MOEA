<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Seguimiento_model extends CI_Model
{
    public function __construct()
    {
	parent::__construct();
    }
    
	function obtenerMatricula($id){
		$this->db->select('matricula');
		$this->db->from('interesado');
		$this->db->where('Usuario_idUsuario', $id);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0){
			
		  foreach($query->result() as $row){
			  $matricula = $row->matricula;
		  }
		  return $matricula;
		  return $query;
		}else{
		  return FALSE;
		}

	}
	
	function obtenerConvocatorias($matricula){
		$this->db->select('convocatoria.idPrograma as id,convocatoria.nombreConv as nombre,descripcion');
		//$this->db->select('*');	
		$this->db->from('convocatoria');
		$this->db->join('favoritos', 'convocatoria.idPrograma=favoritos.idPrograma','inner');
		//$this->db->join('Interesado_S', 'Favoritos_S.matricula=Interesado_S.matricula','inner');
		//$this->db->where('favoritos.matricula', $matricula);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0){
		  return $query;
		}else{
		  return FALSE;
		}

	}
	
	
	/*
		Funcion que guarda el cuestionario.
		Si yA EXISTE SOLO HACE UN UPDATE DE LOS DATOS.
		sI NO SOLO INSERTA
	*/
	
	function existeCuestionario($idFavorito){
		$this->db->select('idFavoritos');
		$this->db->from('cuestionario');
		$this->db->where('idFavoritos', $idFavorito);
		
		$query = $this->db->get();
		if ($query->num_rows() > 0){
		  return TRUE;
		}else{
		  return FALSE;
		}

	}
	function guardaCuestionario($datos){
		if ($this->existeCuestionario($datos['idFavoritos'])==FALSE){
			$this->db->insert('cuestionario', $datos);
		}else{
			$data= array("respuesta1"=>$datos['respuesta1'],"respuesta2"=>$datos['respuesta2'],"respuesta3"=>$datos['respuesta3']);
			$this->db->where('idFavoritos', $datos['idFavoritos']);			
			$this->db->update('cuestionario', $data); 
		}
		
	}
	
	function tipoUsuario($id){
		$this->db->select('name');
		$this->db->from('groups');
		$this->db->join('users_groups', ' users_groups.group_id=groups.id','inner');
		$this->db->where("user_id",$id);
		$query = $this->db->get();
		if ($query->num_rows() > 0){
		  foreach($query->result() as $row){
			  $tipo = $row->name;
		  }
		  return $tipo;
		  
		}else{
		  return FALSE;
		}
	}

}
