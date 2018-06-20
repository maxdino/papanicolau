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
          MODIFICAR FOTO DE PERFIL 
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
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
                  <label for="clave_con" class="col-sm-2 control-label">Foto de Perfil</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" accept="*/ .png,.jpg,.jpeg" id="foto" name="foto"  onchange="ver_imagen()">
                    <input type="hidden" name="mostrar_imagen"  id="mostrar_imagen" value="<?php echo $value->foto; ?>" >
                    <input type="hidden" name="src_imagen"  id="src_imagen" value="<?php echo $value->foto; ?>" >
                    <input type="hidden" name="valida_imagen" id="valida_imagen" value="1">
                    
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Perfil_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <button type="submit" class="btn btn-info pull-right"><i class="fa fa-upload"></i> Modificar</button>
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
  
  function ver_imagen(){
    var file = $('#foto')[0].files[0].name;
    $('#mostrar_imagen').val(file);
    var f2 =  $('#mostrar_imagen').val();
    var f1 = $('#src_imagen').val();
    if('public/foto/'+f2==f1){
      $("#valida_imagen").val('1');
    }else{
      $("#valida_imagen").val('0');
    }
  }

  $('#editar_formulario').on("submit", function(e){
    e.preventDefault();
        var formData = new FormData(document.getElementById("editar_formulario"));
        var url = "<?php echo base_url();?>Perfil_c/modificar_imagen";
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
     
}); 



</script>
</body>
</html>
