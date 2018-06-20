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
    <?php foreach($modulos as $value){ ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          MODIFICAR MODULO 
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Seguridad</a></li>
          <li class="active">Modulos</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
       <!-- Default box -->
       <div class="box">
         <div class="box-body">  
          <div class="col-md-8">
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="modulos" class="col-sm-2 control-label">MODULO</label>
                  <div class="col-sm-10">
                    <input type="hidden" id="id_modulos" value="<?php echo $value->id_modulos; ?>" >
                    <input type="text" class="form-control" autocomplete="off" id="modulos" style="text-transform: uppercase;" value="<?php echo $value->nombres; ?>" placeholder="Modulo">
                  </div>
                </div>
                <div class="form-group">
                  <label for="padre" class="col-sm-2 control-label">Padre</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="padre" onchange="habilitar_url()">
                      <?php foreach($padre as $values){ if($value->padre==$values->id_modulos){ ?>
                      <option value="<?php echo $values->id_modulos;  ?>" ><?php echo $values->nombres;  ?></option>
                      <?php } } ?>
                      <option value="0"></option>
                      <?php foreach($padre as $values){ if($value->padre!=$values->id_modulos){ ?>
                      <option value="<?php echo $values->id_modulos;  ?>" ><?php echo $values->nombres;  ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="url" class="col-sm-2 control-label">Url</label>
                  <div class="col-sm-10">
                   <?php if( $value->url=='#'){ $url=''; }else{ $url=$value->url; } ?>
                    <input type="text" class="form-control" autocomplete="off" id="url" value="<?php echo $url; ?>" >
                  </div>
                </div>
                <div class="form-group">
                  <label for="iconos" class="col-sm-2 control-label">Iconos</label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="iconos">
                      <?php foreach($iconos as $values){ if($value->iconos==$values->id_iconos){ ?>
                      <option value="<?php echo $values->id_iconos;  ?>" ><?php echo  $values->nombres;  ?></option>
                      <?php } } ?>
                      <option value="0" ></option>
                      <?php foreach($iconos as $values){ if($value->iconos!=$values->id_iconos){ ?>
                      <option value="<?php echo $values->id_iconos;  ?>" ><?php echo  $values->nombres;  ?></option>
                      <?php } } ?>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Modulos_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
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
 $(function () {
       //Initialize Select2 Elements
       $(".select2").select2();
     });
 $( "#modificar" ).click(function() {
  var id_modulos = $('#id_modulos').val();
  var modulos = $('#modulos').val();
  var url = $('#url').val();
  var iconos = $('#iconos').val();
  var padre = $('#padre').val();
  if (modulos!=''&&iconos!='0') {
   $.post("<?php echo base_url();?>Modulos_c/modificar",{"modulos":modulos,"url":url,"id_modulos":id_modulos,"iconos":iconos,"padre":padre},
    function(data){
      window.location='../../Modulos_c';
    });
 }else{
   swal({
    title: "Error al registrar el Modulo",
    text: "¡No llenaste todos los campos!",
    type: "error",
    showCancelButton: false,
    confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
    confirmButtonText: 'Ok!'
  });      
 }
});
 function habilitar_url(){
  var id = $('#padre').val();
  if (id==0) {
    $('#url').val('');
    $('#url').prop('disabled','disabled');
  }else{
    $('#url').removeAttr('disabled');
  }
}
</script>
</body>
</html>
