<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seguimientos_model extends CI_Model {

    var $tableseg='registro_seguimiento';
    var $tablec='registro_caso';
    var $tableai='datos_aislamiento_internacion';
    var $tablep='pruebas_lab_covid';
    var $tables='sintomas_signos_alarma';
    var $tablesa='sintomas_alarma_actual';
    var $tablef='factores_riesgo';


    public function __construct()
    {
        //parent::__construct();
        $this->load->database();// cargando la conexion a DB
        $this->load->model('Personas_model');//cargando el modelo personas
    }


    // devolver el listado de todos los propietarios
    public function getAllSeguimiento($id)
    {
        $query=$this->db->query("select s.Id, s.No_Atencion, s.Fecha_Hora, td.Tipo_Doc, p.Numero_doc, p.F_Nacimiento, date_format(now(), '%Y') - date_format(p.F_Nacimiento, '%Y') - (date_format(now(), '00-%m-%d') < date_format(p.F_Nacimiento, '00-%m-%d')) AS Edad, p.Nombre_1, p.Nombre_2, p.Apellido_1, p.Apellido_2, p.Sexo, f.Mayor_50, f.Diabetes, f.Enf_Cardiovascular, f.Enf_Resp_Cronica, f.Cancer, f.Inmunodeficiencia, f.Cond_Aisl_Domiciliario, pc.F_Ultima_Prueba, pc.F_Resultado, ea.Id as IdEstadoAfectacion, ea.Desc_Estado, trp.Id as IdResultadoPrueba, trp.Desc_Resultado, tp.Id as IdTipoPrueba, tp.Desc_Prueba, d.Codigo_Dane, d.Desc_Mpio, d.Desc_Dpto, da.Direccion, da.Telefono, ma.Id as IdMotivoAislamiento, ma.Desc_Motivo, ta.Id as IdTipoAislamiento, ta.Desc_Aislamiento, da.Aislada_Hab_Individual, da.F_Ingreso, da.F_Egreso, aa.Id as IdAmbitoAtencion, aa.Desc_Ambito, sv.Id as IdSoporteVentilatorio, sv.Desc_Soporte, da.Cod_Ips, da.Nombre_Ips, da.Soporte_Hemodinamico, sa.Fiebre, sa.Tos, sa.Fatiga, sa.Dificulta_Respirar, sa.Dolor_Garganta, sa.Otro, sa.Dolor_Cabeza, sac.Respiracion_Rapida, sac.Fiebre_Mayor_2_dias, sac.Pecho_suena, sac.Somnolencia_Letargia, sac.Convulsiones, sac.Deterioro_Estado from registro_seguimiento s inner join registro_caso c on s.REGISTRO_CASO_Id=c.Id inner join datos_personas p on c.DATOS_PERSONAS_Id=p.Id inner join tipo_documento td on p.TIPO_DOCUMENTO_Id=td.Id inner join factores_riesgo f on c.FACTORES_RIESGO_Id=f.Id inner join pruebas_lab_covid pc on s.PRUEBAS_LAB_COVID_Id=pc.Id inner join estados_afectacion ea on pc.ESTADO_AFECTACION_Id=ea.Id inner join tipos_resultados_prueba trp on pc.TIPO_RESULTADO_PRUEBA_Id=trp.Id inner join tipos_pruebas tp on pc.TIPO_PRUEBA_Id=tp.Id inner join datos_aislamiento_internacion da on s.DATOS_AISLAMIENTO_INTERNACION_Id=da.Id inner join dane d on da.Dane_Ubicacion=d.Codigo_Dane inner join motivos_aislamiento ma on da.MOTIVO_AISLAMIENTO_Id=ma.Id inner join tipos_aislamiento ta on da.TIPO_AISLAMIENTO_Id=ta.Id inner join ambitos_atencion aa on da.AMBITOS_ATENCION_Id=aa.Id inner join soportes_ventilatorios sv on da.SOPORTE_VENTILATORIO_Id=sv.Id inner join sintomas_signos_alarma sa on s.SINTOMAS_SIGNOS_ALARMA_Id=sa.Id inner join sintomas_alarma_actual sac on s.SINTOMAS_ALARMA_ACTUAL_Id=sac.Id where s.Id=$id");
        return $query->result();
    }
    
    public function getLastSeguimiento($id)
    {
        $query=$this->db->query("select s.Fecha_Hora, pc.F_Ultima_Prueba, pc.F_Resultado, pc.ESTADO_AFECTACION_Id, pc.TIPO_RESULTADO_PRUEBA_Id, pc.TIPO_PRUEBA_Id, sa.Fiebre, sa.Tos, sa.Fatiga, sa.Dificulta_Respirar, sa.Dolor_Garganta, sa.Otro, sa.Dolor_Cabeza from registro_seguimiento s inner join pruebas_lab_covid pc on s.PRUEBAS_LAB_COVID_Id=pc.Id inner join sintomas_signos_alarma sa on s.SINTOMAS_SIGNOS_ALARMA_Id=sa.Id where s.REGISTRO_CASO_Id=$id and s.state='ACTIVO' and s.Id=(select max(a.Id) Id from registro_seguimiento a)");
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
        $query=$this->db->query("select * from dane a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllMotivoAislamiento()
    {
        $query=$this->db->query("select * from motivos_aislamiento a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllTiposAislamiento()
    {
        $query=$this->db->query("select * from tipos_aislamiento a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllAmbitosAtencion()
    {
        $query=$this->db->query("select * from ambitos_atencion a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllSoportesVentilatorios()
    {
        $query=$this->db->query("select * from soportes_ventilatorios a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllTiposPruebas()
    {
        $query=$this->db->query("select * from tipos_pruebas a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllResultadosPruebas()
    {
        $query=$this->db->query("select * from tipos_resultados_prueba a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getAllEstadosAfectacion()
    {
        $query=$this->db->query("select * from estados_afectacion a where a.state='ACTIVO'");
        return $query->result();
    }

    public function getMaxIdPruebasLab()
    {
     $query=$this->db->query("select max(a.Id) as Id from pruebas_lab_covid a");
     return $query->result();
    }

    public function getMaxIdDatosAislamiento()
    {
     $query=$this->db->query("select max(a.Id) as Id from datos_aislamiento_internacion a");
     return $query->result();
    }

    public function getMaxIdSintomasAlarma()
    {
     $query=$this->db->query("select max(a.Id) as Id from sintomas_signos_alarma a");
     return $query->result();
    }

    public function getMaxIdSintomasAlarmaActual()
    {
     $query=$this->db->query("select max(a.Id) as Id from sintomas_alarma_actual a");
     return $query->result();
    }

    public function getMaxNumeroAtencion($casoid)
    {
     $query=$this->db->query("select max(a.No_Atencion) as No_Atencion from registro_seguimiento a where REGISTRO_CASO_Id=$casoid");
     return $query->result();
    }

    public function getEstadoCovid($casoid)
    {
     $query=$this->db->query("select c.ESTADOS_ACTUAL_COVID_Id from registro_caso c where c.Id=$casoid");
     return $query->result();
    }

    public function add()
    {
        if($this->addPruebasLabCovid()){ //Agregamos laboratorios vovid
            $idlabcovids=$this->getMaxIdPruebasLab();
            if($this->updateEstadoCovid($this->input->post('idcaso'))){
                echo "ok";
            }else{
                echo "nel";
            }
            foreach($idlabcovids as $idlabcovid){
                $pruebascovid=$idlabcovid->Id; //Cojemos el id del laboratorio covid
            }

            if($this->addDatosAislamientoInternacion()){ //Agregamos los datos de aislamiento
                $idaislamientos=$this->getMaxIdDatosAislamiento();
                foreach($idaislamientos as $idaislamiento){
                    $datosaislamiento=$idaislamiento->Id; //Cojemos el id de los datos de aislamiento
                }

                if($this->addSintomasSignosAlarma()){ //Agregamos los sintomas y signos de alarma
                    $idsignos=$this->getMaxIdSintomasAlarma();
                    foreach($idsignos as $idsigno){
                        $signosalarma=$idsigno->Id; //Cojemos el id de los sintomas y signos de alarma
                    }

                    if($this->addSintomasSignosAlarmaActual()){ //Agregamos los sintomas de alarma actual
                        $idactuales=$this->getMaxIdSintomasAlarmaActual();
                        foreach($idactuales as $idactual){
                            $sintomasactual=$idactual->Id; //Cojemos el id de los sintomas de alarma actual
                        }
                        
                        $this->updateFactoresRiesgo($this->input->post('idfactoresriesgo'));
                        //- AGREGAMOS EL SEGUIMIENTO -//
                        return $this->addRegistroSeguimiento($pruebascovid, $datosaislamiento, $signosalarma, $sintomasactual, $this->session->idusuario);
                    }
                }
            }
        }
        
        
    }

    public function addRegistroSeguimiento($pruebascovid, $datosaislamiento, $signosalarma, $sintomasactual, $usuarioid)
    {
        $data['F_Cargue_Sgto']=date('Y-m-d G:i:s');
        $data['No_Atencion']=$this->input->post('num_atencion');
        $data['Fecha_Hora']=$this->input->post('fecha_hora');
        $data['REGISTRO_CASO_Id']=$this->input->post('idcaso');
        $data['DATOS_AISLAMIENTO_INTERNACION_Id']=$datosaislamiento;
        $data['SINTOMAS_SIGNOS_ALARMA_Id']=$signosalarma;
        $data['SINTOMAS_ALARMA_ACTUAL_Id']=$sintomasactual;
        $data['PRUEBAS_LAB_COVID_Id']=$pruebascovid;
        $data['DATOS_USUARIOS_Id']=$usuarioid;
        $data['state']='ACTIVO';
        return $this->db->insert($this->tableseg, $data);
    }

    public function updateEstadoCovid($casoid){
        $estadoscovid=$this->getEstadoCovid($casoid);
        foreach($estadoscovid as $estadocovid2){
            $LastEstadoCovid=$estadocovid2->ESTADOS_ACTUAL_COVID_Id;
        }
        $EstadoCovid="";
        echo $LastEstadoCovid;
        if($LastEstadoCovid=='2'){
            if($this->input->post('resultado_prueba')=='1'){
                $EstadoCovid="3";
            }elseif($this->input->post('resultado_prueba')=='2'){
                $EstadoCovid="1";
            }else{
                $EstadoCovid="2";
            }

            if($this->input->post('estado_afectacion')=='5'){
                $EstadoCovid="5";
            }
        }elseif($LastEstadoCovid=='1'){
            if($this->input->post('estado_afectacion')=='6'){
                $EstadoCovid="1";
            }
            if($this->input->post('estado_afectacion')=='5'){
                $EstadoCovid="5";
            }
        }
        
        $data['ESTADOS_ACTUAL_COVID_Id']=$EstadoCovid;
        $this->db->where('Id',$casoid);//where id= $id
        $this->db->update($this->tablec, $data);
        return $this->db->affected_rows();// retornar el numero de registros afectados   
    }

    public function updateFactoresRiesgo($factoresriesgoid)
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
        $this->db->where('Id',$factoresriesgoid);//where id= $id
        $this->db->update($this->tablef, $data);
        return $this->db->affected_rows();// retornar el numero de registros afectados
    }

    public function addDatosAislamientoInternacion()
    {
        if ($this->input->post('ambito_atencion')=="") $ambito=8;
            else $ambito=$this->input->post('ambito_atencion');
            
        if ($this->input->post('soporte_ventilatorio')=="") $soporteventilatorio=7;
            else $soporteventilatorio=$this->input->post('soporte_ventilatorio');
        
        if ($this->input->post('tipo_aislamiento')=="") $tipoaislamiento=9;
            else $tipoaislamiento=$this->input->post('tipo_aislamiento');

        $data['Dane_Ubicacion']=$this->input->post('mpio_ubicacion');
        $data['Direccion']=$this->input->post('direccion');
        $data['Telefono']=$this->input->post('telefono');
        $data['Cod_Ips']=$this->input->post('cod_ips');
        $data['Nombre_Ips']=$this->input->post('nombre_ips');
        $data['F_Ingreso']=$this->input->post('fingreso');
        $data['F_Egreso']=$this->input->post('fegreso');
        $data['Aislada_Hab_Individual']=$this->input->post('hab_individual');
        $data['Otro_Ambito_Atencion']="";
        $data['Soporte_Hemodinamico']=$this->input->post('soporte_ventilatorio');
        $data['MOTIVO_AISLAMIENTO_Id']=$this->input->post('motivo_aislamiento');
        $data['AMBITOS_ATENCION_Id']=$ambito;
        $data['SOPORTE_VENTILATORIO_Id']=$soporteventilatorio;
        $data['TIPO_AISLAMIENTO_Id']=$tipoaislamiento;
        return $this->db->insert($this->tableai, $data);
    }
    
    public function addSintomasSignosAlarma()
    {
        $data['Fiebre']=$this->input->post('fiebre');
        $data['Tos']=$this->input->post('tos');
        $data['Fatiga']=$this->input->post('fatiga');
        $data['Dificulta_Respirar']=$this->input->post('dif_respirar');
        $data['Dolor_Garganta']=$this->input->post('dolor_garganta');
        $data['Otro']=$this->input->post('otro');
        $data['Dolor_Cabeza']=$this->input->post('dolor_cabeza');
        return $this->db->insert($this->tables, $data);
    }

    public function addSintomasSignosAlarmaActual()
    {
        $resp_rapida="";
        $fiebre_2_dias="";
        $pecho="";
        $somnolencia="";
        $convulsiones="";
        $deterioro="";

        if($this->input->post('resp_rapida')) $resp_rapida=$this->input->post('resp_rapida');
        else $resp_rapida='NO';

        if($this->input->post('fiebre_2_dias')) $fiebre_2_dias=$this->input->post('fiebre_2_dias');
        else $fiebre_2_dias='NO';

        if($this->input->post('pecho')) $pecho=$this->input->post('pecho');
        else $pecho='NO';

        if($this->input->post('somnolencia')) $somnolencia=$this->input->post('somnolencia');
        else $somnolencia='NO';

        if($this->input->post('convulsiones')) $convulsiones=$this->input->post('convulsiones');
        else $convulsiones='NO';

        if($this->input->post('deterioro')) $deterioro=$this->input->post('deterioro');
        else $deterioro='NO';


        $data['Respiracion_Rapida']=$this->input->post('resp_rapida');
        $data['Fiebre_Mayor_2_dias']=$this->input->post('fiebre_2_dias');
        $data['Pecho_suena']=$this->input->post('pecho');
        $data['Somnolencia_Letargia']=$this->input->post('somnolencia');
        $data['Convulsiones']=$this->input->post('convulsiones');
        $data['Deterioro_Estado']=$this->input->post('deterioro');
        return $this->db->insert($this->tablesa, $data);
    }
    
    public function addPruebasLabCovid()
    {
        $data['F_Ultima_Prueba']=$this->input->post('f_ultima_prueba');
        $data['F_Resultado']=$this->input->post('f_resultado');
        $data['ESTADO_AFECTACION_Id']=$this->input->post('estado_afectacion');
        $data['TIPO_RESULTADO_PRUEBA_Id']=$this->input->post('resultado_prueba');
        $data['TIPO_PRUEBA_Id']=$this->input->post('nombre_prueba');
        return $this->db->insert($this->tablep, $data);
    }



}//end class

?>