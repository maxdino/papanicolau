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




 }