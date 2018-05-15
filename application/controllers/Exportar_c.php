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
		$this->load->view('exportar/Exportar_v');
	}

	public function exportar()
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
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'MES DE ');
		$objPHPExcel->getActiveSheet()->setCellValue('A4', 'ESTABLECIMIENTO');
		$objPHPExcel->getActiveSheet()->setCellValue('B4', 'CASOS EXAMINADOS');
		$objPHPExcel->getActiveSheet()->setCellValue('L4', 'AGUS');
		$objPHPExcel->getActiveSheet()->setCellValue('O4', 'ASCUS');
		$objPHPExcel->getActiveSheet()->setCellValue('R4', 'POSITIVOS');
		$objPHPExcel->getActiveSheet()->setCellValue('AA4', 'M INSATISFACCIÓN');
		$objPHPExcel->getActiveSheet()->setCellValue('B5', 'TOTAL');
		$objPHPExcel->getActiveSheet()->setCellValue('C5', '1ERA VEZ');
		$objPHPExcel->getActiveSheet()->setCellValue('F5', 'CONTINUADOR');
		$objPHPExcel->getActiveSheet()->setCellValue('I5', 'NEGATIVOS');
		$objPHPExcel->getActiveSheet()->setCellValue('R5', 'L.I.E.B.G');
		$objPHPExcel->getActiveSheet()->setCellValue('U5', 'L.I.E.A.G');
		$objPHPExcel->getActiveSheet()->setCellValue('X5', 'CANCER INVASOR');
		$objPHPExcel->getActiveSheet()->setCellValue('C6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('D6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('E6', '+50');
		$objPHPExcel->getActiveSheet()->setCellValue('F6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('G6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('H6', '+50');
		$objPHPExcel->getActiveSheet()->setCellValue('I6', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('J6', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('K6', '+50');
		$objPHPExcel->getActiveSheet()->setCellValue('L5', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('M5', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('N5', '+50');
		$objPHPExcel->getActiveSheet()->setCellValue('O5', '15-29');
		$objPHPExcel->getActiveSheet()->setCellValue('P5', '30-49');
		$objPHPExcel->getActiveSheet()->setCellValue('Q5', '"+50"');
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

		$r = $this->db->query("select ipress.codigo FROM  ipress INNER JOIN microred ON microred.id_microred = ipress.microred INNER JOIN red_salud ON red_salud.id_red = microred.red where microred.red=1")->result();
		$i=0;$i1=0;$i2=0;$agus_c1=0;$agus_c2=0;$agus_c3=0;$ascus_c1=0;$ascus_c2=0;$ascus_c3=0;$leibg_c1=0;$leibg_c2=0;$leibg_c3=0;$leiag_c1=0;$leiag_c2=0;$leiag_c3=0;$rechazo_c1=0;$rechazo_c2=0;$rechazo_c3=0;
		foreach ($r as  $value) {
			$ipress= (int)($value->codigo);
			
			$nega1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and codigo_renipres=".$ipress )->result();
			foreach ($nega1 as  $values) {	
			  $i=	$values->cantidad +$i;
			}
			$nega2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30  and codigo_renipres=".$ipress )->result();
			foreach ($nega2 as  $values) {	
			  $i1=	$values->cantidad +$i1;
			}
			$nega3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  clasificacion_general='Negativo para lesiones epiteliales o malignidad' and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50  and codigo_renipres=".$ipress )->result();
			foreach ($nega3 as  $values) {	
			  $i2=	$values->cantidad +$i2;
			}
			$agus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus1 as  $values) {	
			  $agus_c1=	$values->cantidad +$agus_c1;
			}
			$agus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus2 as  $values) {	
			  $agus_c2=	$values->cantidad +$agus_c2;
			}
			$agus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50  and codigo_renipres=".$ipress." and celulas_glandulares_atipicas!='_' or celulas_glandulares_atipicas!=  NULL " )->result();
			foreach ($agus3 as  $values) {	
			  $agus_c3=	$values->cantidad +$agus_c3;
			}
			$ascus1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus1 as  $values) {	
			  $ascus_c1=	$values->cantidad +$ascus_c1;
			}
			$ascus2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus2 as  $values) {	
			  $ascus_c2=	$values->cantidad +$ascus_c2;
			}
			$ascus3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50  and codigo_renipres=".$ipress." and celulas_escamosas_atipicas!='_' or celulas_escamosas_atipicas!=  NULL " )->result();
			foreach ($ascus3 as  $values) {	
			  $ascus_c3=	$values->cantidad +$ascus_c3;
			}
			$leigb1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb1 as  $values) {	
			  $leibg_c1=	$values->cantidad +$leibg_c1;
			}
			$leigb2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb2 as  $values) {	
			  $leibg_c2=	$values->cantidad +$leibg_c2;
			}
			$leigb3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50  and codigo_renipres=".$ipress." and leibg!='_' or leibg!=  NULL " )->result();
			foreach ($leigb3 as  $values) {	
			  $leibg_c3=	$values->cantidad +$leibg_c3;
			}
			$leiga1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
			foreach ($leiga1 as  $values) {	
			  $leiag_c1=	$values->cantidad +$leiag_c1;
			}
			$leiga2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
			foreach ($leiga2 as  $values) {	
			  $leiag_c2=	$values->cantidad +$leiag_c2;
			}
			$leiga3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50  and codigo_renipres=".$ipress." and leiag!='_' or leiag!=  NULL " )->result();
			foreach ($leiga3 as  $values) {	
			  $leiag_c3=	$values->cantidad +$leiag_c3;
			}
			$rechazo1 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where   TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=29 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=15  and codigo_renipres=".$ipress." and fecha_rechazo!=  '' " )->result();
			foreach ($rechazo1 as  $values) {	
			  $rechazo_c1=	$values->cantidad +$rechazo_c1;
			}
			$rechazo2 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())<=49 and TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=30 and codigo_renipres=".$ipress." and fecha_rechazo!= '' " )->result();
			foreach ($rechazo2 as  $values) {	
			  $rechazo_c2=	$values->cantidad +$rechazo_c2;
			}
			$rechazo3 = $this->db->query("select COUNT( TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) ) as cantidad FROM  datos where  TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE())>=50  and codigo_renipres=".$ipress." and fecha_rechazo!='' " )->result();
			foreach ($rechazo3 as  $values) {	
			  $rechazo_c3=	$values->cantidad +$rechazo_c3;
			}

			}
			$objPHPExcel->getActiveSheet()->setCellValue('I8', $i);
			$objPHPExcel->getActiveSheet()->setCellValue('J8', $i1);
			$objPHPExcel->getActiveSheet()->setCellValue('K8', $i2);
			$objPHPExcel->getActiveSheet()->setCellValue('L8', $agus_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('M8', $agus_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('N8', $agus_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('O8', $ascus_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('P8', $ascus_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('Q8', $ascus_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('R8', $leibg_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('S8', $leibg_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('T8', $leibg_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('U8', $leiag_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('V8', $leiag_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('W8', $leiag_c3);
			$objPHPExcel->getActiveSheet()->setCellValue('AA8', $rechazo_c1);
			$objPHPExcel->getActiveSheet()->setCellValue('AB8', $rechazo_c2);
			$objPHPExcel->getActiveSheet()->setCellValue('AC8', $rechazo_c3);

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
		$objPHPExcel->getActiveSheet()->getRowDimension('6')->setRowHeight(45);
		


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

		$datos_cant= array('A','B','C' ,'D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC');
		foreach ($datos_cant as  $value) {
		
		$objPHPExcel->getActiveSheet()->getStyle($value.'7')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'8')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'9')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'10')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'11')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'12')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'13')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'14')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'15')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'16')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'17')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'18')->applyFromArray($estiloTitulohorizontal);
		$objPHPExcel->getActiveSheet()->getStyle($value.'19')->applyFromArray($estiloTitulohorizontal);
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
		header('Content-Disposition: attachment;filename="Consolidado.xlsx"');
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



}

