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
  <?php foreach($iconos as $value){ ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MODIFICAR ICONO
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Seguridad</a></li>
        <li class="active">Iconos</li>
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
                  <label for="icono" class="col-sm-2 control-label">Iconos</label>
                  <input type="hidden" value="<?php echo $value->id_iconos; ?>" id="id_iconos">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->nombres; ?>" id="iconos" style="text-transform: uppercase;" placeholder="Icono">
                  </div>
                </div>
                <div class="form-group">
                  <label for="url" class="col-sm-2 control-label">Url o Codigo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->codigo; ?>" id="url"   placeholder="url">
                  </div>
                </div>
                </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Iconos_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <a type="submit" id="modificar" class="btn btn-info pull-right"><i class="fa fa-upload"></i>  Modificar</a>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
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
    var id_iconos = $('#id_iconos').val();
    var iconos = $('#iconos').val();
    var url = $('#url').val();
    if (iconos!=''&&url!='') {
   $.post("<?php echo base_url();?>Iconos_c/modificar",{"iconos":iconos,"url":url,"id_iconos":id_iconos},
        function(data){
            window.location='../Iconos_c';
        });
}else{
   swal({
      title: "Error al registrar el Icono",
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
