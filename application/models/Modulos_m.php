<?php
class Modulos_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

  public function padre()
  {
   $this->db->select("*");
   $this->db->from("modulos");
   $this->db->where("padre","0");
   $r = $this->db->get();  
   return $r->result();
 }

 public function iconos()
 {
   $this->db->select("*");
   $this->db->from("iconos");
   $r = $this->db->get();  
   return $r->result();
 }

 public function modulos()
 {
  $this->db->select("mo.id_modulos,mo.nombres,mo.url,mo.modulo_padre,iconos.nombres as iconos");
   $this->db->from("modulos as mo");
   $this->db->join("iconos","mo.iconos=iconos.id_iconos");

   $r = $this->db->get();  
   return $r->result();
 }

 public function modulos_editar($id)
 {
   $this->db->select("*");
   $this->db->from("modulos");
   $this->db->where("id_modulos",$id);
   $r = $this->db->get();  
   return $r->result();
 }

 public function agregar()
 {
   if($this->input->post("padre")=='0'){
    $url="#";
    $nombre_padre = 'PADRE';
  }else{
    $url=$this->input->post("url");
    $r = $this->db->query("select * from modulos where(id_modulos=".$this->input->post("padre").")")->row();
    $nombre_padre = $r->nombres;
  }

  $data=array(
   'nombres' => strtoupper(trim($this->input->post("modulos"))),
   'url' => trim($url),
   'padre' => trim($this->input->post("padre")),
   'modulo_padre' => $nombre_padre,
   'iconos' => $this->input->post("iconos"),
 );
  $this->db->insert('modulos',$data);  
}

public function modificar()
{
 if($this->input->post("padre")=='0'){
  $url="#";
  $nombre_padre = 'PADRE';
}else{
  $url=$this->input->post("url");
  $r = $this->db->query("select * from modulos where(id_modulos=".$this->input->post("padre").")")->row();
  $nombre_padre = $r->nombres;
}
$data=array(
 'nombres' => strtoupper(trim($this->input->post("modulos"))),
 'url' => $url,
 'padre' => $this->input->post("padre"),
 'modulo_padre' => $nombre_padre,
 'iconos' => $this->input->post("iconos"), 
);
$this->db->where("id_modulos",$this->input->post("id_modulos"));
$this->db->update('modulos',$data); 
}

public function eliminar()
{
 $this->db->where("id_modulos",$this->input->post("id"));
 $this->db->delete("modulos");
}

}
?>