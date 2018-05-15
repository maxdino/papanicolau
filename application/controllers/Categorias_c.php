<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categorias_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categorias_m');
	}


	public function index()
	{
		$data['categoria']= $this->Categorias_m->mostrar();
		$this->load->view('categoria/Categorias_v',$data);
	}

	public function nuevo()
	{
		$this->load->view('categoria/Nuevo_v');
	}

	public function agregar()
	{
		$this->Categorias_m->agregar();
	}

	public function editar($id)
	{
		$data['categoria']= $this->Categorias_m->categoria_editar($id);
		$this->load->view('categoria/Editar_v',$data);
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
