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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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
          BIENVENIDO AL IMPORTAR EXCEL  <img width="33" height="38" src="public/foto/excel_icono.png">
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
          <li class="active">Importar Excel</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">


          <div class="col-md-13">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <div class="box-header with-border">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">Exportar plantilla Excel</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Cargar Excel</a></li>
                </ul>
              </div>
              <div class="box-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <?php echo form_open_multipart('Importar_c/exportar'); ?> 
                    <input type="submit" name="exportar" value="Exportar plantilla Excel"> 
                    <?php echo form_close(); ?>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">

                   <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> AVISO!</h4>
                    Antes de cargar el archivo excel ver el formato de plantilla para evitar problemas
                  </div>

                  <form   method="post" id="form_importar"   name="form_importar" enctype='multipart/form-data'  >
                    <div class="form-group">
                      <label for="exampleInputFile">Cargar Archivo Excel</label>
                      <input type="file" id="excel" name="excel" accept="*/ .xls,.xlsx">
                      <br>
                      <button type="submit"   id="btn_importar" >Importar</button>
                    </div>
                     <br>
                  </form>

                </div>
                <!-- /.tab-pane -->
              </div>

            </div>    
            
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<div id="modal_carga" class="modal fade" role="dialog" backdrop="static" keyboard="false">
 <div class="modal-dialog">
      <div class="modal-content">
 
      </div> 
   </div>          
 </div>   
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>MDH &copy; 2018.</strong> Todos los derechos reservados.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <?php include('includes/js.inc'); ?>
 <script>

  $('#form_importar').on("submit", function(e){
    //$('#modal_carga').modal('show');
   showPleaseWait();
    e.preventDefault();
 
    var formData = new FormData(document.getElementById("form_importar"));
    var url = "<?php echo base_url();?>Importar_c/importar";

    $.ajax({                        
     type: "POST",                 
     url: url,                     
     data: formData,
     cache: false,
     contentType: false,
     processData: false

   }).done(function(datos){
    hidePleaseWait();
    swal("Registrado!", "Se ha subido correctamente los datos :)", "success");

   });
 }); 

function showPleaseWait() {
    var modalLoading = '<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false role="dialog">\
        <div class="modal-dialog">\
            <div class="modal-content" style="border-radius: 10px;margin-top:160px;">\
                <div class="modal-header">\
                    <h3 class="modal-title">Cargando...</h3>\
                </div>\
                <div class="modal-body">\
                    <div class="progress">\
                      <div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar"\
                      aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; height: 70px">\
                      </div>\
                    </div>\
                </div>\
            </div>\
        </div>\
    </div>';
    $(document.body).append(modalLoading);
    $("#pleaseWaitDialog").modal("show");
}

/**
 * Hides "Please wait" overlay. See function showPleaseWait().
 */
function hidePleaseWait() {
    $("#pleaseWaitDialog").modal("hide");
}
</script>
</body>
</html>
