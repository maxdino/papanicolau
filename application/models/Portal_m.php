<?php
class Portal_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }




public function comprobar()
  {
   $this->db->select("*");
   $this->db->from("usuario");
   $this->db->where("usuario",$this->input->post("usuario"));
   $usuario = substr($this->input->post("usuario"), 0, 1);
   $this->db->where("clave",md5($usuario).''.base64_encode($this->input->post("clave")));
   $r = $this->db->get();  
   return $r->result();
 } 

}