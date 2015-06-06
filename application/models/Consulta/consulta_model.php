<?php
//Modelo del modulo consultar información!
class Consulta_model extends CI_Model
{
  	function __construct()
	{
		parent::__construct();
	}
	
	FUNCTION getFavoritos(){
		$consulta=$this->db->get("favoritos");
		if($consulta->num_rows() > 0)
		{
			return $consulta;
		}	
		else 
		{
			return FALSE;
		}
	}
	
	function getConvocatoria()
	{
		$this->db->select("*");
		$this->db->from("convocatoria");
		$this->db->where("estado","1");
		$consulta=$this->db->get();
		if($consulta->num_rows() > 0)
		{
			return $consulta;
		}	
		else 
		{
			return FALSE;
		}
	}

    function getUsuario($iduser){
		$this->db->where('Usuario_idUsuario', $iduser);
		$query = $this->db->get('interesado');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}

    function favorito($id,$matricula){
		$consulta=$this->db->get('favoritos');
		$data['idPrograma'] = $id;
        $data['matricula'] = $matricula;
        if($consulta->num_rows() > 0){
			$ban = 0;
			foreach($consulta->result() as $row){
				$pro=$row->idPrograma;
				$mat=$row->matricula;
				if($pro==$id and $mat==$matricula){
					$ban=1;
				}
				
			}
			if($ban==1){
				$this->db->where('idPrograma', $id);
			    $this->db->delete('favoritos');
				//redirect('auth/Principal');
			}else{
				$this->db->insert('favoritos', $data);
				//redirect('auth/Principal');
			}
		}else{
			$this->db->insert('favoritos',$data);
		    //redirect('auth/Principal');
		}
	}	
	
	function obtener($id){
		$this->db->where('idPrograma', $id);
		$query = $this->db->get('convocatoria');
		if ($query->num_rows() > 0){
			return $query;
		}else{
			return FALSE;
		}
	}
	
	function getCantidadFilas()
	{
		$filas=$this->db->count_all('convocatoria');
		return $filas;
	}
	
}  
    
?>