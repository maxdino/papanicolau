<?php
class Microred_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

 public function mostrar()
  {
   $this->db->select("*");
   $this->db->from("microred");
   $r = $this->db->get();  
   return $r->result();
 }

 public function mostrar_red()
  {
   $this->db->select("*");
   $this->db->from("red_salud");
   $r = $this->db->get();  
   return $r->result();
 }

public function agregar()
  {
   $datos = array(
    "microred" => $this->input->post("nombres"),
    "red" => $this->input->post("red"),
  );
   $this->db->insert("microred",$datos);
 }

public function eliminar()
  {
   $this->db->where("id_microred",$this->input->post("id"));
   $this->db->delete("microred");
 }

 public function microred_editar($id)
  {
   $this->db->select("*");
   $this->db->from("microred");
   $this->db->where("id_microred",$id);
   $r = $this->db->get();  
   return $r->result();
 }

  public function modificar()
  {
   $datos = array(
    "microred" => trim($this->input->post("nombres")),
    "red" => $this->input->post("red"),
  );
   $this->db->where("id_microred",$this->input->post("id_microred"));
   $this->db->update("microred",$datos);
 }

}