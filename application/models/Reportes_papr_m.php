<?php
class Reportes_papr_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

public function mostrar()
  {
   return $r = $this->db->query("(SELECT id_mesr,year(fecha_rechazo)as annio,month(fecha_rechazo) as mes from datos WHERE fecha_rechazo!=''  ) UNION (SELECT id_mesr,year(fecha_resultado) as annio,month(fecha_resultado) as mes from datos WHERE fecha_resultado!=''  ) ORDER BY annio,mes asc")->result();
 }

public function mostrar_annio()
  {
  return $r =  $this->db->query("(SELECT year(fecha_rechazo)as annio from datos WHERE fecha_rechazo!='' )  UNION 
(SELECT year(fecha_resultado) as annio  from datos WHERE fecha_resultado!='' ) ORDER BY annio asc")->result();
 }

 public function validar_annio($id)
  {
   return $r = $this->db->query("(SELECT id_mesr,year(fecha_rechazo)as annio,month(fecha_rechazo) as mes from datos WHERE fecha_rechazo!=''  and  year(fecha_rechazo)=".$id." ) UNION (SELECT id_mesr,year(fecha_resultado) as annio,month(fecha_resultado) as mes from datos WHERE fecha_resultado!='' and  year(fecha_resultado)=".$id." ) ORDER BY annio,mes asc")->result();
 }

 public function validar_mes($id,$id_mes)
  {
   return $r = $this->db->query("(SELECT id_mesr,year(fecha_rechazo) as annio,month(fecha_rechazo) as mes from datos WHERE fecha_rechazo!=''  and  year(fecha_rechazo)=".$id." and month(fecha_rechazo)>".$id_mes." ) UNION (SELECT id_mesr,year(fecha_resultado) as annio,month(fecha_resultado) as mes from datos WHERE fecha_resultado!='' and  year(fecha_resultado)=".$id." and month(fecha_resultado)>".$id_mes." ) ORDER BY mes asc")->result();
 } 

 }