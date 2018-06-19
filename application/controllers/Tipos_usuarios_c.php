<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_usuarios_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tipos_usuarios_m');
		$this->load->model('Permisos_m');
	}
	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['tipos_usuarios']= $this->Tipos_usuarios_m->tipos_usuarios();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='11') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Tipos_usuarios/Tipos_usuarios_v',$data);
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
			if ($value->id_modulo=='11') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Tipos_usuarios/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}
	public function agregar()
	{
		$this->Tipos_usuarios_m->agregar();
	}
	public function eliminar()
	{
		$this->Tipos_usuarios_m->eliminar();
	}
	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='11') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['tipos_usuarios']= $this->Tipos_usuarios_m->tipos_usuarios_editar($id);
		$this->load->view('seguridad/Tipos_usuarios/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}
	public function modificar()
	{
		$this->Tipos_usuarios_m->modificar();
	}
}

?>