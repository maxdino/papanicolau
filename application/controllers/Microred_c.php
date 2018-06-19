<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Microred_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Microred_m');
		$this->load->model('Permisos_m');
	}


	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['microred']= $this->Microred_m->mostrar();
		$data['red']= $this->Microred_m->mostrar_red();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='4') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('microred/Microred_v',$data);
	}else{
		header('Location: Principal_c');
	}
	}

	public function nuevo()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['red']= $this->Microred_m->mostrar_red();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='4') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('microred/Nuevo_v',$data);
		}else{
			header('Location: ../Principal_c');
		}
	}

	public function agregar()
	{
		$this->Microred_m->agregar();
	}

	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='4') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['microred']= $this->Microred_m->microred_editar($id);
		$data['red']= $this->Microred_m->mostrar_red();
		$this->load->view('microred/Editar_v',$data);
		}else{
			header('Location: ../../Principal_c');
		}
	}

	public function modificar()
	{
		$this->Microred_m->modificar();
	}

	public function eliminar()
	{
		$this->Microred_m->eliminar();
	}

}
