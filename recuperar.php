<?php 
require("componentes/variables_session.php");
require("phpqrcode/qrlib.php");
////////////////Comienza la generacion del codigo QR
$fecha = date("Y-m-d");
if($tipo_rol=='Estudiante')
{ 
  $consulta = $mysqli->query("SELECT * FROM qr where fecha='$fecha' AND usuario='$matricula' AND estado = 1");
  if(mysqli_num_rows($consulta)==0)
  {
    echo '<script>alert("Tu código QR ya fue escaneado o no ha sido generado, realiza el formulario de sanidad")</script>';
    echo "<script>location.href='recuperar_qr.php'</script>";
  }
}
else
{
  $consulta = $mysqli->query("SELECT * FROM qr where fecha='$fecha' AND usuario='$id_usuario' AND estado = 1");
  if(mysqli_num_rows($consulta)==0)
  {
    echo '<script>alert("Tu código QR ya fue escaneado o no ha sido generado, realiza el formulario de sanidad")</script>';
    echo "<script>location.href='recuperar_qr.php'</script>";
  }
}
$dato=$consulta->fetch_array();
$valido = $dato['valido'];

 $filename = 'QR/QR '.$dato['usuario'].'.png';
 $tamanio = 3;
 $lavel = 'Q';
 $frameSize = 1;
 $contenido = $dato['qr'];

 QRcode::png($contenido, $filename, $lavel, $tamanio, $frameSize);
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
    <img class="animation__shake" src="dist/img/logoUTSEM3.png" alt="AdminLTELogo" height="60" width="60">
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
              <div class="card-header" style="background-color: #008D75;">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                <div class="col-12">
                    <?php 
                      if ($valido == 1) {
                    ?>
                        <center><img src="<?php echo $filename; ?>" style="border-style: solid; border-color: #008D75;"><br><br></center>
                        <h5>Recuperación de código QR exitosa, presenta este código en la puerta de la Universidad para acceder de una manera más rápida y sencilla.</h5>
                        <h5>Recuerda las medidas de sanididad dentro de la Universidad:</h5>
                        <h6>-Uso de cubrebocas.</h6>
                        <h6>-Lavado frecuente de manos.</h6>
                        <h6>-Uso de gel sanitizante.</h6>
                        <h6>-Mantener sana distancia.</h6>
                        
                    <?php
                      } else {
                    ?>
                        <center><img src="<?php echo $filename; ?>" style="border-style: solid; border-color: #dc3545;"><br><br></center>
                        <h5>Recuperación de código QR exitosa, desafortunadamente se te negará el acceso a la institución.</h5>
                    <?php
                      }  
                    ?>
                  </div>
                </div>
                <a href="recuperar_qr.php" class="btn btn-outline-danger" style="float:right;">Regresar</a>
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
<!-- SECCION DE MODALES-->
<!-- Modal de Inserccion-->
<!-- FINAL DE LA SECCION DE MODALES -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php 
  require("componentes/scripts.php");
?>
</body>
</html>


