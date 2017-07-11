<!DOCTYPE html>
<html>
    <head>
        <!--
        Admin template hamstercc v1.00
        Base template : Admin LTE
        Website Base template : https://adminlte.io
        Copyright by : Admin LTE
        Restyling by : Hamstercc
        Website Hamstercc : http://www.hamstercc.com

          -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <base href="http://localhost/pos/">
      <title>Admin | Dashboard</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

      <!-- All Css Call Over Here -->
      <link rel="stylesheet" href="Public/css/bootstrap.min.css">
      <link rel="stylesheet" href="Public/css/font-awesome.min.css">
      <link rel="stylesheet" href="Public/css/AdminLTE.min.css">
      <link rel="stylesheet" href="Public/css/style.css">
      <link rel="stylesheet" href="Public/css/print-style.css" type="text/css" media="print" />
      <link rel="stylesheet" href="Public/css/jquery-ui.css">
      <link rel="stylesheet" href="Public/plugins/DataTables/media/css/dataTables.bootstrap.min.css">
      <link rel="stylesheet" href="Public/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="Public/plugins/datepicker/datepicker3.css">

      <script src="Public/js/jquery-1.12.3.min.js"></script>
      <script src="Public/js/jquery-ui.min.js"></script>
      <script src="Public/js/bootstrap.min.js"></script>
      <script src="Public/plugins/datepicker/bootstrap-datepicker.js"></script>
      <script src="Public/js/app.min.js"></script>
      <script src="Public/js/jquery.validate.min.js"></script>
      <script src="Public/js/jquery.PrintArea.js"></script>
      <script src="Public/plugins/DataTables/media/js/jquery.dataTables.js"></script>
      <script src="Public/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
      <script src="Public/js/fnStandingRedraw.js"></script>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php
        session_start();
         if (empty($_SESSION['username'])) {
         header("location:home");
         }
         ?>
        <div class="loading" style="display: none;">
            <div class="spinner">
              <div class="rect1"></div>
              <div class="rect2"></div>
              <div class="rect3"></div>
              <div class="rect4"></div>
              <div class="rect5"></div>
            </div>
        </div>
        <div class="wrapper">
            <header class="main-header">
              <!-- Logo -->
              <a href="index2.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini">POS</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg">POINT OF SALE</span>
              </a>
              <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                  <span class="sr-only">Toggle navigation</span>
                </a>
                <?php include 'navbar-custom.php'; ?>
              </nav>
            </header>
            <?php include 'sidebar.php'; ?>

            <div class="content-wrapper">
                <section class="content-header">
                  <h1>
                    Dashboard
                    <small>Control panel</small>
                  </h1>
                  <?php include 'breadcumbs.php'; ?>
                </section>

                <!-- Content Header -->
              <?php require($content) ?>
            </div>

            <footer class="main-footer">
              <!-- Write your footer code here  -->
            </footer>

            <!-- Control Sidebar -->

            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
                 immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
            </div>
        </body>
    </html>
