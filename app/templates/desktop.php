<?php
if(!isset($_SESSION['ucad_user'])){
  header('location: ?mod=login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="resources/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="resources/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="resources/css/adminlte.min.css">
  <!-- jQuery -->
<script src="resources/jquery/jquery.min.js"></script>
<!--select2-->
<link rel="stylesheet" href="resources/select2/css/select2.min.css">
<link rel="stylesheet" href="resources/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="media/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <button class="btn btn-danger" id="btn_logout">
          <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </button>
      </li>

    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="media/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Sistema UCAD</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="media/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            <?php
              echo $_SESSION['ucad_user'];
            ?>
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          <li class="nav-item">
            <a href="?mod=vehiculos" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Vehiculos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mod=ricardinho" class="nav-link">
              <i class="nav-icon fas fa-car"></i>
              <p>
                Vehiculos 2
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?mod=marca" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Marca
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
      @include(MODULO_PATH. "/"  . $conf[$modulo]["archivo"]);
    ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="resources/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="resources/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="resources/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="resources/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="resources/raphael/raphael.min.js"></script>
<script src="resources/jquery-mapael/jquery.mapael.min.js"></script>
<script src="resources/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="resources/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!--<script src="resources/js/demo.js"></script>-->
<script src="app/controllers/desktop.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--select2-->
<script src="resources/select2/js/select2.full.min.js"></script>
<script src="resources/select2/js/i18n/es.js"></script>
<!--datatables-->
<link rel="stylesheet" href="resources/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="resources/datatables-responsive/css/responsive.bootstrap4.min.css">
<script src="resources/datatables/jquery.dataTables.min.js"></script>
<script src="resources/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="resources/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!--<script src="resources/datatables/js/responsive.min.js"></script>-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="resources/js/pages/dashboard2.js"></script>-->
</body>
</html>
