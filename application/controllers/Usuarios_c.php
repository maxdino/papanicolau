<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_m');

	}



public function index()
	{
		$data['usuarios']= $this->Usuarios_m->usuarios();
		$this->load->view('seguridad/Usuarios/Usuarios_v',$data);
	}

public function nuevo()
	{
		$this->load->view('seguridad/Usuarios/Nuevo_v');
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
		$data['usuarios']= $this->Usuarios_m->usuarios_editar($id);
		$this->load->view('seguridad/Usuarios/Editar_v',$data);
	}


public function modificar()
	{
		$this->Usuarios_m->modificar();
	}
}

?>