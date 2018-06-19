<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tipo_m');
		$this->load->model('Permisos_m');
	}


	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['tipo']= $this->Tipo_m->mostrar();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='5') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('tipo/Tipo_v',$data);
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
			if ($value->id_modulo=='5') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('tipo/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}

	public function agregar()
	{
		$this->Tipo_m->agregar();
	}

	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='5') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['tipo']= $this->Tipo_m->tipo_editar($id);
		$this->load->view('tipo/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}

	public function modificar()
	{
		$this->Tipo_m->modificar();
	}

	public function eliminar()
	{
		$this->Tipo_m->eliminar();
	}

}
