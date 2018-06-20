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
          BIENVENIDO AL REGISTRO DE MODULOS
          <small><button type="button" id="agregar" class="btn btn-block btn-primary"><i class="fa fa-file"></i></button></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Seguridad</a></li>
          <li class="active">Modulos</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <!-- Default box -->
        <div class="box">
         <div class="box-body">
          <table id="modulos_tabla" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>NOMBRES MODULOS</th>
                <th>URL</th>
                <th>MODULOS PADRES</th>
                <th>ICONOS</th>
                <th style="width:60px;"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($modulos as $value){ ?>
                <tr id="<?php echo $value->id_modulos; ?>">
                  <td><?php echo $value->id_modulos; ?></td>
                  <td><?php echo $value->nombres; ?></td>
                  <td><?php echo $value->url; ?></td>
                  <td><?php echo $value->modulo_padre; ?></td>
                  <td><?php echo $value->iconos; ?></td>
                  <td ><div class="btn-group">
                    <a class="btn btn-info" href="<?php echo base_url().'Modulos_c/editar/'.$value->id_modulos;?>" ><i class="fa fa-pencil"></i></a> 
                    <a class="btn btn-danger" onclick="mostrar_eliminar(<?php echo $value->id_modulos; ?>)" data-toggle="modal" data-target="#eliminar_modal"><i class="fa fa-trash"></i></a>
                  </div></td>
                </tr>
              <?php  } ?>
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- Modal -->
  <div class="modal fade" id="eliminar_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #d33724;border-color: #c23321;border-bottom: 2px solid #c23321;" >
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" style="color: #fff;">¿Estas seguro que desea eliminar este Modulo?</h4>
          </div>
          <div class="modal-body" >
            <p style="color: red ;font-size: 18px;">Si elimina, tambien eliminara a los permisos que esten vinculados con este modulo</p>
            <input type="hidden" id="id_modulos">
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
    <!-- /.content-wrapper -->
    <?php include('includes/footer.php'); ?>
    <div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->
  <?php include('includes/js.inc'); ?>
  <script>
    $(function () {
      $("#modulos_tabla").dataTable();
    }); 
    $( "#agregar" ).click(function() {
      window.location='Modulos_c/nuevo';
    });
    function mostrar_eliminar(id) {
      $("#id_modulos").val(id);
    }
    $( "#eliminar" ).click(function() {
      var t = $('#modulos_tabla').dataTable();
      var id = $("#id_modulos").val();
      var nRow = $ ('#modulos_tabla tr#'+ id)[0]; 
      t.fnDeleteRow(nRow); 
      $.ajax({
        url : "<?php echo base_url();?>Modulos_c/eliminar",
        data : {id : id},
        type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
        }
      });
    });
  </script>
</body>
</html>
