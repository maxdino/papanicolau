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
        <h1><small></small></h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-dashboard"></i> Principal</a></li>
          <li class="active">Perfil</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        <?php foreach($perfil as $value){ ?>
        <!-- Default box -->
        <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
              <h3 class="profile-username text-center"></h3>
              <p class="text-muted text-center"><?php echo $value->tipos_usuarios; ?></p>
              <a href="<?php echo base_url().'Perfil_c/editar/'.$value->id_usuario;?>"  class="btn btn-primary btn-block"><b>Editar</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Educación</strong>
              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Localidad</strong>
              <p class="text-muted">Malibu, California</p>
              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $value->nombre.' '.$value->apellido; ?></a>
                        </span>
                    <span class="description"><?php echo $value->tipos_usuarios; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <label for="iconos" class="col-sm-2 control-label">Usuario</label>
                  <p class="text-muted "><?php echo $value->usuario; ?></p>
                  <label for="iconos" class="col-sm-2 control-label">Contraseña</label>
                  <p class="text-muted "><?php echo $value->clave; ?></p>

                </div>
                <!-- /.post -->
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- /.box -->
      <?php } ?>
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
            <h4 class="modal-title" style="color: #fff;">¿Estas seguro que desea eliminar este Icono?</h4>
          </div>
          <div class="modal-body" >
            <p style="color: red ;font-size: 18px;">Si elimina, tambien eliminara a los modulos que esten vinculados con este Icono</p>
            <input type="hidden" id="id_iconos">
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
      $("#iconos_tabla").dataTable();
    }); 
    $( "#agregar" ).click(function() {
      window.location='Iconos_c/nuevo';
    });
    function editar_perfil(id) {
       $.ajax({
        url : "<?php echo base_url();?>Iconos_c/eliminar",
        data : {id : id},
        type : 'POST',
        //dataType : 'json',(arrays)
        success : function(data) {
        }
      });
    }
     
  </script>
</body>
</html>
