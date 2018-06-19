<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iconos_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Iconos_m');
		$this->load->model('Permisos_m');
	}
	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['iconos']= $this->Iconos_m->iconos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='8') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Iconos/Iconos_v',$data);
	}else{
		header('Location: Principal_c');
	}
	}
	public function nuevo()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='8') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Iconos/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}
	public function agregar()
	{
		$this->Iconos_m->agregar();
	}
	public function eliminar()
	{
		$this->Iconos_m->eliminar();
	}
	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='8') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['iconos']= $this->Iconos_m->iconos_editar($id);
		$this->load->view('seguridad/Iconos/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}
	public function modificar()
	{
		$this->Iconos_m->modificar();
	}
}

?>