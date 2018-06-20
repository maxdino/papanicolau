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
          MODIFICAR CLAVE 
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
            <form class="form-horizontal" id="editar_formulario" name="editar_formulario">
              <div class="box-body">
                <div class="form-group">
                  <label for="clave_con" class="col-sm-2 control-label">Contraseña Actual</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" autocomplete="off" id="clave_actual" placeholder="CONTRASEÑA ACTUAL">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clave" class="col-sm-2 control-label">Nueva Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" autocomplete="off" id="clave" name="clave" placeholder="NUEVA CONTRASEÑA">
                  </div>
                </div>
                <div class="form-group">
                  <label for="clave_con" class="col-sm-2 control-label">Confirmar Nueva Contraseña</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" autocomplete="off" id="clave_con" name="clave_con" placeholder="CONFIRMAR NUEVA CONTRASEÑA">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Perfil_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Modificar Contraseña</button>
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

  $('#editar_formulario').on("submit", function(e){
    e.preventDefault();
    var clave = $('#clave').val();
    var clave_con = $('#clave_con').val();
    if (clave==clave_con) {
      
      var formData = new FormData(document.getElementById("editar_formulario"));
      var url = "<?php echo base_url();?>Perfil_c/modificar_clave";
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
       window.location='../Perfil_c';
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
}); 



</script>
</body>
</html>
