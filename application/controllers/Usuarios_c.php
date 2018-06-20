<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuarios_m');
		$this->load->model('Permisos_m');
	}


public function index()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['usuarios']= $this->Usuarios_m->usuarios();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='12') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Usuarios/Usuarios_v',$data);
		}else{
		header('Location: Principal_c');
	}
	}

public function nuevo()
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$data['perfiles']= $this->Usuarios_m->perfiles();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='12') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$this->load->view('seguridad/Usuarios/Nuevo_v',$data);
		}else{
		header('Location: ../Principal_c');
	}
	}

public function agregar()
	{
		if ($this->input->post("valida_imagen")!=1) {
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino= "public/foto/".$foto;
			copy($ruta, $destino);
		}else{
			$destino='public/foto/user_1.jpg';
		}
		$usuario = substr($this->input->post("usuario"), 0, 1);
		$clave = md5($usuario).''.base64_encode($this->input->post("clave"));
		$agregar = array(
		'nombre' => strtoupper(trim($this->input->post("nombres"))), 
		'apellido' => strtoupper(trim($this->input->post("apellidos"))), 
		'usuario' => $this->input->post("usuario"), 
		'foto' => $destino, 
		'tipos_usuarios' => $this->input->post("perfil_usuario"), 
		'clave' => $clave,
		'estado' => '1',
		);
		$this->db->insert("usuario",$agregar);
	}

public function eliminar()
	{
		$this->Usuarios_m->eliminar();
	}

public function editar($id)
	{
		$data['permisos']= $this->Permisos_m->traer_permisos();
		$r = $this->Permisos_m->validar_modulos($_SESSION["tipos_usuarios"]);
		$entra=0;
		foreach ($r as $value) {
			if ($value->id_modulo=='12') {
				$entra=1;
			}
		}
		if ($entra=='1') {
		$data['perfiles']= $this->Usuarios_m->perfiles();
		$data['usuarios']= $this->Usuarios_m->usuarios_editar($id);
		$this->load->view('seguridad/Usuarios/Editar_v',$data);
		}else{
		header('Location: ../../Principal_c');
	}
	}

public function modificar()
	{
		if ($this->input->post("valida_imagen")!=1) {
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino= "public/foto/".$foto;
			copy($ruta, $destino);
		}else{
			$destino= $this->input->post("src_imagen");
		}
		$usuario = substr($this->input->post("usuario"), 0, 1);
		$clave = md5($usuario).''.base64_encode($this->input->post("clave"));
		$modificar = array(
		'nombre' => strtoupper(trim($this->input->post("nombres"))), 
		'apellido' => strtoupper(trim($this->input->post("apellidos"))), 
		'usuario' => $this->input->post("usuario"), 
		'tipos_usuarios' => $this->input->post("perfil_usuario"), 
		'foto' => $destino, 
		'clave' => $clave,
		'estado' => '1',
		);
		$this->db->where("id_usuario",$this->input->post("id_usuario_modificar"));
		$this->db->update("usuario",$modificar);
	}
}

?>