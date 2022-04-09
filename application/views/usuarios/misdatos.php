<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="espacio" style="padding:20px;">

</div>
<?php foreach($usuarios as $usuario){
$email=$usuario->Email;
$contrasena=$usuario->Contrasena;
$nombres=$usuario->Nombre_1 . ' ' . $usuario->Nombre_2;
$apellidos=$usuario->Apellido_1 . ' ' . $usuario->Apellido_2;
$documento=$usuario->Numero_Doc;
$telefono=$usuario->Telefono;
$celular=$usuario->Celular;
$dependencia=$usuario->Dependencia;
} ?>
<div class="container-fluid">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Mis datos</h1>
            <hr class="my-4">
            <p class="lead">Datos de cuenta</p>
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="width:40%;"><b><i class="fa fa-envelope"></i> Email: </b></td>
                                <td style="width:60%;"><?php echo $email; ?></td>
                            </tr>
                            <tr>
                                <td style="width:40%;"><p><b><i class="fa fa-lock"></i> Contraseña: </b></td>
                                <td style="width:60%;">********</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <br/>
            <p class="lead">Datos personales</p>
            <div class="card">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td style="width:40%;"><b><i class="fa fa-id-card"></i> Documento: </b></td>
                                <td style="width:60%;"><?php echo $documento;?></td>
                            </tr>
                            <tr>
                                <td style="width:40%;"><b><i class="fa fa-user"></i> Nombres: </b></td>
                                <td style="width:60%;"><?php echo $nombres; ?></td>  
                            </tr>
                            <tr>
                                <td style="width:40%;"><p><b><i class="fa fa-user"></i> Apellidos: </b></td>
                                <td style="width:60%;"><?php echo $apellidos; ?></td>
                            </tr>
                            <tr>
                                <td style="width:40%;"><p><b><i class="fa fa-phone"></i> Telefono: </b></td>
                                <td style="width:60%;"><?php echo $telefono; ?></td>
                            </tr>
                            <tr>
                                <td style="width:40%;"><p><b><i class="fa fa-mobile-alt"></i> Movil: </b></td>
                                <td style="width:60%;"><?php echo $celular; ?></td>
                            </tr>
                            <tr>
                                <td style="width:40%;"><p><b><i class="fas fa-id-badge"></i> Dependencia: </b></td>
                                <td style="width:60%;"><?php echo $dependencia; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div><!-- end container -->    

<script type="text/javascript">

function cerrar()
{
  location.reload();
}

function removeMessage(){
    setTimeout(function () 
    {
        $(".alert").fadeTo(500, 0).slideUp(500, function () {
            //$(this).remove();
            $(".alert").alert('close');
        });
    }, 5000);
}



 function limpiar()
 {
    $('#formcontrasena').find('input:text, input:password, input:email,input:file, select, textarea').val('');
    $('#email').val('');
 }


</script>