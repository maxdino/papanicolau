<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportar_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url","form");
		$this->load->model('Exportar_m');
		$this->load->model('Permisos_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['mes']= $this->Exportar_m->mostrar();
		$data['annio']= $this->Exportar_m->mostrar_annio();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='15') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('exportar/Exportar_v',$data);
		}else{
		header('Location: Principal_c');
	}
	}

	public function exportar_mes()
	{
		require_once APPPATH . 'libraries/Classes/PHPExcel.php';

		$objPHPExcel = new PHPExcel();	
		$objPHPExcel->getProperties()
		->setCreator("MDH")
		->setLastModifiedBy("Códigos de Programación")
		->setTitle("Excel en PHP")
		->setSubject("Documento de prueba")
		->setDescription("Sistema de Reportes del PAP")
		->setKeywords("excel phpexcel php")
		->setCategory("mes");
		//propiedades de la hoja
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		// Se combinan campos de A1:G1
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'RESULTADOS DE PAP DEL LABORATORIO REFERENCIAL SAN MARTIN');
		$objPHPExcel->getActiveSheet()->setCellValue('A4', 'ESTABLECIMIENTO');
		$objPHPExcel->getActiveSheet()->setCellValue('B4', 'CASOS EXAMINADOS');
		$objPHPExcel->getActiveSheet()->setCellValue('L4', 'AGUS');
		$objPHPExcel->getActiveSheet()->setCellValue('O4', 'ASCUS');
		$objPHPExcel->getActiveSheet()->setCellValue('R4', 'POSITIVOS');
		$objPHPExcel->getActiveSheet()->setCellValue('AA4', 'M INSATISFACCIÓN');
		$objPHPExcel->getActiveSheet()->setCellValue('AD4', 'POSITIVOS');
		$objPHPExcel->getActiveSheet()->setCellValue('AE4', 'NEGATIVOS');
		$objPHPExcel->getActiveSheet()->setCellValue('AF4', 'M. INSATISFACCIÓN');
		$objPHPExcel->getActiveSheet()->setCellValue('B5', 'TOTAL');
		$objPHPExcel->getActiveSheet()->setCellValue('C5', '1ERA VEZ');
		$objPHPExcel->getActiveSheet()->setCellValue('F5', 'CONTINUADOR');
		$objPHPExcel->getActiveSheet()->setCellValue('I5', 'NEGATIVOS');
		$objPHPExcel->getActiveSheet()->setCellValue('R5', 'L.I.E.B.G');
		$objPHPExcel->getActiveSheet()->setCellValue('U5', 'L.I.E.A.G');
		$objPHPExcel->getActiveSheet()->setCellValue('X5', 'CANCER');
		$objPHPExcel->getActiveSheet()->setCellValue('C6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('D6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('E6', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('F6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('G6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('H6', '+50');
		$objPHPExcel->getActiveSheet()->setCellValue('I6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('J6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('K6', '+50');
		$objPHPExcel->getActiveSheet()->setCellValue('L5', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('M5', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('N5', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('O5', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('P5', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('Q5', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('R6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('S6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('T6', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('U6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('V6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('W6', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('X6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('Y6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('Z6', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('AA5', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('AB5', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('AC5', '+ 50');
		$objPHPExcel->getActiveSheet()->setCellValue('A7', 'HOSP. -2 TARAPOTO');
		$objPHPExcel->getActiveSheet()->setCellValue('A8', 'RED SAN MARTIN');
		$objPHPExcel->getActiveSheet()->setCellValue('A9', 'PICOTA');
		$objPHPExcel->getActiveSheet()->setCellValue('A10', 'DORADO');
		$objPHPExcel->getActiveSheet()->setCellValue('A11', 'BELLAVISTA');
		$objPHPExcel->getActiveSheet()->setCellValue('A12', 'HUALLAGA');
		$objPHPExcel->getActiveSheet()->setCellValue('A13', 'MARISCAL CACERES');
		$objPHPExcel->getActiveSheet()->setCellValue('A14', 'TOCACHE');
		$objPHPExcel->getActiveSheet()->setCellValue('A15', 'RIOJA');
		$objPHPExcel->getActiveSheet()->setCellValue('A16', 'MOYOBAMBA');
		$objPHPExcel->getActiveSheet()->setCellValue('A17', 'LAMAS');
		$objPHPExcel->getActiveSheet()->setCellValue('A18', 'ESSALUD');
		$objPHPExcel->getActiveSheet()->setCellValue('A19', 'TOTAL');

		$reds = $this->db->query("select id_red FROM  red_salud")->result();
		$pos=7; 
		$fecha="";
		foreach ($reds as  $val) {

			$r = $this->db->query("select ipress.codigo FROM  ipress INNER JOIN microred ON microred.id_microred = ipress.microred INNER JOIN red_salud ON red_salud.id_red = microred.red where microred.red=".$val->id_red)->result();
			$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
			foreach ($r as  $value) {
				$ipress= (int)($value->codigo);
				
				$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$this->input->post("mes_seleccion")." and  codigo_renipres=".$ipress )->result();
				foreach ($nega1 as  $values) {	
					$i=	$values->cantidad +$i;
					if($fecha==""){
						$fecha= $values->fecha_muestra;
					}
				}
				$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress )->result();
				foreach ($nega2 as  $values) {	
					$i1=	$values->cantidad +$i1;
				}
				$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress )->result();
				foreach ($nega3 as  $values) {	
					$i2=	$values->cantidad +$i2;
				}
				$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$this->input->post("mes_seleccion")." and  codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
				foreach ($agus1 as  $values) {	
					$agus_c1=	$values->cantidad +$agus_c1;
				}
				$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
				foreach ($agus2 as  $values) {	
					$agus_c2=	$values->cantidad +$agus_c2;
				}
				$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
				foreach ($agus3 as  $values) {	
					$agus_c3=	$values->cantidad +$agus_c3;
				}
				$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
				foreach ($ascus1 as  $values) {	
					$ascus_c1=	$values->cantidad +$ascus_c1;
				}
				$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
				foreach ($ascus2 as  $values) {	
					$ascus_c2=	$values->cantidad +$ascus_c2;
				}
				$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("mes_seleccion")."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
				foreach ($ascus3 as  $values) {	
					$ascus_c3=	$values->cantidad +$ascus_c3;
				}
				$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("mes_seleccion")."  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
				foreach ($leigb1 as  $values) {	
					$leibg_c1=	$values->cantidad +$leibg_c1;
				}
				$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
				foreach ($leigb2 as  $values) {	
					$leibg_c2=	$values->cantidad +$leibg_c2;
				}
				$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
				foreach ($leigb3 as  $values) {	
					$leibg_c3=	$values->cantidad +$leibg_c3;
				}
				$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
				foreach ($leiga1 as  $values) {	
					$leiag_c1=	$values->cantidad +$leiag_c1;
				}
				$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
				foreach ($leiga2 as  $values) {	
					$leiag_c2=	$values->cantidad +$leiag_c2;
				}
				$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
				foreach ($leiga3 as  $values) {	
					$leiag_c3=	$values->cantidad +$leiag_c3;
				}
				$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
				foreach ($rechazo1 as  $values) {	
					$rechazo_c1=	$values->cantidad +$rechazo_c1;
				}
				$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
				foreach ($rechazo2 as  $values) {	
					$rechazo_c2=	$values->cantidad +$rechazo_c2;
				}
				$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$this->input->post("mes_seleccion")."  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
				foreach ($rechazo3 as  $values) {	
					$rechazo_c3=	$values->cantidad +$rechazo_c3;
				}

			}
			$res = array('7' => 7,'8' => 8,'9' => 17,'10' => 10,'11' => 9,'12' => 16,'13' => 15,'14' => 13,'15' => 12,'16' => 11,'17' => 14  );
			foreach ($res as $key => $value_val) {
				if($pos==$key){
					$sitio=	$value_val;
				}
			}

			$objPHPExcel->getActiveSheet()->setCellValue('I'.$sitio, $i);
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$sitio, $i1);
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$sitio, $i2);
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$sitio, $agus_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$sitio, $agus_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$sitio, $agus_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('O'.$sitio, $ascus_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('P'.$sitio, $ascus_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.$sitio, $ascus_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('R'.$sitio, $leibg_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('S'.$sitio, $leibg_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('T'.$sitio, $leibg_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('U'.$sitio, $leiag_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('V'.$sitio, $leiag_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('W'.$sitio, $leiag_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.$sitio, $rechazo_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.$sitio, $rechazo_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.$sitio, $rechazo_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio), '=SUM(L'.($sitio).':Z'.($sitio).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio), '=SUM(I'.($sitio).':K'.($sitio).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio), '=SUM(AA'.($sitio).':AC'.($sitio).')');

			$red_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo INNER JOIN microred ON microred.id_microred = ipress.microred 
				INNER JOIN red_salud ON red_salud.id_red = microred.red where id_mes=".$this->input->post("mes_seleccion")."  and microred.red=".$val->id_red)->result();	
			foreach ($red_total as  $value_total) {
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$sitio, $value_total->cantidad);	
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$sitio,'='.($value_total->cantidad).'*10/100');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$sitio,'='.($value_total->cantidad).'*15/100');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$sitio,'='.($value_total->cantidad).'*5/100');	
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$sitio,'='.($value_total->cantidad).'*35/100');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$sitio,'='.($value_total->cantidad).'*25/100');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$sitio,'='.($value_total->cantidad).'*10/100');
			}
			$pos++;
		}
		$nombre_mes ="";
		$mes = $fecha[5].$fecha[6];
		if ($mes=='01'||$mes=='1') {
			$nombre_mes = 'ENERO';
		}
		if ($mes=='02'||$mes=='2') {
			$nombre_mes = 'FEBRERO';
		}
		if ($mes=='03'||$mes=='3') {
			$nombre_mes	= 'MARZO';
		}
		if ($mes=='04'||$mes=='4') {
			$nombre_mes = 'ABRIL';
		}
		if ($mes=='05'||$mes=='5') {
			$nombre_mes = 'MAYO';
		}
		if ($mes=='06'||$mes=='6') {
			$nombre_mes = 'JUNIO';
		}
		if ($mes=='07'||$mes=='7') {
			$nombre_mes = 'JULIO';
		}
		if ($mes=='08'||$mes=='8') {
			$nombre_mes = 'AGOSTO';
		}
		if ($mes=='09'||$mes=='9') {
			$nombre_mes = 'SETIEMBRE';
		}
		if ($mes=='10') {
			$nombre_mes = 'OCTUBRE';
		}
		if ($mes=='11') {
			$nombre_mes = 'NOVIEMBRE';
		}
		if ($mes=='12') {
			$nombre_mes = 'DICIEMBRE';
		}

		$annio = $fecha[0].$fecha[1].$fecha[2].$fecha[3];
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'MES DE '.$nombre_mes.' '.$annio);
		$objPHPExcel->getActiveSheet()->setCellValue('B19', '=SUM(B7:B'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('C19', '=SUM(C7:C'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('D19', '=SUM(D7:D'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('E19', '=SUM(E7:E'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('F19', '=SUM(F7:F'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('G19', '=SUM(G7:G'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('H19', '=SUM(H7:H'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('I19', '=SUM(I7:I'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('J19', '=SUM(J7:J'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('K19', '=SUM(K7:K'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('L19', '=SUM(L7:L'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('M19', '=SUM(M7:M'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('N19', '=SUM(N7:N'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('O19', '=SUM(O7:O'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('P19', '=SUM(P7:P'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('Q19', '=SUM(Q7:Q'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('R19', '=SUM(R7:R'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('S19', '=SUM(S7:S'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('T19', '=SUM(T7:T'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('U19', '=SUM(U7:U'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('V19', '=SUM(V7:V'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('W19', '=SUM(W7:W'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('AA19', '=SUM(AA7:AA'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('AB19', '=SUM(AB7:AB'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('AC19', '=SUM(AC7:AC'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('AD19', '=SUM(AD7:AD'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('AE19', '=SUM(AE7:AE'.$pos.')');
		$objPHPExcel->getActiveSheet()->setCellValue('AF19', '=SUM(AF7:AF'.$pos.')');
		

		$objPHPExcel->getActiveSheet()->mergeCells('A1:AC1');
		$objPHPExcel->getActiveSheet()->mergeCells('A2:AC2');
		$objPHPExcel->getActiveSheet()->mergeCells('A4:A6');
		$objPHPExcel->getActiveSheet()->mergeCells('B4:K4');
		$objPHPExcel->getActiveSheet()->mergeCells('L4:N4');
		$objPHPExcel->getActiveSheet()->mergeCells('O4:Q4');
		$objPHPExcel->getActiveSheet()->mergeCells('R4:Z4');
		$objPHPExcel->getActiveSheet()->mergeCells('AA4:AC4');
		$objPHPExcel->getActiveSheet()->mergeCells('B5:B6');
		$objPHPExcel->getActiveSheet()->mergeCells('C5:E5');
		$objPHPExcel->getActiveSheet()->mergeCells('F5:H5');
		$objPHPExcel->getActiveSheet()->mergeCells('I5:K5');
		$objPHPExcel->getActiveSheet()->mergeCells('R5:T5');
		$objPHPExcel->getActiveSheet()->mergeCells('U5:W5');
		$objPHPExcel->getActiveSheet()->mergeCells('X5:Z5');
		$objPHPExcel->getActiveSheet()->mergeCells('L5:L6');
		$objPHPExcel->getActiveSheet()->mergeCells('M5:M6');
		$objPHPExcel->getActiveSheet()->mergeCells('N5:N6');
		$objPHPExcel->getActiveSheet()->mergeCells('O5:O6');
		$objPHPExcel->getActiveSheet()->mergeCells('P5:P6');
		$objPHPExcel->getActiveSheet()->mergeCells('Q5:Q6');
		$objPHPExcel->getActiveSheet()->mergeCells('AA5:AA6');
		$objPHPExcel->getActiveSheet()->mergeCells('AB5:AB6');
		$objPHPExcel->getActiveSheet()->mergeCells('AC5:AC6');
		$objPHPExcel->getActiveSheet()->mergeCells('AD4:AD6');
		$objPHPExcel->getActiveSheet()->mergeCells('AE4:AE6');
		$objPHPExcel->getActiveSheet()->mergeCells('AF4:AF6');
		$estiloTituloReporte = array(
			'font' => array(
				'name'      => 'Calibri',
				'bold'      => true,
				'italic'    => false,
				'strike'    => false,
				'size' =>13
			),
			'fill' => array(
				'type'  => PHPExcel_Style_Fill::FILL_SOLID
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_NONE
				)
			),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);
		$estiloTitulohorizontal = array(
			'font' => array(
				'name'  => 'calibri',
				'bold'  => false,
				'size' =>10,
				'color' => array(
					'rgb' => '000000
					'
				)
			),
			//fill = fondo de celda
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
			),
			'alignment' =>  array(
				'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				
			)
		);
		$estiloTitulovertical = array(
			'font' => array(
				'name'  => 'calibri',
				'bold'  => false,
				'size' => 10,
				'color' => array(
					'rgb' => '000000
					'
				)
			),
			//fill = fondo de celda
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
			),
			'alignment' =>  array(
				'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
				'rotation'   => 90,
			)
		);
		$numeros = array(
			'font' => array(
				'name'  => 'calibri',
				'bold'  => false,
				'size' => 11,
				'color' => array(
					'rgb' => '000000
					'
				)
			),
			//fill = fondo de celda
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				
			),
			'borders' => array(
				'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
			),

		);

		$objPHPExcel->getActiveSheet()->getStyle('A1:AC1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getStyle('A2:AC2')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
		$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(55);
		
		$objPHPExcel->getActiveSheet()->getStyle('A4:A6')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('B4:K4')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('L4:N4')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('O4:Q4')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('R4:Z4')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('AA4:AC4')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('C5:E5')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('F5:H5')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('I5:K5')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('R5:T5')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('U5:W5')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('X5:Z5')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle('B5:B6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('C6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('D6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('E6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('F6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('G6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('H6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('I6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('J6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('K6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('L5:L6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('M5:M6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('N5:N6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('O5:O6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('P5:P6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('Q5:Q6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('R6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('S6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('T6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('U6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('V6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('W6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('X6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('Y6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('Z6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AA5:AA6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AB5:AB6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AC5:AC6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AD4:AD6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AE4:AE6')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AF4:AF6')->applyFromArray($estiloTitulovertical);

		$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
		foreach ($datos_cant as  $value) {

			$objPHPExcel->getActiveSheet()->getStyle($value.'7')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'8')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'9')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'10')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'11')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'12')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'13')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'14')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'15')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'16')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'17')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'18')->applyFromArray($numeros);
			$objPHPExcel->getActiveSheet()->getStyle($value.'19')->applyFromArray($numeros);
			# code...
		}

		//formato XLSX
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="CONSOLIDADO '.$nombre_mes.' '.$annio.'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');

		//FORMATO XLS

		/*header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Excel.xls"');
		header('Cache-Control: max-age=0');
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');*/

	}

	public function exportar_annio()
	{

		require_once APPPATH . 'libraries/Classes/PHPExcel.php';

		$objPHPExcel = new PHPExcel();	
		$objPHPExcel->getProperties()
		->setCreator("MDH")
		->setLastModifiedBy("Códigos de Programación")
		->setTitle("Excel en PHP")
		->setSubject("Documento de prueba")
		->setDescription("Sistema de Reportes del PAP")
		->setKeywords("excel phpexcel php")
		->setCategory("Annio");
		//propiedades de la hoja
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		// Se combinan campos de A1:G1

		include('includes/variables.php');

		for ($mes=1; $mes <=13 ; $mes++) { 
			$pos_mes = array('1' => 1,'2' => 23,'3' => 45,'4' => 67,'5' => 89,'6' => 111,'7' => 133,'8' => 155,'9' => 177,'10' => 199 ,'11' => 221,'12' => 243 ,'13' => 265  );
			foreach ($pos_mes as $key => $value_mes) {
				if($mes==$key){
					$sitio=	$value_mes;
				}
			}
			if ($mes=='01'||$mes=='1') {
				$nombre_mes = 'ENERO';
			}
			if ($mes=='02'||$mes=='2') {
				$nombre_mes = 'FEBRERO';
			}
			if ($mes=='03'||$mes=='3') {
				$nombre_mes	= 'MARZO';
			}
			if ($mes=='04'||$mes=='4') {
				$nombre_mes = 'ABRIL';
			}
			if ($mes=='05'||$mes=='5') {
				$nombre_mes = 'MAYO';
			}
			if ($mes=='06'||$mes=='6') {
				$nombre_mes = 'JUNIO';
			}
			if ($mes=='07'||$mes=='7') {
				$nombre_mes = 'JULIO';
			}
			if ($mes=='08'||$mes=='8') {
				$nombre_mes = 'AGOSTO';
			}
			if ($mes=='09'||$mes=='9') {
				$nombre_mes = 'SETIEMBRE';
			}
			if ($mes=='10') {
				$nombre_mes = 'OCTUBRE';
			}
			if ($mes=='11') {
				$nombre_mes = 'NOVIEMBRE';
			}
			if ($mes=='12') {
				$nombre_mes = 'DICIEMBRE';
			}

			$objPHPExcel->getActiveSheet()->setCellValue('A'.$sitio, 'RESULTADOS DE PAP DEL LABORATORIO REFERENCIAL SAN MARTIN');
			if ($mes=='13') {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'MES DE ENERO - DICIEMBRE '.$this->input->post('annio_seleccion'));
			}else{
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'MES DE '.$nombre_mes.' '.$this->input->post('annio_seleccion'));	
			}
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+3), 'ESTABLECIMIENTO');
			$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+3), 'CASOS EXAMINADOS');
			$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+3), 'AGUS');
			$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+3), 'ASCUS');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+3), 'POSITIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+3), 'M INSATISFACCIÓN');
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+3), 'POSITIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+3), 'NEGATIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+3), 'M. INSATISFACCIÓN');
			$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+4), 'TOTAL');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+4), '1ERA VEZ');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+4), 'CONTINUADOR');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+4), 'NEGATIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+4), 'L.I.E.B.G');
			$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+4), 'L.I.E.A.G');
			$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+4), 'CANCER');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+4), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+4), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+4), '+50');
			$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+4), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+4), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+4), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+4), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+4), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+4), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+6), 'HOSP. -2 TARAPOTO');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+7), 'RED SAN MARTIN');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+8), 'PICOTA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+9), 'DORADO');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+10), 'BELLAVISTA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+11), 'HUALLAGA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+12), 'MARISCAL CACERES');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+13), 'TOCACHE');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+14), 'RIOJA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+15), 'MOYOBAMBA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+16), 'LAMAS');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+17), 'ESSALUD');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+18), 'TOTAL');
			if ($mes<='12') {
				$mostrar_mes=$this->db->query("select id_mes,MONTH(fecha_muestra) as mes from datos WHERE YEAR(fecha_muestra)=".$this->input->post('annio_seleccion')." GROUP BY id_mes")->result();
				foreach ($mostrar_mes as $values_general) {
					if ($mes==$values_general->mes) {
						$reds = $this->db->query("select id_red FROM  red_salud ")->result();
						$pos=7; 
						$fecha="";
						$cont_cell=$sitio;
						foreach ($reds as  $val) {

							$r = $this->db->query("select ipress.codigo FROM  ipress INNER JOIN microred ON microred.id_microred = ipress.microred INNER JOIN red_salud ON red_salud.id_red = microred.red where microred.red=".$val->id_red)->result();
							$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
							foreach ($r as  $value) {
								$ipress= (int)($value->codigo);

								$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$values_general->id_mes." and  codigo_renipres=".$ipress )->result();
								foreach ($nega1 as  $values) {	
									$i=	$values->cantidad +$i;
								}
								$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress )->result();
								foreach ($nega2 as  $values) {	
									$i1=	$values->cantidad +$i1;
								}
								$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress )->result();
								foreach ($nega3 as  $values) {	
									$i2=	$values->cantidad +$i2;
								}
								$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$values_general->id_mes." and  codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
								foreach ($agus1 as  $values) {	
									$agus_c1=	$values->cantidad +$agus_c1;
								}
								$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
								foreach ($agus2 as  $values) {	
									$agus_c2=	$values->cantidad +$agus_c2;
								}
								$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
								foreach ($agus3 as  $values) {	
									$agus_c3=	$values->cantidad +$agus_c3;
								}
								$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
								foreach ($ascus1 as  $values) {	
									$ascus_c1=	$values->cantidad +$ascus_c1;
								}
								$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
								foreach ($ascus2 as  $values) {	
									$ascus_c2=	$values->cantidad +$ascus_c2;
								}
								$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$values_general->id_mes."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
								foreach ($ascus3 as  $values) {	
									$ascus_c3=	$values->cantidad +$ascus_c3;
								}
								$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$values_general->id_mes."  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
								foreach ($leigb1 as  $values) {	
									$leibg_c1=	$values->cantidad +$leibg_c1;
								}
								$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
								foreach ($leigb2 as  $values) {	
									$leibg_c2=	$values->cantidad +$leibg_c2;
								}
								$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
								foreach ($leigb3 as  $values) {	
									$leibg_c3=	$values->cantidad +$leibg_c3;
								}
								$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
								foreach ($leiga1 as  $values) {	
									$leiag_c1=	$values->cantidad +$leiag_c1;
								}
								$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
								foreach ($leiga2 as  $values) {	
									$leiag_c2=	$values->cantidad +$leiag_c2;
								}
								$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
								foreach ($leiga3 as  $values) {	
									$leiag_c3=	$values->cantidad +$leiag_c3;
								}
								$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
								foreach ($rechazo1 as  $values) {	
									$rechazo_c1=	$values->cantidad +$rechazo_c1;
								}
								$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$values_general->id_mes." and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
								foreach ($rechazo2 as  $values) {	
									$rechazo_c2=	$values->cantidad +$rechazo_c2;
								}
								$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$values_general->id_mes."  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
								foreach ($rechazo3 as  $values) {	
									$rechazo_c3=	$values->cantidad +$rechazo_c3;
								}


							}
							$pos_annio = array('7' => 7,'8' => 8,'9' => 17,'10' => 10,'11' => 9,'12' => 16,'13' => 15,'14' => 13,'15' => 12,'16' => 11,'17' => 14  );
							foreach ($pos_annio as $annio_key => $val_pos) {
								if($cont_cell+7-$sitio==$annio_key){
									$sitio_annio=$sitio+$val_pos-1;
								}
							}	
							$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio_annio), $i);
							$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio_annio), $i1);
							$objPHPExcel->getActiveSheet()->setCellValue('K'.$sitio_annio, $i2);
							$objPHPExcel->getActiveSheet()->setCellValue('L'.$sitio_annio, $agus_c1);
							$objPHPExcel->getActiveSheet()->setCellValue('M'.$sitio_annio, $agus_c2);
							$objPHPExcel->getActiveSheet()->setCellValue('N'.$sitio_annio, $agus_c3);
							$objPHPExcel->getActiveSheet()->setCellValue('O'.$sitio_annio, $ascus_c1);
							$objPHPExcel->getActiveSheet()->setCellValue('P'.$sitio_annio, $ascus_c2);
							$objPHPExcel->getActiveSheet()->setCellValue('Q'.$sitio_annio, $ascus_c3);
							$objPHPExcel->getActiveSheet()->setCellValue('R'.$sitio_annio, $leibg_c1);
							$objPHPExcel->getActiveSheet()->setCellValue('S'.$sitio_annio, $leibg_c2);
							$objPHPExcel->getActiveSheet()->setCellValue('T'.$sitio_annio, $leibg_c3);
							$objPHPExcel->getActiveSheet()->setCellValue('U'.$sitio_annio, $leiag_c1);
							$objPHPExcel->getActiveSheet()->setCellValue('V'.$sitio_annio, $leiag_c2);
							$objPHPExcel->getActiveSheet()->setCellValue('W'.$sitio_annio, $leiag_c3);
							$objPHPExcel->getActiveSheet()->setCellValue('AA'.$sitio_annio, $rechazo_c1);
							$objPHPExcel->getActiveSheet()->setCellValue('AB'.$sitio_annio, $rechazo_c2);
							$objPHPExcel->getActiveSheet()->setCellValue('AC'.$sitio_annio, $rechazo_c3);
							$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio_annio), '=SUM(L'.($sitio_annio).':Z'.($sitio_annio).')');
							$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio_annio), '=SUM(I'.($sitio_annio).':K'.($sitio_annio).')');
							$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio_annio), '=SUM(AA'.($sitio_annio).':AC'.($sitio_annio).')');
							$red_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo INNER JOIN microred ON microred.id_microred = ipress.microred 
								INNER JOIN red_salud ON red_salud.id_red = microred.red where id_mes=".$values_general->id_mes."  and microred.red=".$val->id_red)->result();	
							foreach ($red_total as  $value_total) {
								$objPHPExcel->getActiveSheet()->setCellValue('B'.$sitio_annio, (int)($value_total->cantidad));	
								$objPHPExcel->getActiveSheet()->setCellValue('C'.$sitio_annio,'='.($value_total->cantidad).'*10/100');
								$objPHPExcel->getActiveSheet()->setCellValue('D'.$sitio_annio,'='.($value_total->cantidad).'*15/100');
								$objPHPExcel->getActiveSheet()->setCellValue('E'.$sitio_annio,'='.($value_total->cantidad).'*5/100');	
								$objPHPExcel->getActiveSheet()->setCellValue('F'.$sitio_annio,'='.($value_total->cantidad).'*35/100');
								$objPHPExcel->getActiveSheet()->setCellValue('G'.$sitio_annio,'='.($value_total->cantidad).'*25/100');
								$objPHPExcel->getActiveSheet()->setCellValue('H'.$sitio_annio,'='.($value_total->cantidad).'*10/100');

							}
							$cont_cell++;
						}

					}
					$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
				}

				include('includes/posicion.php');

			}//fin del if
			
			$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+18), '=SUM(B'.($sitio+6).':B'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+18), '=SUM(C'.($sitio+6).':C'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+18), '=SUM(D'.($sitio+6).':D'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+18), '=SUM(E'.($sitio+6).':E'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+18), '=SUM(F'.($sitio+6).':F'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+18), '=SUM(G'.($sitio+6).':G'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+18), '=SUM(H'.($sitio+6).':H'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+18), '=SUM(I'.($sitio+6).':I'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+18), '=SUM(J'.($sitio+6).':J'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+18), '=SUM(K'.($sitio+6).':K'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+18), '=SUM(L'.($sitio+6).':L'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+18), '=SUM(M'.($sitio+6).':M'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+18), '=SUM(N'.($sitio+6).':N'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+18), '=SUM(O'.($sitio+6).':O'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+18), '=SUM(P'.($sitio+6).':P'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+18), '=SUM(Q'.($sitio+6).':Q'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+18), '=SUM(R'.($sitio+6).':R'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+18), '=SUM(S'.($sitio+6).':S'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+18), '=SUM(T'.($sitio+6).':T'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+18), '=SUM(U'.($sitio+6).':U'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+18), '=SUM(V'.($sitio+6).':V'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+18), '=SUM(W'.($sitio+6).':W'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+18), '=SUM(AA'.($sitio+6).':AA'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+18), '=SUM(AB'.($sitio+6).':AB'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+18), '=SUM(AC'.($sitio+6).':AC'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+18), '=SUM(AD'.($sitio+6).':AD'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+18), '=SUM(AE'.($sitio+6).':AE'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+18), '=SUM(AF'.($sitio+6).':AF'.($sitio+17).')');

			$objPHPExcel->getActiveSheet()->mergeCells('A'.$sitio.':AC'.$sitio);
			$objPHPExcel->getActiveSheet()->mergeCells('A'.($sitio+1).':AC'.($sitio+1));
			$objPHPExcel->getActiveSheet()->mergeCells('A'.($sitio+3).':A'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('B'.($sitio+3).':K'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('L'.($sitio+3).':N'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('O'.($sitio+3).':Q'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('R'.($sitio+3).':Z'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('AA'.($sitio+3).':AC'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('B'.($sitio+4).':B'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('C'.($sitio+4).':E'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('F'.($sitio+4).':H'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('I'.($sitio+4).':K'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('R'.($sitio+4).':T'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('U'.($sitio+4).':W'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('X'.($sitio+4).':Z'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('L'.($sitio+4).':L'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('M'.($sitio+4).':M'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('N'.($sitio+4).':N'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('O'.($sitio+4).':O'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('P'.($sitio+4).':P'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('Q'.($sitio+4).':Q'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AA'.($sitio+4).':AA'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AB'.($sitio+4).':AB'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AC'.($sitio+4).':AC'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AD'.($sitio+3).':AD'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AE'.($sitio+3).':AE'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AF'.($sitio+3).':AF'.($sitio+5));
			$estiloTituloReporte = array(
				'font' => array(
					'name'      => 'Calibri',
					'bold'      => true,
					'italic'    => false,
					'strike'    => false,
					'size' =>13
				),
				'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_NONE
					)
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);
			$estiloTitulohorizontal = array(
				'font' => array(
					'name'  => 'calibri',
					'bold'  => false,
					'size' =>10,
					'color' => array(
						'rgb' => '000000
						'
					)
				),
			//fill = fondo de celda
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,

					
				),
				'borders' => array(
					'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,


				)
			);
			$estiloTitulovertical = array(
				'font' => array(
					'name'  => 'calibri',
					'bold'  => false,
					'size' => 10,
					'color' => array(
						'rgb' => '000000
						'
					)
				),
			//fill = fondo de celda
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,

				),
				'borders' => array(
					'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'rotation'   => 90,
				)
			);
			$numeros = array(
				'font' => array(
					'name'  => 'calibri',
					'bold'  => false,
					'size' => 11,
					'color' => array(
						'rgb' => '000000
						'
					)
				),

			//fill = fondo de celda
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,

				),
				'borders' => array(
					'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del b
				)

				),
				'numberformat' => array(

				),
			);
			$objPHPExcel->getActiveSheet()->getStyle('A'.($sitio).':AC'.($sitio))->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getStyle('A'.($sitio+1).':AC'.($sitio+1))->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getRowDimension($sitio+5)->setRowHeight(55);
			$objPHPExcel->getActiveSheet()->getStyle('A'.($sitio+3).':A'.($sitio+5))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('B'.($sitio+3).':K'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('L'.($sitio+3).':N'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('O'.($sitio+3).':Q'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('R'.($sitio+3).':Z'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('AA'.($sitio+3).':AC'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+4).':E'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+4).':H'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('I'.($sitio+4).':K'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('R'.($sitio+4).':T'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('U'.($sitio+4).':W'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('X'.($sitio+4).':Z'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('B'.($sitio+4).':B'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('D'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('E'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('G'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('H'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('I'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('J'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('K'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('L'.($sitio+4).':L'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('M'.($sitio+4).':M'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('N'.($sitio+4).':N'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('O'.($sitio+4).':O'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('P'.($sitio+4).':P'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('Q'.($sitio+4).':Q'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('R'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('S'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('T'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('U'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('V'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('W'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('X'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('Y'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('Z'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AA'.($sitio+4).':AA'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AB'.($sitio+4).':AB'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AC'.($sitio+4).':AC'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AD'.($sitio+3).':AD'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AE'.($sitio+3).':AE'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AF'.($sitio+3).':AF'.($sitio+5))->applyFromArray($estiloTitulovertical);

			$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
			foreach ($datos_cant as  $value) {

				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+6))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+7))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+8))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+9))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+10))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+11))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+12))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+13))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+14))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+15))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+16))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+17))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+18))->applyFromArray($numeros);
			# code...
			}

			if ($mes=='13') {
				include('includes/suma.php');

			}
		}
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="CONSOLIDADO '.$this->input->post('annio_seleccion').'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

	function validar_mes(){
		$mes = $this->Exportar_m->validar_mes($this->input->post("id"),$this->input->post("id_mes"));
		echo json_encode($mes);
	}

	function validar_annio(){
		$annio = $this->Exportar_m->validar_annio($this->input->post("id"));
		echo json_encode($annio);
	}


	function rango_mes(){

		require_once APPPATH . 'libraries/Classes/PHPExcel.php';

		$objPHPExcel = new PHPExcel();	
		$objPHPExcel->getProperties()
		->setCreator("MDH")
		->setLastModifiedBy("Códigos de Programación")
		->setTitle("Reporte de PAP Rango de meses")
		->setSubject("Documento de prueba")
		->setDescription("Sistema de Reportes del PAP")
		->setKeywords("excel phpexcel php")
		->setCategory("Rango_mes");
		//propiedades de la hoja
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		$cant=$this->input->post('mes_final')-$this->input->post('mes_inicial')+1;
		$mes_ini=$this->input->post('mes_inicial');
		$sitio=1;
		$mes_c=$this->input->post('mes_inicial');
		include('includes/variables.php');  

		for ($mes=1; $mes <=$cant+1 ; $mes++) { 

			if ($mes_ini=='01'||$mes_ini=='1') {
				$nombre_mes = 'ENERO';
			}
			if ($mes_ini=='02'||$mes_ini=='2') {
				$nombre_mes = 'FEBRERO';
			}
			if ($mes_ini=='03'||$mes_ini=='3') {
				$nombre_mes	= 'MARZO';
			}
			if ($mes_ini=='04'||$mes_ini=='4') {
				$nombre_mes = 'ABRIL';
			}
			if ($mes_ini=='05'||$mes_ini=='5') {
				$nombre_mes = 'MAYO';
			}
			if ($mes_ini=='06'||$mes_ini=='6') {
				$nombre_mes = 'JUNIO';
			}
			if ($mes_ini=='07'||$mes_ini=='7') {
				$nombre_mes = 'JULIO';
			}
			if ($mes_ini=='08'||$mes_ini=='8') {
				$nombre_mes = 'AGOSTO';
			}
			if ($mes_ini=='09'||$mes_ini=='9') {
				$nombre_mes = 'SETIEMBRE';
			}
			if ($mes_ini=='10') {
				$nombre_mes = 'OCTUBRE';
			}
			if ($mes_ini=='11') {
				$nombre_mes = 'NOVIEMBRE';
			}
			if ($mes_ini=='12') {
				$nombre_mes = 'DICIEMBRE';
			}
			if ($mes==1) {
				$nombre_ini=$nombre_mes;
			}
			if ($mes==$cant) {
				$nombre_fin=$nombre_mes;
			}
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$sitio, 'RESULTADOS DE PAP DEL LABORATORIO REFERENCIAL SAN MARTIN');
			if ($mes!=$cant+1) {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'MES DE '.$nombre_mes.' '.$this->input->post('annio_s'));
			}else{
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'MES DE '.$nombre_ini.' - '.$nombre_fin.' '.$this->input->post('annio_s'));	
			}
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+3), 'ESTABLECIMIENTO');
			$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+3), 'CASOS EXAMINADOS');
			$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+3), 'AGUS');
			$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+3), 'ASCUS');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+3), 'POSITIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+3), 'M INSATISFACCIÓN');
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+3), 'POSITIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+3), 'NEGATIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+3), 'M. INSATISFACCIÓN');
			$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+4), 'TOTAL');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+4), '1ERA VEZ');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+4), 'CONTINUADOR');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+4), 'NEGATIVOS');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+4), 'L.I.E.B.G');
			$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+4), 'L.I.E.A.G');
			$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+4), 'CANCER');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+4), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+4), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+4), '+50');
			$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+4), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+4), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+4), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+5), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+5), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+5), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+4), '15-29');
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+4), '30-49');
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+4), '+ 50');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+6), 'HOSP. -2 TARAPOTO');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+7), 'RED SAN MARTIN');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+8), 'PICOTA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+9), 'DORADO');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+10), 'BELLAVISTA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+11), 'HUALLAGA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+12), 'MARISCAL CACERES');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+13), 'TOCACHE');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+14), 'RIOJA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+15), 'MOYOBAMBA');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+16), 'LAMAS');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+17), 'ESSALUD');
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+18), 'TOTAL');

			if ($mes!=$cant+1) {

				$mes_s = $this->db->query("select id_mes FROM datos where YEAR(fecha_muestra)= ".$this->input->post('annio_s')." and MONTH(fecha_muestra)= ".$mes_ini." GROUP BY  id_mes")->row();	
				$reds = $this->db->query("select id_red FROM red_salud ")->result();
				$cont_cell=$sitio;
				foreach ($reds as  $val) {

					$r = $this->db->query("select ipress.codigo FROM  ipress INNER JOIN microred ON microred.id_microred = ipress.microred INNER JOIN red_salud ON red_salud.id_red = microred.red where microred.red=".$val->id_red)->result();
					$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
					foreach ($r as  $value) {
						$ipress= (int)($value->codigo);

						$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$mes_s->id_mes." and  codigo_renipres=".$ipress )->result();
						foreach ($nega1 as  $values) {	
							$i=	$values->cantidad +$i;
						}
						$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress )->result();
						foreach ($nega2 as  $values) {	
							$i1=	$values->cantidad +$i1;
						}
						$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress )->result();
						foreach ($nega3 as  $values) {	
							$i2=	$values->cantidad +$i2;
						}
						$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mes=".$mes_s->id_mes." and  codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
						foreach ($agus1 as  $values) {	
							$agus_c1=	$values->cantidad +$agus_c1;
						}
						$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
						foreach ($agus2 as  $values) {	
							$agus_c2=	$values->cantidad +$agus_c2;
						}
						$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
						foreach ($agus3 as  $values) {	
							$agus_c3=	$values->cantidad +$agus_c3;
						}
						$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
						foreach ($ascus1 as  $values) {	
							$ascus_c1=	$values->cantidad +$ascus_c1;
						}
						$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
						foreach ($ascus2 as  $values) {	
							$ascus_c2=	$values->cantidad +$ascus_c2;
						}
						$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$mes_s->id_mes."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
						foreach ($ascus3 as  $values) {	
							$ascus_c3=	$values->cantidad +$ascus_c3;
						}
						$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$mes_s->id_mes."  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
						foreach ($leigb1 as  $values) {	
							$leibg_c1=	$values->cantidad +$leibg_c1;
						}
						$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
						foreach ($leigb2 as  $values) {	
							$leibg_c2=	$values->cantidad +$leibg_c2;
						}
						$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
						foreach ($leigb3 as  $values) {	
							$leibg_c3=	$values->cantidad +$leibg_c3;
						}
						$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
						foreach ($leiga1 as  $values) {	
							$leiag_c1=	$values->cantidad +$leiag_c1;
						}
						$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
						foreach ($leiga2 as  $values) {	
							$leiag_c2=	$values->cantidad +$leiag_c2;
						}
						$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
						foreach ($leiga3 as  $values) {	
							$leiag_c3=	$values->cantidad +$leiag_c3;
						}
						$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
						foreach ($rechazo1 as  $values) {	
							$rechazo_c1=	$values->cantidad +$rechazo_c1;
						}
						$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mes=".$mes_s->id_mes." and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
						foreach ($rechazo2 as  $values) {	
							$rechazo_c2=	$values->cantidad +$rechazo_c2;
						}
						$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mes=".$mes_s->id_mes."  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
						foreach ($rechazo3 as  $values) {	
							$rechazo_c3=	$values->cantidad +$rechazo_c3;
						}

					} //fin for ipress

					$pos_annio = array('7' => 7,'8' => 8,'9' => 17,'10' => 10,'11' => 9,'12' => 16,'13' => 15,'14' => 13,'15' => 12,'16' => 11,'17' => 14  );
					foreach ($pos_annio as $annio_key => $val_pos) {
						if($cont_cell+7-$sitio==$annio_key){
							$sitio_annio=$sitio+$val_pos-1;
						}
					}	
					$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio_annio), $i);
					$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio_annio), $i1);
					$objPHPExcel->getActiveSheet()->setCellValue('K'.$sitio_annio, $i2);
					$objPHPExcel->getActiveSheet()->setCellValue('L'.$sitio_annio, $agus_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('M'.$sitio_annio, $agus_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('N'.$sitio_annio, $agus_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('O'.$sitio_annio, $ascus_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('P'.$sitio_annio, $ascus_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('Q'.$sitio_annio, $ascus_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('R'.$sitio_annio, $leibg_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('S'.$sitio_annio, $leibg_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('T'.$sitio_annio, $leibg_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('U'.$sitio_annio, $leiag_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('V'.$sitio_annio, $leiag_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('W'.$sitio_annio, $leiag_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('AA'.$sitio_annio, $rechazo_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('AB'.$sitio_annio, $rechazo_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('AC'.$sitio_annio, $rechazo_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio_annio), '=SUM(L'.($sitio_annio).':Z'.($sitio_annio).')');
					$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio_annio), '=SUM(I'.($sitio_annio).':K'.($sitio_annio).')');
					$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio_annio), '=SUM(AA'.($sitio_annio).':AC'.($sitio_annio).')');
					$red_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo INNER JOIN microred ON microred.id_microred = ipress.microred 
						INNER JOIN red_salud ON red_salud.id_red = microred.red where id_mes=".$mes_s->id_mes."  and microred.red=".$val->id_red)->result();	
					foreach ($red_total as  $value_total) {
						$objPHPExcel->getActiveSheet()->setCellValue('B'.$sitio_annio, (int)($value_total->cantidad));	
						$objPHPExcel->getActiveSheet()->setCellValue('C'.$sitio_annio,'='.($value_total->cantidad).'*10/100');
						$objPHPExcel->getActiveSheet()->setCellValue('D'.$sitio_annio,'='.($value_total->cantidad).'*15/100');
						$objPHPExcel->getActiveSheet()->setCellValue('E'.$sitio_annio,'='.($value_total->cantidad).'*5/100');	
						$objPHPExcel->getActiveSheet()->setCellValue('F'.$sitio_annio,'='.($value_total->cantidad).'*35/100');
						$objPHPExcel->getActiveSheet()->setCellValue('G'.$sitio_annio,'='.($value_total->cantidad).'*25/100');
						$objPHPExcel->getActiveSheet()->setCellValue('H'.$sitio_annio,'='.($value_total->cantidad).'*10/100');

					}
					$cont_cell++;		

			}//fin del for reds

			include('includes/posicion.php');

			}//fin del if

			$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+18), '=SUM(B'.($sitio+6).':B'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+18), '=SUM(C'.($sitio+6).':C'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+18), '=SUM(D'.($sitio+6).':D'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+18), '=SUM(E'.($sitio+6).':E'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+18), '=SUM(F'.($sitio+6).':F'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+18), '=SUM(G'.($sitio+6).':G'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+18), '=SUM(H'.($sitio+6).':H'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+18), '=SUM(I'.($sitio+6).':I'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+18), '=SUM(J'.($sitio+6).':J'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+18), '=SUM(K'.($sitio+6).':K'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+18), '=SUM(L'.($sitio+6).':L'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+18), '=SUM(M'.($sitio+6).':M'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+18), '=SUM(N'.($sitio+6).':N'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+18), '=SUM(O'.($sitio+6).':O'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+18), '=SUM(P'.($sitio+6).':P'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+18), '=SUM(Q'.($sitio+6).':Q'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+18), '=SUM(R'.($sitio+6).':R'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+18), '=SUM(S'.($sitio+6).':S'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+18), '=SUM(T'.($sitio+6).':T'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+18), '=SUM(U'.($sitio+6).':U'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+18), '=SUM(V'.($sitio+6).':V'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+18), '=SUM(W'.($sitio+6).':W'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+18), '=SUM(AA'.($sitio+6).':AA'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+18), '=SUM(AB'.($sitio+6).':AB'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+18), '=SUM(AC'.($sitio+6).':AC'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+18), '=SUM(AD'.($sitio+6).':AD'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+18), '=SUM(AE'.($sitio+6).':AE'.($sitio+17).')');
			$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+18), '=SUM(AF'.($sitio+6).':AF'.($sitio+17).')');
			
			$objPHPExcel->getActiveSheet()->mergeCells('A'.$sitio.':AC'.$sitio);
			$objPHPExcel->getActiveSheet()->mergeCells('A'.($sitio+1).':AC'.($sitio+1));
			$objPHPExcel->getActiveSheet()->mergeCells('A'.($sitio+3).':A'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('B'.($sitio+3).':K'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('L'.($sitio+3).':N'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('O'.($sitio+3).':Q'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('R'.($sitio+3).':Z'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('AA'.($sitio+3).':AC'.($sitio+3));
			$objPHPExcel->getActiveSheet()->mergeCells('B'.($sitio+4).':B'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('C'.($sitio+4).':E'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('F'.($sitio+4).':H'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('I'.($sitio+4).':K'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('R'.($sitio+4).':T'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('U'.($sitio+4).':W'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('X'.($sitio+4).':Z'.($sitio+4));
			$objPHPExcel->getActiveSheet()->mergeCells('L'.($sitio+4).':L'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('M'.($sitio+4).':M'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('N'.($sitio+4).':N'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('O'.($sitio+4).':O'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('P'.($sitio+4).':P'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('Q'.($sitio+4).':Q'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AA'.($sitio+4).':AA'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AB'.($sitio+4).':AB'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AC'.($sitio+4).':AC'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AD'.($sitio+3).':AD'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AE'.($sitio+3).':AE'.($sitio+5));
			$objPHPExcel->getActiveSheet()->mergeCells('AF'.($sitio+3).':AF'.($sitio+5));
			$estiloTituloReporte = array(
				'font' => array(
					'name'      => 'Calibri',
					'bold'      => true,
					'italic'    => false,
					'strike'    => false,
					'size' =>13
				),
				'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID
				),
				'borders' => array(
					'allborders' => array(
						'style' => PHPExcel_Style_Border::BORDER_NONE
					)
				),
				'alignment' => array(
					'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
				)
			);
			$estiloTitulohorizontal = array(
				'font' => array(
					'name'  => 'calibri',
					'bold'  => false,
					'size' =>10,
					'color' => array(
						'rgb' => '000000
						'
					)
				),
			//fill = fondo de celda
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,

					
				),
				'borders' => array(
					'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,


				)
			);
			$estiloTitulovertical = array(
				'font' => array(
					'name'  => 'calibri',
					'bold'  => false,
					'size' => 10,
					'color' => array(
						'rgb' => '000000
						'
					)
				),
			//fill = fondo de celda
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,

				),
				'borders' => array(
					'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
				)
				),
				'alignment' =>  array(
					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
					'rotation'   => 90,
				)
			);
			$numeros = array(
				'font' => array(
					'name'  => 'calibri',
					'bold'  => false,
					'size' => 11,
					'color' => array(
						'rgb' => '000000
						'
					)
				),

			//fill = fondo de celda
				'fill' => array(
					'type' => PHPExcel_Style_Fill::FILL_SOLID,

				),
				'borders' => array(
					'allborders' => array(
					'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del b
				)

				),
				'numberformat' => array(

				),
			);
			$objPHPExcel->getActiveSheet()->getStyle('A'.($sitio).':AC'.($sitio))->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getStyle('A'.($sitio+1).':AC'.($sitio+1))->applyFromArray($estiloTituloReporte);
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
			$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
			$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(5);
			$objPHPExcel->getActiveSheet()->getRowDimension($sitio+5)->setRowHeight(55);
			$objPHPExcel->getActiveSheet()->getStyle('A'.($sitio+3).':A'.($sitio+5))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('B'.($sitio+3).':K'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('L'.($sitio+3).':N'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('O'.($sitio+3).':Q'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('R'.($sitio+3).':Z'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('AA'.($sitio+3).':AC'.($sitio+3))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+4).':E'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+4).':H'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('I'.($sitio+4).':K'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('R'.($sitio+4).':T'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('U'.($sitio+4).':W'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('X'.($sitio+4).':Z'.($sitio+4))->applyFromArray($estiloTitulohorizontal);
			$objPHPExcel->getActiveSheet()->getStyle('B'.($sitio+4).':B'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('D'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('E'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('G'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('H'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('I'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('J'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('K'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('L'.($sitio+4).':L'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('M'.($sitio+4).':M'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('N'.($sitio+4).':N'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('O'.($sitio+4).':O'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('P'.($sitio+4).':P'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('Q'.($sitio+4).':Q'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('R'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('S'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('T'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('U'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('V'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('W'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('X'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('Y'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('Z'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AA'.($sitio+4).':AA'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AB'.($sitio+4).':AB'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AC'.($sitio+4).':AC'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AD'.($sitio+3).':AD'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AE'.($sitio+3).':AE'.($sitio+5))->applyFromArray($estiloTitulovertical);
			$objPHPExcel->getActiveSheet()->getStyle('AF'.($sitio+3).':AF'.($sitio+5))->applyFromArray($estiloTitulovertical);

			$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
			foreach ($datos_cant as  $value) {

				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+6))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+7))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+8))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+9))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+10))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+11))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+12))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+13))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+14))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+15))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+16))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+17))->applyFromArray($numeros);
				$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+18))->applyFromArray($numeros);
				

			}
			
			if ($mes==$cant+1) {
				include('includes/suma.php');
			}
			$sitio=$sitio+22;
			$mes_ini++;
		}//fin del for mes
		

		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="CONSOLIDADO '.$nombre_ini.' - '.$nombre_fin.' '.$this->input->post('annio_s').'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}

