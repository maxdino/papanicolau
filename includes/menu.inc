  <?php if (!$_SESSION["id_usuario"]) {
      redirect('Portal_c');
    } ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url(); ?>Principal_c" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo base_url().'Public/foto/logo_1.png';  ?>" width="50" heigth="50"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">LRRSPT <img src="<?php echo base_url().'Public/foto/logo_1.png';  ?>" width="50" heigth="50"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url().$_SESSION['foto'];  ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['personal'];  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url().$_SESSION['foto'];  ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["nombre_tipo_usuario"];  ?>
                  <small></small>
                </p>
              </li>
 
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url();?>Perfil_c" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url(); ?>Principal_c/logout" class="btn btn-default btn-flat">Desconectar</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url().$_SESSION['foto'];  ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>HOLA!</p>
          <p><?php echo $_SESSION['personal'];  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>
        <?php  $idhijo=0; foreach ($permisos as $value1){ 
              $idpadre= $value1->idpadre;
              if($idpadre != $idhijo){  ?>
        <li class="treeview">
          <a href="#">
            <i class="<?php echo $value1->ipadre;?>"></i>
            <span><?php  echo $value1->padre ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php foreach ($permisos as $value){
                  if($value1->idpadre == $value->idpadre){ $idhijo=$value->idpadre;?>
            <li><a href="<?php echo base_url(). $value->url;?>"><i class="<?php echo $value->codigo;?>"></i> <?php  echo $value->hijo ?></a></li>
            <?php } }  ?>
          </ul>
        </li>
        <?php }} ?>
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
