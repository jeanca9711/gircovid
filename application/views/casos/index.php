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
        'copyHtml5',
        'excelHtml5',
        'csvHtml5',
        ]
    } );
} );
</script>
<div class="espacio" style="padding:30px;">

</div>

<div class="jumbotron shadow mt-5">
  <div class="container-fluid">
    <h1 class="display-4 text-center">Casos</h1>
    <hr class="my-4">
    <a href="<?php echo site_url('casos/nuevocaso');?>" class="btn btn-success btn-lg">
    <i class="fa fa-clipboard-list fa-lg"></i> Registrar Caso
    </a>

    <table id='tcasos' class ="table table-hover">
        <thead>
        <tr class="bg-info text-white">  
            <th>DOCUMENTO</th>   
            <th>NOMBRES</th> 
            <th>FECHA DE NACIMIENTO</th>
            <th>EDAD</th> 
            <th>SEXO</th>
            <th>ESTADO ACTUAL COVID</th>
            <th>ACCIONES</th>
        </tr>       
        </thead>
        <tbody>
        <?php
        foreach($casos as $caso)
        {
        ?>
        <tr>  
            <td><?php  echo $caso->Tipo_Doc . ' ' . $caso->Numero_Doc; ?></td> 
            <td><?php  echo $caso->Nombre_1 . ' ' . $caso->Nombre_2 . ' ' . $caso->Apellido_1 . ' ' . $caso->Apellido_2; ?></td>   
            <td><?php  echo $caso->F_Nacimiento; ?></td>  
            <td><?php  echo $caso->Edad; ?></td> 
            <td><?php  echo $caso->Sexo; ?></td>
            <td><?php  echo $caso->Desc_Estado; ?></td>
            <td> 
            <a href="<?php echo site_url('casos/ver/'.$caso->Id);?>" class="btn btn-info btn-sm" title="Ver caso"> 
                <i class="fa fa-eye" style="font-size:24px;color:white;"></i>
            </a>
            <a href="<?php echo site_url('casos/seguimientos/'.$caso->Id);?>" class="btn btn-info btn-sm" title="Detalle de seguimientos"> 
                <i class="fa fa-clipboard-list" style="font-size:24px;color:white;"></i>
            </a>
            <a href="<?php echo site_url('casos/editar/'.$caso->Id);?>" class="btn btn-warning btn-sm" title="Contactos"> 
                <i class="fa fa-edit" style="font-size:24px;color:white;"></i>
            </a>
            <a href="<?php echo site_url('casos/contactos/'.$caso->Id);?>" class="btn btn-warning btn-sm" title="Contactos"> 
                <i class="fa fa-people-arrows" style="font-size:24px;color:white;"></i>
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
            <th>DOCUMENTO</th>   
            <th>NOMBRES</th> 
            <th>FECHA DE NACIMIENTO</th>
            <th>EDAD</th>
            <th>SEXO</th>
            <th>ESTADO ACTUAL COVID</th>
            <th>ACCIONES</th>
        </tr>
        </tfooter>
    </table>
  </div>
</div>