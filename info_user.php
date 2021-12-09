<?php 
require("componentes/variables_session.php");
if($tipo_rol=='Estudiante')
{
  $grupo_short=explode(' ',$grupo);
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
<?php if($tipo_rol=='Estudiante')
{ 
?>
  <div class="content-wrapper">
    <br>
    <section class="content">
      <div class="card">
        <div class="card-header">MIS DATOS PERSONALES</div>
        <div class="card-body">
          <div class="row">
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0 text-center">
                   Universidad Tecnológica del Sur del Estado de Morelos
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h6 class="text-muted text-sm"><b>Nombre: </b></h6>
                      <h4 class="lead"><b><?php echo utf8_encode($nombre);?></b></h4>
                      <h6 class="text-muted text-sm"><b>Carrera: </b></h6>
                      <p class="text-muted text-sm"><?php echo utf8_encode($carrera); ?> </p>
                        <h6 class="text-muted text-sm"><b>Grado: </b><?php echo utf8_encode($cuatrimestre);?></h6>
                        <h6 class="text-muted text-sm"><b>Grupo: </b><?php echo utf8_encode($grupo_short[0]);?></h6>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/avatar4.png" alt="user-avatar" class="img-circle img-fluid"></p></p>
                      <h6 class="text-muted text-sm"><b>Matrícula</b></h6>
                      <h4 class="lead"><b><?php echo utf8_encode($matricula);?></b></h4>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
} 
else
{
?>
<div class="content-wrapper">
    <br>
    <section class="content">
      <div class="card">
        <div class="card-header">MIS DATOS PERSONALES</div>
        <div class="card-body">
          <div class="row">
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0 text-center">
                   Universidad Tecnológica del Sur del Estado de Morelos
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h6 class="text-muted text-sm"><b>Nombre: </b></h6>
                      <h4 class="lead"><b><?php echo $nombre;?></b></h4>
                      <h6 class="text-muted text-sm"><b>Teléfono: </b></h6>
                      <p class="text-muted text-sm"><?php echo utf8_encode($telefono); ?> </p>
                        <h6 class="text-muted text-sm"><b>Correo: </b><?php echo utf8_encode($correo);?></h6>
                        <h6 class="text-muted text-sm"><b>Contraseña: </b><?php echo utf8_encode($password);?></h6>
                    </div>
                    <div class="col-5 text-center">
                      <img src="dist/img/avatar5.png" alt="user-avatar" class="img-circle img-fluid"></p></p>
                      <h6 class="text-muted text-sm"><b>Rol de usuario</b></h6>
                      <h4 class="lead"><b><?php echo utf8_encode($tipo_rol);?></b></h4>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php 
}
?>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>SISTEMA DE REGISTRO Y PRE DIAGNOSTICO COVID-19</strong>
    <div class="float-right d-none d-sm-inline-block">
      <b></b>
    </div>
  </footer>

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
