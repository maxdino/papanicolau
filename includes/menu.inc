  <?php if (!$_SESSION["id_usuario"]) {
      redirect('Portal_c');
    } ?>
  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
              <img src="https://scontent.flim5-4.fna.fbcdn.net/v/t1.0-9/24774781_939237826231205_7207010486429044126_n.jpg?_nc_cat=0&oh=3190d7adefb9aa2718e40e44b4f44a71&oe=5B76A425" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['personal'];  ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://scontent.flim5-4.fna.fbcdn.net/v/t1.0-9/24774781_939237826231205_7207010486429044126_n.jpg?_nc_cat=0&oh=3190d7adefb9aa2718e40e44b4f44a71&oe=5B76A425" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['personal'];  ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
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
          <img src="https://scontent.flim5-4.fna.fbcdn.net/v/t1.0-9/24774781_939237826231205_7207010486429044126_n.jpg?_nc_cat=0&oh=3190d7adefb9aa2718e40e44b4f44a71&oe=5B76A425" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>HOLA!</p>
          <p><?php echo $_SESSION['personal'];  ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">NAVEGACIÓN PRINCIPAL</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cogs"></i>
            <span>Mantenimiento</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Ipress_c"><i class="fa fa-hospital-o"></i> Ipress</a></li>
            <li><a href="<?php echo base_url();?>Categorias_c"><i class="fa fa-th-list"></i> Categoria</a></li>
            <li><a href="<?php echo base_url();?>Tipo_c"><i class="fa fa-medkit"></i> Tipos</a></li>
            <li><a href="<?php echo base_url();?>Microred_c"><i class="fa fa-sitemap"></i> Microred</a></li>
            <li><a href="<?php echo base_url();?>Red_c"><i class="fa fa-wifi"></i> Red</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>Importar_c">
            <i class="fa fa-cloud-upload"></i> <span>Importar Excel</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo base_url();?>Exportar_c">
            <i class="fa fa-cloud-download"></i> <span>Exportar Excel</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-unlock-alt"></i>
            <span>Seguridad</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>Usuarios_c"><i class="fa fa-users"></i> Usuarios</a></li>
            <li><a href="<?php echo base_url();?>Tipos_usuarios_c"><i class="fa  fa-slideshare"></i> Tipos Usuarios</a></li>
            <li><a href="<?php echo base_url();?>Modulos_c"><i class="fa  fa-file"></i> Modulos</a></li>
            <li><a href="<?php echo base_url();?>Iconos_c"><i class="fa fa-cubes"></i> Iconos</a></li>
          </ul>
        </li>
         
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->
