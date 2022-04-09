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
                <hr class="my-4">
                <div class="card mb-5 shadow">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong><label for="tdocumeno">Tipo de documento<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="tdocumeno" placeholder="Ingrese su correo electrónico" required>
                                    <option value=""></option>
                                    <?php foreach($tiposdocumentos as $tipodocumento){?>
                                        <option value="<?php echo $tipodocumento->Id; ?>"><?php echo $tipodocumento->Tipo_Doc; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <strong><label for="documento">Documento<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="documento" placeholder="Este campo esta vacío" required>
                            </div>    
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong><label for="nombre1">Primer nombre<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="nombre1" placeholder="Este campo esta vacío" required>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="nombre2">Segundo nombre</label></strong>
                                <input type="text" class="form-control" name="nombre2" placeholder="Este campo esta vacío">
                            </div>
                            <div class="col-md-3">
                                <strong><label for="apellido1">Primer apellido<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="apellido1" placeholder="Este campo esta vacío"required>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="apellido2">Segundo apellido</label></strong>
                                <input type="text" class="form-control" name="apellido2" placeholder="Este campo esta vacío">
                            </div>   
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong><label for="fnacimiento">Fecha de nacimiento<b class="text-danger">*</b></label></strong>
                                <input type="date" class="form-control" name="fnacimiento" min="1900-01-01" max="<?php echo date("Y-m-d"); ?>" required>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="sexo">Sexo<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="sexo" required>
                                    <option value=""></option>
                                    <option value="MASCULINO">Masculino</option>
                                    <option value="FEMENINO">Femenino</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="regimen">Regimen<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="regimen" required>
                                    <option value=""></option>
                                    <option value="SUBSIDIADO">Subsidiado</option>
                                    <option value="CONTRIBUTIVO">Contributivo</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong><label for="telefono">Telefono<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="telefono" placeholder="Este campo esta vacío" required>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="direccion">Direccion<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="direccion" placeholder="Este campo esta vacío" required>
                            </div>
                            <div class="col-md-4">
                                <strong><label for="email">Correo</label></strong>
                                <input type="email" class="form-control" name="email" placeholder="Este campo esta vacío">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-3">
                                <strong><label for="dpto_ubicacion">Departamento caso<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="dpto_ubicacion" onchange="getMunicipio(this)" required>
                                    <option value=""></option>
                                    <?php foreach($departamentos as $departamento){?>
                                        <option value="<?php echo $departamento->Codigo_Dpto; ?>"><?php echo $departamento->Desc_Dpto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="mpio_ubicacion">Municipio caso<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="mpio_ubicacion" id="mpio_ubicacion" required>
                                    <option value=""></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="dpto_bdua">Departamento afiliado<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="dpto_bdua" onchange="getMunicipioAMBUQ(this)" required>
                                    <option value=""></option>
                                    <?php foreach($departamentos_AMBUQ as $departamento_AMBUQ){?>
                                        <option value="<?php echo $departamento_AMBUQ->Codigo_Dpto; ?>"><?php echo $departamento_AMBUQ->Desc_Dpto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <strong><label for="mpio_bdua">Municipio afiliado<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="mpio_bdua" id="mpio_bdua" required>
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                    </div><!-- END CARD BODY-->
                </div><!-- END CARD-->
                <h4>Datos del caso</h4>
                <hr class="my-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <strong><label for="id_segcovid">Id Caso Segcovid</label></strong>
                                <input type="text" class="form-control" name="id_segcovid" placeholder="Este campo esta vacío">
                            </div>
                            <div class="col-md-4">
                                <strong><label for="id_ins">Id Caso INS</label></strong>
                                <input type="text" class="form-control" name="id_ins" placeholder="Este campo esta vacío">
                            </div>
                            <div class="col-md-4">
                                <strong><label for="aud_responsable">Auditor Responsable<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="aud_responsable">
                                    <option value=""></option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <strong><label for="tipo_contacto">Tipo de contacto<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="tipo_contacto" required>
                                    <option value=""></option>
                                    <?php foreach($tiposcontacto as $tipocontacto){?>
                                        <option value="<?php echo $tipocontacto->Id; ?>"><?php echo $tipocontacto->Desc_Contacto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                                <strong><label for="estado_covid">Estado Actual Covid<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="estado_covid" required>
                                    <option value="2">SOSPECHOSO</option>
                                </select>
                                <strong><label for="fuente_caso">Fuente de caso<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="fuente_caso" required>
                                    <option value=""></option>
                                    <?php foreach($fuentescaso as $fuentecaso){?>
                                        <option value="<?php echo $fuentecaso->Id; ?>"><?php echo $fuentecaso->Desc_Fuente; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <strong><label>Factores de riesgo</label></strong>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="mayor50" id="mayor50" value="SI">
                                    <label class="custom-control-label" for="mayor50">Persona mayor de 50 años</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="diabetes" id="diabetes" value="SI">
                                    <label class="custom-control-label" for="diabetes">Diabetes</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="enfcardiovascular" id="enfcardiovascular" value="SI">
                                    <label class="custom-control-label" for="enfcardiovascular">Enfermedad cardiovascular</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="enfrespiratoria" id="enfrespiratoria" value="SI">
                                    <label class="custom-control-label" for="enfrespiratoria">Enfermedad respiratoria crónica</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="cancer" id="cancer" value="SI">
                                    <label class="custom-control-label" for="cancer">Cancer</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="inmunodeficiencia" id="inmunodeficiencia" value="SI">
                                    <label class="custom-control-label" for="inmunodeficiencia">Inmunodeficiencia</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="aislamientodomiciliario" id="aislamientodomiciliario" value="SI">
                                    <label class="custom-control-label" for="aislamientodomiciliario">Condición aislamiento domiciliario</label>
                                </div>
                            </div>
                        </div>
                    </div><!-- END CARD BODY-->
                </div><!-- END CARD-->
            </div><!-- END CONTAINER2 -->
        </div><!-- END JUMBOTRON -->
        <button type="submit" class="btn btn-success btn-lg mb-5 float-right">Registrar</button>
        <a class="btn btn-danger btn-lg mb-5 mr-3 float-right" href="<?php echo site_url('casos/');?>">Cancelar</a>
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