<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_m');
		$this->load->model('Permisos_m');
	}


public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['usuarios']= $this->Usuarios_m->usuarios();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='12') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Usuarios/Usuarios_v',$data);
		}else{
		header('Location: Principal_c');
	}
	}

public function nuevo()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfiles']= $this->Usuarios_m->perfiles();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='12') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Usuarios/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}

public function agregar()
	{
		$this->Usuarios_m->agregar();
	}

public function eliminar()
	{
		$this->Usuarios_m->eliminar();
	}

public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='12') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['perfiles']= $this->Usuarios_m->perfiles();
		$data['usuarios']= $this->Usuarios_m->usuarios_editar($id);
		$this->load->view('seguridad/Usuarios/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}


public function modificar()
	{
		$this->Usuarios_m->modificar();
	}
}

?>