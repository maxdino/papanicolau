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
        BIENVENIDO AL REGISTRO DE IPRESS
        <small><button type="button" id="agregar" class="btn btn-block btn-primary"><i class="fa fa-hospital-o"></i><i class="fa fa-plus"></i></button></small>
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
              <table id="ipress_tabla" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NOMBRE IPRESS</th>
                  <th>CODIGO</th>
                  <th>PROVINCIA</th>
                  <th>DISTRITO</th>
                  <th>RESOLUCION</th>
                  <th>FECHA</th>
                  <th style="width:60px;"></th>
                </tr>
                </thead>
                <tbody>
                  <?php  foreach($ipress as $value){ ?>
                <tr id="<?php echo $value->id_ipress; ?>">
                  <td><?php echo $value->id_ipress; ?></td>
                  <td><?php echo $value->ipress; ?></td>
                  <td><?php echo $value->codigo; ?></td>
                  <td><?php echo $value->provincias; ?></td>
                  <td><?php echo $value->distritos; ?></td>
                  <td><?php echo $value->resolucion; ?></td>
                  <td><?php echo $value->fecha; ?></td>
                  
                  <td ><div class="btn-group">
                      <a class="btn btn-info" href="<?php echo base_url().'Ipress_c/editar/'.$value->id_ipress;?>" ><i class="fa fa-pencil"></i></a> 
                       <a class="btn btn-danger" onclick="mostrar_eliminar(<?php echo $value->id_ipress; ?>)" data-toggle="modal" data-target="#eliminar_modal"><i class="fa fa-user-times"></i></a>
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
                <h4 class="modal-title" style="color: #fff;">Eliminar</h4>
              </div>
              <div class="modal-body" >
                <p style="color: red ;font-size: 18px;">¿Estas seguro que desea eliminar este Ipress?</p>
                <input type="hidden" id="id_ipress">
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
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>MDH &copy; 2018.</strong> Todos los derechos reservados.
  </footer>

  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php include('includes/js.inc'); ?>
<script>
  $(function () {
    $("#ipress_tabla").dataTable();
  }); 

  $( "#agregar" ).click(function() {
  window.location='Ipress_c/nuevo';
});

function mostrar_eliminar(id) {
      $("#id_ipress").val(id);
    }

 $( "#eliminar" ).click(function() {
      var t = $('#ipress_tabla').dataTable();
      var id = $("#id_ipress").val();
      var nRow = $ ('#ipress_tabla tr#'+ id)[0]; 
      t.fnDeleteRow(nRow); 
      $.ajax({
        url : "<?php echo base_url();?>Ipress_c/eliminar",
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
