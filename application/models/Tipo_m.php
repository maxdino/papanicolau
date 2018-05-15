<?php
class Tipo_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

 public function mostrar()
  {
   $this->db->select("*");
   $this->db->from("tipos");
   $r = $this->db->get();  
   return $r->result();
 }

public function agregar()
  {
   $datos = array(
    "tipos" => $this->input->post("nombres"),
  );
   $this->db->insert("tipos",$datos);
 }

public function eliminar()
  {
   $this->db->where("id_tipos",$this->input->post("id"));
   $this->db->delete("tipos");
 }

 public function tipo_editar($id)
  {
   $this->db->select("*");
   $this->db->from("tipos");
   $this->db->where("id_tipos",$id);
   $r = $this->db->get();  
   return $r->result();
 }

  public function modificar()
  {
   $datos = array(
    "tipos" => trim($this->input->post("nombres")),
  );
   $this->db->where("id_tipos",$this->input->post("id_tipos"));
   $this->db->update("tipos",$datos);
 }

}