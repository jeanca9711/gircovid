<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Personas_model extends CI_Model {

    var $tablep='datos_personas';
    var $tablet='tipos_documento';


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

    public function getAllTipoDocumento()
    {
        $query=$this->db->query("select * from tipo_documento a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getCasosTableIndex()
    {
        $query=$this->db->query("select r.Id, t.Tipo_Doc, p.Numero_Doc, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, p.F_Nacimiento, p.Edad, p.Sexo, e.Desc_Estado from registro_caso r inner join datos_personas p on r.DATOS_PERSONAS_Id=p.Id inner join tipo_documento t on p.TIPO_DOCUMENTO_Id=t.Id inner join estados_actual_covid e on r.ESTADOS_ACTUAL_COVID_Id=e.Id where r.state='ACTIVO'");
        return $query->result();
    }

    public function getMaxIdPersona()
    {
     $query=$this->db->query("select max(a.Id) as Id from datos_personas a where a.state not in ('INACTIVO')");
     return $query->result();
    }


    public function addPersona()
    {
        
        $data['Numero_Doc']=$this->input->post('documento');
        $data['Nombre_1']=strtoupper($this->input->post('nombre1'));
        $data['Nombre_2']=strtoupper($this->input->post('nombre2'));
        $data['Apellido_1']=strtoupper($this->input->post('apellido1'));
        $data['Apellido_2']=strtoupper($this->input->post('apellido2'));
        $data['F_Nacimiento']=$this->input->post('fnacimiento');
        $data['Sexo']=$this->input->post('sexo');
        $data['Regimen']=$this->input->post('regimen');
        $data['Dane_Ubicacion_Caso']=$this->input->post('mpio_ubicacion');
        $data['Dane_BDUA_Afiliado']=$this->input->post('mpio_bdua');
        $data['Telefono']=$this->input->post('telefono');
        $data['Direccion']=$this->input->post('direccion');
        $data['Correo']=strtolower($this->input->post('email'));
        $data['TIPO_DOCUMENTO_Id']=$this->input->post('tdocumeno');
        $data['state']='ACTIVO';
        return $this->db->insert($this->tablep, $data);
    }

    public function updatePersonas()
    {
        $idpersona=$this->input->post('idpersona');

        $data['Telefono']=$this->input->post('telefono');
        $data['Direccion']=$this->input->post('direccion');
        $data['Correo']=strtolower($this->input->post('email'));
        $this->db->where('Id',$idpersona);//where id= $id
        if($this->db->update($this->tablep, $data)){
            return true;
        }
        //$this->db->affected_rows();// retornar el numero de registros afectados
    }

}//end class

?>