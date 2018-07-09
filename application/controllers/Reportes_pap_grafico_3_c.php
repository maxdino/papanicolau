<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_pap_grafico_3_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url","form");
		$this->load->model('Reportes_pap_grafico_m');
		$this->load->model('Permisos_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['mes']= $this->Reportes_pap_grafico_m->mostrar();
		$data['annio']= $this->Reportes_pap_grafico_m->mostrar_annio();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='25') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('exportar/Reportes_pap_grafico_3_v',$data);
		}else{
			header('Location: Principal_c');
		}
	}


	public function traer_datos()
	{	
		$i=0;
		$mes = $this->db->query("select id_mes,fecha_muestra FROM  datos group by id_mes order by id_mes")->result();
		foreach ($mes as  $valmes){

			$red_total = $this->db->query("select count(datos.codigo_renipres) as cantidad,fecha_muestra FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo INNER JOIN microred ON microred.id_microred = ipress.microred INNER JOIN red_salud ON red_salud.id_red = microred.red where id_mes=".$valmes->id_mes)->result();	
			foreach ($red_total as  $value_total) {
				$tot=$value_total->cantidad;
			}
			$d1 = new DateTime($valmes->fecha_muestra, new DateTimeZone('Europe/Rome'));
			$t1 = $d1->getTimestamp();
			$suma_s[$i][0]=$t1*1000;
			$suma_s[$i][1]=$tot*1;
			$i++;
		}
		echo json_encode($suma_s);
	}

	public function traer_datos2()
	{	
		$i=0;
		$mes = $this->db->query("select id_mesr FROM  datos where id_mesr!='0' group by id_mesr order by id_mesr")->result();
		foreach ($mes as  $valmes){
			$red_total = $this->db->query("select count(datos.codigo_renipres) as cantidad,fecha_muestra FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo INNER JOIN microred ON microred.id_microred = ipress.microred INNER JOIN red_salud ON red_salud.id_red = microred.red where id_mesr=".$valmes->id_mesr)->result();	
			foreach ($red_total as  $value_total) {
				$tot=$value_total->cantidad;
			}
			$fecha= $valmes->id_mesr;
			$d1 = new DateTime($fecha[0].$fecha[1].$fecha[2].$fecha[3].'-'.$fecha[4].$fecha[5].'-01 00:00:00', new DateTimeZone('Europe/Rome'));
			$t1 = $d1->getTimestamp();
			$suma_s[$i][0]=$t1*1000;
			$suma_s[$i][1]=$tot*1;
			$i++;
		}
		echo json_encode($suma_s);

	}

}