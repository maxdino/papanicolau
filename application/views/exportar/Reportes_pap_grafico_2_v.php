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
    <link rel="stylesheet" href="<?php echo base_url(); ?>includes/highchart/highcharts.css"> 
  <style>
   
  #pastel {
    height: 400px;
    max-width: 800px;
    min-width: 320px;
    margin: 0 auto;
  }
  .highcharts-pie-series .highcharts-point {
    stroke: #EDE;
    stroke-width: 2px;
  }
  .highcharts-pie-series .highcharts-data-label-connector {
    stroke: silver;
    stroke-dasharray: 2, 2;
    stroke-width: 2px;
  }
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?php include('includes/menu.inc'); ?>
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          BIENVENIDO AL REPORTE GRAFICO PAP  
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Dashboard</a></li>
          <li class="active">Reportes Grafico PAP</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box">
          <div class="col-md-13">
           <div class="box-body">
            <div class="col-md-6">
              <div class="box-body">
                <div class="form-group">
                  <label>Seleccionar Mes</label>
                  <select class="form-control select2" id="mes_s" name="mes_s" onchange="traer_datos2()" style="width: 100%;">
                    <option ></option>
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
              </div>
            </div>
            <div id="graf" style="display: none;">
                <div class="col-md-12" id="cpastel0">
                  <div id="pastel0"></div>
                  </div>
                 <div class="col-md-6" id="cpastel1">
                  <div id="pastel1" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel2">
                  <div id="pastel2" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel3">
                  <div id="pastel3" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel4">
                  <div id="pastel4" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel5">
                  <div id="pastel5" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel6">
                  <div id="pastel6" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel7">
                  <div id="pastel7" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel8">
                  <div id="pastel8" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel9">
                  <div id="pastel9" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel10">
                  <div id="pastel10" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel11">
                  <div id="pastel11" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel12">
                  <div id="pastel12" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel13">
                  <div id="pastel13" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel14">
                  <div id="pastel14" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel15">
                  <div id="pastel15" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel16">
                  <div id="pastel16" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel17">
                  <div id="pastel17" style="width: 550px; height: 400px;"></div>
                  </div>
                  <div class="col-md-6" id="cpastel18">
                  <div id="pastel18" style="width: 550px; height: 400px;"></div>
                  </div>
                  </div>
          </div>
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
<script src="<?php echo base_url(); ?>includes/highchart/highcharts.js"></script>
<script src="<?php echo base_url(); ?>includes/highchart/exporting.js"></script>

<script>
  $(function () {
       //Initialize Select2 Elements
       $(".select2").select2();
//Date range picker
$('#reservation').daterangepicker();
});

  function traer_datos2(){
    var id = $('#mes_s').val();
    if (id!=0) {
    $.post("<?php echo base_url();?>Reportes_pap_grafico_2_c/traer_datos2",{"id":id},    function(data){
      var obj =JSON.parse(data);
      $("#graf").css('display', 'block');
      for (var j = 0; 19 >  j;  j++) { 
        var sum= new Array();
        for (var i = 0; 10 > i; i++) { 
          if(obj[i][2][j]!='nulo'){
            $("#cpastel"+j).css('display', 'block');
           var ar = [obj[i][2][j],obj[i][0][j] , false];
           sum.push(ar);
         }else{
          $("#cpastel"+j).css('display', 'none');
         }
       }
       Highcharts.chart('pastel'+j, {
        title: {
          text: obj[i][1][j]
        },
        series: [{
          type: 'pie',
          allowPointSelect: true,
          keys: ['name', 'y', 'selected', 'sliced'],
          data: sum ,
          showInLegend: true
        }]
      });
     }
   }); 
  }else{
    $("#graf").css('display', 'none');
  }
  }
</script>
</body>
</html>
