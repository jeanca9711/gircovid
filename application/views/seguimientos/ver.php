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
<?php foreach($seguimientos as $seguimiento){?>
<h1 class="display-4 text-center p-5">Informacion de Seguimiento <b class="text-primary">ID # <?php echo $seguimiento->Id ?></b></h1>
<div class="container">
    <form method="post" id="formverseguimiento">
    
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
                                    <input type="text" class="form-control" name="n_atencion" value="<?php echo $seguimiento->No_Atencion; ?>" disabled>
                                </td>
                                <td>
                                    <strong><label for="fecha_hora">Fecha de seguimiento<b class="text-danger"></b></label></strong>
                                    <input type="text" class="form-control" name="fecha_hora" value="<?php echo $seguimiento->Fecha_Hora; ?>" disabled>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <h4>Datos de la persona</h4>
                <hr class="my-4">
                <div class="row mb-5">
                    <div class="col-md-8">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>
                                            <strong><label for="tdocumento">Tipo de documento<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="tdocumento" value="<?php echo $seguimiento->Tipo_Doc; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="documento">Número de documento<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="documento" value="<?php echo $seguimiento->Numero_doc; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="fnacimiento">Fecha de nacimiento<b class="text-danger"></b></label></strong>
                                            <input type="date" class="form-control" name="fnacimiento" value="<?php echo $seguimiento->F_Nacimiento; ?>" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong><label for="nombre1">Primer nombre<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="nombre1" value="<?php echo $seguimiento->Nombre_1; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="nombre2">Segundo nombre<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="nombre2" value="<?php echo $seguimiento->Nombre_2; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="edad">Edad<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="edad" value="<?php echo $seguimiento->Edad; ?>" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong><label for="apellido1">Primer apellido<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="apellido1" value="<?php echo $seguimiento->Apellido_1; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="apellido2">Segundo apellido<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="apellido2" value="<?php echo $seguimiento->Apellido_2; ?>" disabled>
                                        </td>
                                        <td>
                                            <strong><label for="sexo">Sexo<b class="text-danger"></b></label></strong>
                                            <input type="text" class="form-control" name="sexo" value="<?php echo $seguimiento->Sexo; ?>" disabled>
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

                        if($seguimiento->Mayor_50 == "SI"){
                            $Mayor_50="checked";
                        }
                        if($seguimiento->Diabetes == "SI"){
                            $Diabetes="checked";
                        } 
                        if($seguimiento->Enf_Cardiovascular == "SI"){
                            $Enf_Cardiovascular="checked";
                        } 
                        if($seguimiento->Enf_Resp_Cronica == "SI"){
                            $Enf_Resp_Cronica="checked";
                        } 
                        if($seguimiento->Cancer == "SI"){
                            $Cancer="checked";
                        } 
                        if($seguimiento->Inmunodeficiencia == "SI"){
                            $Inmunodeficiencia="checked";
                        } 
                        if($seguimiento->Cond_Aisl_Domiciliario == "SI"){
                            $Cond_Aisl_Domiciliario="checked";
                        } 
                    ?>
                    <div class="col-md-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <strong><label>Factores de riesgo</label></strong>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="mayor50" id="mayor50" value="SI" <?php echo $Mayor_50;?> disabled>
                                    <label class="custom-control-label" for="mayor50">Persona mayor de 50 años</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="diabetes" id="diabetes" value="SI" <?php echo $Diabetes;?> disabled>
                                    <label class="custom-control-label" for="diabetes">Diabetes</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="enfcardiovascular" id="enfcardiovascular" value="SI" <?php echo $Enf_Cardiovascular;?> disabled>
                                    <label class="custom-control-label" for="enfcardiovascular">Enfermedad cardiovascular</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="enfrespiratoria" id="enfrespiratoria" value="SI" <?php echo $Enf_Resp_Cronica;?> disabled>
                                    <label class="custom-control-label" for="enfrespiratoria">Enfermedad respiratoria crónica</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="cancer" id="cancer" value="SI" <?php echo $Cancer;?> disabled>
                                    <label class="custom-control-label" for="cancer">Cancer</label>
                                </div>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="inmunodeficiencia" id="inmunodeficiencia" value="SI" <?php echo $Inmunodeficiencia;?> disabled>
                                    <label class="custom-control-label" for="inmunodeficiencia">Inmunodeficiencia</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="aislamientodomiciliario" id="aislamientodomiciliario" value="SI" <?php echo $Cond_Aisl_Domiciliario;?> disabled>
                                    <label class="custom-control-label" for="aislamientodomiciliario">Condición aislamiento domiciliario</label>
                                </div>
                            </div><!-- END CARDBODY -->
                        </div><!-- END CARD -->
                    </div>
                </div>
                <h4>Datos de la prueba</h4>
                <hr class="my-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tr>
                                <td>
                                    <strong><label for="nombre_prueba">Nombre Prueba</label></strong>
                                    <select class="form-control" name="nombre_prueba" id="nombre_prueba" disabled>
                                        <option value=""></option>
                                        <?php foreach($tiposprueba as $tipoprueba){?>
                                                <option value="<?php echo $tipoprueba->Id; ?>"><?php echo $tipoprueba->Desc_Prueba; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                    <script type="text/javascript">
                                        $("#nombre_prueba > option[value=<?php echo $seguimiento->IdTipoPrueba;?>]").attr("selected",true);
                                    </script>
                                </td>
                                <td>
                                    <strong><label for="resultado_prueba">Resultado Prueba</label></strong>
                                    <select class="form-control" name="resultado_prueba" id="resultado_prueba" disabled>
                                        <option value=""></option>
                                        <?php foreach($resultadosprueba as $resultadoprueba){?>
                                                <option value="<?php echo $resultadoprueba->Id; ?>"><?php echo $resultadoprueba->Desc_Resultado; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                    <script type="text/javascript">
                                        $("#resultado_prueba > option[value=<?php echo $seguimiento->IdResultadoPrueba;?>]").attr("selected",true);
                                    </script>
                                </td>
                                <td>
                                    <strong><label for="f_resultado">Fecha de resultado</label></strong>
                                    <input type="date" class="form-control mb-2" name="f_resultado" value="<?php echo $seguimiento->F_Resultado;?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><label for="estado_afectacion">Estado de afectación de la persona con COVID-19</label></strong>
                                    <select class="form-control" name="estado_afectacion" id="estado_afectacion" disabled>
                                        <option value=""></option>
                                        <?php foreach($estadosafectacion as $estadoafectacion){?>
                                                <option value="<?php echo $estadoafectacion->Id; ?>"><?php echo $estadoafectacion->Desc_Estado; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                    <script type="text/javascript">
                                        $("#estado_afectacion > option[value=<?php echo $seguimiento->IdEstadoAfectacion;?>]").attr("selected",true);
                                    </script>
                                </td>
                                <td>
                                    <strong><label for="f_ultima_prueba">Fecha última prueba</label></strong>
                                    <input type="date" class="form-control mb-2" name="f_ultima_prueba" value="<?php echo $seguimiento->F_Ultima_Prueba;?>" disabled>
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
                                    <select class="form-control" name="dpto_ubicacion" id="dpto_ubicacion" onchange="getMunicipio(this)" disabled>
                                        <option value=""></option>
                                        <?php foreach($departamentos as $departamento){?>
                                            <option value="<?php echo $departamento->Desc_Dpto; ?>"><?php echo $departamento->Desc_Dpto; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                    <script type="text/javascript">
                                        $("#dpto_ubicacion > option[value=<?php echo $seguimiento->Desc_Dpto;?>]").attr("selected",true);
                                    </script>
                                </td>
                                <td>
                                    <strong><label for="mpio_ubicacion">Municipio ubicación caso<b class="text-danger">*</b></label></strong>
                                    <select class="form-control" name="mpio_ubicacion" id="mpio_ubicacion" disabled>
                                        <option value=""></option>
                                        <?php foreach($municipios2 as $municipio2){?>
                                            <option value="<?php echo $municipio2->Codigo_Dane; ?>"><?php echo $municipio2->Desc_Mpio; ?></option>
                                        <?php } //end foreach?>
                                    </select>
                                    <script type="text/javascript">
                                        $("#mpio_ubicacion > option[value=<?php echo $seguimiento->Codigo_Dane;?>]").attr("selected",true);
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong><label for="telefono">Teléfono<b class="text-danger">*</b></label></strong>
                                    <input type="text" class="form-control" name="telefono" value="<?php echo $seguimiento->Telefono; ?>" placeholder="Este campo esta vacío" disabled>
                                </td>
                                <td>
                                    <strong><label for="direccion">Dirección<b class="text-danger">*</b></label></strong>
                                    <input type="text" class="form-control" name="direccion" value="<?php echo $seguimiento->Direccion; ?>" placeholder="Este campo esta vacío" disabled>
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
                                    <select class="form-control" name="motivo_aislamiento" id="motivo_aislamiento" disabled>
                                    <option value=""></option>
                                    <?php foreach($motivosaislamiento as $motivoaislamiento){?>
                                            <option value="<?php echo $motivoaislamiento->Id; ?>"><?php echo $motivoaislamiento->Desc_Motivo; ?></option>
                                    <?php } //end foreach?>
                                    </select>
                                    <script type="text/javascript">
                                        $("#motivo_aislamiento > option[value=<?php echo $seguimiento->IdMotivoAislamiento;?>]").attr("selected",true);
                                    </script>
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
                                                        <select class="form-control" name="tipo_aislamiento" id="tipo_aislamiento" disabled>
                                                            <option value=""></option>
                                                            <?php foreach($tiposaislamiento as $tipoaislamiento){?>
                                                                    <option value="<?php echo $tipoaislamiento->Id; ?>"><?php echo $tipoaislamiento->Desc_Aislamiento; ?></option>
                                                            <?php } //end foreach?>
                                                        </select>
                                                        <script type="text/javascript">
                                                            $("#tipo_aislamiento > option[value=<?php echo $seguimiento->IdMotivoAislamiento;?>]").attr("selected",true);
                                                        </script>
                                                    </td>
                                                    <td>
                                                        <strong><label for="hab_individual">¿Aislada en habitación individual?</label></strong>
                                                        <select class="form-control" name="hab_individual" Id="hab_individual" disabled>
                                                            <option value=""></option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        <script type="text/javascript">
                                                            $("#hab_individual > option[value=<?php echo $seguimiento->Aislada_Hab_Individual;?>]").attr("selected",true);
                                                        </script>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong><label for="fingreso">Fecha ingreso aislamiento<b class="text-danger">*</b></label></strong>
                                                        <input type="date" class="form-control" name="fingreso" value="<?php echo $seguimiento->F_Ingreso; ?>" disabled>
                                                    </td>
                                                    <td>
                                                        <strong><label for="fegreso">Fecha egreso aislamiento</label></strong>
                                                        <input type="date" class="form-control" name="fegreso" value="<?php echo $seguimiento->F_Egreso; ?>" disabled>
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
                                                        <select class="form-control" name="ambito_atencion" id="ambito_atencion" disabled>
                                                            <option value=""></option>
                                                            <?php foreach($ambitosatencion as $ambitoatencion){?>
                                                                    <option value="<?php echo $ambitoatencion->Id; ?>"><?php echo $ambitoatencion->Desc_Ambito; ?></option>
                                                            <?php } //end foreach?>
                                                        </select>
                                                        <script type="text/javascript">
                                                            $("#ambito_atencion > option[value=<?php echo $seguimiento->IdAmbitoAtencion;?>]").attr("selected",true);
                                                        </script>
                                                    </td>
                                                    <td>
                                                        <strong><label for="soporte_ventilatorio">Soporte Ventilatorio</label></strong>
                                                        <select class="form-control" name="soporte_ventilatorio" id="soporte_ventilatorio" disabled>
                                                            <option value=""></option>
                                                            <?php foreach($soportesventilatorios as $soporteventilatorio){?>
                                                                    <option value="<?php echo $soporteventilatorio->Id; ?>"><?php echo $soporteventilatorio->Desc_Soporte; ?></option>
                                                            <?php } //end foreach?>
                                                        </select>
                                                        <script type="text/javascript">
                                                            $("#soporte_ventilatorio > option[value=<?php echo $seguimiento->IdSoporteVentilatorio;?>]").attr("selected",true);
                                                        </script>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong><label for="cod_ips">Codigo IPS</label></strong>
                                                        <input type="text" class="form-control" name="cod_ips" value="<?php echo $seguimiento->Cod_Ips;?>" placeholder="Este campo esta vacío" disabled>
                                                    </td>
                                                    <td>
                                                        <strong><label for="nombre_ips">Nombre IPS</label></strong>
                                                        <input type="text" class="form-control" name="nombre_ips" value="<?php echo $seguimiento->Nombre_Ips;?>" placeholder="Este campo esta vacío" disabled>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <strong><label for="soporte_hemodinamico">Soporte Hemodinámico</label></strong>
                                                        <select class="form-control" name="soporte_hemodinamico" id="soporte_hemodinamico" disabled>
                                                            <option value=""></option>
                                                            <option value="SI">SI</option>
                                                            <option value="NO">NO</option>
                                                        </select>
                                                        <script type="text/javascript">
                                                            $("#soporte_ventilatorio > option[value=<?php echo $seguimiento->Soporte_Hemodinamico;?>]").attr("selected",true);
                                                        </script>
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
                                    <input type="date" class="form-control mb-2" name="fiebre" value="<?php echo $seguimiento->Fiebre;?>" disabled>
                                    <label for="tos">Tos</label>
                                    <input type="date" class="form-control mb-2" name="tos" value="<?php echo $seguimiento->Tos;?>" disabled>
                                    <label for="fatiga">Fatiga</label>
                                    <input type="date" class="form-control mb-2" name="fatiga" value="<?php echo $seguimiento->Fatiga;?>" disabled>
                                    <label for="dif_respirar">Dificultad para respirar</label>
                                    <input type="date" class="form-control mb-2" name="dif_respirar" value="<?php echo $seguimiento->Dificulta_Respirar;?>" disabled>
                                    <label for="dolor_garganta">Dolor de garganta</label>
                                    <input type="date" class="form-control mb-2" name="dolor_garganta" value="<?php echo $seguimiento->Dolor_Garganta;?>" disabled>
                                    <label for="dolor_cabeza">Dolor de cabeza</label>
                                    <input type="date" class="form-control mb-2" name="dolor_cabeza" value="<?php echo $seguimiento->Dolor_Cabeza;?>" disabled>
                                    <label for="otro">Otro</label>
                                    <input type="date" class="form-control" name="otro" value="<?php echo $seguimiento->Otro;?>" disabled>
                                </td>
                                <td style="width:20%;"></td>
                                <?php
                                    $resp_rapida="";
                                    $fiebre_2_dias="";
                                    $pecho="";
                                    $somnolencia="";
                                    $convulsiones="";
                                    $deterioro="";
            
                                    if($seguimiento->Respiracion_Rapida == "SI"){
                                        $resp_rapida="checked";
                                    }
                                    if($seguimiento->Fiebre_Mayor_2_dias == "SI"){
                                        $fiebre_2_dias="checked";
                                    } 
                                    if($seguimiento->Pecho_suena == "SI"){
                                        $pecho="checked";
                                    } 
                                    if($seguimiento->Somnolencia_Letargia == "SI"){
                                        $somnolencia="checked";
                                    } 
                                    if($seguimiento->Convulsiones == "SI"){
                                        $convulsiones="checked";
                                    } 
                                    if($seguimiento->Deterioro_Estado == "SI"){
                                        $deterioro="checked";
                                    } 
                                ?>
                                <td style="width:40%;">
                                    <strong><label class="mb-5">Signos de alarma actuales</label></strong>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="resp_rapida" id="resp_rapida" value="SI" disabled <?php echo $resp_rapida;?>>
                                        <label class="custom-control-label" for="resp_rapida">Respiración rápida - taquipnea</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="fiebre_2_dias" id="fiebre_2_dias" value="SI" disabled <?php echo $fiebre_2_dias;?>>
                                        <label class="custom-control-label" for="fiebre_2_dias">Fiebre por más de dos días</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="pecho" id="pecho" value="SI" disabled <?php echo $pecho;?>>
                                        <label class="custom-control-label" for="pecho">Pecho que suena - sibilancias, estertores</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="somnolencia" id="somnolencia" value="SI" disabled <?php echo $somnolencia;?>>
                                        <label class="custom-control-label" for="somnolencia">Somnolencia o letargia</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="convulsiones" id="convulsiones" value="SI" disabled <?php echo $convulsiones;?>>
                                        <label class="custom-control-label" for="convulsiones">Convulsiones</label>
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="deterioro" id="deterioro" value="SI" disabled <?php echo $deterioro;?>>
                                        <label class="custom-control-label" for="deterioro">Deterioro rápido del estado general - Evolución</label>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>    
            </div><!-- END CONTAINER-FLUID -->
        </div><!-- END JUMBOTRON -->
    </form><!-- END FORM -->
</div><!-- END CONTAINER-->
<?php } //end foreach seguimiento?>
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
                }
            });
        event.preventDefault(); 
        
    });
</script>