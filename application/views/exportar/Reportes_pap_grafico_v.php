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
                <div class="col-md-9">
                    <div class="box-body">
                      <div class="form-group">
                        <label>Seleccionar Mes</label>
                        <select class="form-control select2" id="mes_seleccion" name="mes_seleccion" onchange="traer_datos()" style="width: 100%;">
                          <option value="0"></option>
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
                  <div style="display: none" id="graf">
                  <div class="col-md-12">
                  <div id="container0" style="min-width: 310px; max-width: 400px; height: 300px; margin: 0 auto " ></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container1" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container2" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container3" style="width: 350px; height: 400px;  " ></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container4" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container5" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container6" style="width: 350px; height: 400px;  " ></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container7" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container8" style="width: 350px; height: 400px;"></div>
                  </div>
                   <div class="col-md-4">
                  <div id="container9" style="width: 350px; height: 400px;  " ></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container10" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container11" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container12" style="width: 350px; height: 400px;  " ></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container13" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container14" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container15" style="width: 350px; height: 400px;  " ></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container16" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container17" style="width: 350px; height: 400px;"></div>
                  </div>
                  <div class="col-md-4">
                  <div id="container18" style="width: 350px; height: 400px;"></div>
                  </div>
                  </div>
             
            </div>    
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
 
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include('includes/footer.php'); ?>
  <div class="control-sidebar-bg"></div>
</div>


<script src="<?php echo base_url(); ?>includes/highchart/highcharts.js"></script>
<script src="<?php echo base_url(); ?>includes/highchart/highcharts-more.js"></script>
<script src="<?php echo base_url(); ?>includes/highchart/exporting.js"></script>
<script src="<?php echo base_url(); ?>includes/highchart/export-data.js"></script>
<!-- ./wrapper -->
<?php include('includes/js.inc'); ?>


<script>
  $(function () {
       //Initialize Select2 Elements
       $(".select2").select2();
//Date range picker
$('#reservation').daterangepicker();
});



function traer_datos(){
  var id = $('#mes_seleccion').val();
  if (id!=0) {
 $.post("<?php echo base_url();?>Reportes_pap_grafico_c/traer_datos",{"id":id},    function(data){
    var obj =JSON.parse(data);
   $("#graf").css('display', 'block');
  for (var i = 0; 19 > i; i++) { 
 
     Highcharts.chart('container'+i, {

  chart: {
    type: 'gauge',
    plotBackgroundColor: null,
    plotBackgroundImage: null,
    plotBorderWidth: 0,
    plotShadow: false
  },

  title: {
    text: obj[1][i]
  },

  pane: {
    startAngle: -150,
    endAngle: 150,
    background: [{
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#FFF'],
          [1, '#333']
        ]
      },
      borderWidth: 0,
      outerRadius: '109%'
    }, {
      backgroundColor: {
        linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
        stops: [
          [0, '#333'],
          [1, '#FFF']
        ]
      },
      borderWidth: 1,
      outerRadius: '107%'
    }, {
      // default background
    }, {
      backgroundColor: '#DDD',
      borderWidth: 0,
      outerRadius: '105%',
      innerRadius: '103%'
    }]
  },

  // the value axis
  yAxis: {
    min: 0,
    max: 3000,

    minorTickInterval: 'auto',
    minorTickWidth: 1,
    minorTickLength: 10,
    minorTickPosition: 'inside',
    minorTickColor: '#666',

    tickPixelInterval: 30,
    tickWidth: 2,
    tickPosition: 'inside',
    tickLength: 10,
    tickColor: '#666',
    labels: {
      step: 2,
      rotation: 'auto'
    },
    title: {
      text: 'Casos'
    },
    plotBands: [{
      from: 0,
      to: 250,
      color: '#55BF3B' // green
    }, {
      from: 250,
      to: 1500,
      color: '#DDDF0D' // yellow
    }, {
      from: 1500,
      to: 3000,
      color: '#DF5353' // red
    }]
  },

  series: [{
    name: 'Laminas',
    data: [obj[0][i]],
    tooltip: {
      valueSuffix: ' '
    }
  }]

},
 );
  }
}); 
}else{
  $("#graf").css('display', 'none');
}
}


 

</script>
</body>
</html>
