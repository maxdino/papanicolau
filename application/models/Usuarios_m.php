<?php
class Usuarios_m extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}
	public function usuarios()
	{
		$this->db->select("*");
		$this->db->from("usuario");
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
	public function agregar()
	{	
		$usuario = substr($this->input->post("usuario"), 0, 1);
		$clave = md5($usuario).''.base64_encode($this->input->post("clave"));
		$agregar = array(
		'nombre' => strtoupper(trim($this->input->post("nombres"))), 
		'apellido' => strtoupper(trim($this->input->post("apellidos"))), 
		'usuario' => $this->input->post("usuario"), 
		'clave' => $clave,
		'estado' => '1',
		);
		$this->db->insert("usuario",$agregar);
		
	}
	public function eliminar()
	{	
		$this->db->where("id_usuario",$this->input->post("id"));
		$this->db->delete("usuario");
		
	}
	public function modificar()
	{	
		$usuario = substr($this->input->post("usuario"), 0, 1);
		$clave = md5($usuario).''.base64_encode($this->input->post("clave"));
		$modificar = array(
		'nombre' => strtoupper(trim($this->input->post("nombres"))), 
		'apellido' => strtoupper(trim($this->input->post("apellidos"))), 
		'usuario' => $this->input->post("usuario"), 
		'clave' => $clave,
		'estado' => '1',
		);
		$this->db->where("id_usuario",$this->input->post("id_usuario"));
		$this->db->update("usuario",$modificar);
}
}