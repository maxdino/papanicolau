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
          BIENVENIDO AL REPORTE DE ESTABLECIMIENTOS PAP POR RECEPCION <img width="40" height="40" src="public/foto/office_excel.png">
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Reportes</a></li>
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
                  <li><a href="#tab_3" data-toggle="tab">Exportar Excel rango Mes</a></li>
                </ul>
              </div>
              <div class="box-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <?php echo form_open_multipart('Reportes_papm_c/exportar_mes'); ?>
                    <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Red</label>
                        <select class="form-control select2" id="red" onchange="traer_microred()"  name="red" style="width: 100%;">
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
                        <label>Microred</label>
                        <select class="form-control select2" id="microred" onchange="habilitar_mes()" name="microred" style="width: 100%;" >
                        </select>
                      </div>
                    </div>
                  </div>
                   <div class="col-md-6">
                    <div class="box-body">
                      
                      <div class="form-group">
                        <label>Archivos Cargados</label>
                        <select class="form-control select2" id="mes_seleccion" disabled="disabled" name="mes_seleccion" style="width: 100%;">
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
                      <div class="col-md-6">
                      <input type="submit" name="exportar" class="tn btn-block btn-primary" value="Reportar Consolidado"> 
                      </div>    
                    </div>
                  </div>
                  <?php echo form_close(); ?>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                  <?php echo form_open_multipart('Reportes_papm_c/exportar_annio'); ?> 
                  <div class="col-md-4">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Red</label>
                        <select class="form-control select2" id="red_a" onchange="traer_microred_a()"  name="red_a" style="width: 100%;">
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
                        <label>Microred</label>
                        <select class="form-control select2" id="microred_a" onchange="habilitar_annio()" name="microred_a" style="width: 100%;" >
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
                  <?php echo form_open_multipart('Reportes_papm_c/rango_mes'); ?>
                  <div class="col-md-5">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Red</label>
                        <select class="form-control select2" id="red_r" onchange="traer_microred_r()"  name="red_r" style="width: 100%;">
                          <option value="-1" ></option>
                          <?php foreach ($red as  $value) {   ?>
                            <option value="<?php echo $value->id_red; ?>" ><?php echo $value->red_salud; ?> </option>
                          <?php   }  ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Microred</label>
                        <select class="form-control select2" id="microred_r"  name="microred_r" style="width: 100%;" >
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="box-body">

                      <div class="form-group">
                        <label>Seleccionar año</label>  
                        <select class="form-control select2" id="annio_r" name="annio_r" onchange="rango_annio()" style="width: 100%;">
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

  function traer_microred(){
   var id = $('#red').val();
   $('#microred').empty();
   if (id!='-1') {
    $.post("<?php echo base_url();?>Reportes_papm_c/microred",{"id":id},
      function(data){
        var obj =JSON.parse(data);
        $('#microred').append(' <option value="-1" ></option>');
        for (var i = 0; obj.length > i; i++) { 
          $('#microred').append(' <option value="'+obj[i].id_microred+'" >'+obj[i].microred+'</option>');
        }
      });
  }
}

  function traer_microred_a(){
   var id = $('#red_a').val();
   $('#microred_a').empty();
   if (id!='-1') {
    $.post("<?php echo base_url();?>Reportes_papm_c/microred",{"id":id},
      function(data){
        var obj =JSON.parse(data);
        $('#microred_a').append(' <option value="-1" ></option>');
        for (var i = 0; obj.length > i; i++) { 
          $('#microred_a').append(' <option value="'+obj[i].id_microred+'" >'+obj[i].microred+'</option>');
        }
      });
  }
}

function traer_microred_r(){
   var id = $('#red_r').val();
   $('#microred_r').empty();
   if (id!='-1') {
    $.post("<?php echo base_url();?>Reportes_papm_c/microred",{"id":id},
      function(data){
        var obj =JSON.parse(data);
        $('#microred_r').append(' <option value="-1" ></option>');
        for (var i = 0; obj.length > i; i++) { 
          $('#microred_r').append(' <option value="'+obj[i].id_microred+'" >'+obj[i].microred+'</option>');
        }
      });
  }
}

  function rango_mes(){
   var id_mes = $('#mes_inicial').val();
   var id = $('#annio_r').val();
   $('#mes_final').empty();
   $("#exportar_rango").prop('disabled', 'disabled');
   if (id!='0') {
    $('#mes_final').removeAttr('disabled');
    $.post("<?php echo base_url();?>Reportes_papm_c/validar_mes",{"id":id,"id_mes":id_mes},
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
  $.post("<?php echo base_url();?>Reportes_papm_c/validar_annio",{"id":id},    function(data){
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
  var id = $('#microred').val();
  if(id!='-1'){
    $('#mes_seleccion').removeAttr('disabled');
  }else{
    $("#mes_seleccion").prop('disabled', 'disabled');
  }
}

function habilitar_annio(){
  var id = $('#microred_a').val();
  if(id!='-1'){
    $('#annio_seleccion').removeAttr('disabled');
  }else{
    $("#annio_seleccion").prop('disabled', 'disabled');
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
