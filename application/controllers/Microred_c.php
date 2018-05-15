<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Microred_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Microred_m');
	}


	public function index()
	{
		$data['microred']= $this->Microred_m->mostrar();
		$data['red']= $this->Microred_m->mostrar_red();
		$this->load->view('microred/Microred_v',$data);
	}

	public function nuevo()
	{
		$data['red']= $this->Microred_m->mostrar_red();
		$this->load->view('microred/Nuevo_v',$data);
	}

	public function agregar()
	{
		$this->Microred_m->agregar();
	}

	public function editar($id)
	{
		$data['microred']= $this->Microred_m->microred_editar($id);
		$data['red']= $this->Microred_m->mostrar_red();
		$this->load->view('microred/Editar_v',$data);
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
