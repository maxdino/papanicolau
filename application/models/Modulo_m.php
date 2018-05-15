<?php
class Modulo_m extends CI_Model {

    function __construct()
    {
        parent::__construct();

    }


  public function modulo_padre()
   {
   $this->db->select("*");
   $this->db->from("modulo");
   $this->db->where("id_padre","0");
   $r = $this->db->get();  
   return $r->result();
   }

   public function iconos()
   {
   $this->db->select("*");
   $this->db->from("iconos");
   $this->db->where("estado","1");
   $r = $this->db->get();  
   return $r->result();
   }

   public function mostrar_modulo()
   {
   $this->db->select("*");
   $this->db->from("modulo");
   $r = $this->db->get();  
   return $r->result();
   }

   public function registrar()
   {
   if($this->input->post("url")==''){
    $url="#";
   }else{
    $url=$this->input->post("url");
   }
   $data=array(
   'descripcion' => strtoupper(trim($this->input->post("modulo"))),
   'url' => trim($url),
   'id_padre' => trim($this->input->post("padre")),
   'icono' => trim($this->input->post("icono")),
   );
   $this->db->insert('modulo',$data);  
   }

   public function listar_modulo($id)
   {
   $this->db->select("*");
   $this->db->from("modulo");
   $this->db->where("id_modulo",$id);
   $r = $this->db->get();  
   return $r->result();
   }

   public function modificar()
   {
   if($this->input->post("url")==''){
    $url="#";
   }else{
    $url=$this->input->post("url");
   }
   $data=array(
   'descripcion' => strtoupper(trim($this->input->post("modulo"))),
   'url' => $url,
   'id_padre' => $this->input->post("padre"),
   'icono' => $this->input->post("icono"), 
   );
   $this->db->where("id_modulo",$this->input->post("id_modulo"));
   $this->db->update('modulo',$data); 
   }

   public function eliminar()
 {
   $this->db->where("id_modulo",$this->input->post("id"));
   $this->db->delete("modulo");
 }

   }
 ?>