<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportes_papmr_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url","form");
		$this->load->model('Reportes_papmr_m');
		$this->load->model('Permisos_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['mes']= $this->Reportes_papmr_m->mostrar();
		$data['red']= $this->Reportes_papmr_m->red();
		$data['annio']= $this->Reportes_papmr_m->mostrar_annio();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='18') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('exportar/Reportes_papmr_v',$data);
		}else{
			header('Location: Principal_c');
		}
	}

	function microred(){
		$microred = $this->Reportes_papmr_m->microred($this->input->post("id"));
		echo json_encode($microred);
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
		$sitio=7;
		$esta = $this->db->query("select ipress.ipress,ipress.codigo,microred.microred FROM  ipress inner join microred on ipress.microred=microred.id_microred where microred.id_microred=".$this->input->post("microred"))->result();

		foreach ($esta as  $val) {
			$nombre_microred=$val->microred;
			$ipress= ($val->codigo);
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$sitio, $val->ipress);
			$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
			$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mesr=".$this->input->post("mes_seleccion")." and  codigo_renipres=".$ipress )->result();
			foreach ($nega1 as  $values) {	
				$i=	$values->cantidad +$i;

			}
			$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress )->result();
			foreach ($nega2 as  $values) {	
				$i1=	$values->cantidad +$i1;
			}
			$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress )->result();
			foreach ($nega3 as  $values) {	
				$i2=	$values->cantidad +$i2;
			}
			$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mesr=".$this->input->post("mes_seleccion")." and  codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus1 as  $values) {	
				$agus_c1=	$values->cantidad +$agus_c1;
			}
			$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus2 as  $values) {	
				$agus_c2=	$values->cantidad +$agus_c2;
			}
			$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus3 as  $values) {	
				$agus_c3=	$values->cantidad +$agus_c3;
			}
			$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus1 as  $values) {	
				$ascus_c1=	$values->cantidad +$ascus_c1;
			}
			$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus2 as  $values) {	
				$ascus_c2=	$values->cantidad +$ascus_c2;
			}
			$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("mes_seleccion")."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus3 as  $values) {	
				$ascus_c3=	$values->cantidad +$ascus_c3;
			}
			$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("mes_seleccion")."  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb1 as  $values) {	
				$leibg_c1=	$values->cantidad +$leibg_c1;
			}
			$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb2 as  $values) {	
				$leibg_c2=	$values->cantidad +$leibg_c2;
			}
			$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb3 as  $values) {	
				$leibg_c3=	$values->cantidad +$leibg_c3;
			}
			$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
			foreach ($leiga1 as  $values) {	
				$leiag_c1=	$values->cantidad +$leiag_c1;
			}
			$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
			foreach ($leiga2 as  $values) {	
				$leiag_c2=	$values->cantidad +$leiag_c2;
			}
			$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
			foreach ($leiga3 as  $values) {	
				$leiag_c3=	$values->cantidad +$leiag_c3;
			}
			$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
			foreach ($rechazo1 as  $values) {	
				$rechazo_c1=	$values->cantidad +$rechazo_c1;
			}
			$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("mes_seleccion")." and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
			foreach ($rechazo2 as  $values) {	
				$rechazo_c2=	$values->cantidad +$rechazo_c2;
			}
			$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("mes_seleccion")."  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
			foreach ($rechazo3 as  $values) {	
				$rechazo_c3=	$values->cantidad +$rechazo_c3;
			}
			$esta_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo	where id_mesr=".$this->input->post("mes_seleccion")."  and ipress.codigo=".$ipress)->result();	
			foreach ($esta_total as  $value_total) {
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$sitio, $value_total->cantidad);	
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$sitio,'='.($value_total->cantidad).'*10/100');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$sitio,'='.($value_total->cantidad).'*15/100');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$sitio,'='.($value_total->cantidad).'*5/100');	
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$sitio,'='.($value_total->cantidad).'*35/100');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$sitio,'='.($value_total->cantidad).'*25/100');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$sitio,'='.($value_total->cantidad).'*10/100');
				$objPHPExcel->getActiveSheet()->getStyle('C'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('D'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('E'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('F'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('G'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('H'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
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
			$sitio++;
		}//foreach $esta

		$fecha=$this->input->post("mes_seleccion");
		$mes_nombre = array("01" =>"ENERO","02" => "FEBRERO","03" => "MARZO","04" => "ABRIL","05" =>"MAYO","06" => "JUNIO","07" => "JULIO","08" => "AGOSTO","09" =>"SETIEMBRE","10" => "OCTUBRE","11" => "NOVIEMBRE","12" => "DICIEMBRE");
		$mes = $fecha[4].$fecha[5];
		foreach ($mes_nombre as $key => $value) {
			if ($mes==$key) {
				$nombre_mes = $value;
			}
		}	

		$annio = $fecha[0].$fecha[1].$fecha[2].$fecha[3];
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'ESTABLECIMIENTOS DE LA MICRORED '.$nombre_microred.' MES DE '.$nombre_mes.' '.$annio);
		$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio), 'TOTAL');
		$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio), '=SUM(B7:B'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio), '=SUM(C7:C'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio), '=SUM(D7:D'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio), '=SUM(E7:E'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio), '=SUM(F7:F'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio), '=SUM(G7:G'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio), '=SUM(H7:H'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio), '=SUM(I7:I'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio), '=SUM(J7:J'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio), '=SUM(K7:K'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio), '=SUM(L7:L'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio), '=SUM(M7:M'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio), '=SUM(N7:N'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio), '=SUM(O7:O'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio), '=SUM(P7:P'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio), '=SUM(Q7:Q'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio), '=SUM(R7:R'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio), '=SUM(S7:S'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio), '=SUM(T7:T'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio), '=SUM(U7:U'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio), '=SUM(V7:V'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio), '=SUM(W7:W'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio), '=SUM(AA7:AA'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio), '=SUM(AB7:AB'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio), '=SUM(AC7:AC'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio), '=SUM(AD7:AD'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio), '=SUM(AE7:AE'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio), '=SUM(AF7:AF'.($sitio-1).')');
		$objPHPExcel->getActiveSheet()->getStyle('C'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
		$objPHPExcel->getActiveSheet()->getStyle('D'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
		$objPHPExcel->getActiveSheet()->getStyle('E'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
		$objPHPExcel->getActiveSheet()->getStyle('F'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
		$objPHPExcel->getActiveSheet()->getStyle('G'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
		$objPHPExcel->getActiveSheet()->getStyle('H'.$sitio)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
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
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
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

		for ($i=0; $i <$sitio-6 ; $i++) { 
			$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
			foreach ($datos_cant as  $value) {
				$objPHPExcel->getActiveSheet()->getStyle($value.($i+7))->applyFromArray($numeros);
			}
		}
		//formato XLSX
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="CONSOLIDADO '.$nombre_mes.' '.$annio.'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');

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

		$pos_mes = array();
		$cant=$this->db->query("select count(ipress.ipress) as cantidad FROM  ipress inner join microred on ipress.microred=microred.id_microred	where microred.id_microred=".$this->input->post('microred_a') )->row();
		$pos_cant=1;
		for ($i=0; $i <=12 ; $i++) { 
			array_push($pos_mes,$pos_cant );
			$pos_cant=$cant->cantidad+10+$pos_cant;
		}

		for ($mes=1; $mes <=13 ; $mes++) { 
			foreach ($pos_mes as $key => $value_mes) {
				if($mes-1==$key){
					$sitio=	$value_mes;
				}
			}
			$mes_nombre = array("01" =>"ENERO","02" => "FEBRERO","03" => "MARZO","04" => "ABRIL","05" =>"MAYO","06" => "JUNIO","07" => "JULIO","08" => "AGOSTO","09" =>"SETIEMBRE","10" => "OCTUBRE","11" => "NOVIEMBRE","12" => "DICIEMBRE");
			foreach ($mes_nombre as $key_1=> $n_mes) {
				if ($mes==$key_1) {
					$mes=$key_1;
					$nombre_mes = $n_mes;
				}
			}	

			$objPHPExcel->getActiveSheet()->setCellValue('A'.$sitio, 'RESULTADOS DE PAP DEL LABORATORIO REFERENCIAL SAN MARTIN');
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
			$esta = $this->db->query("select ipress.ipress,ipress.codigo,microred.microred FROM  ipress inner join microred on ipress.microred=microred.id_microred where microred.id_microred=".$this->input->post("microred_a"))->result();
			$pos=6;
			foreach ($esta as  $val) {
				$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
				$nombre_microred=$val->microred;
				$ipress= ($val->codigo);
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+$pos), $val->ipress);
				$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mesr=".$this->input->post("annio_seleccion").$mes." and  codigo_renipres=".$ipress )->result();
				foreach ($nega1 as  $values) {	
					$i=	$values->cantidad +$i;
				}
				$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress )->result();
				foreach ($nega2 as  $values) {	
					$i1=	$values->cantidad +$i1;
				}
				$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress )->result();
				foreach ($nega3 as  $values) {	
					$i2=	$values->cantidad +$i2;
				}
				$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mesr=".$this->input->post("annio_seleccion").$mes." and  codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
				foreach ($agus1 as  $values) {	
					$agus_c1=	$values->cantidad +$agus_c1;
				}
				$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
				foreach ($agus2 as  $values) {	
					$agus_c2=	$values->cantidad +$agus_c2;
				}
				$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
				foreach ($agus3 as  $values) {	
					$agus_c3=	$values->cantidad +$agus_c3;
				}
				$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
				foreach ($ascus1 as  $values) {	
					$ascus_c1=	$values->cantidad +$ascus_c1;
				}
				$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
				foreach ($ascus2 as  $values) {	
					$ascus_c2=	$values->cantidad +$ascus_c2;
				}
				$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_seleccion").$mes."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
				foreach ($ascus3 as  $values) {	
					$ascus_c3=	$values->cantidad +$ascus_c3;
				}
				$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_seleccion").$mes."  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
				foreach ($leigb1 as  $values) {	
					$leibg_c1=	$values->cantidad +$leibg_c1;
				}
				$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
				foreach ($leigb2 as  $values) {	
					$leibg_c2=	$values->cantidad +$leibg_c2;
				}
				$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
				foreach ($leigb3 as  $values) {	
					$leibg_c3=	$values->cantidad +$leibg_c3;
				}
				$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
				foreach ($leiga1 as  $values) {	
					$leiag_c1=	$values->cantidad +$leiag_c1;
				}
				$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
				foreach ($leiga2 as  $values) {	
					$leiag_c2=	$values->cantidad +$leiag_c2;
				}
				$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
				foreach ($leiga3 as  $values) {	
					$leiag_c3=	$values->cantidad +$leiag_c3;
				}
				$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
				foreach ($rechazo1 as  $values) {	
					$rechazo_c1=	$values->cantidad +$rechazo_c1;
				}
				$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_seleccion").$mes." and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
				foreach ($rechazo2 as  $values) {	
					$rechazo_c2=	$values->cantidad +$rechazo_c2;
				}
				$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_seleccion").$mes."  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
				foreach ($rechazo3 as  $values) {	
					$rechazo_c3=	$values->cantidad +$rechazo_c3;
				}
				$esta_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo	where id_mesr=".$this->input->post("annio_seleccion").$mes."  and ipress.codigo=".$ipress)->result();	
				foreach ($esta_total as  $value_total) {
					$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+$pos), $value_total->cantidad);	
					$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+$pos),'='.($value_total->cantidad).'*10/100');
					$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+$pos),'='.($value_total->cantidad).'*15/100');
					$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+$pos),'='.($value_total->cantidad).'*5/100');	
					$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+$pos),'='.($value_total->cantidad).'*35/100');
					$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+$pos),'='.($value_total->cantidad).'*25/100');
					$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+$pos),'='.($value_total->cantidad).'*10/100');
					$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet()->getStyle('D'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet()->getStyle('E'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet()->getStyle('G'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					$objPHPExcel->getActiveSheet()->getStyle('H'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				}
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+$pos), $i);
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+$pos), $i1);
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+$pos), $i2);
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+$pos), $agus_c1);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+$pos), $agus_c2);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+$pos), $agus_c3);
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+$pos), $ascus_c1);
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+$pos), $ascus_c2);
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+$pos), $ascus_c3);
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+$pos), $leibg_c1);
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+$pos), $leibg_c2);
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+$pos), $leibg_c3);
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+$pos), $leiag_c1);
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+$pos), $leiag_c2);
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+$pos), $leiag_c3);
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+$pos), $rechazo_c1);
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+$pos), $rechazo_c2);
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+$pos), $rechazo_c3);
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+$pos), '=SUM(L'.($sitio+$pos).':Z'.($sitio+$pos).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+$pos), '=SUM(I'.($sitio+$pos).':K'.($sitio+$pos).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+$pos), '=SUM(AA'.($sitio+$pos).':AC'.($sitio+$pos).')');
				$pos++;
			}
			$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+$pos), 'TOTAL');
			if ($mes=='13') {
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'MES DE ENERO - DICIEMBRE '.$this->input->post('annio_seleccion'));
			}else{
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+1), 'ESTABLECIMIENTOS DE LA MICRORED '.$nombre_microred.' MES DE '.$nombre_mes.' '.$this->input->post('annio_seleccion'));	
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+$pos), '=SUM(B'.($sitio+6).':B'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+$pos), '=SUM(C'.($sitio+6).':C'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+$pos), '=SUM(D'.($sitio+6).':D'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+$pos), '=SUM(E'.($sitio+6).':E'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+$pos), '=SUM(F'.($sitio+6).':F'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+$pos), '=SUM(G'.($sitio+6).':G'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+$pos), '=SUM(H'.($sitio+6).':H'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+$pos), '=SUM(I'.($sitio+6).':I'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+$pos), '=SUM(J'.($sitio+6).':J'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+$pos), '=SUM(K'.($sitio+6).':K'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+$pos), '=SUM(L'.($sitio+6).':L'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+$pos), '=SUM(M'.($sitio+6).':M'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+$pos), '=SUM(N'.($sitio+6).':N'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+$pos), '=SUM(O'.($sitio+6).':O'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+$pos), '=SUM(P'.($sitio+6).':P'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+$pos), '=SUM(Q'.($sitio+6).':Q'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+$pos), '=SUM(R'.($sitio+6).':R'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+$pos), '=SUM(S'.($sitio+6).':S'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+$pos), '=SUM(T'.($sitio+6).':T'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+$pos), '=SUM(U'.($sitio+6).':U'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+$pos), '=SUM(V'.($sitio+6).':V'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+$pos), '=SUM(W'.($sitio+6).':W'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+$pos), '=SUM(AA'.($sitio+6).':AA'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+$pos), '=SUM(AB'.($sitio+6).':AB'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+$pos), '=SUM(AC'.($sitio+6).':AC'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+$pos), '=SUM(AD'.($sitio+6).':AD'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+$pos), '=SUM(AE'.($sitio+6).':AE'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+$pos), '=SUM(AF'.($sitio+6).':AF'.($sitio+$pos-1).')');
			}
			$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
			$objPHPExcel->getActiveSheet()->getStyle('D'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
			$objPHPExcel->getActiveSheet()->getStyle('E'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
			$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
			$objPHPExcel->getActiveSheet()->getStyle('G'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
			$objPHPExcel->getActiveSheet()->getStyle('H'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
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
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
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
			for ($i=0; $i <$pos-5 ; $i++) { 
				$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
				foreach ($datos_cant as  $value) {

					$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+$i+6))->applyFromArray($numeros);
			# code...
				}
			}
			
			if ($mes=='13') {
				$datos_cant= array('B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
				foreach ($datos_cant as $dat => $value) {
					for ($j=0; $j <$pos-5 ; $j++) { 
						$su_a='';
						for ($k=0; $k <12 ; $k++) { 
							$su_a = $value.($pos_mes[$k]+$j+6).','.$su_a;
						}
						$suma_a[$j][$dat]=$su_a;
					}
				}
				$datos_cant= array('B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
				foreach ($datos_cant as $dat => $value) {
					for ($i=0; $i <$pos-5 ; $i++) { 
						$objPHPExcel->getActiveSheet()->setCellValue($value.($sitio+$i+6), '=SUM('.$suma_a[$i][$dat].')' );
					}
				}
			}
		}//for del mes
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="CONSOLIDADO '.$this->input->post('annio_seleccion').'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}
	function validar_mes(){
		$mes = $this->Reportes_papmr_m->validar_mes($this->input->post("id"),$this->input->post("id_mes"));
		echo json_encode($mes);
	}

	function validar_annio(){
		$annio = $this->Reportes_papmr_m->validar_annio($this->input->post("id"));
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
		$mes_c=$this->input->post('mes_inicial');
		$pos_mes = array();
		$cant_r=$this->db->query("select count(ipress.ipress) as cantidad FROM  ipress inner join microred on ipress.microred=microred.id_microred where microred.id_microred=".$this->input->post('microred_r') )->row();
		$pos_cant=1;
		for ($i=0; $i <=12 ; $i++) { 
			array_push($pos_mes,$pos_cant );
			$pos_cant=$cant_r->cantidad+10+$pos_cant;
		}
		for ($mes=1; $mes <=$cant+1 ; $mes++) { 
			foreach ($pos_mes as $key => $value_mes) {
				if($mes-1==$key){
					$sitio=	$value_mes;
				}
			}
			$mes_n = array("01" =>"ENERO","02" => "FEBRERO","03" => "MARZO","04" => "ABRIL","05" =>"MAYO","06" => "JUNIO","07" => "JULIO","08" => "AGOSTO","09" =>"SETIEMBRE","10" => "OCTUBRE","11" => "NOVIEMBRE","12" => "DICIEMBRE");
			foreach ($mes_n as $key_1=> $n_mes) {
				if ($mes_ini==$key_1) {
					$mes_ini=$key_1;
					$nombre_mes = $n_mes;
					if ($mes==1) {
						$nombre_ini=$nombre_mes;
					}
					if ($mes==$cant) {
						$nombre_fin=$nombre_mes;
					}
				}
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
			$esta = $this->db->query("select ipress.ipress,ipress.codigo,microred.microred FROM  ipress inner join microred on ipress.microred=microred.id_microred where microred.id_microred=".$this->input->post("microred_r"))->result();
			$pos=6;
			foreach ($esta as  $val) {

				$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
				$nombre_microred=$val->microred;
				$ipress= ($val->codigo);
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+$pos), $val->ipress);
				if ($mes<=$cant) {
					$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad , fecha_muestra FROM  datos where  clasificacion_general like 'Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mesr=".$this->input->post("annio_r").$mes_ini." and  codigo_renipres=".$ipress )->result();
					foreach ($nega1 as  $values) {	
						$i=	$values->cantidad +$i;
					}
					$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress )->result();
					foreach ($nega2 as  $values) {	
						$i1=	$values->cantidad +$i1;
					}
					$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress )->result();
					foreach ($nega3 as  $values) {	
						$i2=	$values->cantidad +$i2;
					}
					$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and id_mesr=".$this->input->post("annio_r").$mes_ini." and  codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
					foreach ($agus1 as  $values) {	
						$agus_c1=	$values->cantidad +$agus_c1;
					}
					$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
					foreach ($agus2 as  $values) {	
						$agus_c2=	$values->cantidad +$agus_c2;
					}
					$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
					foreach ($agus3 as  $values) {	
						$agus_c3=	$values->cantidad +$agus_c3;
					}
					$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
					foreach ($ascus1 as  $values) {	
						$ascus_c1=	$values->cantidad +$ascus_c1;
					}
					$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
					foreach ($ascus2 as  $values) {	
						$ascus_c2=	$values->cantidad +$ascus_c2;
					}
					$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_r").$mes_ini."  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
					foreach ($ascus3 as  $values) {	
						$ascus_c3=	$values->cantidad +$ascus_c3;
					}
					$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_r").$mes_ini."  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
					foreach ($leigb1 as  $values) {	
						$leibg_c1=	$values->cantidad +$leibg_c1;
					}
					$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
					foreach ($leigb2 as  $values) {	
						$leibg_c2=	$values->cantidad +$leibg_c2;
					}
					$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
					foreach ($leigb3 as  $values) {	
						$leibg_c3=	$values->cantidad +$leibg_c3;
					}
					$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
					foreach ($leiga1 as  $values) {	
						$leiag_c1=	$values->cantidad +$leiag_c1;
					}
					$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
					foreach ($leiga2 as  $values) {	
						$leiag_c2=	$values->cantidad +$leiag_c2;
					}
					$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and leiag!='_' or leiag!= NULL " )->result();
					foreach ($leiga3 as  $values) {	
						$leiag_c3=	$values->cantidad +$leiag_c3;
					}
					$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
					foreach ($rechazo1 as  $values) {	
						$rechazo_c1=	$values->cantidad +$rechazo_c1;
					}
					$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and id_mesr=".$this->input->post("annio_r").$mes_ini." and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
					foreach ($rechazo2 as  $values) {	
						$rechazo_c2=	$values->cantidad +$rechazo_c2;
					}
					$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50 and id_mesr=".$this->input->post("annio_r").$mes_ini."  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
					foreach ($rechazo3 as  $values) {	
						$rechazo_c3=	$values->cantidad +$rechazo_c3;
					}
					$esta_total = $this->db->query("select count(datos.codigo_renipres) as cantidad FROM  datos  INNER JOIN ipress ON datos.codigo_renipres = ipress.codigo	where id_mesr=".$this->input->post("annio_r").$mes_ini."  and ipress.codigo=".$ipress)->result();	
					foreach ($esta_total as  $value_total) {
						$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+$pos), $value_total->cantidad);	
						$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+$pos),'='.($value_total->cantidad).'*10/100');
						$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+$pos),'='.($value_total->cantidad).'*15/100');
						$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+$pos),'='.($value_total->cantidad).'*5/100');	
						$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+$pos),'='.($value_total->cantidad).'*35/100');
						$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+$pos),'='.($value_total->cantidad).'*25/100');
						$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+$pos),'='.($value_total->cantidad).'*10/100');
						$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
						$objPHPExcel->getActiveSheet()->getStyle('D'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
						$objPHPExcel->getActiveSheet()->getStyle('E'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
						$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
						$objPHPExcel->getActiveSheet()->getStyle('G'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
						$objPHPExcel->getActiveSheet()->getStyle('H'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					}
					$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+$pos), $i);
					$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+$pos), $i1);
					$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+$pos), $i2);
					$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+$pos), $agus_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+$pos), $agus_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+$pos), $agus_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+$pos), $ascus_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+$pos), $ascus_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+$pos), $ascus_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+$pos), $leibg_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+$pos), $leibg_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+$pos), $leibg_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+$pos), $leiag_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+$pos), $leiag_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+$pos), $leiag_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+$pos), $rechazo_c1);
					$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+$pos), $rechazo_c2);
					$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+$pos), $rechazo_c3);
					$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+$pos), '=SUM(L'.($sitio+$pos).':Z'.($sitio+$pos).')');
					$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+$pos), '=SUM(I'.($sitio+$pos).':K'.($sitio+$pos).')');
					$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+$pos), '=SUM(AA'.($sitio+$pos).':AC'.($sitio+$pos).')');
				}//fin if
				$pos++;

			}
				$objPHPExcel->getActiveSheet()->setCellValue('A'.($sitio+$pos), 'TOTAL');
			if ($mes<=$cant) {
				$objPHPExcel->getActiveSheet()->setCellValue('B'.($sitio+$pos), '=SUM(B'.($sitio+6).':B'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('C'.($sitio+$pos), '=SUM(C'.($sitio+6).':C'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('D'.($sitio+$pos), '=SUM(D'.($sitio+6).':D'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('E'.($sitio+$pos), '=SUM(E'.($sitio+6).':E'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.($sitio+$pos), '=SUM(F'.($sitio+6).':F'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.($sitio+$pos), '=SUM(G'.($sitio+6).':G'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('H'.($sitio+$pos), '=SUM(H'.($sitio+6).':H'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('I'.($sitio+$pos), '=SUM(I'.($sitio+6).':I'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.($sitio+$pos), '=SUM(J'.($sitio+6).':J'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.($sitio+$pos), '=SUM(K'.($sitio+6).':K'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('L'.($sitio+$pos), '=SUM(L'.($sitio+6).':L'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('M'.($sitio+$pos), '=SUM(M'.($sitio+6).':M'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('N'.($sitio+$pos), '=SUM(N'.($sitio+6).':N'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('O'.($sitio+$pos), '=SUM(O'.($sitio+6).':O'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.($sitio+$pos), '=SUM(P'.($sitio+6).':P'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('Q'.($sitio+$pos), '=SUM(Q'.($sitio+6).':Q'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('R'.($sitio+$pos), '=SUM(R'.($sitio+6).':R'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('S'.($sitio+$pos), '=SUM(S'.($sitio+6).':S'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('T'.($sitio+$pos), '=SUM(T'.($sitio+6).':T'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('U'.($sitio+$pos), '=SUM(U'.($sitio+6).':U'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.($sitio+$pos), '=SUM(V'.($sitio+6).':V'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.($sitio+$pos), '=SUM(W'.($sitio+6).':W'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AA'.($sitio+$pos), '=SUM(AA'.($sitio+6).':AA'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AB'.($sitio+$pos), '=SUM(AB'.($sitio+6).':AB'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AC'.($sitio+$pos), '=SUM(AC'.($sitio+6).':AC'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AD'.($sitio+$pos), '=SUM(AD'.($sitio+6).':AD'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AE'.($sitio+$pos), '=SUM(AE'.($sitio+6).':AE'.($sitio+$pos-1).')');
				$objPHPExcel->getActiveSheet()->setCellValue('AF'.($sitio+$pos), '=SUM(AF'.($sitio+6).':AF'.($sitio+$pos-1).')');

				$objPHPExcel->getActiveSheet()->getStyle('C'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('D'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('E'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('F'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('G'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
				$objPHPExcel->getActiveSheet()->getStyle('H'.($sitio+$pos))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
			}
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
			$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(40);
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
			for ($i=0; $i <$pos-5 ; $i++) { 
				$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
				foreach ($datos_cant as  $value) {

					$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+$i+6))->applyFromArray($numeros);
			# code...
				}
			}
			if ($mes==$cant+1) {
				$datos_cant= array('B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
				foreach ($datos_cant as $dat => $value) {
					for ($j=0; $j <$pos-5 ; $j++) { 
						$su_a='';
						for ($k=0; $k <$cant ; $k++) { 
							$su_a = $value.($pos_mes[$k]+$j+6).','.$su_a;
						}
						$suma_a[$j][$dat]=$su_a;
					}
				}
				$datos_cant= array('B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF');
				foreach ($datos_cant as $dat => $value) {
					for ($i=0; $i <$pos-5 ; $i++) { 
						$objPHPExcel->getActiveSheet()->setCellValue($value.($sitio+$i+6), '=SUM('.$suma_a[$i][$dat].')' );
						$objPHPExcel->getActiveSheet()->getStyle($value.($sitio+$i+6))->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat :: FORMAT_NUMBER);
					}
				}
			}			
			$mes_ini++;
		}//fin del for mes
		

		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="CONSOLIDADO '.$nombre_ini.' - '.$nombre_fin.' '.$this->input->post('annio_r').'.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
	}

}

