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
  <?php foreach($tipo as $value){ ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        MODIFICAR IPRESS 
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li class="active">Tipo</li>
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
                  <label for="nombres" class="col-sm-2 control-label">Nombre Tipo</label>
                  <input type="hidden" value="<?php echo $value->id_tipos; ?>" id="id_tipos_modificar">
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" value="<?php echo $value->tipos; ?>" id="nombres" style="text-transform: uppercase;" placeholder="Nombres">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Tipo_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
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
  
  $( "#cancelar" ).click(function() {
  window.location='Tipo_c';
});
  $( "#modificar" ).click(function() {
    var nombres = $('#nombres').val().toUpperCase();
    var id_tipos_modificar = $('#id_tipos_modificar').val();
    if (nombres!='') {

   $.post("<?php echo base_url();?>Tipo_c/modificar",{"nombres":nombres,"id_tipos":id_tipos_modificar},
        function(data){
            window.location='../../Tipo_c';
        });
}else{
      if (nombres=='') {
        $('#no_nombres').css('display','block');
      }else{
        $('#no_nombres').css('display','none');
      }
}
});
</script>
</body>
</html>
