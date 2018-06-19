<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Red_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Red_m');
		$this->load->model('Permisos_m');
	}


	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['red']= $this->Red_m->mostrar();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='3') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('red/Red_v',$data);
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
			if ($value->id_modulo=='3') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('red/Nuevo_v',$data);
	}else{
		header('Location: ../Principal_c');
	}
	}

	public function agregar()
	{
		$this->Red_m->agregar();
	}

	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='3') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['red']= $this->Red_m->red_editar($id);
		$this->load->view('red/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}

	public function modificar()
	{
		$this->Red_m->modificar();
	}

	public function eliminar()
	{
		$this->Red_m->eliminar();
	}

}
