<?php
class Importar_m extends CI_Model {

  function __construct()
  {
    parent::__construct();

  }

public function agregar($cantidad,$codigo,$nombre,$establecimiento,$numero_documento,$paciente,$dni,$fecha_nacimiento,$distrito_paciente,$provincia_paciente,$departamento_paciente,$medico,$muestra,$fecha_muestra,$fecha_recepcionlab,$fecha_recepcionins,$enfermedad,$prueba,$fecha_horaregistro,$diasutilesemitirresultados,$fecha_recepcionlaboratorio,$sexo,$departamento_establecimiento,$disa,$motivo_muestra,$fecha_rechazo,$tipo_muestra,$gestante,$latitud,$longitud,$clasificacion,$categoria,$numero_proceso,$fecha_ingresomuestra,$fecha_ingresoprueba,$adenocarcinoma_endovervical,$adenocarcinoma,$calidad_especimen,$cambios_reac_asociados_atrofia_con_infla,$cambios_reac_asociados_atrofia_sin_infla,$cambios_reac_asociados_diu,$cambios_reac_asociados_infla,$cambios_reac_asociados_radiacion,$cambios_celulas_escamosas,$celulas_escamosas_atipicas,$celulas_glandulares_atipicas,$celulas_glandulares_atipicas_neoplasia,$clasificacion_general,$fecha_resultado,$leibg,$leiag,$micro,$negativo_lesion,$observacion,$nueva_muestra,$otra_neoplasias,$patron_horm_compatible,$patron_horm_discrepancia,$valoracion_hormonal)
   {
       
      $actualiza =array(
        'cantidad' => $cantidad, 
        'codigo_renipres'=> $codigo, 
        'nombre_renipress'=> $nombre, 
        'establecimiento'=> $establecimiento, 
        'numero_documento'=> $numero_documento, 
        'paciente'=> $paciente, 
        'dni'=> $dni, 
        'fecha_nacimiento'=> $fecha_nacimiento, 
        'distrito_paciente'=> $distrito_paciente, 
        'provincia_paciente'=> $provincia_paciente, 
        'departamento_paciente'=> $departamento_paciente,
        'medico'=> $medico, 
        'muestra' => $muestra, 
        'fecha_muestra'=> $fecha_muestra,
        'fecha_recepcionlab'=> $fecha_recepcionlab,
        'fecha_recepcionins'=> $fecha_recepcionins,
        'enfermedad'=>  $enfermedad, 
        'prueba'=> $prueba, 
        'fecha_horaregistro'=> $fecha_horaregistro, 
        'diasutilesemitirresultados'=> $diasutilesemitirresultados, 
        'fecha_recepcionlaboratorio'=> $fecha_recepcionlaboratorio, 
        'sexo'=> $sexo, 
        'departamento_establecimiento'=> $departamento_establecimiento,
        'disa'=> $disa, 
        'motivo_muestra' => $motivo_muestra, 
        'fecha_rechazo'=> $fecha_rechazo, 
        'tipo_muestra'=> $tipo_muestra, 
        'gestante'=> $gestante, 
        'latitud'=> $latitud, 
        'longitud'=> $longitud, 
        'clasificacion'=> $clasificacion, 
        'categoria'=> $categoria, 
        'numero_proceso'=> $numero_proceso, 
        'fecha_ingresomuestra'=> $fecha_ingresomuestra, 
        'fecha_ingresoprueba'=> $fecha_ingresoprueba,
        'adenocarcinoma_endovervical'=> $adenocarcinoma_endovervical, 
        'adenocarcinoma' => $adenocarcinoma, 
        'calidad_especimen'=> $calidad_especimen, 
        'cambios_reac_asociados_atrofia_con_infla'=> $cambios_reac_asociados_atrofia_con_infla, 
        'cambios_reac_asociados_atrofia_sin_infla'=> $cambios_reac_asociados_atrofia_sin_infla, 
        'cambios_reac_asociados_diu'=> $cambios_reac_asociados_diu, 
        'cambios_reac_asociados_infla'=> $cambios_reac_asociados_infla, 
        'cambios_reac_asociados_radiacion'=> $cambios_reac_asociados_radiacion, 
        'cambios_celulas_escamosas'=> $cambios_celulas_escamosas, 
        'celulas_escamosas_atipicas'=> $celulas_escamosas_atipicas, 
        'celulas_glandulares_atipicas'=> $celulas_glandulares_atipicas, 
        'celulas_glandulares_atipicas_neoplasia'=> $celulas_glandulares_atipicas_neoplasia,
        'clasificacion_general'=> $clasificacion_general, 
        'fecha_resultado' => $fecha_resultado, 
        'leibg'=> $leibg, 
        'leiag'=> $leiag, 
        'micro'=> $micro, 
        'negativo_lesion'=> $negativo_lesion, 
        'observacion'=> $observacion, 
        'nueva_muestra'=> $nueva_muestra, 
        'otra_neoplasias'=> $otra_neoplasias, 
        'patron_horm_compatible'=> $patron_horm_compatible, 
        'patron_horm_discrepancia'=> $patron_horm_discrepancia, 
        'valoracion_hormonal'=> $valoracion_hormonal,
        );
    $this->db->insert('datos',$actualiza);
   } 




 }