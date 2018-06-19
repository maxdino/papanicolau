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
    <?php foreach($perfil as $value){ ?>
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
            <li class="active">Perfil</li>
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
                      <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->nombre; ?>" id="nombres" style="text-transform: uppercase;" placeholder="Nombres">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->apellido; ?>" id="apellidos" style="text-transform: uppercase;" placeholder="Apellidos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="usuario" class="col-sm-2 control-label">Usuario</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->usuario; ?>" id="usuario" placeholder="USUARIO">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="clave" class="col-sm-2 control-label">Contraseña</label>
                    <?php $longitud = strlen($value->clave);
                    $usuario = substr($value->clave, 32, $longitud);         
                    ?>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" autocomplete="off" value="<?php echo base64_decode($usuario); ?>" id="clave" placeholder="CONTRASEÑA">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="clave_con" class="col-sm-2 control-label">Confirmar Contraseña</label>

                    <div class="col-sm-10">
                      <input type="password" class="form-control" autocomplete="off" value="<?php echo base64_decode($usuario); ?>" id="clave_con" placeholder="CONFIRMAR CONTRASEÑA">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="clave_con" class="col-sm-2 control-label">Perfil Usuario</label>
                    <div class="col-sm-10">
                      <select class="form-control select2" id="perfil_usuario" name="perfil_usuario" >
                        <?php foreach($perfiles as $values){ if ($value->tipos_usuarios==$values->id_tipos_usuarios) {    ?>
                          <option value="<?php echo $values->id_tipos_usuarios;  ?>" ><?php echo $values->tipos_usuarios;  ?></option>
                        <?php } } ?>
                        <option value="0"></option>
                        <?php foreach($perfiles as $values){ if ($value->tipos_usuarios!=$values->id_tipos_usuarios) {    ?>
                          <option value="<?php echo $values->id_tipos_usuarios;  ?>" ><?php echo $values->tipos_usuarios;  ?></option>
                        <?php } } ?>
                      </select>
                    </div>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <a type="submit" href="<?php echo base_url();?>Perfil_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
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
  <?php include('includes/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?php include('includes/js.inc'); ?>
<script>
  $(function () {
    $(".select2").select2();
  });
  $( "#modificar" ).click(function() {
    var nombres = $('#nombres').val();
    var id_usuario = $('#id_usuario_modificar').val();
    var apellidos = $('#apellidos').val();
    var usuario = $('#usuario').val();
    var clave = $('#clave').val();
    var clave_con = $('#clave_con').val();
    var perfil_usuario = $('#perfil_usuario').val();
    if (nombres!=''&&apellidos!=''&&usuario!=''&&clave!=''&&clave_con!=''&&perfil_usuario!='0') {
      if (clave==clave_con) {
       $.post("<?php echo base_url();?>Usuarios_c/modificar",{"id_usuario":id_usuario,"nombres":nombres,"clave":clave,"apellidos":apellidos,"usuario":usuario,"perfil_usuario":perfil_usuario},
        function(data){
           swal({
            title: "Se asignaron correctamente los permisos",
            text: "¡Se guardo con exito!",
            type: "success",
            showCancelButton: false,
            confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
            confirmButtonText: 'Ok!'
          },function(){
             window.location='../Usuarios_c';
          });
        });
     }else{
      swal({
        title: "Error",
        text: "¡No coinciden las contraseñas!",
        type: "error",
        showCancelButton: false,
        confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
        confirmButtonText: 'Ok!'
      });
    }
  }else{
    swal({
      title: "Error al registrar el Usuario",
      text: "¡No llenaste todos los campos del Usuario!",
      type: "error",
      showCancelButton: false,
      confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
      confirmButtonText: 'Ok!'
    });
  }
});
</script>
</body>
</html>
