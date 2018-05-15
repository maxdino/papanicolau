<?php
class Red_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

 public function mostrar()
  {
   $this->db->select("*");
   $this->db->from("red_salud");
   $r = $this->db->get();  
   return $r->result();
 }

public function agregar()
  {
   $datos = array(
    "red_salud" => $this->input->post("nombres"),
  );
   $this->db->insert("red_salud",$datos);
 }

public function eliminar()
  {
   $this->db->where("id_red",$this->input->post("id"));
   $this->db->delete("red_salud");
 }

 public function red_editar($id)
  {
   $this->db->select("*");
   $this->db->from("red_salud");
   $this->db->where("id_red",$id);
   $r = $this->db->get();  
   return $r->result();
 }

  public function modificar()
  {
   $datos = array(
    "red_salud" => trim($this->input->post("nombres")),
  );
   $this->db->where("id_red",$this->input->post("id_red"));
   $this->db->update("red_salud",$datos);
 }

}