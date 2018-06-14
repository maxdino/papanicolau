<?php
class Iconos_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

  public function iconos()
  {
   $this->db->select("*");
   $this->db->from("iconos");
   $this->db->Order_by("id_iconos","desc");
   $r = $this->db->get();  
   return $r->result();
 }

 public function iconos_editar($id)
 {
   $this->db->select("*");
   $this->db->from("iconos");
   $this->db->where("id_iconos",$id);
   $this->db->Order_by("id_iconos","desc");
   $r = $this->db->get();  
   return $r->result();
 }

 public function agregar()
 {
   $datos = array(
    "nombres" => strtoupper(trim($this->input->post("iconos"))),
    "codigo" => trim($this->input->post("url")), 
    "iconos" => '<i class="'.trim($this->input->post("url")).'"></i>',

  );
   $this->db->insert("iconos",$datos);
 }

 public function modificar()
 {
   $datos = array(
    "nombres" => strtoupper(trim($this->input->post("iconos"))),
    "codigo" => trim($this->input->post("url")), 
    "iconos" => '<i class="'.trim($this->input->post("url")).'"></i>',
  );
   $this->db->where("id_iconos",$this->input->post("id_iconos"));
   $this->db->update("iconos",$datos);
 }

 public function eliminar()
 {
   $this->db->where("id_iconos",$this->input->post("id"));
   $this->db->delete("iconos");
 }

}
?>