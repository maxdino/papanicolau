<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Exportar_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url","form");
		$this->load->model('Exportar_m');
		$this->load->library('form_validation');

	}


	public function index()
	{
		$data['mes']= $this->Exportar_m->mostrar();
		$data['annio']= $this->Exportar_m->mostrar_annio();
		$this->load->view('exportar/Exportar_v',$data);
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
		->setDescription("Documento generado con PHPExcel")
		->setKeywords("excel phpexcel php")
		->setCategory("Ejemplos");
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
		


	/*	$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Item');
		$objPHPExcel->getActiveSheet()->setCellValue('AB2', 'sGestante');
		$objPHPExcel->getActiveSheet()->setCellValue('AC2', 'Latitud');
		$objPHPExcel->getActiveSheet()->setCellValue('AD2', 'Longitud');
		$objPHPExcel->getActiveSheet()->setCellValue('AE2', 'sClasificacion');*/


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
		/*$objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AN2')->applyFromArray($estiloTitulovertical);
		$objPHPExcel->getActiveSheet()->getStyle('AO2')->applyFromArray($estiloTitulovertical);*/
// Agregar en celda A1 valor string
/*		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'PHPExcel');

// Agregar en celda A2 valor numerico
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 12345.6789);

// Agregar en celda A3 valor boleano
		$objPHPExcel->getActiveSheet()->setCellValue('A3', TRUE);

// Agregar a Celda A4 una formula
		$objPHPExcel->getActiveSheet()->setCellValue('A4', '=CONCATENATE(A1, " ", A2)');
*/
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
		->setDescription("Documento generado con PHPExcel")
		->setKeywords("excel phpexcel php")
		->setCategory("Ejemplos");
		//propiedades de la hoja
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		// Se combinan campos de A1:G1
		for ($mes=1; $mes <=12 ; $mes++) { 
			$pos_mes = array('1' => 1,'2' => 23,'3' => 45,'4' => 67,'5' => 89,'6' => 111,'7' => 133,'8' => 155,'9' => 177,'10' => 199 ,'11' => 221,'12' => 243  );
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
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'MES DE '.$nombre_mes.' '.$this->input->post('annio_seleccion'));
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
		->setDescription("Documento generado con PHPExcel")
		->setKeywords("excel phpexcel php")
		->setCategory("Rango_mes");
		//propiedades de la hoja
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');
		$cant=$this->input->post('mes_final')-$this->input->post('mes_inicial')+1;
		$mes_ini=$this->input->post('mes_inicial');
		$sitio=1;
		$mes_c=$this->input->post('mes_inicial');
		$s_hto1=array();$s_hto2=array();$s_hto3=array();$s_hto4=array();$s_hto5=array();$s_hto6=array();$s_hto7=array();$s_hto8=array();$s_hto9=array();$s_hto10=array();$s_hto11=array();$s_hto12=array();$s_hto13=array(); $s_pri1=array();$s_pri2=array();$s_pri3=array();$s_pri4=array();$s_pri5=array();$s_pri6=array();$s_pri7=array();$s_pri8=array();$s_pri9=array();$s_pri10=array();$s_pri11=array();$s_pri12=array();$s_pri13=array();$s_pri101=array();$s_pri102=array();$s_pri103=array();$s_pri104=array();$s_pri105=array();$s_pri106=array();$s_pri107=array();$s_pri108=array();$s_pri109=array();$s_pri110=array();$s_pri111=array();$s_pri112=array();$s_pri113=array();$s_pri201=array();$s_pri202=array();$s_pri203=array();$s_pri204=array();$s_pri205=array();$s_pri206=array();$s_pri207=array();$s_pri208=array();$s_pri209=array();$s_pri210=array();$s_pri211=array();$s_pri212=array();$s_pri213=array();$s_conse1=array();$s_conse2=array();$s_conse3=array();$s_conse4=array();$s_conse5=array();$s_conse6=array();$s_conse7=array();$s_conse8=array();$s_conse9=array();$s_conse10=array();$s_conse11=array();$s_conse12=array();$s_conse13=array();$s_conse101=array();$s_conse102=array();$s_conse103=array();$s_conse104=array();$s_conse105=array();$s_conse106=array();$s_conse107=array();$s_conse108=array();$s_conse109=array();$s_conse110=array();$s_conse111=array();$s_conse112=array();$s_conse113=array();$s_conse201=array();$s_conse202=array();$s_conse203=array();$s_conse204=array();$s_conse205=array();$s_conse206=array();$s_conse207=array();$s_conse208=array();$s_conse209=array();$s_conse210=array();$s_conse211=array();$s_conse212=array();$s_conse213=array(); $s_nega1=array();$s_nega2=array();$s_nega3=array();$s_nega4=array();$s_nega5=array();$s_nega6=array();$s_nega7=array();$s_nega8=array();$s_nega9=array();$s_nega10=array();$s_nega11=array();$s_nega12=array();$s_nega13=array();$s_nega101=array();$s_nega102=array();$s_nega103=array();$s_nega104=array();$s_nega105=array();$s_nega106=array();$s_nega107=array();$s_nega108=array();$s_nega109=array();$s_nega110=array();$s_nega111=array();$s_nega112=array();$s_nega113=array();$s_nega201=array();$s_nega202=array();$s_nega203=array();$s_nega204=array();$s_nega205=array();$s_nega206=array();$s_nega207=array();$s_nega208=array();$s_nega209=array();$s_nega210=array();$s_nega211=array();$s_nega212=array();$s_nega213=array();$s_agus1=array();$s_agus2=array();$s_agus3=array();$s_agus4=array();$s_agus5=array();$s_agus6=array();$s_agus7=array();$s_agus8=array();$s_agus9=array();$s_agus10=array();$s_agus11=array();$s_agus12=array();$s_agus13=array();$s_agus101=array();$s_agus102=array();$s_agus103=array();$s_agus104=array();$s_agus105=array();$s_agus106=array();$s_agus107=array();$s_agus108=array();$s_agus109=array();$s_agus110=array();$s_agus111=array();$s_agus112=array();$s_agus113=array();$s_agus201=array();$s_agus202=array();$s_agus203=array();$s_agus204=array();$s_agus205=array();$s_agus206=array();$s_agus207=array();$s_agus208=array();$s_agus209=array();$s_agus210=array();$s_agus211=array();$s_agus212=array();$s_agus213=array();$s_asc1=array();$s_asc2=array();$s_asc3=array();$s_asc4=array();$s_asc5=array();$s_asc6=array();$s_asc7=array();$s_asc8=array();$s_asc9=array();$s_asc10=array();$s_asc11=array();$s_asc12=array();$s_asc13=array();$s_asc101=array();$s_asc102=array();$s_asc103=array();$s_asc104=array();$s_asc105=array();$s_asc106=array();$s_asc107=array();$s_asc108=array();$s_asc109=array();$s_asc110=array();$s_asc111=array();$s_asc112=array();$s_asc113=array();$s_asc201=array();$s_asc202=array();$s_asc203=array();$s_asc204=array();$s_asc205=array();$s_asc206=array();$s_asc207=array();$s_asc208=array();$s_asc209=array();$s_asc210=array();$s_asc211=array();$s_asc212=array();$s_asc213=array();$s_leigb1=array();$s_leigb2=array();$s_leigb3=array();$s_leigb4=array();$s_leigb5=array();$s_leigb6=array();$s_leigb7=array();$s_leigb8=array();$s_leigb9=array();$s_leigb10=array();$s_leigb11=array();$s_leigb12=array();$s_leigb13=array();$s_leigb101=array();$s_leigb102=array();$s_leigb103=array();$s_leigb104=array();$s_leigb105=array();$s_leigb106=array();$s_leigb107=array();$s_leigb108=array();$s_leigb109=array();$s_leigb110=array();$s_leigb111=array();$s_leigb112=array();$s_leigb113=array();$s_leigb201=array();$s_leigb202=array();$s_leigb203=array();$s_leigb204=array();$s_leigb205=array();$s_leigb206=array();$s_leigb207=array();$s_leigb208=array();$s_leigb209=array();$s_leigb210=array();$s_leigb211=array();$s_leigb212=array();$s_leigb213=array();$s_leigba1=array();$s_leigba2=array();$s_leigba3=array();$s_leigba4=array();$s_leigba5=array();$s_leigba6=array();$s_leigba7=array();$s_leigba8=array();$s_leigba9=array();$s_leigba10=array();$s_leigba11=array();$s_leigba12=array();$s_leigba13=array();$s_leigba101=array();$s_leigba102=array();$s_leigba103=array();$s_leigba104=array();$s_leigba105=array();$s_leigba106=array();$s_leigba107=array();$s_leigba108=array();$s_leigba109=array();$s_leigba110=array();$s_leigba111=array();$s_leigba112=array();$s_leigba113=array();$s_leigba201=array();$s_leigba202=array();$s_leigba203=array();$s_leigba204=array();$s_leigba205=array();$s_leigba206=array();$s_leigba207=array();$s_leigba208=array();$s_leigba209=array();$s_leigba210=array();$s_leigba211=array();$s_leigba212=array();$s_leigba213=array();$s_cancer1=array();$s_cancer2=array();$s_cancer3=array();$s_cancer4=array();$s_cancer5=array();$s_cancer6=array();$s_cancer7=array();$s_cancer8=array();$s_cancer9=array();$s_cancer10=array();$s_cancer11=array();$s_cancer12=array();$s_cancer13=array();$s_cancer101=array();$s_cancer102=array();$s_cancer103=array();$s_cancer104=array();$s_cancer105=array();$s_cancer106=array();$s_cancer107=array();$s_cancer108=array();$s_cancer109=array();$s_cancer110=array();$s_cancer111=array();$s_cancer112=array();$s_cancer113=array();$s_cancer201=array();$s_cancer202=array();$s_cancer203=array();$s_cancer204=array();$s_cancer205=array();$s_cancer206=array();$s_cancer207=array();$s_cancer208=array();$s_cancer209=array();$s_cancer210=array();$s_cancer211=array();$s_cancer212=array();$s_cancer213=array();$s_recha1=array();$s_recha2=array();$s_recha3=array();$s_recha4=array();$s_recha5=array();$s_recha6=array();$s_recha7=array();$s_recha8=array();$s_recha9=array();$s_recha10=array();$s_recha11=array();$s_recha12=array();$s_recha13=array();$s_recha101=array();$s_recha102=array();$s_recha103=array();$s_recha104=array();$s_recha105=array();$s_recha106=array();$s_recha107=array();$s_recha108=array();$s_recha109=array();$s_recha110=array();$s_recha111=array();$s_recha112=array();$s_recha113=array();$s_recha201=array();$s_recha202=array();$s_recha203=array();$s_recha204=array();$s_recha205=array();$s_recha206=array();$s_recha207=array();$s_recha208=array();$s_recha209=array();$s_recha210=array();$s_recha211=array();$s_recha212=array();$s_recha213=array();$s_spos1=array();$s_spos2=array();$s_spos3=array();$s_spos4=array();$s_spos5=array();$s_spos6=array();$s_spos7=array();$s_spos8=array();$s_spos9=array();$s_spos10=array();$s_spos11=array();$s_spos12=array();$s_spos13=array();$s_sneg1=array();$s_sneg2=array();$s_sneg3=array();$s_sneg4=array();$s_sneg5=array();$s_sneg6=array();$s_sneg7=array();$s_sneg8=array();$s_sneg9=array();$s_sneg10=array();$s_sneg11=array();$s_sneg12=array();$s_sneg13=array();$s_srecha1=array();$s_srecha2=array();$s_srecha3=array();$s_srecha4=array();$s_srecha5=array();$s_srecha6=array();$s_srecha7=array();$s_srecha8=array();$s_srecha9=array();$s_srecha10=array();$s_srecha11=array();$s_srecha12=array();$s_srecha13=array();   

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

			array_push($s_hto1, 'B'.($sitio+6));
			array_push($s_hto2, 'B'.($sitio+7));
			array_push($s_hto3, 'B'.($sitio+8));
			array_push($s_hto4, 'B'.($sitio+9));
			array_push($s_hto5, 'B'.($sitio+10));
			array_push($s_hto6, 'B'.($sitio+11));
			array_push($s_hto7, 'B'.($sitio+12));
			array_push($s_hto8, 'B'.($sitio+13));
			array_push($s_hto9, 'B'.($sitio+14));
			array_push($s_hto10, 'B'.($sitio+15));
			array_push($s_hto11, 'B'.($sitio+16));
			array_push($s_hto12, 'B'.($sitio+17));
			array_push($s_hto13, 'B'.($sitio+18));
			array_push($s_pri1, 'C'.($sitio+6));
			array_push($s_pri2, 'C'.($sitio+7));
			array_push($s_pri3, 'C'.($sitio+8));
			array_push($s_pri4, 'C'.($sitio+9));
			array_push($s_pri5, 'C'.($sitio+10));
			array_push($s_pri6, 'C'.($sitio+11));
			array_push($s_pri7, 'C'.($sitio+12));
			array_push($s_pri8, 'C'.($sitio+13));
			array_push($s_pri9, 'C'.($sitio+14));
			array_push($s_pri10, 'C'.($sitio+15));
			array_push($s_pri11, 'C'.($sitio+16));
			array_push($s_pri12, 'C'.($sitio+17));
			array_push($s_pri13, 'C'.($sitio+18));
			array_push($s_pri101, 'D'.($sitio+6));
			array_push($s_pri102, 'D'.($sitio+7));
			array_push($s_pri103, 'D'.($sitio+8));
			array_push($s_pri104, 'D'.($sitio+9));
			array_push($s_pri105, 'D'.($sitio+10));
			array_push($s_pri106, 'D'.($sitio+11));
			array_push($s_pri107, 'D'.($sitio+12));
			array_push($s_pri108, 'D'.($sitio+13));
			array_push($s_pri109, 'D'.($sitio+14));
			array_push($s_pri110, 'D'.($sitio+15));
			array_push($s_pri111, 'D'.($sitio+16));
			array_push($s_pri112, 'D'.($sitio+17));
			array_push($s_pri113, 'D'.($sitio+18));
			array_push($s_pri201, 'E'.($sitio+6));
			array_push($s_pri202, 'E'.($sitio+7));
			array_push($s_pri203, 'E'.($sitio+8));
			array_push($s_pri204, 'E'.($sitio+9));
			array_push($s_pri205, 'E'.($sitio+10));
			array_push($s_pri206, 'E'.($sitio+11));
			array_push($s_pri207, 'E'.($sitio+12));
			array_push($s_pri208, 'E'.($sitio+13));
			array_push($s_pri209, 'E'.($sitio+14));
			array_push($s_pri210, 'E'.($sitio+15));
			array_push($s_pri211, 'E'.($sitio+16));
			array_push($s_pri212, 'E'.($sitio+17));
			array_push($s_pri213, 'E'.($sitio+18));
			array_push($s_conse1, 'F'.($sitio+6));
			array_push($s_conse2, 'F'.($sitio+7));
			array_push($s_conse3, 'F'.($sitio+8));
			array_push($s_conse4, 'F'.($sitio+9));
			array_push($s_conse5, 'F'.($sitio+10));
			array_push($s_conse6, 'F'.($sitio+11));
			array_push($s_conse7, 'F'.($sitio+12));
			array_push($s_conse8, 'F'.($sitio+13));
			array_push($s_conse9, 'F'.($sitio+14));
			array_push($s_conse10, 'F'.($sitio+15));
			array_push($s_conse11, 'F'.($sitio+16));
			array_push($s_conse12, 'F'.($sitio+17));
			array_push($s_conse13, 'F'.($sitio+18));
			array_push($s_conse101, 'G'.($sitio+6));
			array_push($s_conse102, 'G'.($sitio+7));
			array_push($s_conse103, 'G'.($sitio+8));
			array_push($s_conse104, 'G'.($sitio+9));
			array_push($s_conse105, 'G'.($sitio+10));
			array_push($s_conse106, 'G'.($sitio+11));
			array_push($s_conse107, 'G'.($sitio+12));
			array_push($s_conse108, 'G'.($sitio+13));
			array_push($s_conse109, 'G'.($sitio+14));
			array_push($s_conse110, 'G'.($sitio+15));
			array_push($s_conse111, 'G'.($sitio+16));
			array_push($s_conse112, 'G'.($sitio+17));
			array_push($s_conse113, 'G'.($sitio+18));
			array_push($s_conse201, 'H'.($sitio+6));
			array_push($s_conse202, 'H'.($sitio+7));
			array_push($s_conse203, 'H'.($sitio+8));
			array_push($s_conse204, 'H'.($sitio+9));
			array_push($s_conse205, 'H'.($sitio+10));
			array_push($s_conse206, 'H'.($sitio+11));
			array_push($s_conse207, 'H'.($sitio+12));
			array_push($s_conse208, 'H'.($sitio+13));
			array_push($s_conse209, 'H'.($sitio+14));
			array_push($s_conse210, 'H'.($sitio+15));
			array_push($s_conse211, 'H'.($sitio+16));
			array_push($s_conse212, 'H'.($sitio+17));
			array_push($s_conse213, 'H'.($sitio+18));
			array_push($s_nega1, 'I'.($sitio+6));
			array_push($s_nega2, 'I'.($sitio+7));
			array_push($s_nega3, 'I'.($sitio+8));
			array_push($s_nega4, 'I'.($sitio+9));
			array_push($s_nega5, 'I'.($sitio+10));
			array_push($s_nega6, 'I'.($sitio+11));
			array_push($s_nega7, 'I'.($sitio+12));
			array_push($s_nega8, 'I'.($sitio+13));
			array_push($s_nega9, 'I'.($sitio+14));
			array_push($s_nega10, 'I'.($sitio+15));
			array_push($s_nega11, 'I'.($sitio+16));
			array_push($s_nega12, 'I'.($sitio+17));
			array_push($s_nega13, 'I'.($sitio+18));
			array_push($s_nega101, 'J'.($sitio+6));
			array_push($s_nega102, 'J'.($sitio+7));
			array_push($s_nega103, 'J'.($sitio+8));
			array_push($s_nega104, 'J'.($sitio+9));
			array_push($s_nega105, 'J'.($sitio+10));
			array_push($s_nega106, 'J'.($sitio+11));
			array_push($s_nega107, 'J'.($sitio+12));
			array_push($s_nega108, 'J'.($sitio+13));
			array_push($s_nega109, 'J'.($sitio+14));
			array_push($s_nega110, 'J'.($sitio+15));
			array_push($s_nega111, 'J'.($sitio+16));
			array_push($s_nega112, 'J'.($sitio+17));
			array_push($s_nega113, 'J'.($sitio+18));
			array_push($s_nega201, 'K'.($sitio+6));
			array_push($s_nega202, 'K'.($sitio+7));
			array_push($s_nega203, 'K'.($sitio+8));
			array_push($s_nega204, 'K'.($sitio+9));
			array_push($s_nega205, 'K'.($sitio+10));
			array_push($s_nega206, 'K'.($sitio+11));
			array_push($s_nega207, 'K'.($sitio+12));
			array_push($s_nega208, 'K'.($sitio+13));
			array_push($s_nega209, 'K'.($sitio+14));
			array_push($s_nega210, 'K'.($sitio+15));
			array_push($s_nega211, 'K'.($sitio+16));
			array_push($s_nega212, 'K'.($sitio+17));
			array_push($s_nega213, 'K'.($sitio+18));
			array_push($s_agus1, 'L'.($sitio+6));
			array_push($s_agus2, 'L'.($sitio+7));
			array_push($s_agus3, 'L'.($sitio+8));
			array_push($s_agus4, 'L'.($sitio+9));
			array_push($s_agus5, 'L'.($sitio+10));
			array_push($s_agus6, 'L'.($sitio+11));
			array_push($s_agus7, 'L'.($sitio+12));
			array_push($s_agus8, 'L'.($sitio+13));
			array_push($s_agus9, 'L'.($sitio+14));
			array_push($s_agus10, 'L'.($sitio+15));
			array_push($s_agus11, 'L'.($sitio+16));
			array_push($s_agus12, 'L'.($sitio+17));
			array_push($s_agus13, 'L'.($sitio+18));
			array_push($s_agus101, 'M'.($sitio+6));
			array_push($s_agus102, 'M'.($sitio+7));
			array_push($s_agus103, 'M'.($sitio+8));
			array_push($s_agus104, 'M'.($sitio+9));
			array_push($s_agus105, 'M'.($sitio+10));
			array_push($s_agus106, 'M'.($sitio+11));
			array_push($s_agus107, 'M'.($sitio+12));
			array_push($s_agus108, 'M'.($sitio+13));
			array_push($s_agus109, 'M'.($sitio+14));
			array_push($s_agus110, 'M'.($sitio+15));
			array_push($s_agus111, 'M'.($sitio+16));
			array_push($s_agus112, 'M'.($sitio+17));
			array_push($s_agus113, 'M'.($sitio+18));
			array_push($s_agus201, 'N'.($sitio+6));
			array_push($s_agus202, 'N'.($sitio+7));
			array_push($s_agus203, 'N'.($sitio+8));
			array_push($s_agus204, 'N'.($sitio+9));
			array_push($s_agus205, 'N'.($sitio+10));
			array_push($s_agus206, 'N'.($sitio+11));
			array_push($s_agus207, 'N'.($sitio+12));
			array_push($s_agus208, 'N'.($sitio+13));
			array_push($s_agus209, 'N'.($sitio+14));
			array_push($s_agus210, 'N'.($sitio+15));
			array_push($s_agus211, 'N'.($sitio+16));
			array_push($s_agus212, 'N'.($sitio+17));
			array_push($s_agus213, 'N'.($sitio+18));
			array_push($s_asc1, 'O'.($sitio+6));
			array_push($s_asc2, 'O'.($sitio+7));
			array_push($s_asc3, 'O'.($sitio+8));
			array_push($s_asc4, 'O'.($sitio+9));
			array_push($s_asc5, 'O'.($sitio+10));
			array_push($s_asc6, 'O'.($sitio+11));
			array_push($s_asc7, 'O'.($sitio+12));
			array_push($s_asc8, 'O'.($sitio+13));
			array_push($s_asc9, 'O'.($sitio+14));
			array_push($s_asc10, 'O'.($sitio+15));
			array_push($s_asc11, 'O'.($sitio+16));
			array_push($s_asc12, 'O'.($sitio+17));
			array_push($s_asc13, 'O'.($sitio+18));
			array_push($s_asc101, 'P'.($sitio+6));
			array_push($s_asc102, 'P'.($sitio+7));
			array_push($s_asc103, 'P'.($sitio+8));
			array_push($s_asc104, 'P'.($sitio+9));
			array_push($s_asc105, 'P'.($sitio+10));
			array_push($s_asc106, 'P'.($sitio+11));
			array_push($s_asc107, 'P'.($sitio+12));
			array_push($s_asc108, 'P'.($sitio+13));
			array_push($s_asc109, 'P'.($sitio+14));
			array_push($s_asc110, 'P'.($sitio+15));
			array_push($s_asc111, 'P'.($sitio+16));
			array_push($s_asc112, 'P'.($sitio+17));
			array_push($s_asc113, 'P'.($sitio+18));
			array_push($s_asc201, 'Q'.($sitio+6));
			array_push($s_asc202, 'Q'.($sitio+7));
			array_push($s_asc203, 'Q'.($sitio+8));
			array_push($s_asc204, 'Q'.($sitio+9));
			array_push($s_asc205, 'Q'.($sitio+10));
			array_push($s_asc206, 'Q'.($sitio+11));
			array_push($s_asc207, 'Q'.($sitio+12));
			array_push($s_asc208, 'Q'.($sitio+13));
			array_push($s_asc209, 'Q'.($sitio+14));
			array_push($s_asc210, 'Q'.($sitio+15));
			array_push($s_asc211, 'Q'.($sitio+16));
			array_push($s_asc212, 'Q'.($sitio+17));
			array_push($s_asc213, 'Q'.($sitio+18));
			array_push($s_leigb1, 'R'.($sitio+6));
			array_push($s_leigb2, 'R'.($sitio+7));
			array_push($s_leigb3, 'R'.($sitio+8));
			array_push($s_leigb4, 'R'.($sitio+9));
			array_push($s_leigb5, 'R'.($sitio+10));
			array_push($s_leigb6, 'R'.($sitio+11));
			array_push($s_leigb7, 'R'.($sitio+12));
			array_push($s_leigb8, 'R'.($sitio+13));
			array_push($s_leigb9, 'R'.($sitio+14));
			array_push($s_leigb10, 'R'.($sitio+15));
			array_push($s_leigb11, 'R'.($sitio+16));
			array_push($s_leigb12, 'R'.($sitio+17));
			array_push($s_leigb13, 'R'.($sitio+18));
			array_push($s_leigb101, 'S'.($sitio+6));
			array_push($s_leigb102, 'S'.($sitio+7));
			array_push($s_leigb103, 'S'.($sitio+8));
			array_push($s_leigb104, 'S'.($sitio+9));
			array_push($s_leigb105, 'S'.($sitio+10));
			array_push($s_leigb106, 'S'.($sitio+11));
			array_push($s_leigb107, 'S'.($sitio+12));
			array_push($s_leigb108, 'S'.($sitio+13));
			array_push($s_leigb109, 'S'.($sitio+14));
			array_push($s_leigb110, 'S'.($sitio+15));
			array_push($s_leigb111, 'S'.($sitio+16));
			array_push($s_leigb112, 'S'.($sitio+17));
			array_push($s_leigb113, 'S'.($sitio+18));
			array_push($s_leigb201, 'T'.($sitio+6));
			array_push($s_leigb202, 'T'.($sitio+7));
			array_push($s_leigb203, 'T'.($sitio+8));
			array_push($s_leigb204, 'T'.($sitio+9));
			array_push($s_leigb205, 'T'.($sitio+10));
			array_push($s_leigb206, 'T'.($sitio+11));
			array_push($s_leigb207, 'T'.($sitio+12));
			array_push($s_leigb208, 'T'.($sitio+13));
			array_push($s_leigb209, 'T'.($sitio+14));
			array_push($s_leigb210, 'T'.($sitio+15));
			array_push($s_leigb211, 'T'.($sitio+16));
			array_push($s_leigb212, 'T'.($sitio+17));
			array_push($s_leigb213, 'T'.($sitio+18));
			array_push($s_leigba1, 'U'.($sitio+6));
			array_push($s_leigba2, 'U'.($sitio+7));
			array_push($s_leigba3, 'U'.($sitio+8));
			array_push($s_leigba4, 'U'.($sitio+9));
			array_push($s_leigba5, 'U'.($sitio+10));
			array_push($s_leigba6, 'U'.($sitio+11));
			array_push($s_leigba7, 'U'.($sitio+12));
			array_push($s_leigba8, 'U'.($sitio+13));
			array_push($s_leigba9, 'U'.($sitio+14));
			array_push($s_leigba10, 'U'.($sitio+15));
			array_push($s_leigba11, 'U'.($sitio+16));
			array_push($s_leigba12, 'U'.($sitio+17));
			array_push($s_leigba13, 'U'.($sitio+18));
			array_push($s_leigba101, 'V'.($sitio+6));
			array_push($s_leigba102, 'V'.($sitio+7));
			array_push($s_leigba103, 'V'.($sitio+8));
			array_push($s_leigba104, 'V'.($sitio+9));
			array_push($s_leigba105, 'V'.($sitio+10));
			array_push($s_leigba106, 'V'.($sitio+11));
			array_push($s_leigba107, 'V'.($sitio+12));
			array_push($s_leigba108, 'V'.($sitio+13));
			array_push($s_leigba109, 'V'.($sitio+14));
			array_push($s_leigba110, 'V'.($sitio+15));
			array_push($s_leigba111, 'V'.($sitio+16));
			array_push($s_leigba112, 'V'.($sitio+17));
			array_push($s_leigba113, 'V'.($sitio+18));
			array_push($s_leigba201, 'W'.($sitio+6));
			array_push($s_leigba202, 'W'.($sitio+7));
			array_push($s_leigba203, 'W'.($sitio+8));
			array_push($s_leigba204, 'W'.($sitio+9));
			array_push($s_leigba205, 'W'.($sitio+10));
			array_push($s_leigba206, 'W'.($sitio+11));
			array_push($s_leigba207, 'W'.($sitio+12));
			array_push($s_leigba208, 'W'.($sitio+13));
			array_push($s_leigba209, 'W'.($sitio+14));
			array_push($s_leigba210, 'W'.($sitio+15));
			array_push($s_leigba211, 'W'.($sitio+16));
			array_push($s_leigba212, 'W'.($sitio+17));
			array_push($s_leigba213, 'W'.($sitio+18));
			array_push($s_cancer1, 'X'.($sitio+6));
			array_push($s_cancer2, 'X'.($sitio+7));
			array_push($s_cancer3, 'X'.($sitio+8));
			array_push($s_cancer4, 'X'.($sitio+9));
			array_push($s_cancer5, 'X'.($sitio+10));
			array_push($s_cancer6, 'X'.($sitio+11));
			array_push($s_cancer7, 'X'.($sitio+12));
			array_push($s_cancer8, 'X'.($sitio+13));
			array_push($s_cancer9, 'X'.($sitio+14));
			array_push($s_cancer10, 'X'.($sitio+15));
			array_push($s_cancer11, 'X'.($sitio+16));
			array_push($s_cancer12, 'X'.($sitio+17));
			array_push($s_cancer13, 'X'.($sitio+18));
			array_push($s_cancer101, 'Y'.($sitio+6));
			array_push($s_cancer102, 'Y'.($sitio+7));
			array_push($s_cancer103, 'Y'.($sitio+8));
			array_push($s_cancer104, 'Y'.($sitio+9));
			array_push($s_cancer105, 'Y'.($sitio+10));
			array_push($s_cancer106, 'Y'.($sitio+11));
			array_push($s_cancer107, 'Y'.($sitio+12));
			array_push($s_cancer108, 'Y'.($sitio+13));
			array_push($s_cancer109, 'Y'.($sitio+14));
			array_push($s_cancer110, 'Y'.($sitio+15));
			array_push($s_cancer111, 'Y'.($sitio+16));
			array_push($s_cancer112, 'Y'.($sitio+17));
			array_push($s_cancer113, 'Y'.($sitio+18));
			array_push($s_cancer201, 'Z'.($sitio+6));
			array_push($s_cancer202, 'Z'.($sitio+7));
			array_push($s_cancer203, 'Z'.($sitio+8));
			array_push($s_cancer204, 'Z'.($sitio+9));
			array_push($s_cancer205, 'Z'.($sitio+10));
			array_push($s_cancer206, 'Z'.($sitio+11));
			array_push($s_cancer207, 'Z'.($sitio+12));
			array_push($s_cancer208, 'Z'.($sitio+13));
			array_push($s_cancer209, 'Z'.($sitio+14));
			array_push($s_cancer210, 'Z'.($sitio+15));
			array_push($s_cancer211, 'Z'.($sitio+16));
			array_push($s_cancer212, 'Z'.($sitio+17));
			array_push($s_cancer213, 'Z'.($sitio+18));
			array_push($s_recha1, 'AA'.($sitio+6));
			array_push($s_recha2, 'AA'.($sitio+7));
			array_push($s_recha3, 'AA'.($sitio+8));
			array_push($s_recha4, 'AA'.($sitio+9));
			array_push($s_recha5, 'AA'.($sitio+10));
			array_push($s_recha6, 'AA'.($sitio+11));
			array_push($s_recha7, 'AA'.($sitio+12));
			array_push($s_recha8, 'AA'.($sitio+13));
			array_push($s_recha9, 'AA'.($sitio+14));
			array_push($s_recha10, 'AA'.($sitio+15));
			array_push($s_recha11, 'AA'.($sitio+16));
			array_push($s_recha12, 'AA'.($sitio+17));
			array_push($s_recha13, 'AA'.($sitio+18));
			array_push($s_recha101, 'AB'.($sitio+6));
			array_push($s_recha102, 'AB'.($sitio+7));
			array_push($s_recha103, 'AB'.($sitio+8));
			array_push($s_recha104, 'AB'.($sitio+9));
			array_push($s_recha105, 'AB'.($sitio+10));
			array_push($s_recha106, 'AB'.($sitio+11));
			array_push($s_recha107, 'AB'.($sitio+12));
			array_push($s_recha108, 'AB'.($sitio+13));
			array_push($s_recha109, 'AB'.($sitio+14));
			array_push($s_recha110, 'AB'.($sitio+15));
			array_push($s_recha111, 'AB'.($sitio+16));
			array_push($s_recha112, 'AB'.($sitio+17));
			array_push($s_recha113, 'AB'.($sitio+18));
			array_push($s_recha201, 'AC'.($sitio+6));
			array_push($s_recha202, 'AC'.($sitio+7));
			array_push($s_recha203, 'AC'.($sitio+8));
			array_push($s_recha204, 'AC'.($sitio+9));
			array_push($s_recha205, 'AC'.($sitio+10));
			array_push($s_recha206, 'AC'.($sitio+11));
			array_push($s_recha207, 'AC'.($sitio+12));
			array_push($s_recha208, 'AC'.($sitio+13));
			array_push($s_recha209, 'AC'.($sitio+14));
			array_push($s_recha210, 'AC'.($sitio+15));
			array_push($s_recha211, 'AC'.($sitio+16));
			array_push($s_recha212, 'AC'.($sitio+17));
			array_push($s_recha213, 'AC'.($sitio+18));
			array_push($s_spos1, 'AD'.($sitio+6));
			array_push($s_spos2, 'AD'.($sitio+7));
			array_push($s_spos3, 'AD'.($sitio+8));
			array_push($s_spos4, 'AD'.($sitio+9));
			array_push($s_spos5, 'AD'.($sitio+10));
			array_push($s_spos6, 'AD'.($sitio+11));
			array_push($s_spos7, 'AD'.($sitio+12));
			array_push($s_spos8, 'AD'.($sitio+13));
			array_push($s_spos9, 'AD'.($sitio+14));
			array_push($s_spos10, 'AD'.($sitio+15));
			array_push($s_spos11, 'AD'.($sitio+16));
			array_push($s_spos12, 'AD'.($sitio+17));
			array_push($s_spos13, 'AD'.($sitio+18));
			array_push($s_sneg1, 'AE'.($sitio+6));
			array_push($s_sneg2, 'AE'.($sitio+7));
			array_push($s_sneg3, 'AE'.($sitio+8));
			array_push($s_sneg4, 'AE'.($sitio+9));
			array_push($s_sneg5, 'AE'.($sitio+10));
			array_push($s_sneg6, 'AE'.($sitio+11));
			array_push($s_sneg7, 'AE'.($sitio+12));
			array_push($s_sneg8, 'AE'.($sitio+13));
			array_push($s_sneg9, 'AE'.($sitio+14));
			array_push($s_sneg10, 'AE'.($sitio+15));
			array_push($s_sneg11, 'AE'.($sitio+16));
			array_push($s_sneg12, 'AE'.($sitio+17));
			array_push($s_sneg13, 'AE'.($sitio+18));
			array_push($s_srecha1, 'AF'.($sitio+6));
			array_push($s_srecha2, 'AF'.($sitio+7));
			array_push($s_srecha3, 'AF'.($sitio+8));
			array_push($s_srecha4, 'AF'.($sitio+9));
			array_push($s_srecha5, 'AF'.($sitio+10));
			array_push($s_srecha6, 'AF'.($sitio+11));
			array_push($s_srecha7, 'AF'.($sitio+12));
			array_push($s_srecha8, 'AF'.($sitio+13));
			array_push($s_srecha9, 'AF'.($sitio+14));
			array_push($s_srecha10, 'AF'.($sitio+15));
			array_push($s_srecha11, 'AF'.($sitio+16));
			array_push($s_srecha12, 'AF'.($sitio+17));
			array_push($s_srecha13, 'AF'.($sitio+18));

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
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+6) ,'=SUM('.implode(",", $s_hto1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+7) ,'=SUM('.implode(",", $s_hto2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+8) ,'=SUM('.implode(",", $s_hto3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+9) ,'=SUM('.implode(",", $s_hto4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+10) ,'=SUM('.implode(",", $s_hto5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+11) ,'=SUM('.implode(",", $s_hto6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+12) ,'=SUM('.implode(",", $s_hto7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+13) ,'=SUM('.implode(",", $s_hto8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+14) ,'=SUM('.implode(",", $s_hto9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+15) ,'=SUM('.implode(",", $s_hto10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+16) ,'=SUM('.implode(",", $s_hto11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+17) ,'=SUM('.implode(",", $s_hto12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+18) ,'=SUM('.implode(",", $s_hto13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+6) ,'=SUM('.implode(",", $s_pri1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+7) ,'=SUM('.implode(",", $s_pri2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+8) ,'=SUM('.implode(",", $s_pri3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+9) ,'=SUM('.implode(",", $s_pri4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+10) ,'=SUM('.implode(",", $s_pri5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+11) ,'=SUM('.implode(",", $s_pri6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+12) ,'=SUM('.implode(",", $s_pri7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+13) ,'=SUM('.implode(",", $s_pri8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+14) ,'=SUM('.implode(",", $s_pri9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+15) ,'=SUM('.implode(",", $s_pri10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+16) ,'=SUM('.implode(",", $s_pri11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+17) ,'=SUM('.implode(",", $s_pri12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+18) ,'=SUM('.implode(",", $s_pri13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+6) ,'=SUM('.implode(",", $s_pri101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+7) ,'=SUM('.implode(",", $s_pri102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+8) ,'=SUM('.implode(",", $s_pri103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+9) ,'=SUM('.implode(",", $s_pri104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+10) ,'=SUM('.implode(",", $s_pri105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+11) ,'=SUM('.implode(",", $s_pri106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+12) ,'=SUM('.implode(",", $s_pri107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+13) ,'=SUM('.implode(",", $s_pri108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+14) ,'=SUM('.implode(",", $s_pri109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+15) ,'=SUM('.implode(",", $s_pri110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+16) ,'=SUM('.implode(",", $s_pri111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+17) ,'=SUM('.implode(",", $s_pri112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+18) ,'=SUM('.implode(",", $s_pri113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+6) ,'=SUM('.implode(",", $s_pri201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+7) ,'=SUM('.implode(",", $s_pri202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+8) ,'=SUM('.implode(",", $s_pri203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+9) ,'=SUM('.implode(",", $s_pri204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+10) ,'=SUM('.implode(",", $s_pri205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+11) ,'=SUM('.implode(",", $s_pri206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+12) ,'=SUM('.implode(",", $s_pri207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+13) ,'=SUM('.implode(",", $s_pri208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+14) ,'=SUM('.implode(",", $s_pri209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+15) ,'=SUM('.implode(",", $s_pri210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+16) ,'=SUM('.implode(",", $s_pri211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+17) ,'=SUM('.implode(",", $s_pri212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+18) ,'=SUM('.implode(",", $s_pri213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+6) ,'=SUM('.implode(",", $s_conse1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+7) ,'=SUM('.implode(",", $s_conse2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+8) ,'=SUM('.implode(",", $s_conse3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+9) ,'=SUM('.implode(",", $s_conse4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+10) ,'=SUM('.implode(",", $s_conse5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+11) ,'=SUM('.implode(",", $s_conse6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+12) ,'=SUM('.implode(",", $s_conse7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+13) ,'=SUM('.implode(",", $s_conse8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+14) ,'=SUM('.implode(",", $s_conse9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+15) ,'=SUM('.implode(",", $s_conse10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+16) ,'=SUM('.implode(",", $s_conse11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+17) ,'=SUM('.implode(",", $s_conse12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+18) ,'=SUM('.implode(",", $s_conse13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+6) ,'=SUM('.implode(",", $s_conse101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+7) ,'=SUM('.implode(",", $s_conse102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+8) ,'=SUM('.implode(",", $s_conse103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+9) ,'=SUM('.implode(",", $s_conse104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+10) ,'=SUM('.implode(",", $s_conse105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+11) ,'=SUM('.implode(",", $s_conse106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+12) ,'=SUM('.implode(",", $s_conse107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+13) ,'=SUM('.implode(",", $s_conse108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+14) ,'=SUM('.implode(",", $s_conse109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+15) ,'=SUM('.implode(",", $s_conse110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+16) ,'=SUM('.implode(",", $s_conse111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+17) ,'=SUM('.implode(",", $s_conse112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+18) ,'=SUM('.implode(",", $s_conse113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+6) ,'=SUM('.implode(",", $s_conse201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+7) ,'=SUM('.implode(",", $s_conse202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+8) ,'=SUM('.implode(",", $s_conse203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+9) ,'=SUM('.implode(",", $s_conse204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+10) ,'=SUM('.implode(",", $s_conse205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+11) ,'=SUM('.implode(",", $s_conse206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+12) ,'=SUM('.implode(",", $s_conse207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+13) ,'=SUM('.implode(",", $s_conse208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+14) ,'=SUM('.implode(",", $s_conse209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+15) ,'=SUM('.implode(",", $s_conse210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+16) ,'=SUM('.implode(",", $s_conse211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+17) ,'=SUM('.implode(",", $s_conse212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+18) ,'=SUM('.implode(",", $s_conse213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+6) ,'=SUM('.implode(",", $s_nega1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+7) ,'=SUM('.implode(",", $s_nega2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+8) ,'=SUM('.implode(",", $s_nega3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+9) ,'=SUM('.implode(",", $s_nega4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+10) ,'=SUM('.implode(",", $s_nega5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+11) ,'=SUM('.implode(",", $s_nega6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+12) ,'=SUM('.implode(",", $s_nega7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+13) ,'=SUM('.implode(",", $s_nega8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+14) ,'=SUM('.implode(",", $s_nega9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+15) ,'=SUM('.implode(",", $s_nega10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+16) ,'=SUM('.implode(",", $s_nega11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+17) ,'=SUM('.implode(",", $s_nega12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+18) ,'=SUM('.implode(",", $s_nega13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+6) ,'=SUM('.implode(",", $s_nega101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+7) ,'=SUM('.implode(",", $s_nega102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+8) ,'=SUM('.implode(",", $s_nega103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+9) ,'=SUM('.implode(",", $s_nega104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+10) ,'=SUM('.implode(",", $s_nega105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+11) ,'=SUM('.implode(",", $s_nega106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+12) ,'=SUM('.implode(",", $s_nega107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+13) ,'=SUM('.implode(",", $s_nega108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+14) ,'=SUM('.implode(",", $s_nega109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+15) ,'=SUM('.implode(",", $s_nega110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+16) ,'=SUM('.implode(",", $s_nega111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+17) ,'=SUM('.implode(",", $s_nega112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+18) ,'=SUM('.implode(",", $s_nega113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+6) ,'=SUM('.implode(",", $s_nega201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+7) ,'=SUM('.implode(",", $s_nega202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+8) ,'=SUM('.implode(",", $s_nega203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+9) ,'=SUM('.implode(",", $s_nega204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+10) ,'=SUM('.implode(",", $s_nega205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+11) ,'=SUM('.implode(",", $s_nega206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+12) ,'=SUM('.implode(",", $s_nega207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+13) ,'=SUM('.implode(",", $s_nega208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+14) ,'=SUM('.implode(",", $s_nega209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+15) ,'=SUM('.implode(",", $s_nega210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+16) ,'=SUM('.implode(",", $s_nega211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+17) ,'=SUM('.implode(",", $s_nega212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+18) ,'=SUM('.implode(",", $s_nega213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+6) ,'=SUM('.implode(",", $s_agus1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+7) ,'=SUM('.implode(",", $s_agus2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+8) ,'=SUM('.implode(",", $s_agus3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+9) ,'=SUM('.implode(",", $s_agus4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+10) ,'=SUM('.implode(",", $s_agus5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+11) ,'=SUM('.implode(",", $s_agus6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+12) ,'=SUM('.implode(",", $s_agus7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+13) ,'=SUM('.implode(",", $s_agus8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+14) ,'=SUM('.implode(",", $s_agus9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+15) ,'=SUM('.implode(",", $s_agus10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+16) ,'=SUM('.implode(",", $s_agus11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+17) ,'=SUM('.implode(",", $s_agus12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+18) ,'=SUM('.implode(",", $s_agus13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+6) ,'=SUM('.implode(",", $s_agus101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+7) ,'=SUM('.implode(",", $s_agus102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+8) ,'=SUM('.implode(",", $s_agus103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+9) ,'=SUM('.implode(",", $s_agus104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+10) ,'=SUM('.implode(",", $s_agus105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+11) ,'=SUM('.implode(",", $s_agus106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+12) ,'=SUM('.implode(",", $s_agus107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+13) ,'=SUM('.implode(",", $s_agus108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+14) ,'=SUM('.implode(",", $s_agus109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+15) ,'=SUM('.implode(",", $s_agus110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+16) ,'=SUM('.implode(",", $s_agus111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+17) ,'=SUM('.implode(",", $s_agus112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+18) ,'=SUM('.implode(",", $s_agus113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+6) ,'=SUM('.implode(",", $s_agus201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+7) ,'=SUM('.implode(",", $s_agus202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+8) ,'=SUM('.implode(",", $s_agus203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+9) ,'=SUM('.implode(",", $s_agus204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+10) ,'=SUM('.implode(",", $s_agus205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+11) ,'=SUM('.implode(",", $s_agus206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+12) ,'=SUM('.implode(",", $s_agus207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+13) ,'=SUM('.implode(",", $s_agus208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+14) ,'=SUM('.implode(",", $s_agus209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+15) ,'=SUM('.implode(",", $s_agus210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+16) ,'=SUM('.implode(",", $s_agus211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+17) ,'=SUM('.implode(",", $s_agus212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+18) ,'=SUM('.implode(",", $s_agus213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+6) ,'=SUM('.implode(",", $s_asc1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+7) ,'=SUM('.implode(",", $s_asc2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+8) ,'=SUM('.implode(",", $s_asc3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+9) ,'=SUM('.implode(",", $s_asc4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+10) ,'=SUM('.implode(",", $s_asc5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+11) ,'=SUM('.implode(",", $s_asc6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+12) ,'=SUM('.implode(",", $s_asc7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+13) ,'=SUM('.implode(",", $s_asc8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+14) ,'=SUM('.implode(",", $s_asc9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+15) ,'=SUM('.implode(",", $s_asc10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+16) ,'=SUM('.implode(",", $s_asc11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+17) ,'=SUM('.implode(",", $s_asc12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+18) ,'=SUM('.implode(",", $s_asc13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+6) ,'=SUM('.implode(",", $s_asc101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+7) ,'=SUM('.implode(",", $s_asc102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+8) ,'=SUM('.implode(",", $s_asc103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+9) ,'=SUM('.implode(",", $s_asc104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+10) ,'=SUM('.implode(",", $s_asc105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+11) ,'=SUM('.implode(",", $s_asc106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+12) ,'=SUM('.implode(",", $s_asc107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+13) ,'=SUM('.implode(",", $s_asc108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+14) ,'=SUM('.implode(",", $s_asc109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+15) ,'=SUM('.implode(",", $s_asc110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+16) ,'=SUM('.implode(",", $s_asc111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+17) ,'=SUM('.implode(",", $s_asc112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+18) ,'=SUM('.implode(",", $s_asc113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+6) ,'=SUM('.implode(",", $s_asc201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+7) ,'=SUM('.implode(",", $s_asc202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+8) ,'=SUM('.implode(",", $s_asc203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+9) ,'=SUM('.implode(",", $s_asc204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+10) ,'=SUM('.implode(",", $s_asc205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+11) ,'=SUM('.implode(",", $s_asc206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+12) ,'=SUM('.implode(",", $s_asc207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+13) ,'=SUM('.implode(",", $s_asc208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+14) ,'=SUM('.implode(",", $s_asc209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+15) ,'=SUM('.implode(",", $s_asc210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+16) ,'=SUM('.implode(",", $s_asc211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+17) ,'=SUM('.implode(",", $s_asc212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+18) ,'=SUM('.implode(",", $s_asc213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+6) ,'=SUM('.implode(",", $s_leigb1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+7) ,'=SUM('.implode(",", $s_leigb2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+8) ,'=SUM('.implode(",", $s_leigb3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+9) ,'=SUM('.implode(",", $s_leigb4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+10) ,'=SUM('.implode(",", $s_leigb5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+11) ,'=SUM('.implode(",", $s_leigb6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+12) ,'=SUM('.implode(",", $s_leigb7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+13) ,'=SUM('.implode(",", $s_leigb8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+14) ,'=SUM('.implode(",", $s_leigb9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+15) ,'=SUM('.implode(",", $s_leigb10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+16) ,'=SUM('.implode(",", $s_leigb11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+17) ,'=SUM('.implode(",", $s_leigb12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+18) ,'=SUM('.implode(",", $s_leigb13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+6) ,'=SUM('.implode(",", $s_leigb101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+7) ,'=SUM('.implode(",", $s_leigb102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+8) ,'=SUM('.implode(",", $s_leigb103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+9) ,'=SUM('.implode(",", $s_leigb104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+10) ,'=SUM('.implode(",", $s_leigb105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+11) ,'=SUM('.implode(",", $s_leigb106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+12) ,'=SUM('.implode(",", $s_leigb107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+13) ,'=SUM('.implode(",", $s_leigb108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+14) ,'=SUM('.implode(",", $s_leigb109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+15) ,'=SUM('.implode(",", $s_leigb110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+16) ,'=SUM('.implode(",", $s_leigb111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+17) ,'=SUM('.implode(",", $s_leigb112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+18) ,'=SUM('.implode(",", $s_leigb113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+6) ,'=SUM('.implode(",", $s_leigb201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+7) ,'=SUM('.implode(",", $s_leigb202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+8) ,'=SUM('.implode(",", $s_leigb203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+9) ,'=SUM('.implode(",", $s_leigb204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+10) ,'=SUM('.implode(",", $s_leigb205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+11) ,'=SUM('.implode(",", $s_leigb206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+12) ,'=SUM('.implode(",", $s_leigb207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+13) ,'=SUM('.implode(",", $s_leigb208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+14) ,'=SUM('.implode(",", $s_leigb209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+15) ,'=SUM('.implode(",", $s_leigb210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+16) ,'=SUM('.implode(",", $s_leigb211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+17) ,'=SUM('.implode(",", $s_leigb212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+18) ,'=SUM('.implode(",", $s_leigb213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+6) ,'=SUM('.implode(",", $s_leigba1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+7) ,'=SUM('.implode(",", $s_leigba2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+8) ,'=SUM('.implode(",", $s_leigba3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+9) ,'=SUM('.implode(",", $s_leigba4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+10) ,'=SUM('.implode(",", $s_leigba5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+11) ,'=SUM('.implode(",", $s_leigba6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+12) ,'=SUM('.implode(",", $s_leigba7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+13) ,'=SUM('.implode(",", $s_leigba8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+14) ,'=SUM('.implode(",", $s_leigba9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+15) ,'=SUM('.implode(",", $s_leigba10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+16) ,'=SUM('.implode(",", $s_leigba11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+17) ,'=SUM('.implode(",", $s_leigba12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+18) ,'=SUM('.implode(",", $s_leigba13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+6) ,'=SUM('.implode(",", $s_leigba101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+7) ,'=SUM('.implode(",", $s_leigba102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+8) ,'=SUM('.implode(",", $s_leigba103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+9) ,'=SUM('.implode(",", $s_leigba104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+10) ,'=SUM('.implode(",", $s_leigba105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+11) ,'=SUM('.implode(",", $s_leigba106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+12) ,'=SUM('.implode(",", $s_leigba107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+13) ,'=SUM('.implode(",", $s_leigba108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+14) ,'=SUM('.implode(",", $s_leigba109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+15) ,'=SUM('.implode(",", $s_leigba110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+16) ,'=SUM('.implode(",", $s_leigba111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+17) ,'=SUM('.implode(",", $s_leigba112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+18) ,'=SUM('.implode(",", $s_leigba113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+6) ,'=SUM('.implode(",", $s_leigba201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+7) ,'=SUM('.implode(",", $s_leigba202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+8) ,'=SUM('.implode(",", $s_leigba203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+9) ,'=SUM('.implode(",", $s_leigba204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+10) ,'=SUM('.implode(",", $s_leigba205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+11) ,'=SUM('.implode(",", $s_leigba206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+12) ,'=SUM('.implode(",", $s_leigba207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+13) ,'=SUM('.implode(",", $s_leigba208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+14) ,'=SUM('.implode(",", $s_leigba209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+15) ,'=SUM('.implode(",", $s_leigba210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+16) ,'=SUM('.implode(",", $s_leigba211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+17) ,'=SUM('.implode(",", $s_leigba212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+18) ,'=SUM('.implode(",", $s_leigba213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+6) ,'=SUM('.implode(",", $s_cancer1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+7) ,'=SUM('.implode(",", $s_cancer2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+8) ,'=SUM('.implode(",", $s_cancer3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+9) ,'=SUM('.implode(",", $s_cancer4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+10) ,'=SUM('.implode(",", $s_cancer5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+11) ,'=SUM('.implode(",", $s_cancer6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+12) ,'=SUM('.implode(",", $s_cancer7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+13) ,'=SUM('.implode(",", $s_cancer8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+14) ,'=SUM('.implode(",", $s_cancer9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+15) ,'=SUM('.implode(",", $s_cancer10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+16) ,'=SUM('.implode(",", $s_cancer11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+17) ,'=SUM('.implode(",", $s_cancer12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('X'.($sitio+18) ,'=SUM('.implode(",", $s_cancer13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+6) ,'=SUM('.implode(",", $s_cancer101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+7) ,'=SUM('.implode(",", $s_cancer102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+8) ,'=SUM('.implode(",", $s_cancer103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+9) ,'=SUM('.implode(",", $s_cancer104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+10) ,'=SUM('.implode(",", $s_cancer105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+11) ,'=SUM('.implode(",", $s_cancer106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+12) ,'=SUM('.implode(",", $s_cancer107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+13) ,'=SUM('.implode(",", $s_cancer108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+14) ,'=SUM('.implode(",", $s_cancer109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+15) ,'=SUM('.implode(",", $s_cancer110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+16) ,'=SUM('.implode(",", $s_cancer111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+17) ,'=SUM('.implode(",", $s_cancer112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Y'.($sitio+18) ,'=SUM('.implode(",", $s_cancer113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+6) ,'=SUM('.implode(",", $s_cancer201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+7) ,'=SUM('.implode(",", $s_cancer202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+8) ,'=SUM('.implode(",", $s_cancer203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+9) ,'=SUM('.implode(",", $s_cancer204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+10) ,'=SUM('.implode(",", $s_cancer205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+11) ,'=SUM('.implode(",", $s_cancer206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+12) ,'=SUM('.implode(",", $s_cancer207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+13) ,'=SUM('.implode(",", $s_cancer208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+14) ,'=SUM('.implode(",", $s_cancer209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+15) ,'=SUM('.implode(",", $s_cancer210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+16) ,'=SUM('.implode(",", $s_cancer211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+17) ,'=SUM('.implode(",", $s_cancer212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Z'.($sitio+18) ,'=SUM('.implode(",", $s_cancer213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+6) ,'=SUM('.implode(",", $s_recha1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+7) ,'=SUM('.implode(",", $s_recha2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+8) ,'=SUM('.implode(",", $s_recha3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+9) ,'=SUM('.implode(",", $s_recha4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+10) ,'=SUM('.implode(",", $s_recha5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+11) ,'=SUM('.implode(",", $s_recha6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+12) ,'=SUM('.implode(",", $s_recha7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+13) ,'=SUM('.implode(",", $s_recha8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+14) ,'=SUM('.implode(",", $s_recha9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+15) ,'=SUM('.implode(",", $s_recha10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+16) ,'=SUM('.implode(",", $s_recha11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+17) ,'=SUM('.implode(",", $s_recha12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+18) ,'=SUM('.implode(",", $s_recha13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+6) ,'=SUM('.implode(",", $s_recha101).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+7) ,'=SUM('.implode(",", $s_recha102).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+8) ,'=SUM('.implode(",", $s_recha103).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+9) ,'=SUM('.implode(",", $s_recha104).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+10) ,'=SUM('.implode(",", $s_recha105).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+11) ,'=SUM('.implode(",", $s_recha106).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+12) ,'=SUM('.implode(",", $s_recha107).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+13) ,'=SUM('.implode(",", $s_recha108).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+14) ,'=SUM('.implode(",", $s_recha109).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+15) ,'=SUM('.implode(",", $s_recha110).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+16) ,'=SUM('.implode(",", $s_recha111).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+17) ,'=SUM('.implode(",", $s_recha112).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+18) ,'=SUM('.implode(",", $s_recha113).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+6) ,'=SUM('.implode(",", $s_recha201).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+7) ,'=SUM('.implode(",", $s_recha202).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+8) ,'=SUM('.implode(",", $s_recha203).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+9) ,'=SUM('.implode(",", $s_recha204).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+10) ,'=SUM('.implode(",", $s_recha205).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+11) ,'=SUM('.implode(",", $s_recha206).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+12) ,'=SUM('.implode(",", $s_recha207).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+13) ,'=SUM('.implode(",", $s_recha208).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+14) ,'=SUM('.implode(",", $s_recha209).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+15) ,'=SUM('.implode(",", $s_recha210).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+16) ,'=SUM('.implode(",", $s_recha211).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+17) ,'=SUM('.implode(",", $s_recha212).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+18) ,'=SUM('.implode(",", $s_recha213).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+6) ,'=SUM('.implode(",", $s_spos1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+7) ,'=SUM('.implode(",", $s_spos2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+8) ,'=SUM('.implode(",", $s_spos3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+9) ,'=SUM('.implode(",", $s_spos4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+10) ,'=SUM('.implode(",", $s_spos5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+11) ,'=SUM('.implode(",", $s_spos6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+12) ,'=SUM('.implode(",", $s_spos7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+13) ,'=SUM('.implode(",", $s_spos8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+14) ,'=SUM('.implode(",", $s_spos9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+15) ,'=SUM('.implode(",", $s_spos10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+16) ,'=SUM('.implode(",", $s_spos11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+17) ,'=SUM('.implode(",", $s_spos12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+18) ,'=SUM('.implode(",", $s_spos13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+6) ,'=SUM('.implode(",", $s_sneg1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+7) ,'=SUM('.implode(",", $s_sneg2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+8) ,'=SUM('.implode(",", $s_sneg3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+9) ,'=SUM('.implode(",", $s_sneg4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+10) ,'=SUM('.implode(",", $s_sneg5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+11) ,'=SUM('.implode(",", $s_sneg6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+12) ,'=SUM('.implode(",", $s_sneg7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+13) ,'=SUM('.implode(",", $s_sneg8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+14) ,'=SUM('.implode(",", $s_sneg9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+15) ,'=SUM('.implode(",", $s_sneg10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+16) ,'=SUM('.implode(",", $s_sneg11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+17) ,'=SUM('.implode(",", $s_sneg12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+18) ,'=SUM('.implode(",", $s_sneg13).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+6) ,'=SUM('.implode(",", $s_srecha1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+7) ,'=SUM('.implode(",", $s_srecha2).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+8) ,'=SUM('.implode(",", $s_srecha3).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+9) ,'=SUM('.implode(",", $s_srecha4).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+10) ,'=SUM('.implode(",", $s_srecha5).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+11) ,'=SUM('.implode(",", $s_srecha6).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+12) ,'=SUM('.implode(",", $s_srecha7).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+13) ,'=SUM('.implode(",", $s_srecha8).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+14) ,'=SUM('.implode(",", $s_srecha9).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+15) ,'=SUM('.implode(",", $s_srecha10).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+16) ,'=SUM('.implode(",", $s_srecha11).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+17) ,'=SUM('.implode(",", $s_srecha12).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+18) ,'=SUM('.implode(",", $s_srecha13).')');

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

