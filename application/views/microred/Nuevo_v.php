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
        REGISTRAR NUEVO MICRORED
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
        <li><a href="#">Mantenimiento</a></li>
        <li class="active">Microred</li>
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
                  <label for="nombres" class="col-sm-2 control-label">Microred</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" autocomplete="off" id="nombres" style="text-transform: uppercase;" placeholder="Nombre Microred">
                    <div id="no_nombres"  style="color: red;display: none;" >Llenar el campo Nombre de Microred</div>
                  </div>
                </div>
                <div class="form-group">
                <label for="red" class="col-sm-2 control-label" >Red </label>
                 <div class="col-sm-10">
                <select class="form-control select2" id="red">
                  <option ></option>
                  <?php foreach($red as $value){ ?>
                  <option value="<?php echo $value->id_red;  ?>" ><?php echo $value->red_salud;  ?></option>
                  <?php } ?>
                </select>
                </div>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Microred_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <a type="submit" id="agregar" class="btn btn-info pull-right"><i class="fa fa-upload"></i>  Registrar</a>
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
       //Initialize Select2 Elements
    $(".select2").select2();
 
      });

  $( "#agregar" ).click(function() {
    var nombres = $('#nombres').val().toUpperCase();
    var red = $('#red').val();
    if (nombres!='') {
   $.post("<?php echo base_url();?>Microred_c/agregar",{"nombres":nombres,"red":red},
        function(data){
            window.location='../Microred_c';
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
