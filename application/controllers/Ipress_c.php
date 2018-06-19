<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ipress_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Ipress_m');
		$this->load->model('Permisos_m');
	}


	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['ipress'] = $this->Ipress_m->mostrar();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='7') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('ipress/Ipress_v',$data);
		}else{
			header('Location: Principal_c');
		}
	}

	public function nuevo()
	{	
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['microred'] = $this->Ipress_m->microred();
		$data['tipos'] = $this->Ipress_m->tipos();
		$data['categorias'] = $this->Ipress_m->categorias();
		$data['provincias'] = $this->Ipress_m->provincias();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='7') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('ipress/Nuevo_v',$data);
		}else{
			header('Location: ../Principal_c');
		}
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
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['microred'] = $this->Ipress_m->microred();
		$data['categorias'] = $this->Ipress_m->categorias();
		$data['provincias'] = $this->Ipress_m->provincias();
		$data['distritos'] = $this->Ipress_m->distritos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='7') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['ipress'] = $this->Ipress_m->ipress_editar($id);
		$r = $this->db->query("select * from ipress where(codigo=".$id.")")->row();
		$r1 = $this->db->query("select * from distritos where(id_distritos=".$r->distrito.")")->row();
		$r2 = $this->db->query("select * from distritos where(id_provincias=".$r1->id_provincias.")")->result();
		$data['distritos_m'] = $r2;
		$data['tipos'] = $this->Ipress_m->tipos();	
		$this->load->view('ipress/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}

	public function modificar()
	{	
		$this->Ipress_m->modificar();
	}

	public function eliminar()
	{	
		$this->Ipress_m->eliminar();
	}

	public function validar_codigo(){
		$r = $this->Ipress_m->validar_codigo();
		if ($r) {
			echo json_encode('0');
		}else{
			echo json_encode('1');
		}
	}
	

}
