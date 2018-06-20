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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          REGISTRAR NUEVO USUARIO
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
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
            <form class="form-horizontal" id="formulario_agregar" name="formulario_agregar">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombres" class="col-sm-2 control-label">Nombres</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombres" name="nombres" autocomplete="off" style="text-transform: uppercase;" placeholder="Nombres">
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellidos" class="col-sm-2 control-label">Apellidos</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="apellidos" name="apellidos" autocomplete="off" style="text-transform: uppercase;" placeholder="Apellidos">
                  </div>
                </div>
                <div class="form-group">
                  <label for="usuario" class="col-sm-2 control-label">Usuario</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off" placeholder="USUARIO">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clave" class="col-sm-2 control-label">Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" autocomplete="off" id="clave" name="clave" placeholder="CONTRASEÑA">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clave_con" class="col-sm-2 control-label">Confirmar Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" autocomplete="off" id="clave_con" name="clave_con" placeholder="CONFIRMAR CONTRASEÑA">
                  </div>
                </div>
                <div class="form-group">
                  <label for="perfil_usuario" class="col-sm-2 control-label">Perfil Usuario</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="perfil_usuario" name="perfil_usuario" >
                    <option value="0"></option>
                    <?php foreach($perfiles as $value){ ?>
                    <option value="<?php echo $value->id_tipos_usuarios;  ?>" ><?php echo $value->tipos_usuarios;  ?></option>
                    <?php } ?>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="foto" class="col-sm-2 control-label">Foto Perfil</label>
                  <div class="col-sm-10">
                  <input type="file" class="form-control" accept="*/ .png,.jpg,.jpeg" id="foto" name="foto"  onchange="ver_imagen()">
                  </div>
                    <input type="hidden" name="valida_imagen" id="valida_imagen" value="1">

                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Usuarios_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <button type="submit" id="agregar" class="btn btn-info pull-right"><i class="fa fa-upload"></i>  Registrar</button>
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

  function ver_imagen(){
    var file = $('#foto')[0].files[0].name;
    if(file!=''){
      $("#valida_imagen").val('0');
    } 
  }

  $('#formulario_agregar').on("submit", function(e){
    e.preventDefault();
    var nombres = $('#nombres').val();
    var apellidos = $('#apellidos').val();
    var usuario = $('#usuario').val();
    var clave = $('#clave').val();
    var clave_con = $('#clave_con').val();
    var perfil_usuario = $('#perfil_usuario').val();
     if (nombres!=''&&apellidos!=''&&usuario!=''&&clave!=''&&clave_con!=''&&perfil_usuario!='0') {
      if (clave==clave_con) {
        var formData = new FormData(document.getElementById("formulario_agregar"));
        var url = "<?php echo base_url();?>Usuarios_c/agregar";
        $.ajax({                        
         type: "POST",                 
         url: url,                     
         data: formData,
         cache: false,
         contentType: false,
         processData: false
       }).done(function(data){
        swal({
          title: "Se cambiaron correctamente",
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
