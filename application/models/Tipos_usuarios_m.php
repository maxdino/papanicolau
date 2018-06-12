<?php
class Tipos_usuarios_m extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}
	public function tipos_usuarios()
	{
		$this->db->select("*");
		$this->db->from("tipos_usuarios");
		$r = $this->db->get();  
		return $r->result();
	}
	public function tipos_usuarios_editar($id)
	{
		$this->db->select("*");
		$this->db->from("tipos_usuarios");
		$this->db->where("id_tipos_usuarios",$id);
		$r = $this->db->get();  
		return $r->result();
	}
	public function agregar()
	{	
		$agregar = array(
			'tipos_usuarios' => strtoupper(trim($this->input->post("tipo_usuario"))), 
			'descripcion' => strtoupper(trim($this->input->post("detalle"))), 
		);
		$this->db->insert("tipos_usuarios",$agregar);	
	}
	public function eliminar()
	{	
		$this->db->where("id_tipos_usuarios",$this->input->post("id"));
		$this->db->delete("tipos_usuarios");
		
	}
	public function modificar()
	{	
		$modificar = array(
			'tipos_usuarios' => strtoupper(trim($this->input->post("tipo_usuario"))), 
			'descripcion' => strtoupper(trim($this->input->post("detalle"))), 
		);
		$this->db->where("id_tipos_usuarios",$this->input->post("id_tipo_usuario"));
		$this->db->update("tipos_usuarios",$modificar);
	}
}