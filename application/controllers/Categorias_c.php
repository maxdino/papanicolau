<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categorias_m');
		$this->load->model('Permisos_m');
		
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['categoria']= $this->Categorias_m->mostrar();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='6') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('categoria/Categorias_v',$data);
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
			if ($value->id_modulo=='6') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('categoria/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}

	public function agregar()
	{
		$this->Categorias_m->agregar();
	}

	public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='6') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['categoria']= $this->Categorias_m->categoria_editar($id);
		$this->load->view('categoria/Editar_v',$data);
	}else{
		header('Location: ../../Principal_c');
	}
	}

	public function modificar()
	{
		$this->Categorias_m->modificar();
	}

	public function eliminar()
	{
		$this->Categorias_m->eliminar();
	}

}
