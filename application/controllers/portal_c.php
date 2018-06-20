<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Portal_m');
		$this->load->model('Permisos_m');

	}

	public function index()
	{
		$this->load->view('portal/index');
	}


	public function autentificar()
	{
		$r = $this->Portal_m->comprobar();
		if($r)
		{ 
			$_SESSION["personal"] = $r[0]->nombre;
			$_SESSION["usuario"] = $r[0]->usuario;
			$_SESSION["id_usuario"] = $r[0]->id_usuario;
			$_SESSION["tipos_usuarios"] = $r[0]->tipos_usuarios;
			$_SESSION["nombre_tipo_usuario"] = $r[0]->nombre_tipo;
			$_SESSION["foto"] = $r[0]->foto;
			$_SESSION["recuerdo"] =	$this->input->post("recuerdo");
			if($this->input->post("recuerdo")=='1'){
				setcookie('usuario',$r[0]->usuario, time()+ 3600,"/");
				setcookie('recuerdo','1', time()+ 3600,"/");
			}
			$data['autentificar']='1';
			echo json_encode($data);
		}
		else
		{
			$data['autentificar']='0';
			echo json_encode($data);
		}
	}




}

