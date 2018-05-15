<?php
class Categorias_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

 public function mostrar()
  {
   $this->db->select("*");
   $this->db->from("categorias");
   $r = $this->db->get();  
   return $r->result();
 }

public function agregar()
  {
   $datos = array(
    "categorias" => $this->input->post("nombres"),
  );
   $this->db->insert("categorias",$datos);
 }

public function eliminar()
  {
   $this->db->where("id_categorias",$this->input->post("id"));
   $this->db->delete("categorias");
 }

 public function categoria_editar($id)
  {
   $this->db->select("*");
   $this->db->from("categorias");
   $this->db->where("id_categorias",$id);
   $r = $this->db->get();  
   return $r->result();
 }

  public function modificar()
  {
   $datos = array(
    "categorias" => trim($this->input->post("nombres")),
  );
   $this->db->where("id_categorias",$this->input->post("id_categorias"));
   $this->db->update("categorias",$datos);
 }

}