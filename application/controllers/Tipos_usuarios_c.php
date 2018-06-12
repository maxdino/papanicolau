<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipos_usuarios_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tipos_usuarios_m');
	}
	public function index()
	{
		$data['tipos_usuarios']= $this->Tipos_usuarios_m->tipos_usuarios();
		$this->load->view('seguridad/Tipos_usuarios/Tipos_usuarios_v',$data);
	}
	public function nuevo()
	{
		$this->load->view('seguridad/Tipos_usuarios/Nuevo_v');
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
		$data['tipos_usuarios']= $this->Tipos_usuarios_m->tipos_usuarios_editar($id);
		$this->load->view('seguridad/Tipos_usuarios/Editar_v',$data);
	}
	public function modificar()
	{
		$this->Tipos_usuarios_m->modificar();
	}
}

?>