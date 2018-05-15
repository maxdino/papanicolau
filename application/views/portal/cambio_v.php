<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contraseña</title><meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include('includes/css.inc');?>

</head>
<body>
  <div id="login_1">
    <div id="loginbox" > 
      <div class="alert alert-error alert-block" id="notificacion_error" style="display: none;">
        <h4 class="alert-heading">Error!</h4>
      No se pudo modificar, las contraseñas no coinciden</div>
    </div>
    <br>
    <div id="loginbox" style="background: #d0d0d0;">            

     <div class="control-group" style="margin-left: 100px; color: #1b83ad" ><h3 >Cambiar Contraseña</h3></div>
     <input type="hidden" placeholder="" value="<?php echo $_GET['id'] ?>" name="id_usu" id="id_usu" />
     <input type="hidden" placeholder="" value="<?php echo $_GET['cambios'] ?>" name="cambios" id="cambios" />
     <div class="control-group">
      <div class="controls">
        <div class="main_input_box">
          <span class="add-on " style="background: #1b83ad;"><i class="icon-user"> </i></span><input type="password" placeholder="Contraseña" name="clave" id="clave" />
        </div>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <div class="main_input_box">
          <span class="add-on " style="background: #ff5a48;"><i class="icon-lock"></i></span><input type="password" placeholder="Confirmar Contraseña" name="clave_confirmar" id="clave_confirmar" />
        </div>
      </div>
    </div> 
    <div class="form-actions" style="background: #d0d0d0;">
    
      <span class="pull-right"><button type="submit" id="modificar"  class="btn btn-info" />Modificar</button></span>
    </div>
  </div>
  </div>
   
<?php include('includes/js.inc');?>
</body>
<script type="text/javascript">
  $('#modificar').click(function(){
    var clave= $('#clave').val();
    var id= $('#id_usu').val();
    var cambios= $('#cambios').val();
    var clave_confirmar= $('#clave_confirmar').val();
    if (clave==clave_confirmar) {
    $.post("<?php echo base_url();?>Contrasena_c/modificar",{"id":id,"clave":clave,"cambios":cambios}, function(mensaje) {
     $('#notificacion_error').css("display","none");  
     $('#clave').val('');
     $('#clave_confirmar').val('');
     $('#login_1').css("display","none");   
     window.location.href = "<?php echo base_url();?>Portal_c"; 
   });
  }else{
    $('#notificacion_corre').css("display","none"); 
    $('#notificacion_error').css("display","block"); 
  }
  });
</script>

</html>