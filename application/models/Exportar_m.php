<?php
class Exportar_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

public function agregar($cantidad,$codigo,$nombre,$establecimiento,$numero_documento,$paciente,$dni,$fecha_nacimiento,$distrito_paciente,$provincia_paciente,$departamento_paciente,$medico)
   {
       
      $actualiza =array(
        'cantidad' => strtoupper($cantidad), 
        'codigo_renipres'=> strtoupper($codigo), 
        'nombre_renipress'=> strtoupper($nombre), 
        'establecimiento'=> strtoupper($establecimiento), 
        'numero_documento'=> strtoupper($numero_documento), 
        'paciente'=> strtoupper($paciente), 
        'dni'=> strtoupper($dni), 
        'fecha_nacimiento'=> strtoupper($fecha_nacimiento), 
        'distrito_paciente'=> strtoupper($distrito_paciente), 
        'provincia_paciente'=> strtoupper($provincia_paciente), 
        'departamento_paciente'=> strtoupper($departamento_paciente),
        'medico'=> strtoupper($medico),  
        );
    $this->db->insert('usuarios',$actualiza);
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

 public function red_salud()
  {
   $this->db->select("id_red ");
   $this->db->from("red_salud");
   $r = $this->db->get();  
   return $r->result();
 }

 public function negativo_1($mes,$codigo)
  {
   $this->db->select("COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad");
   $this->db->from("datos");
   $this->db->where("clasificacion_general like 'Negativo para lesiones epiteliales o malignidad'");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15");
   $this->db->where("id_mes",$mes);
   $this->db->where("codigo_renipres",$codigo);
   $r = $this->db->get();  
   return $r->result();
 }

 public function negativo_2($mes,$codigo)
  {
   $this->db->select("COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad ");
   $this->db->from("datos");
   $this->db->where("clasificacion_general like 'Negativo para lesiones epiteliales o malignidad'");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30");
   $this->db->where("id_mes",$mes);
   $this->db->where("codigo_renipres",$codigo);
   $r = $this->db->get();  
   return $r->result();
 }

  public function negativo_3($mes,$codigo)
  {
   $this->db->select("COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad");
   $this->db->from("datos");
   $this->db->where("clasificacion_general like 'Negativo para lesiones epiteliales o malignidad'");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50");
   $this->db->where("id_mes",$mes);
   $this->db->where("codigo_renipres",$codigo);
   $r = $this->db->get();  
   return $r->result();
 }

  public function agus_1($mes,$codigo)
  {
   $this->db->select("COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad");
   $this->db->from("datos");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15");
   $this->db->where("id_mes",$mes);
   $this->db->where("codigo_renipres",$codigo);
   $this->db->where("celulas_glandulares_atipicas != '_' or celulas_glandulares_atipicas !=  NULL ");
   $r = $this->db->get();  
   return $r->result();
 }

  public function agus_2($mes,$codigo)
  {
   $this->db->select("COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad");
   $this->db->from("datos");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49");
   $this->db->where("TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30");
   $this->db->where("id_mes",$mes);
   $this->db->where("codigo_renipres",$codigo);
   $this->db->where("celulas_glandulares_atipicas != '_' or celulas_glandulares_atipicas !=  NULL ");
   $r = $this->db->get();  
   return $r->result();
 }

 }