<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE REPORTES</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('includes/css.inc'); ?>
</head>
<body class="hold-transition login-page" >
 
  <div class="login-box">

    <div class="login-logo">
      <a href="#"><b>SISTEMA DE REPORTES DE CONSOLIDACIÓN DEL PAPANICOLAOU</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

      <p class="login-box-msg">Inicia sesión para comenzar tu sesión</p>

      <form   method="post">
        <div class="form-group has-feedback">
          <input type="text" class="form-control" tabindex="1" placeholder="Usuario" name="usuario" id="usuario" value="<?php if(isset($_COOKIE['usuario'])){ echo  $_COOKIE['usuario'];  } ?>" >
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <div id="no_usu" style="color: red;display: none;">Llenar el campo Usuario </div>
        </div>
        <div class="form-group has-feedback">
          <input type="password" class="form-control" tabindex="2" placeholder="Clave" name="clave" id="clave" value="" >
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          <div id="no_clave" style="color: red;display: none;">Llenar el campo de la clave </div>
        </div>
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
              <label>
                <?php if(isset($_COOKIE['recuerdo'])){  ?>
                <input type="checkbox" tabindex="3" id="recuerdo" checked> Recordarme
                <?php }else{ ?>
                <input type="checkbox" id="recuerdo" > Recordarme
                <?php } ?>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <a type="submit" tabindex="4" class="btn btn-primary btn-block btn-flat" onclick="login()" style="margin-left: -13px; width: 100px;">Iniciar Sesión</a>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->

      <a href="#">I forgot my password</a><br>
      <a href="register.html" class="text-center">Register a new membership</a>

    </div>
    <!-- /.login-box-body -->
  </div>
  <!-- /.login-box -->
  <?php include('includes/js.inc'); ?>

  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
    });
    function login(){
      var clave = $('#clave').val();
      var usuario = $('#usuario').val();
      var recuerdo ='0';
      if ($('#recuerdo').prop('checked')) {
      recuerdo ='1';  
      }
      if (usuario=='') {
        $('#no_usu').css('display','block');
      }else{
        $('#no_usu').css('display','none');
      }
      if (clave=='') {
        $('#no_clave').css('display','block');
      }else{
        $('#no_clave').css('display','none');
      }
      if(clave!='' && usuario!=''){
      $.post("<?php echo base_url();?>Portal_c/autentificar",{"clave":clave,"usuario":usuario,"recuerdo":recuerdo},
        function(data){
          $json = JSON.parse(data);
          if($json.autentificar=='1'){
            window.location='Principal_c';
          } 
        });
    }
    }



  </script>
</body>
</html>
