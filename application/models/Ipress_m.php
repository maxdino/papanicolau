<?php
class Ipress_m extends CI_Model {

	function __construct()
	{
		parent::__construct();

	}

	public function mostrar()
	{
		$this->db->select("*");
		$this->db->from("ipress");
		$this->db->join("provincias","provincias.id_provincias=ipress.provincia");
		$this->db->join("distritos","distritos.id_distritos=ipress.distrito");
		$r = $this->db->get();  
		return $r->result();
	}

	public function ipress_editar($id)
	{
		$this->db->select("*");
		$this->db->from("ipress");
		$this->db->where("id_ipress",$id);
		$r = $this->db->get();  
		return $r->result();
	}

	public function microred()
	{
		$this->db->select("*");
		$this->db->from("microred");
		$r = $this->db->get();  
		return $r->result();
	}

	public function tipos()
	{
		$this->db->select("*");
		$this->db->from("tipos");
		$r = $this->db->get();  
		return $r->result();
	}

	public function categorias()
	{
		$this->db->select("*");
		$this->db->from("categorias");
		$r = $this->db->get();  
		return $r->result();
	}

	public function provincias()
	{
		$this->db->select("*");
		$this->db->from("provincias");
		$r = $this->db->get();  
		return $r->result();
	}

	public function distritos()
	{
		$this->db->select("*");
		$this->db->from("distritos");
		$r = $this->db->get();  
		return $r->result();
	}

	public function agregar()
	{
		$datos = array(
			"ipress" => $this->input->post("nombres"),
			"microred" => $this->input->post("microred"),
			"tipo" => $this->input->post("tipos"),
			"categoria" => $this->input->post("categorias"),
			"codigo" => $this->input->post("codigo"),
			"provincia" => $this->input->post("provincias"),
			"distrito" => $this->input->post("distritos"),
			"resolucion" => $this->input->post("resolucion"),
			"fecha" => $this->input->post("fecha"),
		);
		$this->db->insert("ipress",$datos);
	}

	public function modificar()
	{
		$datos = array(
			"ipress" => $this->input->post("nombres"),
			"microred" => $this->input->post("microred"),
			"tipo" => $this->input->post("tipos"),
			"categoria" => $this->input->post("categorias"),
			"codigo" => $this->input->post("codigo"),
			"provincia" => $this->input->post("provincias"),
			"distrito" => $this->input->post("distritos"),
			"resolucion" => $this->input->post("resolucion"),
			"fecha" => $this->input->post("fecha"),
		);
		$this->db->where("id_ipress",$this->input->post("id"));
		$this->db->update("ipress",$datos);
	}

	public function eliminar()
	{
		$this->db->where("id_ipress",$this->input->post("id"));
		$this->db->delete("ipress",$datos);
	}
}