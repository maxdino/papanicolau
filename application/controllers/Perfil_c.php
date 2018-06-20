<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Permisos_m');
		$this->load->model('Perfil_m');
		
	}

	public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfil']= $this->Perfil_m->perfil();
		$this->load->view('seguridad/Perfil/Perfil_v',$data);
	}

	public function nuevo()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='6') {
				$entra=1;
			}
		}
		if ($entra=='1') {
			$this->load->view('categoria/Nuevo_v',$data);
		}else{
			header('Location: ../Principal_c');
		}
	}

	public function agregar()
	{
		$this->Categorias_m->agregar();
	}

	public function editar_usuario()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfil']= $this->Perfil_m->editar_perfil();
		$this->load->view('seguridad/Perfil/Editar_usuario_v',$data);
	}

	public function editar_clave()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfil']= $this->Perfil_m->editar_perfil();
		$this->load->view('seguridad/Perfil/Editar_clave_v',$data);
	}

	public function editar()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfil']= $this->Perfil_m->editar_perfil();
		$this->load->view('seguridad/Perfil/Editar_v',$data);
	}

	public function modificar_imagen()
	{
		if ($this->input->post("valida_imagen")!=1) {
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino= "public/foto/".$foto;
			copy($ruta, $destino);
			print_r($destino);
		}else{
			$destino=$this->input->post("src_imagen");
		}
		$modificar = array(
			'foto' => $destino, 
		);
		$this->db->where("id_usuario",$_SESSION["id_usuario"]);
		$this->db->update("usuario",$modificar);
	}

	public function modificar_clave()
	{
		$r = $this->db->query("select * from usuario where id_usuario=".$_SESSION["id_usuario"])->row();
		$cam= $r->cambios+1;
		$usuario = substr($_SESSION["usuario"], 0, 1);
		$clave = md5($usuario).''.base64_encode($this->input->post("clave"));
		$modificar = array(
			'cambios' => $cam, 
			'clave' => $clave, 
		);
		$this->db->where("id_usuario",$_SESSION["id_usuario"]);
		//$this->db->where("clave",$this->input->post("clave_actual"));
		$this->db->update("usuario",$modificar);
	}

	public function modificar_usuario()
	{
		$modificar = array(
			'usuario' => $this->input->post("usuario"), 
		);
		$this->db->where("id_usuario",$_SESSION["id_usuario"]);
		$this->db->update("usuario",$modificar);
	}

	public function eliminar()
	{
		$this->Categorias_m->eliminar();
	}

}
