<?php
class Portal_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }




public function comprobar()
  {
   $this->db->select("u.nombre,u.apellido,u.tipos_usuarios,u.id_usuario,u.foto,u.usuario,t.tipos_usuarios as nombre_tipo");
   $this->db->from("usuario as u ");
   $this->db->join("tipos_usuarios as t","u.tipos_usuarios=t.id_tipos_usuarios");
   $this->db->where("usuario",$this->input->post("usuario"));
   $usuario = substr($this->input->post("usuario"), 0, 1);
   $this->db->where("clave",md5($usuario).''.base64_encode($this->input->post("clave")));
   $r = $this->db->get();  
   return $r->result();
 } 

}