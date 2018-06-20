<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE REPORTES</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('includes/css.inc'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <?php include('includes/menu.inc'); ?>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          BIENVENIDO AL IMPORTAR EXCEL  <img width="40" height="40" src="public/foto/office_excel.png">
          <small> <?php echo form_open_multipart('Importar_c/exportar'); ?> 
          <input type="submit" class="btn btn-block btn-primary" name="exportar" value="Exportar plantilla Excel"> 
          <?php echo form_close(); ?></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
          <li><a href="#">Reportes</a></li>
          <li class="active">Importar Excel</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="box-body">
                <div id="excel_leer" style=" "></div> 
                <div class="alert alert-danger alert-dismissible">
                  <h4><i class="icon fa fa-ban"></i> AVISO!</h4>
                  Antes de cargar el archivo excel ver el formato de plantilla para evitar problemas en la subida y verificar en la tabla si el mismo archivo a sido subido.
                </div>
                <form   method="post" id="form_importar"   name="form_importar" enctype='multipart/form-data'  >
                  <div class="form-group">
                    <label for="exampleInputFile">Cargar Archivo Excel</label>
                    <input type="file" id="excel" name="excel" required="" accept="*/ .xls,.xlsx">
                    <br>
                    <div class="col-md-3">
                      <button type="submit" id="btn_importar" class="btn btn-block btn-primary">Importar</button>
                    </div>
                  </div>
                  <br>
                </form>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box">
              <div class="box-body">
               <table id="importar_tabla" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>N°</th>
                    <th>REGISTRO DEL PAP DEL MES</th>
                    <th>FECHA IMPORTACIÓN</th>
                    <th  ></th>
                  </tr>
                </thead>
                <tbody>
                  <?php  foreach($mes_subido as $value){ 
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
                    <tr id="<?php echo $value->id_mes; ?>">
                      <td><?php echo $value->id_mes; ?></td>
                      <td><?php echo $nombre_mes.'  '.$value->annio; ?></td>
                      <td><?php echo $value->fecha_registro; ?></td>
                      <td ><div class="btn-group">
                        <a class="btn btn-danger" onclick="mostrar_eliminar(<?php echo $value->id_mes; ?>)" data-toggle="modal" data-target="#eliminar_modal"><i class="fa  fa-trash"></i></a>
                      </div></td>
                    </tr>
                  <?php  } ?>
                </tbody>
              </table>
            </div>        <!-- /.box-footer-->
          </div><!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include('includes/footer.php'); ?>
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->
 <!-- Modal -->
 <div class="modal fade" id="eliminar_modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #d33724;border-color: #c23321;border-bottom: 2px solid #c23321;" >
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" style="color: #fff;">¿Estas seguro que desea eliminar este Registro del PAP?</h4>
        </div>
        <div class="modal-body" >
          <p style="color: red ;font-size: 18px;"></p>
          <input type="hidden" id="id_importar">
        </div>
        <div class="modal-footer" >
          <button type="submit" class="btn btn-primary" data-dismiss="modal">Salir</button>
          <button type="submit" id="eliminar" class="btn btn-danger" data-dismiss="modal">Eliminar</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <?php include('includes/js.inc'); ?>
  <script>
    $(function () {
      $("#importar_tabla").dataTable();
    }); 
     
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
    swal({
      title: "Registrado",
      text: "¡Se ha subido correctamente los datos!",
      type: "success",
      showCancelButton: false,
      confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
      confirmButtonText: 'Ok!'
    },function(){
      window.location='Importar_c';
    });  
    //swal("Registrado!", "Se ha subido correctamente los datos ", "success");
  });
 }); 
    function showPleaseWait() {
      var modalLoading = '<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false role="dialog"><div class="modal-dialog"><div class="modal-content" style="border-radius: 10px;margin-top:160px;"><div class="modal-header"><h3 class="modal-title">Cargando...</h3></div><div class="modal-body"><div class="progress"><div class="progress-bar progress-bar-primary progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%; height: 70px"></div></div></div></div></div> </div>';
      $(document.body).append(modalLoading);
      $("#pleaseWaitDialog").modal("show");
    }
    function hidePleaseWait() {
      $("#pleaseWaitDialog").modal("hide");
    }
    function mostrar_eliminar(id){
     $("#id_importar").val(id);
   }
   $( "#eliminar" ).click(function() {
    var t = $('#importar_tabla').dataTable();
    var id = $("#id_importar").val();
    var nRow = $ ('#importar_tabla tr#'+ id)[0]; 
    t.fnDeleteRow(nRow); 
    $.ajax({
      url : "<?php echo base_url();?>Importar_c/eliminar",
      data : {id : id},
      type : 'POST',
      success : function(data) {
      }
    });
  });
</script>
</body>
</html>
