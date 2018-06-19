<?php
class Perfil_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }


  public function perfil()
   {
   $this->db->select("u.nombre,u.id_usuario,u.apellido,t.tipos_usuarios,u.usuario,u.clave");
   $this->db->from("usuario as u");
   $this->db->join("tipos_usuarios as t","u.tipos_usuarios=t.id_tipos_usuarios");
   $this->db->where("u.id_usuario",$_SESSION["id_usuario"]);
   $r = $this->db->get();  
   return $r->result();
   }

   public function editar_perfil($id)
   {
   $this->db->select("u.nombre,u.id_usuario,u.apellido,t.tipos_usuarios,u.usuario,u.clave");
   $this->db->from("usuario as u");
   $this->db->join("tipos_usuarios as t","u.tipos_usuarios=t.id_tipos_usuarios");
   $this->db->where("u.id_usuario",$id);
   $r = $this->db->get();  
   return $r->result();
   }

   public function traer_modulos()
    {
      $this->db->select("h.id_modulo as id_padre, h.descripcion as padre, pa.descripcion as hijo, pa.id_modulo as id_hijo, h.icono as iconos");
      $this->db->from("modulo as h");
      $this->db->join("modulo as pa","h.id_modulo=pa.id_padre");
      $this->db->order_by("h.id_modulo","asc");

      $r = $this->db->get();
      return $r->result();
    }

   public function registrar()
   {
   $data=array(
   'perfil' => strtoupper(trim($this->input->post("perfil"))),
   );
   $this->db->insert('perfil',$data);  
   }

   public function listar_perfil($id)
   {
   $this->db->select("*");
   $this->db->from("perfil");
   $this->db->where("id_perfil",$id);
   $r = $this->db->get();  
   return $r->result();
   }

   public function modificar()
   {
   $data=array(
   'perfil' => strtoupper(trim($this->input->post("perfil"))),
   );
   $this->db->where("id_perfil",$this->input->post("id_perfil"));
   $this->db->update('perfil',$data); 
   }

   public function eliminar()
 {
   $this->db->where("id_perfil",$this->input->post("id"));
   $this->db->delete("perfil");
 }

   }
 ?>