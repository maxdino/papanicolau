<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permisos_m');
		$this->load->model('Perfil_m');
		
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfil']= $this->Perfil_m->perfil();
		$this->load->view('seguridad/Perfil/Perfil_v',$data);
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
		$data['perfil']= $this->Perfil_m->editar_perfil($id);
		$this->load->view('seguridad/Perfil/Editar_v',$data);
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
