<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE REPORTES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <?php include('includes/css.inc'); ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <?php include('includes/menu.inc'); ?>
  <?php foreach($usuarios as $value){ ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MODIFICAR USUARIO 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Seguridad</a></li>
        <li class="active">Usuarios</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
         <div class="box-body">  
          <div class="col-md-6">
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombres" class="col-sm-2 control-label">Nombres</label>
                  <input type="hidden" value="<?php echo $value->id_usuario; ?>" id="id_usuario_modificar">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $value->nombre; ?>" id="nombres" style="text-transform: uppercase;" placeholder="Nombres">
                    <div id="no_nombres"  style="color: red;display: none;" >Llenar el campo Nombres</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $value->apellido; ?>" id="apellidos" style="text-transform: uppercase;" placeholder="Apellidos">
                    <div id="no_apellidos" style="color: red;display: none;" >Llenar el campo Apellidos</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="usuario" class="col-sm-2 control-label">Usuario</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?php echo $value->usuario; ?>" id="usuario" placeholder="USUARIO">
                    <div id="no_usuario" style="color: red;display: none;" >Llenar el campo Usuario</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clave" class="col-sm-2 control-label">Contraseña</label>
                  <?php $longitud = strlen($value->clave);
                  $usuario = substr($value->clave, 32, $longitud);         
                   ?>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" value="<?php echo base64_decode($usuario); ?>" id="clave" placeholder="CONTRASEÑA">
                    <div id="no_clave" style="color: red;display: none;" >Llenar el campo Contraseña</div>
                    <div id="no_coinciden"  style="color: red;display: none;" >Las contraseñas no coinciden</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="clave_con" class="col-sm-2 control-label">Confirmar Contraseña</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" value="<?php echo base64_decode($usuario); ?>" id="clave_con" placeholder="CONFIRMAR CONTRASEÑA">
                    <div id="no_clave_con" style="color: red;display: none;" >Llenar el campo Confirmar Contraseña</div>
                    <div id="no_coinciden_con"  style="color: red;display: none;" >Las contraseñas no coinciden</div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Usuarios_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <a type="submit" id="modificar" class="btn btn-info pull-right"><i class="fa fa-upload"></i>  Modificar</a>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
            </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <?php } ?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.6
    </div>
    <strong>MDH &copy; 2018.</strong> Todos los derechos reservados.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include('includes/js.inc'); ?>
 <script>
  
  $( "#cancelar" ).click(function() {
  window.location='Usuarios_c';
});
  $( "#modificar" ).click(function() {
    var nombres = $('#nombres').val();
    var id_usuario = $('#id_usuario_modificar').val();
    var apellidos = $('#apellidos').val();
    var usuario = $('#usuario').val();
    var clave = $('#clave').val();
    var clave_con = $('#clave_con').val();

    if (nombres!=''&&apellidos!=''&&usuario!=''&&clave!=''&&clave_con!='') {
      if (clave==clave_con) {
   $.post("<?php echo base_url();?>Usuarios_c/modificar",{"id_usuario":id_usuario,"nombres":nombres,"clave":clave,"apellidos":apellidos,"usuario":usuario},
        function(data){
            $('#no_coinciden').css('display','none');
            $('#no_coinciden_con').css('display','none');
            window.location='../Usuarios_c';
        });
 }else{
        $('#no_usuario').css('display','none');
        $('#no_clave').css('display','none');
        $('#no_nombres').css('display','none');
        $('#no_apellidos').css('display','none');
        $('#no_clave_con').css('display','none');
        $('#no_coinciden').css('display','block');
        $('#no_coinciden_con').css('display','block');
 }
}else{
      if (usuario=='') {
        $('#no_usuario').css('display','block');
      }else{
        $('#no_usuario').css('display','none');
      }
      if (clave=='') {
        $('#no_coinciden_con').css('display','none');
        $('#no_coinciden').css('display','none');
        $('#no_clave').css('display','block');
      }else{
        $('#no_clave').css('display','none');
      } 
      if (nombres=='') {
        $('#no_nombres').css('display','block');
      }else{
        $('#no_nombres').css('display','none');
      }
      if (apellidos=='') {
        $('#no_apellidos').css('display','block');
      }else{
        $('#no_apellidos').css('display','none');
      } 
      if (clave_con=='') {
        $('#no_coinciden_con').css('display','none');
        $('#no_coinciden').css('display','none');
        $('#no_clave_con').css('display','block');
      }else{
        $('#no_clave_con').css('display','none');
      }
}
});
</script>
</body>
</html>
