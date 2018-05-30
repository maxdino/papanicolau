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
          BIENVENIDO AL EXPORTAR EXCEL  <img width="33" height="38" src="public/foto/excel_icono.png">
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
          <li class="active">Exportal Excel</li>
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
                  <li class="active"><a href="#tab_1" data-toggle="tab">Exportar Excel Mes</a></li>
                  <li><a href="#tab_2" data-toggle="tab">Exportar Excel Año</a></li>
                  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                </ul>
              </div>
              <div class="box-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                   <div class="col-md-6">
                    <div class="box-body">
                      <?php echo form_open_multipart('Exportar_c/exportar_mes'); ?> 
                      <div class="form-group">
                        <label>Archivos Cargados</label>
                        <select class="form-control select2" id="mes_seleccion" name="mes_seleccion" style="width: 100%;">
                          <option ></option>
                          <?php foreach ($mes as  $value) { 
                            if ($value->mes=='01'||$value->mes=='1') {
                              $nombre_mes = 'ENERO';
                            }
                            if ($value->mes=='02'||$value->mes=='2') {
                              $nombre_mes = 'FEBRERO';
                            }
                            if ($value->mes=='03'||$value->mes=='3') {
                              $nombre_mes = 'MARZO';
                            }
                            if ($value->mes=='04'||$value->mes=='4') {
                              $nombre_mes = 'ABRIL';
                            }
                            if ($value->mes=='05'||$value->mes=='5') {
                              $nombre_mes = 'MAYO';
                            }
                            if ($value->mes=='06'||$value->mes=='6') {
                              $nombre_mes = 'JUNIO';
                            }
                            if ($value->mes=='07'||$value->mes=='7') {
                              $nombre_mes = 'JULIO';
                            }
                            if ($value->mes=='08'||$value->mes=='8') {
                              $nombre_mes = 'AGOSTO';
                            }
                            if ($value->mes=='09'||$value->mes=='9') {
                              $nombre_mes = 'SETIEMBRE';
                            }
                            if ($value->mes=='10') {
                              $nombre_mes = 'OCTUBRE';
                            }
                            if ($value->mes=='11') {
                              $nombre_mes = 'NOVIEMBRE';
                            }
                            if ($value->mes=='12') {
                              $nombre_mes = 'DICIEMBRE';
                            }
                            ?>
                            <option value="<?php echo $value->id_mes ?>" ><?php echo 'CONSOLIDADO '.$nombre_mes.' '.$value->annio; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>

                      <br>
                      
                      <input type="submit" name="exportar" value="Reportar Consolidado"> 
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <div class="col-md-6">
                    <div class="box-body">
                      <?php echo form_open_multipart('Exportar_c/exportar_annio'); ?> 
                      <div class="form-group">
                        <label>Archivos Cargados</label>
                        <select class="form-control select2" id="annio_seleccion" name="annio_seleccion" style="width: 100%;">
                          <option ></option>
                          <?php foreach ($annio as  $value) {   ?>
                            <option value="<?php echo $value->annio; ?>" ><?php echo 'CONSOLIDADO DEL AÑO '.$value->annio; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>
                      <br>
                      <input type="submit" name="exportar" value="Reportar Consolidado"> 
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                  Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                  when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                  It has survived not only five centuries, but also the leap into electronic typesetting,
                  remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                  sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                  like Aldus PageMaker including versions of Lorem Ipsum.
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

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>MDH &copy; 2018.</strong> Todos los derechos reservados.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->


 <?php include('includes/js.inc'); ?>
 <script>
  $(function () {
       //Initialize Select2 Elements
       $(".select2").select2();
//Date range picker
$('#reservation').daterangepicker();
});
</script>
</body>
</html>
