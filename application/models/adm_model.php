<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class adm_model extends CI_Model
{	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function obtArea($id = null)
	{
		$query = $this->db->from('Area');
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }		
	}

	public function obtGrado($id = null)
	{
		$query = $this->db->from('Grado');
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }			
	}

	public function obtUni($id = null)
	{
		$query = $this->db->from('Universidad');
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }		
	}

	public function obtLugar($ciudad = null)
	{
		if($ciudad!=null)
		{
			$query = $this->db->select('idLugar');
			$query = $this->db->where('ciudad',$ciudad);
		}	
		$query = $this->db->from('Lugar');
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }			
	}

	public function obtCiudad($ciudad = null)
	{
		if($ciudad!=null)
		{
			$query = $this->db->select('Lugar_idLugar');
			$query = $this->db->where('ciudad',$ciudad);
		}	
		$query = $this->db->from('ciudad');
		$query = $this->db->get();
		if($query->num_rows() > 0 )
        {
            return $query->result();
        }			
	}


	//(1,'conv','2000-10-10','2000-10-10','desc',1,1,1,6,(select idLugar from Lugar where pais='EUA'));
	public function conv($nom,$fi,$ff,$desc,$grado,$uni,$area,$prom,$lug)
	{	
		if($this->validaFecha($fi,$ff) && $this->validaNombre($nom) && $this->validaDesc($desc))
		{
			$nom = strtoupper($nom);
		$this->db->query("insert into Convocatoria 
			(nombreConv, fechaInicio, fechaFin, descripcion, Grado_idGrado,
			 Universidad_idUniversidad1, Area_idArea, promedioSolicitado, Lugar_idLugar,estado)
			values
			('$nom','$fi','$ff','$desc',
			(select idGrado from Grado where nombre = '$grado'),
			(select idUniversidad from Universidad where nombre = '$uni'),
			(select idArea from Area where nombreAreaFormacion = '$area'),
			$prom,
			(select idLugar from Lugar where pais = '$lug'),1)");
		return true;
		}else
		{
			return false;
		}
	}

	public function guardaUni($uni)
	{
		if($this->validaNombre($uni))
		{
			$uni = strtoupper($uni);
			$this->db->query("insert into Universidad (nombre) Values ('$uni')");
			return true;
		}else
		{
			return false;
		}
	}

	public function guardaArea($area)
	{
		if($this->validaNombre($area))
		{
			$area = strtoupper($area);
			$this->db->query("insert into Area (nombreAreaFormacion) Values ('$area')");
			return true;
		}else
		{
			return false;
		}
	}

	public function guardaPais($pais)
	{
		if($this->validaNombre($pais))
		{
			$pais = strtoupper($pais);
			$this->db->query("insert into Lugar (pais) Values ('$pais')");
			return true;
		}else
		{
			return false;
		}
	}

	public function guardaCiudad($ciudad,$id)
	{
		if($this->validaNombre($ciudad) && $this->validaNombre($id))
		{
			$ciudad = strtoupper($ciudad);
			$id = strtoupper($id);
			$this->db->query("insert into ciudad (Lugar_idLugar, ciudad) Values
			((select idLugar from Lugar where pais = '$id'),'$ciudad')");
			return true;
		}else
		{
			return false;
		}
	}

	public function guardaGrado($grado)
	{
		if($this->validaNombre($grado))
		{
			$grado = strtoupper($grado);
			$this->db->query("insert into Grado (nombre) Values ('$grado')");
			return true;
		}else
		{
			return false;
		}
	}

//////////function actulizar
	public function obtConvocatoria($idPrograma=null){
		if($idPrograma != null)
		{
			$query = $this->db->where('idConv',$idPrograma);	
		}
		$query = $this->db->from('conView');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0)
	    {
	    	return $query;
	    }else
	    {
	    	return FALSE;
	    }
  	}

  	public function obtView($idPrograma=null){
		if($idPrograma != null)
		{
			$query = $this->db->where('idConv',$idPrograma);	
		}
		$query = $this->db->from('conView');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0)
	    {
	    	return $query->result();
	    }else
	    {
	    	return FALSE;
	    }
  	}

  	public function desactivar($id)
	{
		$data=array(
          'estado'=>0
        );
		$this->db->where('idPrograma', $id);
		$this->db->update('Convocatoria',$data); 
	}

	public function activar($id)
	{
		$data=array(
          'estado'=>1
        );
		$this->db->where('idPrograma', $id);
		$this->db->update('Convocatoria',$data); 
	}

	public function eliminar($id)
	{
		$this->db->where('idPrograma', $id);
		$this->db->delete('Convocatoria'); 
	}

	public function actualiza($nom,$fi,$ff,$desc,$grado,$uni,$area,$prom,$lug,$id)
	{	
		if($this->validaFecha($fi,$ff) && $this->validaNombre($nom) && $this->validaDesc($desc))
		{
			$nom = strtoupper($nom);
			$this->db->query("update Convocatoria 
			set nombreConv = '$nom',
			fechaInicio = '$fi',
			fechaFin = '$ff',
			descripcion = '$desc',
			promedioSolicitado = '$prom',
			Grado_idGrado = (select idGrado from Grado where nombre = '$grado'),
			Universidad_idUniversidad1 = (select idUniversidad from Universidad where nombre = '$uni'),
			Area_idArea = (select idArea from Area where nombreAreaFormacion = '$area'),
			Lugar_idLugar = (select idLugar from Lugar where pais = '$lug')
			where idPrograma = '$id'");
			
			return true;	
		}else
		{
			return false;
		}
	}

	public function validaNombre($nom)
	{
		if($nom != '')
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function validaFecha($fi,$ff)
	{
		$datetime1 = new DateTime($fi);
        $datetime2 = new DateTime($ff);
        $interval = $datetime1->diff($datetime2);
        if($interval->format('%R%') == '+')
        {
            return true;
        }else
        {
            return false;
        }
	}

	public function validaDesc($desc)
	{
		if($desc != '')
		{
			return true;
		}
		else
		{
			return false;
		}
	}

}