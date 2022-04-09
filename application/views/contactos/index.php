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
    $('#tcontactos').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        ]
    } );
} );
</script>

<div class="espacio" style="padding:30px;">

</div>

<h1 class="display-4 text-center p-5">Contactos</h1>
<div class="container">
    <div class="jumbotron">
        <h4>Registro de contactos</h4>
        <hr class="my-4">
        <form id="formcontacto" method="post">
        <input type="hidden" name="idcaso" value="<?php echo $idcaso; ?>">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>
                                <strong><label for="tdocumeno">Tipo de documento<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="tdocumeno" required>
                                    <option value=""></option>
                                    <?php foreach($tiposdocumentos as $tipodocumento){?>
                                        <option value="<?php echo $tipodocumento->Id; ?>"><?php echo $tipodocumento->Tipo_Doc; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </td>
                            <td>
                                <strong><label for="documento">Documento<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="documento" placeholder="Este campo esta vacío" required>
                            </td>
                            <td>
                                <strong><label for="nombre1">Primer nombre<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="nombre1" placeholder="Este campo esta vacío" required>
                            </td>
                            <td>
                                <strong><label for="nombre2">Segundo nombre</label></strong>
                                <input type="text" class="form-control" name="nombre2" placeholder="Este campo esta vacío">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><label for="apellido1">Primer apellido<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="apellido1" placeholder="Este campo esta vacío"required>
                            </td>
                            <td>
                                <strong><label for="apellido2">Segundo apellido</label></strong>
                                <input type="text" class="form-control" name="apellido2" placeholder="Este campo esta vacío">
                            </td>
                            <td>
                                <strong><label for="aseguradora">Aseguradora<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="aseguradora" placeholder="Este campo esta vacío">
                            </td>
                            <td>
                                <strong><label for="parentesco">Parentesco<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="parentesco" required>
                                    <option value=""></option>
                                    <?php foreach($parectescos as $parectesco){?>
                                        <option value="<?php echo $parectesco->Id; ?>"><?php echo $parectesco->Desc_Parentesco; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <strong><label for="dpto_ubicacion">Departamento<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="dpto_ubicacion" onchange="getMunicipio(this)" required>
                                    <option value=""></option>
                                    <?php foreach($departamentos as $departamento){?>
                                        <option value="<?php echo $departamento->Codigo_Dpto; ?>"><?php echo $departamento->Desc_Dpto; ?></option>
                                    <?php } //end foreach?>
                                </select>
                            </td>
                            <td>
                                <strong><label for="mpio_ubicacion">Municipio<b class="text-danger">*</b></label></strong>
                                <select class="form-control" name="mpio_ubicacion" id="mpio_ubicacion" required>
                                    <option value=""></option>
                                </select>
                            </td>
                            <td>
                                <strong><label for="direccion">Dirección<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="direccion" placeholder="Este campo esta vacío" required>
                            </td>
                            <td>
                                <strong><label for="telefono">Teléfono<b class="text-danger">*</b></label></strong>
                                <input type="text" class="form-control" name="telefono" placeholder="Este campo esta vacío" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="custom-control custom-checkbox mb-3">
                                    <input type="checkbox" class="custom-control-input" name="contactado" id="contactado" value="SI">
                                    <label class="custom-control-label" for="contactado"><strong>Contactado</strong><b class="text-danger">*</b></label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-success btn-lg">Registrar</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </form>
    </div><!-- END JUMBOTRON-->
</div><!-- END CONTAINER-->
<div class="container-fluid">
    <div class="jumbotron">
        <h4 class="text-center">Detalle de contactos</h4>
        <hr class="my-4">
        <table id='tcontactos' class ="table table-hover">
            <thead>
            <tr class="bg-info text-white">  
                <th>DOCUMENTO</th>   
                <th>NOMBRES</th>
                <th>ASEGURADORA</th>
                <th>PARENTESCO</th>
                <th>UBICACION</th> 
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>CONTACTADO</th>
            </tr>       
            </thead>
            <tbody>
            <?php
            foreach($contactos as $contacto)
            {
            ?>
            <tr>  
                <td><?php  echo $contacto->Tipo_Doc . ' ' . $contacto->Identificacion; ?></td> 
                <td><?php  echo $contacto->Nombre_1 . ' ' . $contacto->Nombre_2 . ' ' . $contacto->Apellido_1 . ' ' . $contacto->Apellido_2; ?></td>
                <td><?php  echo $contacto->Aseguradora; ?></td> 
                <td><?php  echo $contacto->Desc_Parentesco; ?></td>  
                <td><?php  echo $contacto->Desc_Dpto . '/' . $contacto->Desc_Mpio; ?></td>
                <td><?php  echo $contacto->Direccion; ?></td>
                <td><?php  echo $contacto->Telefono; ?></td>
                <td><?php  echo $contacto->Contactado; ?></td>
            </tr>
            <?php 
            }//endforeach
            ?>   
            </tbody>
            <tfooter>
            <tr class="bg-info text-white">  
                <th>DOCUMENTO</th>   
                <th>NOMBRES</th>
                <th>ASEGURADORA</th>
                <th>PARENTESCO</th>
                <th>UBICACION</th> 
                <th>DIRECCION</th>
                <th>TELEFONO</th>
                <th>CONTACTADO</th>
            </tr>
            </tfooter>
        </table>
    </div><!-- END JUMBOTRON-->
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
        $.get("<?php echo site_url('casos/getAllMunicipios/');?>"+id,{id:id},function(datos){
            var mun=JSON.parse(datos);
            for(var i=0;i<mun.length;i++){
                document.getElementById("mpio_ubicacion").innerHTML += "<option value='"+mun[i]['Codigo_Dane']+"'>"+mun[i]['Desc_Mpio']+"</option>";
            }
        });
    }

    function cerrar()
    {
        location.reload();
    }

    $('#formcontacto').submit(function(event)
    {
        var parametros = $('#formcontacto').serialize();
        console.log(parametros);
        var salida="";
            $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('casos/AgregarContacto');?>",
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