<?php
class Iconos_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }


  public function mostrar_iconos()
  {
   $this->db->select("*");
   $this->db->from("iconos");
   $this->db->where("estado","1");
   $this->db->Order_by("id_iconos","desc");
   $r = $this->db->get();  
   return $r->result();
 }

 public function mostrar_estados()
 {
   $this->db->select("*");
   $this->db->from("estados");
   $r = $this->db->get();  
   return $r->result();
 }

 public function agregar()
 {
   $datos = array(
    "iconos" => trim($this->input->post("iconos")),
    "imagen" => '<i class="'.trim($this->input->post("iconos")).'"></i>',
    "estado" => "1"
  );
   $this->db->insert("iconos",$datos);
 }

 public function modificar()
 {
   $datos = array(
    "iconos" => trim($this->input->post("iconos")),
    "imagen" => '<i class="'.trim($this->input->post("iconos")).'"></i>',
  );
   $this->db->where("id_iconos",$this->input->post("id"));
   $this->db->update("iconos",$datos);
 }

 public function eliminar()
 {
   $this->db->where("id_iconos",$this->input->post("id"));
   $this->db->delete("iconos");
 }

}
?>