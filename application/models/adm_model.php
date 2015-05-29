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

		$this->db->query("insert into Convocatoria 
			(nombreConv, fechaInicio, fechaFin, descripcion, Grado_idGrado,
			 Universidad_idUniversidad1, Area_idArea, promedioSolicitado, Lugar_idLugar)
			values
			('$nom','$fi','$ff','$desc',
			(select idGrado from Grado where nombre = '$grado'),
			(select idUniversidad from Universidad where nombre = '$uni'),
			(select idArea from Area where nombreAreaFormacion = '$area'),
			$prom,
			(select idLugar from Lugar where ciudad = '$lug'))");

		return true;
	}

	public function guardaUni($uni)
	{
		$this->db->query("insert into Universidad (nombre) Values ('$uni')");
	}

	public function guardaArea($area)
	{
		$this->db->query("insert into Area (nombreAreaFormacion) Values ('$area')");
	}

	public function guardaPais($pais)
	{
		$this->db->query("insert into Lugar (pais) Values ('$pais')");
	}

	public function guardaCiudad($ciudad,$id)
	{
		$this->db->query("insert into ciudad (Lugar_idLugar, ciudad) Values
		 ((select idLugar from Lugar where pais = '$id'),'$ciudad')");
	}

	public function guardaGrado($grado)
	{
		$this->db->query("insert into Grado (nombre) Values ('$grado')");
	}

}