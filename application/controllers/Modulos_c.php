<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulos_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modulos_m');
		$this->load->model('Permisos_m');
	}
	public function index()
	{
		$data['permisos'] = $this->Permisos_m->traer_permisos();
		$data['modulos']= $this->Modulos_m->modulos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='9') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Modulos/Modulos_v',$data);
		}else{
		header('Location: Principal_c');
	}
	}
	public function nuevo()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['iconos']= $this->Modulos_m->iconos();
		$data['padre']= $this->Modulos_m->padre();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='9') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Modulos/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}
	public function agregar()
	{
		$this->Modulos_m->agregar();
	}
	public function eliminar()
	{
		$this->Modulos_m->eliminar();
	}
	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='9') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['modulos']= $this->Modulos_m->modulos_editar($id);
		$data['iconos']= $this->Modulos_m->iconos();
		$data['padre']= $this->Modulos_m->padre();
		$this->load->view('seguridad/Modulos/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}
	public function modificar()
	{
		$this->Modulos_m->modificar();
	}
}

?>