<?php
class Usuarios_m extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}
	public function usuarios()
	{
		$this->db->select("*");
		$this->db->from("usuario as u");
		$this->db->join("tipos_usuarios as t ","u.tipos_usuarios=t.id_tipos_usuarios");
		$r = $this->db->get();  
		return $r->result();
	}
	public function usuarios_editar($id)
	{
		$this->db->select("*");
		$this->db->from("usuario");
		$this->db->where("id_usuario",$id);
		$r = $this->db->get();  
		return $r->result();
	}
	public function perfiles()
	{
		$this->db->select("*");
		$this->db->from("tipos_usuarios");
		$r = $this->db->get();  
		return $r->result();
	}
	
	public function eliminar()
	{	
		$this->db->where("id_usuario",$this->input->post("id"));
		$this->db->delete("usuario");
	}
	
}