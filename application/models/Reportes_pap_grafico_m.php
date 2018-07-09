<?php
class Reportes_pap_grafico_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }
 

public function mostrar()
  {
   $this->db->select("id_mes,(MONTH(fecha_muestra) ) as  mes,(year(fecha_muestra) ) as annio");
   $this->db->from("datos");
   $this->db->group_by("id_mes");
   $r = $this->db->get();  
   return $r->result();
 }

public function mostrar_annio()
  {
   $this->db->select("id_mes,(year(fecha_muestra) ) as  annio,(year(fecha_muestra) ) as annio");
   $this->db->from("datos");
   $this->db->group_by("annio");
   $r = $this->db->get();  
   return $r->result();
 }

 public function validar_annio($id)
  {
   $this->db->select("id_mes, MONTH(fecha_muestra) as mes");
   $this->db->from("datos");
   $this->db->where("year(fecha_muestra) ",$id);
   $this->db->group_by("id_mes");
   $r = $this->db->get();  
   return $r->result();
 }

 public function validar_mes($id,$id_mes)
  {
   $this->db->select("id_mes, MONTH(fecha_muestra) as mes");
   $this->db->from("datos");
   $this->db->where("year(fecha_muestra) ",$id); 
   $this->db->where("MONTH(fecha_muestra)  > ".$id_mes);  
   $this->db->group_by("id_mes");
   $this->db->order_by("MONTH(fecha_muestra)");
   $r = $this->db->get();  
   return $r->result();
 } 

 }