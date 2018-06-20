<?php
class Perfil_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }


  public function perfil()
  {
   $this->db->select("u.nombre,u.id_usuario,u.apellido,t.tipos_usuarios,u.usuario,u.clave,u.foto");
   $this->db->from("usuario as u");
   $this->db->join("tipos_usuarios as t","u.tipos_usuarios=t.id_tipos_usuarios");
   $this->db->where("u.id_usuario",$_SESSION["id_usuario"]);
   $r = $this->db->get();  
   return $r->result();
 }

 public function editar_perfil()
 {
   $this->db->select("u.nombre,u.id_usuario,u.apellido,t.tipos_usuarios,u.usuario,u.clave,u.foto");
   $this->db->from("usuario as u");
   $this->db->join("tipos_usuarios as t","u.tipos_usuarios=t.id_tipos_usuarios");
   $this->db->where("u.id_usuario",$_SESSION["id_usuario"]);
   $r = $this->db->get();  
   return $r->result();
 }

public function eliminar()
{
 $this->db->where("id_perfil",$this->input->post("id"));
 $this->db->delete("perfil");
}

}
?>