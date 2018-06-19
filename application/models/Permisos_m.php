<?php

class Permisos_m extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function traer_permisos()
    {
        $this->db->select("h.id_modulos as idpadre, h.nombres as padre, pa.nombres as hijo, pa.id_modulos as idhijo, pai.codigo as ipadre,i.codigo as codigo, pa.url");
        $this->db->from("modulos as h");
        $this->db->join("modulos as pa","h.id_modulos=pa.padre");
        $this->db->join("iconos as i","pa.iconos=i.id_iconos");
        $this->db->join("iconos as pai","h.iconos=pai.id_iconos");
        $this->db->join("permisos as p","p.id_modulo=pa.id_modulos");
        $this->db->join("tipos_usuarios as pu","pu.id_tipos_usuarios=p.id_perfil_usuario");
        $this->db->where("pu.id_tipos_usuarios",$_SESSION["tipos_usuarios"]);
        $this->db->order_by("h.id_modulos","asc");
        $r = $this->db->get();
        return $r->result();
    }

    public function traer_modulos()
    {
        $this->db->select("h.id_modulos as idpadre, h.nombres as padre, pa.nombres as hijo, pa.id_modulos as idhijo, pai.codigo as ipadre,i.codigo as codigo, pa.url");
        $this->db->from("modulos as h");
        $this->db->join("modulos as pa","h.id_modulos=pa.padre");
        $this->db->join("iconos as i","pa.iconos=i.id_iconos");
        $this->db->join("iconos as pai","h.iconos=pai.id_iconos");
        $this->db->order_by("h.id_modulos","asc");
        $r = $this->db->get();
        return $r->result();
    }

    public function traer_perfiles()
    {
        $r = $this->db->get_where("tipos_usuarios");
        return $r->result();
    }

    public function agregar()
    {
    $this->db->where("id_perfil_usuario",$this->input->post("perfil_usuario"));   
    $this->db->delete("permisos",$datos);   

    for ($i=0; $i < count($_POST['modulos']) ; $i++) { 
    $datos = array(
    "id_modulo" => $_POST['modulos'][$i],
    "id_perfil_usuario" => $this->input->post("perfil_usuario"),
    );
    $this->db->insert("permisos",$datos);
    }
    }

    public function validar_modulos($id){
     return $r = $this->db->query('select id_modulo from permisos as p inner join tipos_usuarios as t on p.id_perfil_usuario=t.id_tipos_usuarios where t.id_tipos_usuarios ='.$id)->result();
    } 
}
?>