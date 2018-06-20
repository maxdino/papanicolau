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
    <?php foreach($tipos_usuarios as $value){ ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          MODIFICAR TIPO USUARIO 
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Seguridad</a></li>
          <li class="active">Tipos Usuarios</li>
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
                  <label for="nombres" class="col-sm-2 control-label">Tipo Usuario</label>
                  <input type="hidden" value="<?php echo $value->id_tipos_usuarios; ?>" id="id_tipo_usuario">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->tipos_usuarios; ?>" id="tipo_usuario" style="text-transform: uppercase;" placeholder="Tipo Usuario">
                  </div>
                </div>
                <div class="form-group">
                  <label for="apellidos" class="col-sm-2 control-label">Detalle</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->descripcion; ?>" id="detalle" style="text-transform: uppercase;" placeholder="Detalle">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Tipos_usuarios_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
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
  $( "#modificar" ).click(function() {
   var id_tipo_usuario = $('#id_tipo_usuario').val();
   var tipo_usuario = $('#tipo_usuario').val();
   var detalle = $('#detalle').val();
   if (id_tipo_usuario!=''&&tipo_usuario!=''&&detalle!='') {
    $.post("<?php echo base_url();?>Tipos_usuarios_c/modificar",{"id_tipo_usuario":id_tipo_usuario,"tipo_usuario":tipo_usuario,"detalle":detalle},
      function(data){
        window.location='../Tipos_usuarios_c';
      });
  }else{
    swal({
      title: "Error al registrar el Tipo Usuario",
      text: "¡No llenaste todos los campos!",
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