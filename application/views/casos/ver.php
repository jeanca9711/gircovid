<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script language="javascript">
$(document).ready(function() {
    $('#tcasos').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        ]
    } );
} );
</script>
<div class="espacio" style="padding:30px;">

</div>
<h1 class="display-4 text-center p-5">Registro de Caso</h1>
<div class="container">
    <form method="post" id="formcaso">
        <div class="jumbotron shadow">
            <div class="container-fluid">
                <h4>Datos de la persona</h4>
                <?php foreach($casos as $caso){?>
                <hr class="my-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong><label for="tdocumeno">Tipo de documento<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="tdocumeno" name="tdocumeno" disabled>
                                    <option value=""></option>
                                    <?php foreach($tiposdocumentos as $tipodocumento){?>
                                        <option value="<?php echo $tipodocumento->Id; ?>"><?php echo $tipodocumento->Tipo_Doc; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#tdocumeno > option[value=<?php echo $caso->TIPO_DOCUMENTO_Id;?>]").attr("selected",true);
                                </script>
                            </div>
                            <div class="col-md-6">
                                <strong><label for="documento">Documento<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="documento" value="<?php echo $caso->Numero_doc;?>" disabled>
                            </div>    
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong><label for="nombre1">Primer nombre<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="nombre1" value="<?php echo $caso->Nombre_1;?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="nombre2">Segundo nombre</label></strong>
                                <input type="text" class="form-control" name="nombre2" value="<?php echo $caso->Nombre_2;?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="apellido1">Primer apellido<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="apellido1" value="<?php echo $caso->Apellido_1;?>" disabled>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="apellido2">Segundo apellido</label></strong>
                                <input type="text" class="form-control" name="apellido2" value="<?php echo $caso->Apellido_2;?>" disabled>
                            </div>   
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong><label for="fnacimiento">Fecha de nacimiento<b class="text-danger" disabled>*</b></label></strong>
                                <input type="date" class="form-control" name="fnacimiento" value="<?php echo $caso->F_Nacimiento;?>" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="sexo">Sexo<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="sexo" name="sexo" disabled>
                                    <option value=""></option>
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMENINO">Femenino</option>
                                </select>
                                <script type="text/javascript">
                                    $("#sexo > option[value=<?php echo $caso->Sexo;?>]").attr("selected",true);
                                </script>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="regimen">Regimen<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="regimen" name="regimen" disabled>
                                    <option value=""></option>
                                    <option value="SUBSIDIADO">Subsidiado</option>
                                    <option value="CONTRIBUTIVO">Contributivo</option>
                                </select>
                                <script type="text/javascript">
                                    $("#regimen > option[value=<?php echo $caso->Regimen;?>]").attr("selected",true);
                                </script>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong><label for="telefono">Telefono<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="telefono" value="<?php echo $caso->Telefono;?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="direccion">Direccion<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="direccion" value="<?php echo $caso->Direccion;?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="email">Correo</label></strong>
                                <input type="email" class="form-control" name="email" value="<?php echo $caso->Correo;?>" disabled>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong><label for="dpto_ubicacion">Departamento caso<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="dpto_ubicacion" name="dpto_ubicacion" disabled>
                                    <option value=""></option>
                                    <?php foreach($municipios as $municipio){?>
                                        <option value="<?php echo $municipio->Codigo_Dane; ?>"><?php echo $municipio->Desc_Dpto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#dpto_ubicacion > option[value=<?php echo $caso->Dane_Ubicacion_Caso;?>]").attr("selected",true);
                                </script>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="mpio_ubicacion">Municipio caso<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="mpio_ubicacion" name="mpio_ubicacion" disabled>
                                    <option value=""></option>
                                    <?php foreach($municipios as $municipio){?>
                                        <option value="<?php echo $municipio->Codigo_Dane; ?>"><?php echo $municipio->Desc_Mpio; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#mpio_ubicacion > option[value=<?php echo $caso->Dane_Ubicacion_Caso;?>]").attr("selected",true);
                                </script>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="dpto_bdua">Departamento afiliado<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="dpto_bdua" name="dpto_bdua" disabled>
                                    <option value=""></option>
                                    <?php foreach($municipios as $municipio){?>
                                        <option value="<?php echo $municipio->Codigo_Dane; ?>"><?php echo $municipio->Desc_Dpto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#dpto_bdua > option[value=<?php echo $caso->Dane_BDUA_Afiliado;?>]").attr("selected",true);
                                </script>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="mpio_bdua">Municipio afiliado<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="mpio_bdua" name="mpio_bdua" disabled>
                                    <option value=""></option>
                                    <?php foreach($municipios as $municipio){?>
                                        <option value="<?php echo $municipio->Codigo_Dane; ?>"><?php echo $municipio->Desc_Mpio; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#mpio_bdua > option[value=<?php echo $caso->Dane_BDUA_Afiliado;?>]").attr("selected",true);
                                </script>
                            </div>
                        </div>
                    </div><!-- END CARD BODY -->
                </div><!-- END CARD -->
                </br>
                <h4>Datos del caso</h4>
                <hr class="my-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong><label for="id_segcovid">Id Caso Segcovid</label></strong>
                                <input type="text" class="form-control" name="id_segcovid" placeholder="Este campo esta vacío" value="<?php echo $caso->Id_Caso_SegCovid;?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="id_ins">Id Caso INS</label></strong>
                                <input type="text" class="form-control" name="id_ins" placeholder="Este campo esta vacío" value="<?php echo $caso->Id_Caso_INS;?>" disabled>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="aud_responsable">Auditor Responsable<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="aud_responsable" disabled>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong><label for="tipo_contacto">Tipo de contacto<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="tipo_contacto" name="tipo_contacto" disabled>
                                    <option value=""></option>
                                    <?php foreach($tiposcontacto as $tipocontacto){?>
                                        <option value="<?php echo $tipocontacto->Id; ?>"><?php echo $tipocontacto->Desc_Contacto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#tipo_contacto > option[value=<?php echo $caso->TIPOS_CONTACTO_Id;?>]").attr("selected",true);
                                </script>
                                <strong><label for="estado_covid">Estado Actual Covid<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="estado_covid" name="estado_covid" disabled>
                                    <option value="2">SOSPECHOSO</option>
                                </select>
                                <script type="text/javascript">
                                    $("#estado_covid > option[value=<?php echo $caso->ESTADOS_ACTUAL_COVID_Id;?>]").attr("selected",true);
                                </script>
                                <strong><label for="fuente_caso">Fuente de caso<b class="text-danger">*</b></label></strong>
                                <select class="form-control" id="fuente_caso" name="fuente_caso" disabled>
                                    <option value=""></option>
                                    <?php foreach($fuentescaso as $fuentecaso){?>
                                        <option value="<?php echo $fuentecaso->Id; ?>"><?php echo $fuentecaso->Desc_Fuente; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <script type="text/javascript">
                                    $("#fuente_caso > option[value=<?php echo $caso->FUENTES_CASO_Id;?>]").attr("selected",true);
                                </script>
                            </div>
                            <div class="col-md-6">
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
                            </div>
                        </div>
                    </div><!-- END CARD BODY -->
                </div><!-- END CARD -->
            </div><!-- END CONTAINER2 -->
            <?php } //end foreach caso ?>
        </div><!-- END JUMBOTRON -->
    </form><!-- END FORM -->
</div><!-- END CONTAINER1 -->
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
        $.get("<?php echo site_url('casos/getAllMunicipios/');?>"+id,{id:id},function(datos){
            var mun=JSON.parse(datos);
            for(var i=0;i<mun.length;i++){
                document.getElementById("mpio_ubicacion").innerHTML += "<option value='"+mun[i]['Codigo_Dane']+"'>"+mun[i]['Desc_Mpio']+"</option>";
            }
        });
    }

    function getMunicipioAMBUQ(dpto)
    {
        var id = dpto.value;
        $('#mpio_bdua').empty();
        $.get("<?php echo site_url('casos/getAllMunicipiosAMBUQ/');?>"+id,{id:id},function(datos){
            var munAMBUQ=JSON.parse(datos);
            for(var i=0;i<munAMBUQ.length;i++){
                document.getElementById("mpio_bdua").innerHTML += "<option value='"+munAMBUQ[i]['Codigo_Dane']+"'>"+munAMBUQ[i]['Desc_Mpio']+"</option>";
            }
        });
    }

    function cerrar()
    {
        location.reload();
    }

    function cerrar2()
    {
        window.location="<?php echo site_url('casos/'); ?>";
    }

    $('#formcaso').submit(function(event)
    {
        var parametros = $('#formcaso').serialize();
        console.log(parametros);
        var salida="";
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('casos/AgregarCaso');?>",
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