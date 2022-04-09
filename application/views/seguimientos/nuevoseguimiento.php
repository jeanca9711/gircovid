<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="espacio" style="padding:30px;">

</div>

<h1 class="display-4 text-center p-5">Registro de Seguimiento</h1>
<div class="container">
    <form method="post" id="formseguimiento">
    
        <div class="jumbotron">
            <div class="container-fluid">
            <h4>Datos del seguimiento</h4>
            <hr class="my-4">
                <div class="card shadow mb-5">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <strong><label for="num_atencion">Número de atención<b class="text-danger"></b></label></strong>
                                    <?php foreach($numerosatencion as $numeroatencion){ 
                                            $num_atencion=1;
                                            if($numeroatencion->No_Atencion!=null) $num_atencion=$numeroatencion->No_Atencion+1;
                                          }
                                        ?>
                                    <input type="text" class="form-control" name="n_atencion" value="<?php echo $num_atencion; ?>" disabled>
                                    <input type="hidden" name="num_atencion" value="<?php echo $num_atencion; ?>">
                                </td>
                                <td>
                                    <strong><label for="fecha_hora">Fecha de seguimiento<b class="text-danger"></b></label></strong>
                                    <input type="datetime-local" class="form-control" name="fecha_hora" max="<?php $hoy=date("Y-m-d"). 'T' . date("H:i"); echo $hoy;?>" required>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4>Datos de la persona</h4>
                <hr class="my-4">
                <?php foreach($casos as $caso){ ?>
                    <div class="row">   
                        <div class="col-md-4">
                            <?php $estadoalert="";
                            if($caso->Desc_Estado=="CONFIRMADO"){
                                    $estadoalert="success";
                                }elseif($caso->Desc_Estado=="SOSPECHOSO"){
                                    $estadoalert="warning";
                                }else{
                                    $estadoalert="danger";
                                } ?>
                            <div class="alert alert-<?php echo $estadoalert; ?> text-center" role="alert">
                                <b>Estado COVID </b>
                                <?php echo $caso->Desc_Estado; ?>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                    </div>
                        <?php $idcaso=$caso->Id; ?>
                <input type="hidden" name="idcaso" id="idcaso" value="<?php echo $caso->Id; ?>">
                <div class="row mb-5">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            <strong><label for="tdocumento">Tipo de documento<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="tdocumento" value="<?php echo $caso->Tipo_Doc; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="documento">Número de documento<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="documento" value="<?php echo $caso->Numero_doc; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="fnacimiento">Fecha de nacimiento<b class="text-danger"></b></label></strong>
                                            <input type="date" class="form-control" name="fnacimiento" value="<?php echo $caso->F_Nacimiento; ?>" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong><label for="nombre1">Primer nombre<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="nombre1" value="<?php echo $caso->Nombre_1; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="nombre2">Segundo nombre<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="nombre2" value="<?php echo $caso->Nombre_2; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="edad">Edad<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="edad" value="<?php echo $caso->Edad;  ?>" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong><label for="apellido1">Primer apellido<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="apellido1" value="<?php echo $caso->Apellido_1; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="apellido2">Segundo apellido<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="apellido2" value="<?php echo $caso->Apellido_2; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="sexo">Sexo<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="sexo" value="<?php echo $caso->Sexo; ?>" disabled>
                                        </td>
                                    </tr>
                                </table>
                            </div><!-- END CARDBODY -->
                        </div><!-- END CARD -->
                    </div>
                    <?php
                        $Mayor_50="";
                        $Diabetes="";
                        $Enf_Cardiovascular="";
                        $Enf_Resp_Cronica="";
                        $Cancer="";
                        $Inmunodeficiencia="";
                        $Cond_Aisl_Domiciliario="";

                        if($caso->Mayor_50 == "SI"){
                            $Mayor_50="checked";
                        }
                        if($caso->Diabetes == "SI"){
                            $Diabetes="checked";
                        } 
                        if($caso->Enf_Cardiovascular == "SI"){
                            $Enf_Cardiovascular="checked";
                        } 
                        if($caso->Enf_Resp_Cronica == "SI"){
                            $Enf_Resp_Cronica="checked";
                        } 
                        if($caso->Cancer == "SI"){
                            $Cancer="checked";
                        } 
                        if($caso->Inmunodeficiencia == "SI"){
                            $Inmunodeficiencia="checked";
                        } 
                        if($caso->Cond_Aisl_Domiciliario == "SI"){
                            $Cond_Aisl_Domiciliario="checked";
                        } 
                    ?>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <strong><label>Factores de riesgo</label></strong>
                                <input type="hidden" name="idfactoresriesgo" value="<?php echo $caso->FACTORES_RIESGO_Id; ?>">
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="mayor50" id="mayor50" value="SI" <?php echo $Mayor_50;?>>
                                    <label class="custom-control-label" for="mayor50">Persona mayor de 50 años</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="diabetes" id="diabetes" value="SI" <?php echo $Diabetes;?>>
                                    <label class="custom-control-label" for="diabetes">Diabetes</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="enfcardiovascular" id="enfcardiovascular" value="SI" <?php echo $Enf_Cardiovascular;?>>
                                    <label class="custom-control-label" for="enfcardiovascular">Enfermedad cardiovascular</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="enfrespiratoria" id="enfrespiratoria" value="SI" <?php echo $Enf_Resp_Cronica;?>>
                                    <label class="custom-control-label" for="enfrespiratoria">Enfermedad respiratoria crónica</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="cancer" id="cancer" value="SI" <?php echo $Cancer;?>>
                                    <label class="custom-control-label" for="cancer">Cancer</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="inmunodeficiencia" id="inmunodeficiencia" value="SI" <?php echo $Inmunodeficiencia;?>>
                                    <label class="custom-control-label" for="inmunodeficiencia">Inmunodeficiencia</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="aislamientodomiciliario" id="aislamientodomiciliario" value="SI" <?php echo $Cond_Aisl_Domiciliario;?>>
                                    <label class="custom-control-label" for="aislamientodomiciliario">Condición aislamiento domiciliario</label>
                                </div>
                            </div><!-- END CARDBODY -->
                        </div><!-- END CARD -->
                    </div>
                </div>
                <?php } //end foreach CASO?>
                <h4>Datos de la prueba</h4>
                <hr class="my-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <strong><label for="nombre_prueba">Nombre Prueba</label></strong>
                                    <select class="form-control" name="nombre_prueba" required>
                                        <option value=""></option>
                                        <?php foreach($tiposprueba as $tipoprueba){?>
                                                <option value="<?php echo $tipoprueba->Id; ?>"><?php echo $tipoprueba->Desc_Prueba; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                </td>
                                <td>
                                    <strong><label for="f_ultima_prueba">Fecha prueba</label></strong>
                                    <input type="date" class="form-control mb-2" name="f_ultima_prueba" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                </td>
                                <td>
                                    <strong><label for="f_resultado">Fecha de resultado</label></strong>
                                    <input type="date" class="form-control mb-2" name="f_resultado" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><label for="estado_afectacion">Estado de afectación de la persona con COVID-19</label></strong>
                                    <select class="form-control" name="estado_afectacion" required>
                                        <option value=""></option>
                                        <?php foreach($estadosafectacion as $estadoafectacion){?>
                                                <option value="<?php echo $estadoafectacion->Id; ?>"><?php echo $estadoafectacion->Desc_Estado; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                </td>
                                <td>
                                    <strong><label for="resultado_prueba">Resultado Prueba</label></strong>
                                    <select class="form-control" name="resultado_prueba" required>
                                        <option value=""></option>
                                        <?php foreach($resultadosprueba as $resultadoprueba){?>
                                                <option value="<?php echo $resultadoprueba->Id; ?>"><?php echo $resultadoprueba->Desc_Resultado; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4>Datos de aislamiento</h4>
                <hr class="my-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <strong><label for="dpto_ubicacion">Departamento ubicación caso<b class="text-danger">*</b></label></strong>
                                    <select class="form-control" name="dpto_ubicacion" onchange="getMunicipio(this)" required>
                                        <option value=""></option>
                                        <?php foreach($departamentos as $departamento){?>
                                            <option value="<?php echo $departamento->Codigo_Dpto; ?>"><?php echo $departamento->Desc_Dpto; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                </td>
                                <td>
                                    <strong><label for="mpio_ubicacion">Municipio ubicación caso<b class="text-danger">*</b></label></strong>
                                    <select class="form-control" name="mpio_ubicacion" id="mpio_ubicacion" required>
                                        <option value=""></option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><label for="telefono">Teléfono<b class="text-danger">*</b></label></strong>
                                    <input type="text" class="form-control" name="telefono" placeholder="Este campo esta vacío" required>
                                </td>
                                <td>
                                    <strong><label for="direccion">Dirección<b class="text-danger">*</b></label></strong>
                                    <input type="text" class="form-control" name="direccion" placeholder="Este campo esta vacío" required>
                                </td>
                            </tr>
                            <!--
                            <tr>
                                <td>
                                    <strong><label for="cod_ips">Código de IPS<b class="text-danger">*</b></label></strong>
                                    <input type="text" class="form-control" name="cod_ips" placeholder="Este campo esta vacío" required>
                                </td>
                                <td>
                                    <strong><label for="nomb_ips">Nombre de IPS<b class="text-danger">*</b></label></strong>
                                    <input type="text" class="form-control" name="nomb_ips" placeholder="Este campo esta vacío" required>
                                </td>
                            </tr>
                            -->
                        </table>
                        <hr class="my-4 bg-success">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <strong><label for="motivo_aislamiento">Motivo de aislamiento<b class="text-danger">*</b></label></strong>
                                    <select class="form-control" name="motivo_aislamiento" required>
                                    <option value=""></option>
                                    <?php foreach($motivosaislamiento as $motivoaislamiento){?>
                                            <option value="<?php echo $motivoaislamiento->Id; ?>"><?php echo $motivoaislamiento->Desc_Motivo; ?></option>
                                    <?php } //end foreach?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation"><a class="nav-link active" id="aislado-tab" data-toggle="tab" role="tab" aria-controls="aislado" aria-selected="true" href="#aislado"><i class="fa fa-house-user"></i> Persona aislada</a></li>
                                        <li class="nav-item" role="presentation"><a class="nav-link" id="internado-tab" data-toggle="tab" role="tab" aria-controls="internado" aria-selected="false" href="#internado"><i class="fas fa-hospital"></i> Persona internada</a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="aislado" role="tabpanel" aria-labelledby="aislado-tab">
                                            <h3>Persona aislada</h3>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td colspan="2">
                                                        <strong><label for="tipo_aislamiento">Tipo de aislamiento</label></strong>
                                                        <select class="form-control" name="tipo_aislamiento">
                                                            <option value=""></option>
                                                            <?php foreach($tiposaislamiento as $tipoaislamiento){?>
                                                                    <option value="<?php echo $tipoaislamiento->Id; ?>"><?php echo $tipoaislamiento->Desc_Aislamiento; ?></option>
                                                            <?php } //end foreach?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <strong><label for="hab_individual">¿Aislada en habitación individual?</label></strong>
                                                        <select class="form-control" name="hab_individual">
                                                            <option value=""></option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong><label for="fingreso">Fecha ingreso aislamiento<b class="text-danger">*</b></label></strong>
                                                        <input type="date" class="form-control" name="fingreso" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                                    </td>
                                                    <td>
                                                        <strong><label for="fegreso">Fecha egreso aislamiento</label></strong>
                                                        <input type="date" class="form-control" name="fegreso" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="internado" role="tabpanel" aria-labelledby="internado-tab">
                                            <h3>Servicio de salud de atención</h3>
                                            <table class="table table-borderless">
                                                <tr>
                                                    <td>
                                                        <strong><label for="ambito_atencion">Ambito de atención médica</label></strong>
                                                        <select class="form-control" name="ambito_atencion">
                                                            <option value=""></option>
                                                            <?php foreach($ambitosatencion as $ambitoatencion){?>
                                                                    <option value="<?php echo $ambitoatencion->Id; ?>"><?php echo $ambitoatencion->Desc_Ambito; ?></option>
                                                            <?php } //end foreach?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <strong><label for="soporte_ventilatorio">Soporte Ventilatorio</label></strong>
                                                        <select class="form-control" name="soporte_ventilatorio">
                                                            <option value=""></option>
                                                            <?php foreach($soportesventilatorios as $soporteventilatorio){?>
                                                                    <option value="<?php echo $soporteventilatorio->Id; ?>"><?php echo $soporteventilatorio->Desc_Soporte; ?></option>
                                                            <?php } //end foreach?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong><label for="cod_ips">Codigo IPS</label></strong>
                                                        <input type="text" class="form-control" name="cod_ips" placeholder="Este campo esta vacío">
                                                    </td>
                                                    <td>
                                                        <strong><label for="nombre_ips">Nombre IPS</label></strong>
                                                        <input type="text" class="form-control" name="nombre_ips" placeholder="Este campo esta vacío">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong><label for="soporte_hemodinamico">Soporte Hemodinámico</label></strong>
                                                        <select class="form-control" name="soporte_hemodinamico">
                                                            <option value=""></option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4>Signos y síntomas de alarma</h4>
                <hr class="my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td style="width:40%;">
                                    <p><strong><label>Síntomas</label></strong></p>
                                    <label for="fiebre">Fiebre</label>
                                    <input type="date" class="form-control mb-2" name="fiebre" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                    <label for="tos">Tos</label>
                                    <input type="date" class="form-control mb-2" name="tos" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                    <label for="fatiga">Fatiga</label>
                                    <input type="date" class="form-control mb-2" name="fatiga" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                    <label for="dif_respirar">Dificultad para respirar</label>
                                    <input type="date" class="form-control mb-2" name="dif_respirar" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                    <label for="dolor_garganta">Dolor de garganta</label>
                                    <input type="date" class="form-control mb-2" name="dolor_garganta" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                    <label for="dolor_cabeza">Dolor de cabeza</label>
                                    <input type="date" class="form-control mb-2" name="dolor_cabeza" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>">
                                    <label for="otro">Otro</label>
                                    <input type="date" class="form-control" name="otro">
                                </td>
                                <td style="width:20%;"></td>
                                <td style="width:40%;">
                                    <strong><label class="mb-5">Signos de alarma actuales</label></strong>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="resp_rapida" id="resp_rapida" value="SI">
                                        <label class="custom-control-label" for="resp_rapida">Respiración rápida - taquipnea</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="fiebre_2_dias" id="fiebre_2_dias" value="SI">
                                        <label class="custom-control-label" for="fiebre_2_dias">Fiebre por más de dos días</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="pecho" id="pecho" value="SI">
                                        <label class="custom-control-label" for="pecho">Pecho que suena - sibilancias, estertores</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="somnolencia" id="somnolencia" value="SI">
                                        <label class="custom-control-label" for="somnolencia">Somnolencia o letargia</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="convulsiones" id="convulsiones" value="SI">
                                        <label class="custom-control-label" for="convulsiones">Convulsiones</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="deterioro" id="deterioro" value="SI">
                                        <label class="custom-control-label" for="deterioro">Deterioro rápido del estado general - Evolución</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>    
            </div><!-- END CONTAINER-FLUID -->
        </div><!-- END JUMBOTRON -->
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button type="submit" id="registrarSeg" class="btn btn-success btn-lg mb-5 float-right">Registrar</button>
                <a class="btn btn-danger btn-lg mb-5 mr-3 float-right" href="<?php echo site_url('casos/seguimientos/') . $idseguimiento;?>">Cancelar</a>
            </div>
        </div>
    </form><!-- END FORM -->
</div><!-- END CONTAINER-->

<!-- MODAL COFIRM REGISTRO-->
<div class="modal fade" id="confirmregistro" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div id="resultados">
        </div>
    </div>
</div> 

<script type="text/javascript">
    function getMunicipio(dpto)
    {
        var id = dpto.value;
        $('#mpio_ubicacion').empty();
        $.get("<?php echo site_url('seguimientos/getAllMunicipios/');?>"+id,{id:id},function(datos){
            var mun=JSON.parse(datos);
            for(var i=0;i<mun.length;i++){
                document.getElementById("mpio_ubicacion").innerHTML += "<option value='"+mun[i]['Codigo_Dane']+"'>"+mun[i]['Desc_Mpio']+"</option>";
            }
        });
    }

    function cerrar()
    {
        window.location="<?php echo site_url('casos/seguimientos/') . $idcaso; ?>";
    }

    $('#formseguimiento').submit(function(event)
    {
        $("#registrarSeg").prop("disabled", true);

        var parametros = $('#formseguimiento').serialize();
        console.log(parametros);
        var salida="";
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('seguimientos/AgregarSeguimiento');?>",
                    data: parametros,
                    beforeSend: function() {
                    $('#resultados').show();
                    },
                    error: function() {
                    $('#resultados').html(salida);
                    },
                    success: function(datos){
                    $('#resultados').html(datos);
                    $('#confirmregistro').modal('show');
                    $("#registrarSeg").prop("disabled", false);
                }
            });
        event.preventDefault(); 
        
    });

    $(document).ready(function(){
        var id = document.getElementById("idcaso").value;
        $.get("<?php echo site_url('seguimientos/getLastSeguimiento/');?>"+id,{id:id},function(datos){
            var seg=JSON.parse(datos);
            for(var i=0;i<seg.length;i++){
                $('[name="nombre_prueba"]').val(seg[i]["TIPO_PRUEBA_Id"]);
                $('[name="f_ultima_prueba"]').val(seg[i]["F_Ultima_Prueba"]);
                $('[name="f_resultado"]').val(seg[i]["F_Resultado"]);
                $('[name="estado_afectacion"]').val(seg[i]["ESTADO_AFECTACION_Id"]);
                $('[name="resultado_prueba"]').val(seg[i]["TIPO_RESULTADO_PRUEBA_Id"]);
                $('[name="fiebre"]').val(seg[i]["Fiebre"]);
                $('[name="tos"]').val(seg[i]["Tos"]);
                $('[name="fatiga"]').val(seg[i]["Fatiga"]);
                $('[name="dif_respirar"]').val(seg[i]["Dificulta_Respirar"]);
                $('[name="dolor_garganta"]').val(seg[i]["Dolor_Garganta"]);
                $('[name="dolor_cabeza"]').val(seg[i]["Dolor_Cabeza"]);
                $('[name="otro"]').val(seg[i]["Otro"]);
            }
        });
    });

</script>