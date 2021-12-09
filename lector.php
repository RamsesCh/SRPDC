<?php 
require("componentes/variables_session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Registro y Pre Diagnostico COVID-19</title>
  <?php 
    require("componentes/links.php");
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/logoUTSEM3.png" alt="AdminLTELogo" height="60" width="60" style="animation-duration: 10s;">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <?php require("componentes/nav.php"); ?>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#008D75;">
   <?php
    if($tipo_rol =="Estudiante")
    {
      require("componentes/aside3.php");
    }
    else
    {
      require("componentes/aside2.php");
    }
    ?>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">LECTOR DE CÓDIGOS QR</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <button class="btn btn-success" id="iniciar" onclick="lector();"><i class="fas fa-play"></i>  Iniciar</button>
                <button class="btn btn-danger" onclick="apagar();"><i class="fas fa-stop"></i>  Detener</button><br><br>
                <div>
                    <audio id="audiotag1" src="componentes/sounds/beep.mp3" preload="auto"></audio>
                    <audio id="audiotag2" src="componentes/sounds/error.wav" preload="auto"></audio>
                    <video id="previsualizacion" class="p-1 border" style="width: 50%; display: none;"></video>
                    <div style="width: 50%;" id="qr-code">
                      <center><img src="dist/img/QRCode.png" height="300" width="300"></center>
                    </div>
                </div><br><br>
                <p id="respuesta"></p>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>SISTEMA DE REGISTRO Y PRE DIAGNÓSTICO COVID-19</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b></b>
    </div>
  </footer>
<!-- Modal de Inserccion-->
<!-- FINAL DE LA SECCION DE MODALES -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<?php 
  require("componentes/scripts.php");
?>
</body>
</html>


