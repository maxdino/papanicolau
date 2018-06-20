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
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url().$value->foto; ?>" alt="User profile picture">
              <h3 class="profile-username text-center"></h3>
              <p class="text-muted text-center"><?php echo $value->tipos_usuarios; ?></p>
              <a href="<?php echo base_url().'Perfil_c/editar'?>"  class="btn btn-primary btn-block"><b>Editar Foto</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <div class="tab-content">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url().$value->foto; ?>" alt="user image">
                        <span class="username">
                          <a href="#"><?php echo $value->nombre.' '.$value->apellido; ?></a>
                        </span>
                    <span class="description"><?php echo $value->tipos_usuarios; ?></span>
                  </div>
                  <!-- /.user-block -->
                  <label for="iconos" class="col-sm-2 control-label">Usuario</label>
                  <p class="text-muted "><?php echo $value->usuario; ?> <a  href="<?php echo base_url().'Perfil_c/editar_usuario'?>"  class="btn btn-primary btn-xs" style="margin-left: 160px;"><b>Editar Usuario</b></a></p>
                  <?php $longitud = strlen($value->clave);
                    $usuario = substr($value->clave, 32, $longitud); 
                    $cantidad=strlen(base64_decode($usuario));        
                    $pas='';
                    for ($i=0; $i <$cantidad ; $i++) { 
                      $pas=$pas.'*';
                    }
                    ?>
                  <label for="iconos" class="col-sm-2 control-label">Contraseña</label>
                  <p class="text-muted "><?php echo  $pas; ?><a  href="<?php echo base_url().'Perfil_c/editar_clave'?>"  class="btn btn-primary btn-xs" style="margin-left: 160px;"><b>Editar Contraseña</b></a></p>

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
