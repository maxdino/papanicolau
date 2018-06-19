<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permisos_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permisos_m');
	}
	public function index()
	{
		$data["permisos"] = $this->Permisos_m->traer_permisos();
		$data["perfiles"] = $this->Permisos_m->traer_perfiles();
		$data["permisos2"] = $this->Permisos_m->traer_modulos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='10') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('seguridad/Permisos/Permisos_v',$data);
		}else{
			header('Location: Principal_c');
		}
	}

	public function modulos_seleccionados()
	{
		$r = $this->db->query("select * from permisos where id_perfil_usuario=".$this->input->post("idperfil"))->result();
		echo json_encode($r);
	}

	public function agregar()
	{
		$this->Permisos_m->agregar();
	}

}

