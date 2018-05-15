<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Red_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Red_m');
	}


	public function index()
	{
		$data['red']= $this->Red_m->mostrar();
		$this->load->view('red/Red_v',$data);
	}

	public function nuevo()
	{
		$this->load->view('red/Nuevo_v');
	}

	public function agregar()
	{
		$this->Red_m->agregar();
	}

	public function editar($id)
	{
		$data['red']= $this->Red_m->red_editar($id);
		$this->load->view('red/Editar_v',$data);
	}

	public function modificar()
	{
		$this->Red_m->modificar();
	}

	public function eliminar()
	{
		$this->Red_m->eliminar();
	}

}
