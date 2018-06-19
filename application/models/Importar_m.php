<?php
class Importar_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

  public function agregar($maximo,$id_usuario,$cantidad,$codigo,$dni,$fecha_nacimiento,$muestra,$fecha_muestra,$fecha_rechazo,$celulas_escamosas_atipicas,$celulas_glandulares_atipicas,$clasificacion_general,$fecha_resultado,$leibg,$leiag)
  {
    $actualiza =array(
      'cantidad' => $cantidad, 
      'id_mes' => $maximo, 
      'id_usuario' => $id_usuario,
      'fecha_registro' => date('Y-m-d H:i:s'), 
      'codigo_renipres'=> $codigo, 
      'dni'=> $dni, 
      'fecha_nacimiento'=> $fecha_nacimiento, 
      'muestra' => $muestra, 
      'fecha_muestra'=> $fecha_muestra,
      'fecha_rechazo'=> $fecha_rechazo, 
      'celulas_escamosas_atipicas'=> $celulas_escamosas_atipicas, 
      'celulas_glandulares_atipicas'=> $celulas_glandulares_atipicas, 
      'clasificacion_general'=> $clasificacion_general, 
      'fecha_resultado' => $fecha_resultado, 
      'leibg'=> $leibg, 
      'leiag'=> $leiag, 
    );
    $this->db->insert('datos',$actualiza);
  }

  public function validar_codigo($datos)
  {
   $this->db->select("*");
   $this->db->from("ipress");
   $this->db->where("codigo",$datos);
   $validar = $this->db->get();  
   return $validar->result(); 
 } 

 public function mes_subido()
 {
   $this->db->select("id_mes,month(fecha_muestra) as mes,year(fecha_muestra) as annio,fecha_registro");
   $this->db->from("datos");
   $this->db->group_by("id_mes");
   $this->db->order_by("month(fecha_muestra)");
   $r = $this->db->get();  
   return $r->result(); 
 } 

 public function eliminar()
 {
   $this->db->where("id_mes",$this->input->post("id"));
   $this->db->delete("datos");
 } 
}