<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Importar_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url","form");
		$this->load->model('Importar_m');
		$this->load->model('Permisos_m');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['mes_subido']= $this->Importar_m->mes_subido();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='14') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('importar/Importar_v',$data);
		}else{
			header('Location: ../Principal_c');
		}
	}

	public function eliminar()
	{
		$this->Importar_m->eliminar();
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
		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'REPORTE DEL PAP');
		$objPHPExcel->getActiveSheet()->mergeCells('A1:BG1');

		$estiloTituloReporte = array(
			'font' => array(
				'name'      => 'Arial',
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
		$estiloTituloColumnas = array(
			'font' => array(
				'name'  => 'Arial',
				'bold'  => true,
				'size' =>10,
				'color' => array(
					'rgb' => 'FFFFFF'
				)
			),
			//fill = fondo de celda
			'fill' => array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'color' => array('rgb' => '538DD5')
			),
			'borders' => array(
				'allborders' => array(
		'style' => PHPExcel_Style_Border::BORDER_THIN	//BORDER_MEDIUM , BORDER_THIN , BORDER_NONE grosor del borde
	)
			),
			'alignment' =>  array(
				'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
			)
		);

		$objPHPExcel->getActiveSheet()->getStyle('A1:BG1')->applyFromArray($estiloTituloReporte);
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(65);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(65);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AW')->setWidth(65);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AX')->setWidth(60);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AY')->setWidth(65);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AZ')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BA')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BB')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BC')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BD')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BE')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BF')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('BG')->setWidth(50);
		$objPHPExcel->getActiveSheet()->setCellValue('A2', 'Item');
		$objPHPExcel->getActiveSheet()->setCellValue('B2', 'CodigoRenipress');
		$objPHPExcel->getActiveSheet()->setCellValue('C2', 'NombreRenipress');
		$objPHPExcel->getActiveSheet()->setCellValue('D2', 'Establecimiento');
		$objPHPExcel->getActiveSheet()->setCellValue('E2', 'Número de Documento');
		$objPHPExcel->getActiveSheet()->setCellValue('F2', 'Paciente');
		$objPHPExcel->getActiveSheet()->setCellValue('G2', 'DNI');
		$objPHPExcel->getActiveSheet()->setCellValue('H2', 'Fecha nacimiento');
		$objPHPExcel->getActiveSheet()->setCellValue('I2', 'Distrito Paciente');
		$objPHPExcel->getActiveSheet()->setCellValue('J2', 'Provincia Paciente');
		$objPHPExcel->getActiveSheet()->setCellValue('K2', 'Departamento Paciente');
		$objPHPExcel->getActiveSheet()->setCellValue('L2', 'Medico');
		$objPHPExcel->getActiveSheet()->setCellValue('M2', 'Muestra');
		$objPHPExcel->getActiveSheet()->setCellValue('N2', 'Fecha Muestra');
		$objPHPExcel->getActiveSheet()->setCellValue('O2', 'FechaRecepcionLab');
		$objPHPExcel->getActiveSheet()->setCellValue('P2', 'FechaRecepcionIns');
		$objPHPExcel->getActiveSheet()->setCellValue('Q2', 'Enfermedad');
		$objPHPExcel->getActiveSheet()->setCellValue('R2', 'Prueba');
		$objPHPExcel->getActiveSheet()->setCellValue('S2', 'dFechaHoraRegistro');
		$objPHPExcel->getActiveSheet()->setCellValue('T2', 'iDiasUtilesEmitirResultado'); 
		$objPHPExcel->getActiveSheet()->setCellValue('U2', 'dtFechaRecepcionLaboratorio');
		$objPHPExcel->getActiveSheet()->setCellValue('V2', 'Sexo');
		$objPHPExcel->getActiveSheet()->setCellValue('W2', 'DptoEstablecimiento');
		$objPHPExcel->getActiveSheet()->setCellValue('X2', 'Disa');
		$objPHPExcel->getActiveSheet()->setCellValue('Y2', 'Motivo_Muestra');
		$objPHPExcel->getActiveSheet()->setCellValue('Z2', 'Fecha Rechazo');
		$objPHPExcel->getActiveSheet()->setCellValue('AA2', 'Tipo Muestra');
		$objPHPExcel->getActiveSheet()->setCellValue('AB2', 'sGestante');
		$objPHPExcel->getActiveSheet()->setCellValue('AC2', 'Latitud');
		$objPHPExcel->getActiveSheet()->setCellValue('AD2', 'Longitud');
		$objPHPExcel->getActiveSheet()->setCellValue('AE2', 'sClasificacion');
		$objPHPExcel->getActiveSheet()->setCellValue('AF2', 'sCategoria');
		$objPHPExcel->getActiveSheet()->setCellValue('AG2', 'iNumProceso');
		$objPHPExcel->getActiveSheet()->setCellValue('AH2', 'FechaIngresoMuestra');
		$objPHPExcel->getActiveSheet()->setCellValue('AI2', 'FechaIngresoPrueba');
		$objPHPExcel->getActiveSheet()->setCellValue('AJ2', 'Adenocarcinoma endovervical in situ');
		$objPHPExcel->getActiveSheet()->setCellValue('AK2', 'Adenocarcinoma');
		$objPHPExcel->getActiveSheet()->setCellValue('AL2', 'Calidad Espécimen');
		$objPHPExcel->getActiveSheet()->setCellValue('AM2', 'Cambios reactivos asociados a Atrofia con infla.');
		$objPHPExcel->getActiveSheet()->setCellValue('AN2', 'Cambios reactivos asociados a Atrofia sin infla.');
		$objPHPExcel->getActiveSheet()->setCellValue('AO2', 'Cambios reactivos asociados a DIU');
		$objPHPExcel->getActiveSheet()->setCellValue('AP2', 'Cambios reactivos asociados a inflamación');
		$objPHPExcel->getActiveSheet()->setCellValue('AQ2', 'Cambios reactivos asociados a Radiación');
		$objPHPExcel->getActiveSheet()->setCellValue('AR2', 'Carcinoma de Células Escamosas');
		$objPHPExcel->getActiveSheet()->setCellValue('AS2', 'Células Escamosas atípicas (ASC)');
		$objPHPExcel->getActiveSheet()->setCellValue('AT2', 'Células glandulares atipicas (AGC)');
		$objPHPExcel->getActiveSheet()->setCellValue('AU2', 'Células Glandulares Atípicas, favorecen neoplasia');
		$objPHPExcel->getActiveSheet()->setCellValue('AV2', 'Clasificación General');
		$objPHPExcel->getActiveSheet()->setCellValue('AW2', 'Fecha de resultado');
		$objPHPExcel->getActiveSheet()->setCellValue('AX2', 'Lesión esc. Intraep. bajo grado (LEIBG)');
		$objPHPExcel->getActiveSheet()->setCellValue('AY2', 'Lesión Esc.Intraep. Alto Grado (LEIAG)');
		$objPHPExcel->getActiveSheet()->setCellValue('AZ2', 'Microorganismo');
		$objPHPExcel->getActiveSheet()->setCellValue('BA2', 'Negativo para lesiones intraepitelial o malignidad');
		$objPHPExcel->getActiveSheet()->setCellValue('BB2', 'Observaciones');
		$objPHPExcel->getActiveSheet()->setCellValue('BC2', 'Obtener Nueva Muestra');	
		$objPHPExcel->getActiveSheet()->setCellValue('BD2', 'Otras Neoplasias Malignas (Especifique)');
		$objPHPExcel->getActiveSheet()->setCellValue('BE2', 'Patrón Horm. compatible con la Edad y al inf. Clin');
		$objPHPExcel->getActiveSheet()->setCellValue('BF2', 'Patrón Horm. discrepancia con Edad y al inf. Clin');	
		$objPHPExcel->getActiveSheet()->setCellValue('BG2', 'Valoración hormonal no posible por');
		$objPHPExcel->getActiveSheet()->getStyle('A2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('B2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('C2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('D2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('E2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('F2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('G2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('H2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('I2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('J2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('K2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('L2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('M2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('N2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('O2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('P2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('Q2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('R2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('S2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('T2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('U2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('V2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('W2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('X2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('Y2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('Z2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AA2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AB2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AC2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AD2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AE2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AF2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AG2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AH2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AI2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AJ2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AK2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AL2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AM2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AN2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AO2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AP2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AQ2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AR2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AS2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AT2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AU2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AV2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AW2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AX2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AY2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('AZ2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BA2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BB2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BC2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BD2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BE2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BF2')->applyFromArray($estiloTituloColumnas);
		$objPHPExcel->getActiveSheet()->getStyle('BG2')->applyFromArray($estiloTituloColumnas);
		//formato XLSX
		header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header('Content-Disposition: attachment;filename="Excel.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');


	}

	public function importar()
	{

    //obtenemos el archivo subido mediante el formulario
		$file = $_FILES['excel']['name'];
		$tfile = $_FILES['excel']['tmp_name'];
		require_once APPPATH . 'libraries/Classes/PHPExcel/IOFactory.php';
     //Agregamos la librería 

	// Cargo la hoja de cálculo
		$objPHPExcel = PHPExcel_IOFactory::load($tfile);

	//Asigno la hoja de calculo activa
		$objPHPExcel->setActiveSheetIndex(0);
	//Obtengo el numero de filas del archivo
		$numRows = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
		$max_mes = $this->db->query("select max(id_mes) as maximo from datos ")->row();
		$maximo= $max_mes->maximo+1;
		$id_usuario= $_SESSION["id_usuario"];
		for ($i = 3; $i <= $numRows; $i++) {
			$codigorenipres = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
			$vali = $this->Importar_m->validar_codigo($codigorenipres);		
			if ($vali) {
				$cantidad = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
				$dni = $objPHPExcel->getActiveSheet()->getCell('G'.$i)->getCalculatedValue();
				$fecha_nacimiento = $objPHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue();
				$timestamp1 = PHPExcel_Shared_Date::ExcelToPHP($fecha_nacimiento);
				$fecha_nacimiento = gmdate("Y-m-d H:i:s",$timestamp1);
				if ($fecha_nacimiento==0) {
					$fecha_nacimiento='1900-01-01 00:00:00';
				}
				$muestra = $objPHPExcel->getActiveSheet()->getCell('M'.$i)->getCalculatedValue();	
				$fecha_muestra = $objPHPExcel->getActiveSheet()->getCell('N'.$i)->getCalculatedValue();
				if ($fecha_muestra!='') {
					$timestamp2 = PHPExcel_Shared_Date::ExcelToPHP($fecha_muestra);
					$fecha_muestra = gmdate("Y-m-d H:i:s",$timestamp2);
				}	
				$fecha_rechazo = $objPHPExcel->getActiveSheet()->getCell('Z'.$i)->getCalculatedValue();
				if ($fecha_rechazo!='') {
					$timestamp7 = PHPExcel_Shared_Date::ExcelToPHP($fecha_rechazo);
					$timestamp7 = $timestamp7+(5*60 *60);
					$fecha_rechazo = date("Y-m-d H:i:s",$timestamp7);
				}
				$celulas_escamosas_atipicas = $objPHPExcel->getActiveSheet()->getCell('AS'.$i)->getCalculatedValue();	
				$celulas_glandulares_atipicas = $objPHPExcel->getActiveSheet()->getCell('AT'.$i)->getCalculatedValue();	

				$clasificacion_general = $objPHPExcel->getActiveSheet()->getCell('AV'.$i)->getCalculatedValue();
				$fecha_resultado = $objPHPExcel->getActiveSheet()->getCell('AW'.$i)->getCalculatedValue();
				if ($fecha_resultado!='') {
					$timestamp10 = PHPExcel_Shared_Date::ExcelToPHP($fecha_resultado);
					$timestamp10 = $timestamp10+(5*60 *60);
					$fecha_resultado = date("Y-m-d H:i:s",$timestamp10);	
				}
				$leibg = $objPHPExcel->getActiveSheet()->getCell('AX'.$i)->getCalculatedValue();
				$leiag = $objPHPExcel->getActiveSheet()->getCell('AY'.$i)->getCalculatedValue();



				$this->Importar_m->agregar($maximo,$id_usuario,$cantidad,$codigorenipres,$dni,$fecha_nacimiento,$muestra,$fecha_muestra,$fecha_rechazo,$celulas_escamosas_atipicas,$celulas_glandulares_atipicas,$clasificacion_general,$fecha_resultado ,$leibg,$leiag);
			}

		}



	}




}

