<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Casos_model extends CI_Model {

    var $tabler='registro_caso';
    var $tablef='factores_riesgo';
    var $tablec='contactos';


    public function __construct()
    {
        //parent::__construct();
        $this->load->database();// cargando la conexion a DB
        $this->load->model('Personas_model');//cargando el modelo personas
    }


    // devolver el listado de todos los propietarios
    public function getAll()
    {
        $query=$this->db->query("select * from usuarios a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getCasosById($id)
    {
        $query=$this->db->query("select c.Id, t.Tipo_Doc, p.Numero_doc, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, p.F_Nacimiento, date_format(now(), '%Y') - date_format(p.F_Nacimiento, '%Y') - (date_format(now(), '00-%m-%d') < date_format(p.F_Nacimiento, '00-%m-%d')) AS Edad, p.Sexo, p.Regimen, p.Dane_Ubicacion_Caso, d.Desc_Mpio, d.Desc_Dpto, e.Desc_Estado from registro_caso c inner join datos_personas p on p.Id=c.DATOS_PERSONAS_Id inner join tipo_documento t on p.TIPO_DOCUMENTO_Id=t.Id inner join dane d on p.Dane_Ubicacion_Caso=d.Codigo_Dane inner join estados_actual_covid e on e.Id=c.ESTADOS_ACTUAL_COVID_Id where c.Id=$id");
        return $query->result();
    }

    public function getAllCasosById($id)
    {
        $query=$this->db->query("select c.Id, c.DATOS_PERSONAS_Id, p.TIPO_DOCUMENTO_Id, p.Numero_doc, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, p.F_Nacimiento, p.Sexo, p.Regimen, p.Dane_Ubicacion_Caso, p.Telefono, p.Direccion, p.Correo, p.Dane_BDUA_Afiliado, c.Id_Caso_SegCovid, c.Id_Caso_INS, c.Aud_Responsable, c.TIPOS_CONTACTO_Id, c.ESTADOS_ACTUAL_COVID_Id, c.FUENTES_CASO_Id, f.Mayor_50, f.Diabetes, f.Enf_Cardiovascular, f.Enf_Resp_Cronica, f.Cancer, f.Inmunodeficiencia, f.Cond_Aisl_Domiciliario from registro_caso c inner join datos_personas p on c.DATOS_PERSONAS_Id=p.Id inner join factores_riesgo f on c.FACTORES_RIESGO_Id=f.Id where c.Id=$id");
        return $query->result();
    }

    public function getCasosCompletosById($id)
    {
        $query=$this->db->query("select c.Id, t.Tipo_Doc, p.Numero_doc, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, p.F_Nacimiento, date_format(now(), '%Y') - date_format(p.F_Nacimiento, '%Y') - (date_format(now(), '00-%m-%d') < date_format(p.F_Nacimiento, '00-%m-%d')) AS Edad, p.Sexo, p.Regimen, p.Dane_Ubicacion_Caso, e.Desc_Estado, c.FACTORES_RIESGO_Id, f.Mayor_50, f.Diabetes, f.Enf_Cardiovascular, f.Enf_Resp_Cronica, f.Cancer, f.Inmunodeficiencia, f.Cond_Aisl_Domiciliario from registro_caso c inner join datos_personas p on p.Id=c.DATOS_PERSONAS_Id inner join tipo_documento t on p.TIPO_DOCUMENTO_Id=t.Id inner join estados_actual_covid e on e.Id=c.ESTADOS_ACTUAL_COVID_Id inner join factores_riesgo f on c.FACTORES_RIESGO_Id=f.Id where c.Id=$id");
        return $query->result();
    }

    public function getAllDepartamentos()
    {
        $query=$this->db->query("select * from dane a where a.state='ACTIVO' group by a.Desc_Dpto");
        return $query->result();
    }

    public function getAllMunicipios($departamento)
    {
        $query=$this->db->query("select * from dane a where a.Codigo_Dpto='$departamento' and a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllMunicipios2()
    {
        $query=$this->db->query("select a.* from dane a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllDepartamentosAMBUQ()
    {
        $query=$this->db->query("select * from dane a where a.Cobertura='SI' and a.state='ACTIVO' group by a.Desc_Dpto");
        return $query->result();
    }

    public function getAllMunicipiosAMBUQ($departamento)
    {
        $query=$this->db->query("select * from dane a where a.Codigo_Dpto='$departamento' and a.Cobertura='SI' and a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllTiposContacto()
    {
        $query=$this->db->query("select * from tipos_contacto a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllEstadosCovid()
    {
        $query=$this->db->query("select * from estados_actual_covid a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllFuentesCaso()
    {
        $query=$this->db->query("select * from fuentes_caso a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getCasosTableIndex()
    {
        $query=$this->db->query("select r.Id, t.Tipo_Doc, p.Numero_Doc, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, p.F_Nacimiento, date_format(now(), '%Y') - date_format(p.F_Nacimiento, '%Y') - (date_format(now(), '00-%m-%d') < date_format(p.F_Nacimiento, '00-%m-%d')) AS Edad, p.Sexo, e.Desc_Estado from registro_caso r inner join datos_personas p on r.DATOS_PERSONAS_Id=p.Id inner join tipo_documento t on p.TIPO_DOCUMENTO_Id=t.Id inner join estados_actual_covid e on r.ESTADOS_ACTUAL_COVID_Id=e.Id where r.state='ACTIVO'");
        return $query->result();
    }

    public function getSeguimientosTableIndex($id)
    {
        $query=$this->db->query("select s.Id, s.Fecha_Hora, s.No_Atencion, s.F_Cargue_Sgto, d.Desc_Dpto, d.Desc_Mpio, a.Direccion, a.Telefono, ma.Desc_Motivo, ta.Desc_Aislamiento, p.F_Ultima_Prueba, p.F_Resultado, p.F_Resultado, tp.Desc_Resultado from registro_seguimiento s inner join datos_aislamiento_internacion a on s.DATOS_AISLAMIENTO_INTERNACION_Id=a.Id inner join dane d on a.Dane_Ubicacion=d.Codigo_Dane inner join motivos_aislamiento ma on a.MOTIVO_AISLAMIENTO_Id=ma.Id inner join tipos_aislamiento ta on a.TIPO_AISLAMIENTO_Id=ta.Id inner join registro_caso c on s.REGISTRO_CASO_Id=c.Id inner join pruebas_lab_covid p on s.PRUEBAS_LAB_COVID_Id=p.Id inner join tipos_resultados_prueba tp on p.TIPO_RESULTADO_PRUEBA_Id=tp.Id where s.REGISTRO_CASO_Id=$id and s.state='ACTIVO'");
        return $query->result();
    }

    public function getMaxIdFactoresRiesgo()
    {
        $query=$this->db->query("select max(a.Id) as Id from factores_riesgo a where a.state not in ('INACTIVO')");
        return $query->result();
    }

    public function validarDocumento($documento)
    {
        $query=$this->db->query("select p.Numero_doc, a.* from registro_caso a inner join datos_personas p on a.DATOS_PERSONAS_Id=p.Id where a.state not in ('INACTIVO') and p.Numero_doc='$documento'");
        return $query->result();
    }

    public function validarContacto($documento,$casoid)
    {
        $query=$this->db->query("select c.* from contactos c inner join registro_caso ca on c.REGISTRO_CASO_Id=ca.Id where c.Identificacion='$documento' and c.Id='$casoid'");
        return $query->result();
    }

    public function getLastEstadoAfectacion($casoid)
    {
     $query=$this->db->query("select ea.Desc_Estado from registro_caso c inner join registro_seguimiento s on s.REGISTRO_CASO_Id=c.Id inner join pruebas_lab_covid p on s.PRUEBAS_LAB_COVID_Id=p.Id inner join estados_afectacion ea on p.ESTADO_AFECTACION_Id=ea.Id where s.Id=(select max(a.Id) from registro_seguimiento a inner join registro_caso b on a.REGISTRO_CASO_Id=b.Id where b.Id=$casoid and a.state='ACTIVO') and c.Id=$casoid");
     return $query->result();
    }


    public function add()
    {
        if($this->Personas_model->addPersona()){ //Agregamos la persona
            $idpersonas=$this->Personas_model->getMaxIdPersona();
            foreach($idpersonas as $idpersona){
                $personasid=$idpersona->Id; //Cojemos el id del factor agregado
            }

            if($this->addFactoresRiesgo()){ //Agregamos los factores de riesgo
                $idfactores=$this->getMaxIdFactoresRiesgo();
                foreach($idfactores as $idfactor){
                    $factoresriesgoid=$idfactor->Id; //Cojemos el id del factor agregado
                }
                //- AGREGAMOS EL CASO -//
                return $this->addRegistroCaso($personasid, $factoresriesgoid, $this->session->idusuario);

            }
        }
    }

    public function update()
    {
        if($this->Personas_model->updatePersonas()){ //Agregamos la persona
            return $this->updateRegistroCasos();
        }
    }

    public function addRegistroCaso($personasid, $factoresriesgoid, $usuarioid)
    {
        $data['F_Cargue_Caso']=date('Y-m-d G:i:s');
        $data['Aud_Responsable']=$usuarioid;//$this->input->post('aud_responsable');
        $data['FACTORES_RIESGO_Id']=$factoresriesgoid;
        $data['FUENTES_CASO_Id']=$this->input->post('fuente_caso');
        $data['ESTADOS_ACTUAL_COVID_Id']=$this->input->post('estado_covid');
        $data['Id_Caso_SegCovid']=$this->input->post('id_segcovid');
        $data['Id_Caso_INS']=$this->input->post('id_ins');
        $data['TIPOS_CONTACTO_Id']=$this->input->post('tipo_contacto');
        $data['DATOS_PERSONAS_Id']=$personasid;
        $data['DATOS_USUARIOS_Id']=$usuarioid;
        $data['state']='ACTIVO';
        return $this->db->insert($this->tabler, $data);
    }
    
    
    public function addFactoresRiesgo()
    {
        $mayor50="";
        $diabetes="";
        $enfcardiovascular="";
        $enfrespiratoria="";
        $cancer="";
        $inmunodeficiencia="";
        $aislamientodomiciliario="";

        if($this->input->post('mayor50')) $mayor50=$this->input->post('mayor50');
        else $mayor50='NO';

        if($this->input->post('diabetes')) $diabetes=$this->input->post('diabetes');
        else $diabetes='NO';

        if($this->input->post('enfcardiovascular')) $enfcardiovascular=$this->input->post('enfcardiovascular');
        else $enfcardiovascular='NO';

        if($this->input->post('enfrespiratoria')) $enfrespiratoria=$this->input->post('enfrespiratoria');
        else $enfrespiratoria='NO';

        if($this->input->post('cancer')) $cancer=$this->input->post('cancer');
        else $cancer='NO';

        if($this->input->post('inmunodeficiencia')) $inmunodeficiencia=$this->input->post('inmunodeficiencia');
        else $inmunodeficiencia='NO';

        if($this->input->post('aislamientodomiciliario')) $aislamientodomiciliario=$this->input->post('aislamientodomiciliario');
        else $aislamientodomiciliario='NO';

        $data['Mayor_50']=$mayor50;
        $data['Diabetes']=$diabetes;
        $data['Enf_Cardiovascular']=$enfcardiovascular;
        $data['Enf_Resp_Cronica']=$enfrespiratoria;
        $data['Cancer']=$cancer;
        $data['Inmunodeficiencia']=$inmunodeficiencia;
        $data['Cond_Aisl_Domiciliario']=$aislamientodomiciliario;
        $data['state']='ACTIVO'; 
        return $this->db->insert($this->tablef, $data);
    }

    public function addContacto()
    {
        if($this->input->post('contactado')) $contactado=$this->input->post('contactado');
        else $contactado='NO';

        $data['Identificacion']=$this->input->post('documento');
        $data['Nombre_1']=strtoupper($this->input->post('nombre1'));
        $data['Nombre_2']=strtoupper($this->input->post('nombre2'));
        $data['Apellido_1']=strtoupper($this->input->post('apellido1'));
        $data['Apellido_2']=strtoupper($this->input->post('apellido2'));
        $data['Aseguradora']=strtoupper($this->input->post('aseguradora'));
        $data['Direccion']=strtoupper($this->input->post('direccion'));
        $data['Telefono']=$this->input->post('telefono');
        $data['Contactado']=$contactado;
        $data['REGISTRO_CASO_Id']=$this->input->post('idcaso');
        $data['DANE_Codigo_Dane']=$this->input->post('mpio_ubicacion');
        $data['TIPO_DOCUMENTO_Id']=$this->input->post('tdocumeno');
        $data['TIPO_PARENTESCO_Id']=$this->input->post('parentesco');
        $data['state']='ACTIVO';
        return $this->db->insert($this->tablec, $data);
    }

    public function updateRegistroCasos()
    {        
        $idcaso=$this->input->post('idcaso');

        $data['Id_Caso_SegCovid']=$this->input->post('id_segcovid');
        $data['Id_Caso_INS']=$this->input->post('id_ins');
        $this->db->where('Id',$idcaso);//where id= $id
        if($this->db->update($this->tabler, $data)){
            return true;
        }
         //$this->db->affected_rows();// retornar el numero de registros afectados
    }

    public function getAllContactos($id)
    {
        $query=$this->db->query("select td.Tipo_Doc, c.Identificacion, c.Nombre_1, c.Nombre_2, c.Apellido_1, c.Apellido_2, c.Aseguradora, c.Direccion, c.Telefono, c.Contactado, tp.Desc_Parentesco, d.Desc_Mpio, d.Desc_Dpto from contactos c inner join tipo_documento td on c.TIPO_DOCUMENTO_Id=td.Id inner join tipo_parentesco tp on c.TIPO_PARENTESCO_Id=tp.Id inner join dane d on c.DANE_Codigo_Dane=d.Codigo_Dane where c.REGISTRO_CASO_Id=$id");
        return $query->result();
    }

    public function getAllParentesco()
    {
        $query=$this->db->query("select * from tipo_parentesco a where a.state='ACTIVO'");
        return $query->result();
    }

}//end class

?>