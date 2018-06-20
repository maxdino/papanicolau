<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA DE REPORTES</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php include('includes/css.inc'); ?>
  <style type="text/css">

  ul {
    list-style-type: none;
    margin: 3px;
  }

  ul.checktree li:before {
    height: 1em;
    width: 12px;
    border-bottom: 1px dashed;
    content: "";
    display: inline-block;
    top: -0.3em;
  }
  ul.checktree li { border-left: 1px dashed; }
  ul.checktree li:last-child:before { border-left: 1px dashed; }
  ul.checktree li:last-child { border-left: none; }
</style> 
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
          BIENVENIDO A LA ASIGNACIÓN DE PERMISOS
          <small></small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="<?php echo base_url();?>Principal_c"><i class="fa fa-home"></i> Principal</a></li>
          <li><a href="#">Seguridad</a></li>
          <li class="active">Permisos</li>
        </ol>
      </section>
      <!-- Main content -->
      <form id="formulario" name="formulario" method="post" >
       <section class="content">
        <!-- Default box -->
        <div class="row">
          <div class="col-md-6">
            <div class="box ">
             <div class="box-body">
              <div class="form-group">
                <label for="modulos" class="col-sm-2 control-label">Perfil de Usuario</label>
                <div class="col-sm-10">
                  <select class="form-control select2" id="perfil_usuario" name="perfil_usuario" onchange="traer_permisos(this.value)">
                    <option value="0"></option>
                    <?php foreach($perfiles as $value){ ?>
                    <option value="<?php echo $value->id_tipos_usuarios;  ?>" ><?php echo $value->tipos_usuarios;  ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="box ">
            <div class="box-body">
              <div class="form-group">
                <fieldset>
                  <legend>Modulos</legend>    
                  <div class="col-sm-10">
                   <div class="form-group" id="permisos">
                    <ul class="checktree">
                      <?php $i=0; $encontrados = array(); ?>
                      <?php foreach ($permisos2 as $value) { ?>
                      <?php if(!in_array($value->padre, $encontrados)){ ?>
                      <?php $encontrados[] = $value->padre; $i++; ?>
                      <li>
                        <label for="padre"><?php echo $value->padre; ?></label>
                        <?php } ?>
                        <ul>
                          <li>
                            <input id="<?php echo $value->idhijo; ?>" type="checkbox" name="modulos[]"  value="<?php echo $value->idhijo; ?>" /><label for="hijo"><?php echo ' '.$value->hijo; ?></label>
                          </li>
                        </ul>
                        <?php } ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </fieldset>
              <a type="submit" onclick="agregar()" class="btn btn-primary pull-right"><i class="fa fa-upload"></i>Guardar</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.box -->
  </section>
</form> 
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
    $(".select2").select2();
  });
  function traer_permisos(idperfil)
  {
    $('input:checkbox').removeAttr('checked');
    if(idperfil != "0")
    {
     $.post("<?php echo base_url();?>Permisos_c/modulos_seleccionados", {"idperfil":idperfil}, function(data){    
       $object = jQuery.parseJSON(data);
       for (var i =0  ; i< $object.length; i++) {
        $('#'+$object[i].id_modulo).prop('checked', true);
       }
     });
   }
 }
 function agregar(){
  var id = $('#perfil_usuario').val();
  if (id!='0') {
  $.ajax({                        
   type: "POST",                 
   url: "<?php echo base_url();?>Permisos_c/agregar",                     
   data: $("#formulario").serialize(), 
   success: function(data)             
   {
    swal({
      title: "Se asignaron correctamente los permisos",
      text: "¡Se guardo con exito!",
      type: "success",
      showCancelButton: false,
      confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
      confirmButtonText: 'Ok!'
    });                  
  }
});
}else{
   swal({
      title: "Error al asignar Permisos",
      text: "¡No seleccionaste el Perfil de Usuario!",
      type: "error",
      showCancelButton: false,
      confirmButtonClass: 'btn-danger btn-md waves-effect waves-light',
      confirmButtonText: 'Ok!'
    }); 
}
}
</script>
</body>
</html>
