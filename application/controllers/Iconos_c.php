<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Iconos_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Iconos_m');
	}
	public function index()
	{
		$data['iconos']= $this->Iconos_m->iconos();
		$this->load->view('seguridad/Iconos/Iconos_v',$data);
	}
	public function nuevo()
	{
		$this->load->view('seguridad/Iconos/Nuevo_v');
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
		$data['iconos']= $this->Iconos_m->iconos_editar($id);
		$this->load->view('seguridad/Iconos/Editar_v',$data);
	}
	public function modificar()
	{
		$this->Iconos_m->modificar();
	}
}

?>