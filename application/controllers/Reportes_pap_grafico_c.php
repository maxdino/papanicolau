<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_pap_grafico_c extends CI_Controller {

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
			if ($value->id_modulo=='24') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('exportar/Reportes_pap_grafico_v',$data);
		}else{
			header('Location: Principal_c');
		}
	}


	public function traer_datos()
	{
		$reds = $this->db->query("select id_red FROM  red_salud")->result();
		for ($i=0; $i <=18 ; $i++) { 
			$suma_s[0][$i]=0;
		}
		
		foreach ($reds as  $val) {

			$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
			$ipress= (int)($val->id_red);
			$red_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo INNER JOIN microred ON microred.id_microred = ipress.microred 
				INNER JOIN red_salud ON red_salud.id_red = microred.red where id_mes=".$this->input->post("id")."  and red_salud.id_red=".$val->id_red)->result();	
			foreach ($red_total as  $value_total) {
				$tot=$value_total->cantidad;
			}
			$suma_s[0][0]=$tot+$suma_s[0][0];
			$suma_s[1][0]='Total';
			$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$this->input->post("id")." and  red_salud.id_red=".$ipress )->result();
			foreach ($nega1 as  $values) {	
				$i=	$values->cantidad +$i;
			}
			$suma_s[0][1]=$i+$suma_s[0][1];
			$suma_s[1][1]='Negativo para lesiones epiteliales o malignidad 15 - 29';
			$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress )->result();
			foreach ($nega2 as  $values) {	
				$i1=	$values->cantidad +$i1;
			}
			$suma_s[0][2]=$i1+$suma_s[0][2];
			$suma_s[1][2]='Negativo para lesiones epiteliales o malignidad 30 - 49';
			$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red  where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress )->result();
			foreach ($nega3 as  $values) {	
				$i2=	$values->cantidad +$i2;
			}
			$suma_s[0][3]=$i2+$suma_s[0][3];
			$suma_s[1][3]='Negativo para lesiones epiteliales o malignidad + 50 ';
			$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red  where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$this->input->post("id")." and  red_salud.id_red=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus1 as  $values) {	
				$agus_c1=	$values->cantidad +$agus_c1;
			}
			$suma_s[0][4]=$agus_c1+$suma_s[0][4];
			$suma_s[1][4]='Agus 15 - 29';
			$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus2 as  $values) {	
				$agus_c2=	$values->cantidad +$agus_c2;
			}
			$suma_s[0][5]=$agus_c2+$suma_s[0][5];
			$suma_s[1][5]='Agus 30 - 49';
			$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("id")." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus3 as  $values) {	
				$agus_c3=	$values->cantidad +$agus_c3;
			}
			$suma_s[0][6]=$agus_c3+$suma_s[0][6];
			$suma_s[1][6]='Agus + 50';
			$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus1 as  $values) {	
				$ascus_c1=	$values->cantidad +$ascus_c1;
			}
			$suma_s[0][7]=$ascus_c1+$suma_s[0][7];
			$suma_s[1][7]='Ascus 15 - 29';
			$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos  inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus2 as  $values) {	
				$ascus_c2=	$values->cantidad +$ascus_c2;
			}
			$suma_s[0][8]=$ascus_c2+$suma_s[0][8];
			$suma_s[1][8]='Ascus 30 - 49';
			$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red  where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("id")."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus3 as  $values) {	
				$ascus_c3=	$values->cantidad +$ascus_c3;
			}
			$suma_s[0][9]=$ascus_c3+$suma_s[0][9];
			$suma_s[1][9]='Ascus + 50';
			$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("id")."  and red_salud.id_red=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb1 as  $values) {	
				$leibg_c1=	$values->cantidad +$leibg_c1;
			}
			$suma_s[0][10]=$leibg_c1+$suma_s[0][10];
			$suma_s[1][10]='leibg 15 - 29';
			$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red  where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb2 as  $values) {	
				$leibg_c2=	$values->cantidad +$leibg_c2;
			}
			$suma_s[0][11]=$leibg_c2+$suma_s[0][11];
			$suma_s[1][11]='leibg 30 - 49';
			$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red  where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb3 as  $values) {	
				$leibg_c3=	$values->cantidad +$leibg_c3;
			}
			$suma_s[0][12]=$leibg_c3+$suma_s[0][12];
			$suma_s[1][12]='leibg + 50';
			$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
			foreach ($leiga1 as  $values) {	
				$leiag_c1=	$values->cantidad +$leiag_c1;
			}
			$suma_s[0][13]=$leiag_c1+$suma_s[0][13];
			$suma_s[1][13]='leiag 15 - 29';
			$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos  inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
			foreach ($leiga2 as  $values) {	
				$leiag_c2=	$values->cantidad +$leiag_c2;
			}
			$suma_s[0][14]=$leiag_c2+$suma_s[0][14];
			$suma_s[1][14]='leiag 30 - 49';
			$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos  inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
			foreach ($leiga3 as  $values) {	
				$leiag_c3=	$values->cantidad +$leiag_c3;
			}
			$suma_s[0][15]=$leiag_c3+$suma_s[0][15];
			$suma_s[1][15]='leiag + 50';
			$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red  where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and fecha_rechazo!=  '' " )->result();
			foreach ($rechazo1 as  $values) {	
				$rechazo_c1=	$values->cantidad +$rechazo_c1;
			}
			$suma_s[0][16]=$rechazo_c1+$suma_s[0][16];
			$suma_s[1][16]='Rechazados 15 - 29';
			$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("id")." and red_salud.id_red=".$ipress." and fecha_rechazo!= '' " )->result();
			foreach ($rechazo2 as  $values) {	
				$rechazo_c2=	$values->cantidad +$rechazo_c2;
			}
			$suma_s[0][17]=$rechazo_c2+$suma_s[0][17];
			$suma_s[1][17]='Rechazados 30 - 49';
			$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos inner join ipress on ipress.codigo=datos.codigo_renipres INNER JOIN microred ON microred.id_microred = ipress.microred  INNER JOIN red_salud ON red_salud.id_red = microred.red where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("id")."  and red_salud.id_red=".$ipress." and fecha_rechazo!='' " )->result();
			foreach ($rechazo3 as  $values) {	
				$rechazo_c3=	$values->cantidad +$rechazo_c3;
			}
			$suma_s[0][18]=$rechazo_c3+$suma_s[0][18];
			$suma_s[1][18]='Rechazados + 50';

		}
		echo json_encode($suma_s);

	}

}