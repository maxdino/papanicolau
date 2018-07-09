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
          BIENVENIDO AL REPORTE GRAFICO DEL PAP   
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
            <div class="col-md-12">
              <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
            <div class="col-md-12">
              <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
            </div>
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

<?php include('includes/js.inc'); ?>
<script src="<?php echo base_url(); ?>includes/highchart/highcharts.js"></script>
<script src="<?php echo base_url(); ?>includes/highchart/exporting.js"></script>
<script src="<?php echo base_url(); ?>includes/highchart/export-data.js"></script>
<script>
  $(function () {
       //Initialize Select2 Elements
       $(".select2").select2();
//Date range picker
$('#reservation').daterangepicker();

$.post("<?php echo base_url();?>Reportes_pap_grafico_3_c/traer_datos",    function(data){
  var obj =JSON.parse(data);
  Highcharts.chart('container', {
    chart: {
      zoomType: 'x'
    },
    title: {
      text: 'Resultados General PAP Recepción '
    },
    subtitle: {
      text: document.ontouchstart === undefined ?
      'Haga clic y arrastre en el área de trazado para ampliar' : 'Pinch the chart to zoom in'
    },
    xAxis: {
      type: 'datetime'
    },
    yAxis: {
      title: {
        text: 'Cantidad'
      }
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      area: {
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        marker: {
          radius: 2
        },
        lineWidth: 1,
        states: {
          hover: {
            lineWidth: 1
          }
        },
        threshold: null
      }
    },

    series: [{
      type: 'area',
      name: 'Cantidad',
      data: obj
    }]
  });
})

$.post("<?php echo base_url();?>Reportes_pap_grafico_3_c/traer_datos2",    function(data){
  var obj =JSON.parse(data);
  Highcharts.chart('container1', {
    chart: {
      zoomType: 'x'
    },
    title: {
      text: 'Resultados General PAP Resultado '
    },
    subtitle: {
      text: document.ontouchstart === undefined ?
      'Haga clic y arrastre en el área de trazado para ampliar' : 'Pinch the chart to zoom in'
    },
    xAxis: {
      type: 'datetime'
    },
    yAxis: {
      title: {
        text: 'Cantidad'
      }
    },
    legend: {
      enabled: false
    },
    plotOptions: {
      area: {
        fillColor: {
          linearGradient: {
            x1: 0,
            y1: 0,
            x2: 0,
            y2: 1
          },
          stops: [
          [0, Highcharts.getOptions().colors[0]],
          [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
          ]
        },
        marker: {
          radius: 2
        },
        lineWidth: 1,
        states: {
          hover: {
            lineWidth: 1
          }
        },
        threshold: null
      }
    },

    series: [{
      type: 'area',
      name: 'Cantidad',
      data: obj
    }]
  });
})
});



</script>
</body>
</html>
