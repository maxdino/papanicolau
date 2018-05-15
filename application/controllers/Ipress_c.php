<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipress_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ipress_m');
	}


	public function index()
	{
		$data['ipress'] = $this->Ipress_m->mostrar();
		$this->load->view('ipress/Ipress_v',$data);
	}

	public function nuevo()
	{	
		$data['microred'] = $this->Ipress_m->microred();
		$data['tipos'] = $this->Ipress_m->tipos();
		$data['categorias'] = $this->Ipress_m->categorias();
		$data['provincias'] = $this->Ipress_m->provincias();

		$this->load->view('ipress/Nuevo_v',$data);
	}

	public function distritos()
	{
		$r = $this->db->query("select * from distritos where(id_provincias=".$this->input->post("id").")")->result();
		
		echo json_encode($r);
	}

	public function agregar()
	{	
		$this->Ipress_m->agregar();
	}

	public function editar($id)
	{	
		$data['microred'] = $this->Ipress_m->microred();
		$data['ipress'] = $this->Ipress_m->ipress_editar($id);
		$r = $this->db->query("select * from ipress where(id_ipress=".$id.")")->row();
		$r1 = $this->db->query("select * from distritos where(id_distritos=".$r->distrito.")")->row();
		$r2 = $this->db->query("select * from distritos where(id_provincias=".$r1->id_provincias.")")->result();
		$data['distritos_m'] = $r2;
		$data['tipos'] = $this->Ipress_m->tipos();
		$data['categorias'] = $this->Ipress_m->categorias();
		$data['provincias'] = $this->Ipress_m->provincias();
		$data['distritos'] = $this->Ipress_m->distritos();
		$this->load->view('ipress/Editar_v',$data);
	}

	public function modificar()
	{	
		$this->Ipress_m->modificar();
	}

	public function eliminar()
	{	
		$this->Ipress_m->eliminar();
	}

}
