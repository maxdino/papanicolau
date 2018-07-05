<?php
class Reportes_papr_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

public function mostrar()
  {
   return $r = $this->db->query("(SELECT id_mesr,year(fecha_rechazo)as annio,month(fecha_rechazo) as mes from datos WHERE fecha_rechazo!='' GROUP BY id_mesr    ) UNION (SELECT id_mesr,year(fecha_resultado) as annio,month(fecha_resultado) as mes from datos WHERE fecha_resultado!='' GROUP BY id_mesr     ) ORDER BY annio,mes asc")->result();
 }

public function mostrar_annio()
  {
  return $r =  $this->db->query("(SELECT year(fecha_rechazo)as annio from datos WHERE fecha_rechazo!='' )  UNION 
(SELECT year(fecha_resultado) as annio  from datos WHERE fecha_resultado!='' ) ORDER BY annio asc")->result();
 }

 public function validar_annio($id)
  {
   return $r = $this->db->query("(SELECT id_mesr,year(fecha_rechazo)as annio,month(fecha_rechazo) as mes from datos WHERE fecha_rechazo!=''  and  year(fecha_rechazo)=".$id." GROUP BY id_mesr  ) UNION (SELECT id_mesr,year(fecha_resultado) as annio,month(fecha_resultado) as mes from datos WHERE fecha_resultado!='' and  year(fecha_resultado)=".$id." GROUP BY id_mesr  ) ORDER BY annio,mes asc")->result();
 }

 public function validar_mes($id,$id_mes)
  {
    $mes_nombre = array("01" =>"ENERO","02" => "FEBRERO","03" => "MARZO","04" => "ABRIL","05" =>"MAYO","06" => "JUNIO","07" => "JULIO","08" => "AGOSTO","09" =>"SETIEMBRE","10" => "OCTUBRE","11" => "NOVIEMBRE","12" => "DICIEMBRE");
      foreach ($mes_nombre as $key_1=> $n_mes) {
        if ($id_mes==$key_1) {
          $id_mes=$key_1;
        }
      } 
   return $r = $this->db->query("(SELECT id_mesr,year(fecha_rechazo) as annio,month(fecha_rechazo) as mes from datos WHERE fecha_rechazo!=''  and  year(fecha_rechazo)=".$id." and id_mesr>".$id.$id_mes." GROUP BY id_mesr  ) UNION (SELECT id_mesr,year(fecha_resultado) as annio,month(fecha_resultado) as mes from datos WHERE fecha_resultado!='' and  year(fecha_resultado)=".$id." and id_mesr>".$id.$id_mes." GROUP BY id_mesr  ) ORDER BY mes asc")->result();
 } 

 }