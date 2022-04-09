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
    $('#tseguimientos').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        ]
    } );
} );
</script>
<div class="espacio" style="padding:30px;">

</div>
<?php
foreach($casos as $caso)
{
?>
<h1 class="display-4 text-center mt-5">Detalle del caso <b class="text-primary">#<?php echo $caso->Id; ?></b></h1>
<div class="container">
    <div class="jumbotron mt-5">
        <div class="container-fluid">
            <h1 class="display-4 text-center">Datos del paciente</h1>
            <hr class="my-4">
            <div class="row">   
                <div class="col-md-4"></div>
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
                        <b>Estado COVID</b></br>
                        <?php echo $caso->Desc_Estado; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php 
                        $ultimoestadoafectacion="SIN SEGUIMIENTO";
                        foreach($lastestadosafectaciones as $lastestadoafectacion){
                            $ultimoestadoafectacion=$lastestadoafectacion->Desc_Estado;
                        }
                    ?>
                    <div class="alert alert-primary text-center" role="alert">
                            <b>Estado ACTUAL</b></br>
                            <?php echo $ultimoestadoafectacion; ?>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td colspan="2"><b>Documento</b></td>
                            <td colspan="2"><?php echo $caso->Tipo_Doc . ' ' . $caso->Numero_doc; ?></td>
                        </tr>
                        <tr>
                            <td><b>Primer Nombre</b></td>
                            <td><?php echo $caso->Nombre_1; ?></td>
                            <td><b>Segundo Nombre</b></td>
                            <td><?php echo $caso->Nombre_2; ?></td>
                        </tr>
                        <tr>
                            <td><b>Primer Apellido</b></td>
                            <td><?php echo $caso->Apellido_1; ?></td>
                            <td><b>Segundo Apellido</b></td>
                            <td><?php echo $caso->Apellido_2; ?></td>
                        </tr>
                        <tr>
                            <td><b>Fecha de nacimiento</b></td>
                            <td><?php echo $caso->F_Nacimiento; ?></td>
                            <td><b>Edad</b></td>
                            <td><?php echo $caso->Edad; ?></td>
                        </tr>
                        <tr>
                            <td><b>Sexo</b></td>
                            <td><?php echo $caso->Sexo; ?></td>
                            <td><b>Ubicacion Caso</b></td>
                            <td><?php echo $caso->Desc_Dpto .'/' . $caso->Desc_Mpio; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><b>Regimen</b></td>
                            <td><?php echo $caso->Regimen; ?></td>
                        </tr>
                    </table>
                </div><!-- END CARDBODY -->
            </div><!-- END CARD -->
        </div><!-- END CONTAINER F -->
    </div> <!-- END JUMBOTRON -->
</div> <!-- END CONTAINER -->
<div class="jumbotron mt-5">
  <div class="container-fluid">
    <h1 class="display-4 text-center">Seguimientos</h1>
    <hr class="my-4">
    <a href="<?php echo site_url('seguimientos/nuevoseguimiento/'.$caso->Id);?>" class="btn btn-success btn-lg">
    <i class="fa fa-clipboard-list fa-lg"></i> Registrar seguimiento
    </a>
    <?php } //end for each ?>                   
    <table id='tseguimientos' class ="table table-hover">
        <thead>
        <tr class="bg-info text-white">  
            <th>#</th>   
            <th>FECHA CARGUE</th>
            <th>FECHA DE SEGUIMIENTO</th>
            <th>DEPARTAMENTO</th>
            <th>MUNICIPIO</th> 
            <th>DIRECCION/TELEFONO</th>
            <th>ESTADO</th>
            <th>RESULTADO PRUEBA COVID</th>
            <th>FECHA PRUEBA COVID</th>
            <th>ACCIONES</th>
        </tr>       
        </thead>
        <tbody>
        <?php
        foreach($seguimientos as $seguimiento)
        {
        ?>
        <tr>  
            <td><?php  echo $seguimiento->No_Atencion; ?></td> 
            <td><?php  echo $seguimiento->F_Cargue_Sgto; ?></td>
            <td><?php  echo $seguimiento->Fecha_Hora; ?></td>   
            <td><?php  echo $seguimiento->Desc_Dpto; ?></td>  
            <td><?php  echo $seguimiento->Desc_Mpio; ?></td> 
            <td><?php  echo '<i class="fa fa-map-marker-alt"></i> ' . $seguimiento->Direccion . ' / <i class="fa fa-phone"></i> ' . $seguimiento->Telefono; ?></td>
            <td><?php  echo $seguimiento->Desc_Aislamiento; ?></td>
            <td><?php  echo $seguimiento->Desc_Resultado; ?></td>
            <td><?php  echo $seguimiento->F_Resultado; ?></td>
            <td> 
            <a href="<?php echo site_url('seguimientos/ver/'.$seguimiento->Id);?>" class="btn btn-info btn-sm" title="Ver seguimiento"> 
                <i class="fa fa-eye" style="font-size:24px;color:white;"></i>
            </a>
            <!--
            <a href="<?php //echo site_url('casos/editar/'.$caso->Id);?>" class="btn btn-warning btn-sm">
                <i class="fa fa-edit" style="font-size:24px"></i>
            </a>
            <a href="<?php //echo site_url('casos/eliminar/'.$caso->Id);?>" onclick="return confirm('¿esta seguro que desea eliminar?');"  class="btn btn-danger btn-sm"> 
                <i class="fa fa-times-circle" style="font-size:24px;color:white;"></i>
            </a>
            -->
            </td> 
        </tr>
        <?php 
        }//endforeach
        ?>   
        </tbody>
        <tfooter>
        <tr class="bg-info text-white">    
            <th>#</th>   
            <th>FECHA CARGUE</th>
            <th>FECHA DE SEGUIMIENTO</th>
            <th>DEPARTAMENTO</th>
            <th>MUNICIPIO</th> 
            <th>DIRECCION/TELEFONO</th>
            <th>ESTADO</th>
            <th>RESULTADO PRUEBA COVID</th>
            <th>FECHA PRUEBA COVID</th>
            <th>ACCIONES</th>
        </tr>
        </tfooter>
    </table>
  </div>
</div>