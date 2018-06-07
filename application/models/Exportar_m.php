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

 public function validar_annio($id)
  {
   $this->db->select("id_mes, MONTH(fecha_muestra) as mes");
   $this->db->from("datos");
   $this->db->where("year(fecha_muestra) ",$id);
   $this->db->group_by("id_mes");
   $r = $this->db->get();  
   return $r->result();
 }

 public function validar_mes($id)
  {
   $this->db->select("*");
   $this->db->from("datos");
   $this->db->where("year(fecha_muestra) )",$id);
   $this->db->group_by("id_mes");
   $r = $this->db->get();  
   return $r->result();
 } 

 }