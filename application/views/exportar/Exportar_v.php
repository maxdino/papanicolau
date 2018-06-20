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
          BIENVENIDO AL EXPORTAR EXCEL  <img width="40" height="40" src="public/foto/office_excel.png">
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
                      <div class="col-md-6">
                      <input type="submit" name="exportar" class="tn btn-block btn-primary" value="Reportar Consolidado"> 
                      </div>
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
                      <div class="col-md-6">
                      <input type="submit" name="exportar" class="tn btn-block btn-primary"  value="Reportar Consolidado"> 
                       </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                  <?php echo form_open_multipart('Exportar_c/rango_mes'); ?>
                  <div class="col-md-4">
                    <div class="box-body">

                      <div class="form-group">
                        <label>Seleccionar año</label>  
                        <select class="form-control select2" id="annio_s" name="annio_s" onchange="rango_annio()" style="width: 100%;">
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
                      <input type="submit" name="exportar_rango" class="tn btn-block btn-primary" id="exportar_rango" disabled="disabled"  value="Reportar Consolidado"> 
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
   var id = $('#annio_s').val();
   $('#mes_final').empty();
   $("#exportar_rango").prop('disabled', 'disabled');
   if (id!='0') {
    $('#mes_final').removeAttr('disabled');
    $.post("<?php echo base_url();?>Exportar_c/validar_mes",{"id":id,"id_mes":id_mes},
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
 var id = $('#annio_s').val();
 $('#mes_inicial').empty();
 $("#exportar_rango").prop('disabled', 'disabled');
 $('#mes_final').empty();
 if(id!='0'){
  $('#mes_inicial').removeAttr('disabled');
  $.post("<?php echo base_url();?>Exportar_c/validar_annio",{"id":id},    function(data){
    var obj =JSON.parse(data);
    var nombre;
    $('#mes_inicial').append(' <option value="0" ></option>');
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
</script>
</body>
</html>
