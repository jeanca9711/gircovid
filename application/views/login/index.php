<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> 
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  
<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
  

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <div class="p-5">
  </div>
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <div class="espacio">
        
      </div>
      <div id="resultados"></div>
      <div class="jumbotron">
        <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-5">
            <img src="<?php echo base_url('assets/')?>img/logo.png" alt="logo">
          </div>
          <div class="col-sm-4"></div>
        </div>
        <br>
      <h2 class="text-center">Iniciar Sesión</h2>
      <hr class="my-4">
      <div class="container">
          <!-- Inicio de Formulario-->
          <form id="formlogin" method="post">
              <div class="form-group">
              <strong><label for="usuario">Usuario</label></strong>
              <input type="email" class="form-control" name="usuario" placeholder="Ingrese su correo electrónico" style="text-transform: lowercase;" required>
              </div>
              <div class="form-group">
              <strong><label for="contrasena">Contraseña</label></strong>
              <input type="password" class="form-control" name="contrasena" placeholder="Igrese su contraseña" required>
              </div>
              <button type="submit" class="btn btn-success">Iniciar Sesión</button>
          </form>
          <!-- FIN de Formulario-->
      </div>
    </div>
    <div class="col-sm-3"></div>
  </div>
<!-- Codigo PHP -->

<!-- FIN Codigo PHP -->
<!-- Script Validar Vacio Formulario -->

<!-- FIN Script Validar Vacio Formulario -->

<script type="text/javascript">

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
    $('#formlogin').find('input:text, input:password,input:file, select, textarea').val('');
    $('#email').val('');
 }

 $('#formlogin').submit(function(event)
 {
    
    var parametros = $('#formlogin').serialize();
    console.log(parametros);
    var salida="";
         $.ajax({
                type: "POST",
                url: "<?php echo site_url('usuarios/getLogin');?>",
                data: parametros,
                beforeSend: function() {
                  $('#resultados').show();
                 },
                error: function() {
                 $('#resultados').html(salida);
                  },
                success: function(datos){
                  $('#resultados').html(datos);
                  limpiar( );     
                  removeMessage();
                  
            }
        });
       event.preventDefault(); 
     
  }) 
</script>