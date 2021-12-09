<?php 
require("componentes/variables_session.php");
$fecha = date("Y-m-d");
if($tipo_rol=='Estudiante')
{
  $consulta = $mysqli->query("SELECT * FROM qr WHERE fecha='$fecha' AND usuario='$matricula'");
  if(mysqli_num_rows($consulta)>=1)
  {
    echo '<script>alert("Este usuario ya contestó el formulario el día de hoy")</script>';
    echo "<script>location.href='contestar_form.php'</script>";
  }
}
else
{
  $consulta = $mysqli->query("SELECT * FROM qr WHERE fecha='$fecha' AND usuario='$id_usuario'");
  if(mysqli_num_rows($consulta)==1)
  {
    echo '<script>alert("Este usuario ya contestó el formulario el día de hoy")</script>';
    echo "<script>location.href='contestar_form.php'</script>";
  }
}
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
              <div class="card-header">
                <h3 class="card-title">Cuestionario de sanidad</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php if($tipo_rol =="Estudiante")
                  {
                ?>
                    <form action="Backend/generarqr.php" method="POST">
                <?php
                  }
                else
                  {
                ?>
                    <form action="Backend/generarqr_users.php" method="POST">
                <?php
                  }
                        $consulta=$mysqli->query("SELECT * FROM preguntas where estado='Activado'");
                        $count=1; //////Este contadoor es para los id y los for
                        $cont=1;  //////Este contadoor es para name de las preguntas
                        while($datos=$consulta->fetch_array())
                        {
                    ?>
                        <label for=""><?php echo $datos['pregunta']; ?></label><br>
                        <div class="icheck-success d-inline">
                        <input type="radio" value="SI" name="p<?php echo $cont; ?>" id="radioSuccess<?php echo $count; ?>" required>
                        <label for="radioSuccess<?php echo $count; ?>">
                          SI
                        </label>
                        </div><br>
                        <div class="icheck-success d-inline">
                        <input type="radio" value="NO" name="p<?php echo $cont; ?>" id="radioSuccess<?php echo $count+1; ?>">
                        <label for="radioSuccess<?php echo $count+1; ?>">
                          NO
                        </label>
                        </div><br><br>
                    <?php
                        $count=$count+2;
                        $cont=$cont+1;
                        }
                    ?>
                    <button type="submit" class="btn btn-success" style="float:right;">Enviar</button>
                </form>
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


