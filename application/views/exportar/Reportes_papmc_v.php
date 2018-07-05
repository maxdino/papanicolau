<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE REPORTES</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url();?>public/foto/logo_1.png" sizes="16x16" />
 
  <?php include('includes/css.inc'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?php include('includes/menu.inc'); ?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          BIENVENIDO AL REPORTE DE MICRORED PAP POR RECEPCION <img width="40" height="40" src="public/foto/office_excel.png">
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Reportes</a></li>
          <li class="active">Exportar Excel</li>
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
                  <li><a href="#tab_3" data-toggle="tab">Exportar Excel rango Mes</a></li>
                </ul>
              </div>
              <div class="box-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <?php echo form_open_multipart('Reportes_papmc_c/exportar_mes'); ?>
                    <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Red</label>
                        <select class="form-control select2" id="red" onchange="habilitar_mes()"  name="red" style="width: 100%;">
                          <option value="-1" ></option>
                          <?php foreach ($red as  $value) {   ?>
                            <option value="<?php echo $value->id_red; ?>" ><?php echo $value->red_salud; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="box-body">
                      
                      <div class="form-group">
                        <label>Archivos Cargados</label>
                        <select class="form-control select2" id="mes_seleccion" disabled="disabled" onchange="habilita_button_mes()" name="mes_seleccion" style="width: 100%;">
                          <option value="-1"></option>
                          <?php foreach ($mes as  $value) { 
                            $mes_nombre = array("01" =>"ENERO","02" => "FEBRERO","03" => "MARZO","04" => "ABRIL","05" =>"MAYO","06" => "JUNIO","07" => "JULIO","08" => "AGOSTO","09" =>"SETIEMBRE","10" => "OCTUBRE","11" => "NOVIEMBRE","12" => "DICIEMBRE");
                            foreach ($mes_nombre as $key => $val) {
                            if ($value->mes==$key) {
                            $nombre_mes = $val;
                          }
                        }
                            ?>
                            <option value="<?php echo $value->id_mes ?>" ><?php echo 'CONSOLIDADO '.$nombre_mes.' '.$value->annio; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>

                      <br>
                      <div class="col-md-6">
                      <input type="submit" name="exportar" id="exportar" class="tn btn-block btn-primary" disabled="disabled" value="Reportar Consolidado"> 
                      </div>    
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <?php echo form_open_multipart('Reportes_papmc_c/exportar_annio'); ?> 
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Red</label>
                        <select class="form-control select2" id="red_a" onchange="habilitar_annio()"  name="red_a" style="width: 100%;">
                          <option value="-1" ></option>
                          <?php foreach ($red as  $value) {   ?>
                            <option value="<?php echo $value->id_red; ?>" ><?php echo $value->red_salud; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Archivos Cargados</label>
                        <select class="form-control select2" id="annio_seleccion" disabled="disabled" onchange="habilitar_button_a()" name="annio_seleccion" style="width: 100%;">
                          <option value="" ></option>
                          <?php foreach ($annio as  $value) {   ?>
                            <option value="<?php echo $value->annio; ?>" ><?php echo 'CONSOLIDADO DEL AÑO '.$value->annio; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>
                      <br>
                      <div class="col-md-6">
                      <input type="submit" name="exportar_a" id="exportar_a" class="tn btn-block btn-primary" disabled="disabled" value="Reportar Consolidado"> 
                       </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  <?php echo form_open_multipart('Reportes_papmc_c/rango_mes'); ?>
                  <div class="col-md-5">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Red</label>
                       <select class="form-control select2" id="red_r" onchange="habilitar_annio_r()"  name="red_r" style="width: 100%;">
                          <option value="-1" ></option>
                          <?php foreach ($red as  $value) {   ?>
                            <option value="<?php echo $value->id_red; ?>" ><?php echo $value->red_salud; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Seleccionar año</label>  
                        <select class="form-control select2" id="annio_r" name="annio_r" disabled="disabled" onchange="rango_annio()" style="width: 100%;">
                          <option value="0"></option>
                          <?php foreach ($annio as  $value) {   ?>
                            <option value="<?php echo $value->annio; ?>" ><?php echo ' AÑO '.$value->annio; ?> </option>
                          <?php   }  ?>
                        </select> 
                      </div>
                    </div>     
                  </div>
                  <br><br><br><br><br>
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Mes Inicial</label>
                        <select class="form-control select2" id="mes_inicial" onchange="rango_mes()" disabled="disabled"  name="mes_inicial" style="width: 100%;">
                        </select>
                      </div>
                      <br>
                      <div class="col-md-8">
                      <input type="submit" name="exportar_rango" class="tn btn-block btn-primary"  id="exportar_rango" disabled="disabled"  value="Reportar Consolidado"> 
                       </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Mes Final</label>
                        <select class="form-control select2" id="mes_final" onchange="habilitar_boton()" disabled="disabled" name="mes_final" style="width: 100%;" >
                        </select>
                      </div>
                    </div>
                  </div>
                  <?php echo form_close(); ?>
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
  <?php include('includes/footer.php'); ?>
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

  function rango_mes(){
   var id_mes = $('#mes_inicial').val();
   var id = $('#annio_r').val();
   $('#mes_final').empty();
   $("#exportar_rango").prop('disabled', 'disabled');
   if (id!='0') {
    $('#mes_final').removeAttr('disabled');
    $.post("<?php echo base_url();?>Reportes_papmc_c/validar_mes",{"id":id,"id_mes":id_mes},
      function(data){
        var obj =JSON.parse(data);
        $('#mes_final').append(' <option value="0" ></option>');
        for (var i = 0; obj.length > i; i++) { 

          if (obj[i].mes=='01'||obj[i].mes=='1') {
            nombre = 'ENERO';
          }
          if (obj[i].mes=='02'||obj[i].mes=='2') {
            nombre = 'FEBRERO';
          }
          if (obj[i].mes=='03'||obj[i].mes=='3') {
            nombre = 'MARZO';
          }
          if (obj[i].mes=='04'||obj[i].mes=='4') {
            nombre = 'ABRIL';
          }
          if (obj[i].mes=='05'||obj[i].mes=='5') {
            nombre = 'MAYO';
          }
          if (obj[i].mes=='06'||obj[i].mes=='6') {
            nombre = 'JUNIO';
          }
          if (obj[i].mes=='07'||obj[i].mes=='7') {
            nombre = 'JULIO';
          }
          if (obj[i].mes=='08'||obj[i].mes=='8') {
            nombre = 'AGOSTO';
          }
          if (obj[i].mes=='09'||obj[i].mes=='9') {
            nombre = 'SETIEMBRE';
          }
          if (obj[i].mes=='10') {
            nombre = 'OCTUBRE';
          }
          if (obj[i].mes=='11') {
            nombre = 'NOVIEMBRE';
          }
          if (obj[i].mes=='12') {
            nombre = 'DICIEMBRE';
          }
          $('#mes_final').append(' <option value="'+obj[i].mes+'" >'+nombre+'</option>');
        }
      });
  }else{
    $("#mes_inicial").prop('disabled', 'disabled');
    $('#mes_final').empty();
  }
}

function rango_annio(){
 var id = $('#annio_r').val();
 $('#mes_inicial').empty();
 if(id!='-1'){
  $('#mes_inicial').removeAttr('disabled');
  $.post("<?php echo base_url();?>Reportes_papmc_c/validar_annio",{"id":id},    function(data){
    var obj =JSON.parse(data);
    var nombre;
    $('#mes_inicial').append(' <option value="-1" ></option>');
    for (var i = 0; obj.length > i; i++) { 
     if (obj[i].mes=='01'||obj[i].mes=='1') {
      nombre = 'ENERO';
    }
    if (obj[i].mes=='02'||obj[i].mes=='2') {
      nombre = 'FEBRERO';
    }
    if (obj[i].mes=='03'||obj[i].mes=='3') {
      nombre = 'MARZO';
    }
    if (obj[i].mes=='04'||obj[i].mes=='4') {
      nombre = 'ABRIL';
    }
    if (obj[i].mes=='05'||obj[i].mes=='5') {
      nombre = 'MAYO';
    }
    if (obj[i].mes=='06'||obj[i].mes=='6') {
      nombre = 'JUNIO';
    }
    if (obj[i].mes=='07'||obj[i].mes=='7') {
      nombre = 'JULIO';
    }
    if (obj[i].mes=='08'||obj[i].mes=='8') {
      nombre = 'AGOSTO';
    }
    if (obj[i].mes=='09'||obj[i].mes=='9') {
      nombre = 'SETIEMBRE';
    }
    if (obj[i].mes=='10') {
      nombre = 'OCTUBRE';
    }
    if (obj[i].mes=='11') {
      nombre = 'NOVIEMBRE';
    }
    if (obj[i].mes=='12') {
      nombre = 'DICIEMBRE';
    }
    $('#mes_inicial').append(' <option value="'+obj[i].mes+'" >'+nombre+'</option>');
  }
});
}else{
  $("#mes_inicial").prop('disabled', 'disabled');
  $('#mes_inicial').empty();
  $('#mes_final').empty();
}
}

function habilitar_boton(){
  var id = $('#mes_final').val();
  if(id!='0'){
    $('#exportar_rango').removeAttr('disabled');
  }else{
    $("#exportar_rango").prop('disabled', 'disabled');
  }
}

function habilitar_mes(){
  var id = $('#red').val();
  if(id!='-1'){
    $('#mes_seleccion').removeAttr('disabled');
  }else{
    $("#mes_seleccion").prop('disabled', 'disabled');
  }
}
function habilita_button_mes(){
  var id = $('#mes_seleccion').val();
  if(id!='-1'){
    $('#exportar').removeAttr('disabled');
  }else{
    $("#exportar").prop('disabled', 'disabled');
  }
}

function habilitar_annio(){
  var id = $('#red_a').val();
  if(id!='-1'){
    $('#annio_seleccion').removeAttr('disabled');
  }else{
    $("#annio_seleccion").prop('disabled', 'disabled');
  }
}

function habilitar_annio_r(){
  var id = $('#red_r').val();
  if(id!='-1'){
    $('#annio_r').removeAttr('disabled');
  }else{
    $("#annio_r").prop('disabled', 'disabled');
  }
}

function habilitar_button_a(){
  var id = $('#annio_seleccion').val();
  if(id!=''){
    $('#exportar_a').removeAttr('disabled');
  }else{
    $("#exportar_a").prop('disabled', 'disabled');
  }
}
</script>
</body>
</html>
