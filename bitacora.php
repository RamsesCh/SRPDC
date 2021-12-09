<?php 
require("componentes/variables_session.php");
  $permiso=$mysqli->query("SELECT * FROM `rel_roles_modulos` WHERE id_rol = '$id_rol' and id_modulo = '11'");
  $datos=$permiso->fetch_array();
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
                <h3 class="card-title">BITÁCORA</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                    <table class="table table-bordered table-hover" id="example1" style="overflow:auto; display:inline-block;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Usuario</th>
                                <th>Rol</th>
                                <th>Acción</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody style="overflow:scroll;">
                        <?php
                          require("conexion.php");
                          $consulta=$mysqli->query("SELECT tbl_log.id_registro, usuarios.nombre, tbl_log.Modulo, tbl_log.accion, tbl_log.fecha FROM tbl_log INNER JOIN usuarios ON usuarios.id_usuario = tbl_log.id_usuario");
                          $cont=1;
                          while($datos=$consulta->fetch_array())
                            {
                        ?>
                             <tr>
                                <td><?php echo $cont?></td>
                                <td><?php echo $datos['nombre']?></td>
                                <td><?php echo $datos['Modulo']?></td>
                                <td><?php echo $datos['accion']?></td>
                                <td><?php echo $datos['fecha']?></td>
                              </tr>
                        <?php
                          $cont=$cont+1;
                            }
                        ?>
                          </tbody>
                 </table>
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
