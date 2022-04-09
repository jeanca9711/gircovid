<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    var $table='datos_usuarios';


    public function __construct()
    {
        //parent::__construct();
        $this->load->database();// cargando la conexion a DB
    }


    // devolver el listado de todos los propietarios
    public function getAll()
    {
        $query=$this->db->query("select * from usuarios a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getLogin($usuario, $contrasena)
    {
     $query=$this->db->query("select * from datos_usuarios a where a.Email='$usuario' and a.Contrasena='$contrasena' and a.state='ACTIVO'");
     return $query->result();
    }

    public function getByid($id)
    {    
        $this->db->from($this->table);
        $this->db->where('Id',$id);
        $query = $this->db->get();
        return $query->result();
        
    }

    public function add()
    {
        $data['udocumento']=$this->input->post('documento');
        $data['unombres']=$this->input->post('nombres');
        $data['uapellidos']=$this->input->post('apellidos');
        $data['uemail']=$this->input->post('email');
        $data['ucontrasena']=$this->input->post('contrasena');
        $data['state']='ACTIVO';
        $data['udireccion']=$this->input->post('direccion');
        $data['ubarrio']=$this->input->post('barrio');
        $data['tipo_usuarios_id']=2;
        return $this->db->insert($this->table, $data);
    }

}//end class

?>