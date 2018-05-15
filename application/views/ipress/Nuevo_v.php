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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          REGISTRAR NUEVO IPRESS
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
          <li><a href="#">Mantenimiento</a></li>
          <li class="active">Ipress</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
         <div class="box-body">  
          <div class="col-md-6">
            <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombres" class="col-sm-2 control-label">Nombre de Ipress</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nombres" style="text-transform: uppercase;" >
                    <div id="no_nombres"  style="color: red;display: none;" >Llenar el campo Nombre de Ipress</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="microred" class="col-sm-2 control-label" >MicroRed </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="microred">
                      <option ></option>
                      <?php foreach($microred as $value){ ?>
                      <option value="<?php echo $value->id_microred;  ?>" ><?php echo $value->microred;  ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tipos" class="col-sm-2 control-label" >Tipo </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="tipos">
                      <option ></option>
                      <?php foreach($tipos as $value){ ?>
                      <option value="<?php echo $value->id_tipos;  ?>" ><?php echo $value->tipos;  ?></option>
                      <?php } ?>
                    </select>
                    <div id="no_tipos"  style="color: red;display: none;" >Llenar el campo Tipo</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="categorias" class="col-sm-2 control-label" >Categorias </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="categorias">
                      <option ></option>
                      <?php foreach($categorias as $value){ ?>
                      <option value="<?php echo $value->id_categorias;  ?>" ><?php echo $value->categorias;  ?></option>
                      <?php } ?>
                    </select>
                    <div id="no_categorias"  style="color: red;display: none;" >Llenar el campo Categorias</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="codigo" class="col-sm-2 control-label">Codigo</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="codigo"  >
                    <div id="no_codigo"  style="color: red;display: none;" >Llenar el campo Codigo de Renipress</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="provincias" class="col-sm-2 control-label" >Provincia </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="provincias" onchange="cambiar_provincia()">
                      <option ></option>
                      <?php foreach($provincias as $value){ ?>
                      <option value="<?php echo $value->id_provincias;  ?>" ><?php echo $value->provincias;  ?></option>
                      <?php } ?>
                    </select>
                    <div id="no_provincias"  style="color: red;display: none;" >Llenar el campo Provincias</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="distritos" class="col-sm-2 control-label" >Distrito: </label>
                  <div class="col-sm-10">
                    <select class="form-control select2" id="distritos">
                     <option ></option>   
                    </select>
                    <div id="no_distritos"  style="color: red;display: none;" >Llenar el campo Distritos</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="resolucion" class="col-sm-2 control-label" >Resolución: </label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="resolucion" >
                    <div id="no_resolucion"  style="color: red;display: none;" >Llenar el campo de Resolución</div>
                  </div>
                </div>
                 <div class="form-group">
                   
                <label  for="fecha" class="col-sm-2 control-label" >Fecha:</label>
                <div class="col-sm-10">
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right"  id="fecha">
                  
                  </div>
                  <div id="no_fecha"  style="color: red;display: none;" >Llenar el campo Fecha</div>
                </div>
                <!-- /.input group -->
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="submit" href="<?php echo base_url();?>Ipress_c" class="btn btn-danger"><i class="fa fa-sign-out"></i> Cancelar</a>
                <a type="submit" id="agregar" class="btn btn-info pull-right"><i class="fa fa-upload"></i>  Registrar</a>
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
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>MDH &copy; 2018.  </strong> Todos los derechos reservados.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include('includes/js.inc'); ?>
<script>
  $(function () {
       //Initialize Select2 Elements
       $(".select2").select2();
       
    //Date picker
      $('#fecha').datepicker({
        autoclose: true,
       });
     });

  function cambiar_provincia(){
    var id = $('#provincias').val();
    $('#distritos').empty();
    $.ajax({
      url : "<?php echo base_url();?>Ipress_c/distritos",
      data : {id : id},
      type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
          $object = jQuery.parseJSON(data);
          var x = document.getElementById("distritos");
            var option = document.createElement("option");
            option.text = '';
              option.value = '';
              x.add(option);
          for (var i = 0; i < $object.length; i++) {
              var option = document.createElement("option");
              option.text = $object[i].distritos;
              option.value = $object[i].id_distritos;
              x.add(option);
          }
        }
      });

  }


  $( "#agregar" ).click(function() {
    var fecha = $('#fecha').val();
    var fecha1= moment(fecha);
    var fecha = fecha1.format('YYYY-MM-DD');
    var nombres = $('#nombres').val().toUpperCase();
    var microred = $('#microred').val();
    var tipos = $('#tipos').val();
    var categorias = $('#categorias').val();
    var codigo = $('#codigo').val();
    var provincias = $('#provincias').val();
    var distritos = $('#distritos').val();
    var resolucion = $('#resolucion').val();
    if (nombres!=''&&fecha!=''&&microred!=''&&tipos!=''&&categorias!=''&&codigo!=''&&provincias!=''&&distritos!=''&&resolucion!='') {

     $.post("<?php echo base_url();?>Ipress_c/agregar",{"nombres":nombres,"microred":microred,"fecha":fecha,"tipos":tipos,"categorias":categorias,"codigo":codigo,"provincias":provincias,"distritos":distritos,"resolucion":resolucion},
      function(data){
        window.location='../Ipress_c';
      });
   }else{

    if (nombres=='') {
      $('#no_nombres').css('display','block');
    }else{
      $('#no_nombres').css('display','none');
    }
    if (fecha==''||fecha=='Invalid date') {
      $('#no_fecha').css('display','block');
    }else{
      $('#no_fecha').css('display','none');
    }
    if (microred=='') {
      $('#no_microred').css('display','block');
    }else{
      $('#no_microred').css('display','none');
    }
    if (tipos=='') {
      $('#no_tipos').css('display','block');
    }else{
      $('#no_tipos').css('display','none');
    }
    if (categorias=='') {
      $('#no_categorias').css('display','block');
    }else{
      $('#no_categorias').css('display','none');
    }
    if (codigo=='') {
      $('#no_codigo').css('display','block');
    }else{
      $('#no_codigo').css('display','none');
    }
    if (provincias=='') {
      $('#no_provincias').css('display','block');
    }else{
      $('#no_provincias').css('display','none');
    }
    if (distritos=='') {
      $('#no_distritos').css('display','block');
    }else{
      $('#no_distritos').css('display','none');
    }
    if (resolucion=='') {
      $('#no_resolucion').css('display','block');
    }else{
      $('#no_resolucion').css('display','none');
    }

  }

});

</script>
</body>
</html>
