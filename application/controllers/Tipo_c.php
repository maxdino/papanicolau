<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tipo_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Tipo_m');
	}


	public function index()
	{
		$data['tipo']= $this->Tipo_m->mostrar();
		$this->load->view('tipo/Tipo_v',$data);
	}

	public function nuevo()
	{
		$this->load->view('tipo/Nuevo_v');
	}

	public function agregar()
	{
		$this->Tipo_m->agregar();
	}

	public function editar($id)
	{
		$data['tipo']= $this->Tipo_m->tipo_editar($id);
		$this->load->view('tipo/Editar_v',$data);
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
