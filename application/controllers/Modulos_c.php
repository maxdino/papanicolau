<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modulos_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Modulos_m');
	}
	public function index()
	{
		$data['modulos']= $this->Modulos_m->modulos();
		$this->load->view('seguridad/Modulos/Modulos_v',$data);
	}
	public function nuevo()
	{
		$data['iconos']= $this->Modulos_m->iconos();
		$data['padre']= $this->Modulos_m->padre();
		$this->load->view('seguridad/Modulos/Nuevo_v',$data);
	}
	public function agregar()
	{
		$this->Modulos_m->agregar();
	}
	public function eliminar()
	{
		$this->Modulos_m->eliminar();
	}
	public function editar($id)
	{
		$data['modulos']= $this->Modulos_m->modulos_editar($id);
		$data['iconos']= $this->Modulos_m->iconos();
		$data['padre']= $this->Modulos_m->padre();
		$this->load->view('seguridad/Modulos/Editar_v',$data);
	}
	public function modificar()
	{
		$this->Modulos_m->modificar();
	}
}

?>