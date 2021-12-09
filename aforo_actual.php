<?php 
require("componentes/variables_session.php");
$fecha = date("Y-m-d");
///////////consulta de cantidades de aforo
$consulta_datos_aforo = $mysqli->query("SELECT * FROM aforo WHERE estado = 'Activado'");
$datos_aforo = $consulta_datos_aforo->fetch_array();

/////////////consulta de cantidades de usuarios y alumnos
$consulta_cant_estudiantes = $mysqli->query("SELECT COUNT(*) AS cant_estudent FROM `historial_alumnos` WHERE DATE(fecha_escaneo) = DATE('$fecha') and acceso = 1");
$cant_estudent = $consulta_cant_estudiantes->fetch_array();

$consulta_cant_docentes = $mysqli->query("SELECT COUNT(*) AS cant_docentes FROM historial_users INNER JOIN usuarios ON usuarios.id_usuario=historial_users.id_usuario INNER JOIN roleS ON roles.id_rol= usuarios.id_rol WHERE roles.nombre_rol='Docentes' and DATE(fecha_escaneo) = DATE('$fecha') and acceso = 1");

$cant_docentes = $consulta_cant_docentes->fetch_array();

$consulta_cant_admin = $mysqli->query("SELECT COUNT(*) AS cant_admin FROM historial_users INNER JOIN usuarios ON usuarios.id_usuario=historial_users.id_usuario INNER JOIN roleS ON roles.id_rol= usuarios.id_rol WHERE roles.nombre_rol != 'Docentes' and DATE(fecha_escaneo) = DATE('$fecha') and acceso = 1");
$cant_admin = $consulta_cant_admin->fetch_array();

$cant_gral = $cant_estudent['cant_estudent'] + $cant_docentes['cant_docentes'] + $cant_admin['cant_admin'];

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
<div id="respuesta"></div>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div>
            <div class="card">
               <div class="card-header">
                 <div class="card-tittle">Recuento de aforo semáforo:  <?php echo $datos_aforo['semaforo']; ?></div>  
               </div>
               <div class="card-body">
                 <p>Aforo General: <?php echo $cant_gral.'/'.$datos_aforo['a_general']; ?></p>
                 <p>Aforo Estudiantes: <?php echo $cant_estudent['cant_estudent'].'/'.$datos_aforo['a_estudiantes']; ?> </p>
                 <p>Aforo Administrativos: <?php echo $cant_admin['cant_admin'].'/'.$datos_aforo['a_administrativo']; ?></p>
                 <p>Aforo Docentes: <?php echo  $cant_docentes['cant_docentes'].'/'.$datos_aforo['a_docentes']; ?></p>
               </div>
            </div>
          </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">AFORO ACTUAL</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <h3>Aforo Alumnos</h3><br>
                <table class="table table-bordered table-hover" id="example1" style="overflow:auto; display:inline-block;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Matrícula</th>
                                <th>Nombre</th>
                                <th>Carrera</th>
                                <th>Grado</th>
                                <th>Grupo</th>
                                <th>Fecha Registro</th>
                                <th>Fecha Escaneo</th>
                                <th>Temperatura</th>
                                <th>Preg.1</th>
                                <th>Preg.2</th>
                                <th>Preg.3</th>
                                <th>Preg.4</th>
                            </tr>
                        </thead>
                        <tbody style="overflow:scroll;">
                        <?php
                          require("conexion.php");
                          $consulta=$mysqli->query("SELECT * FROM historial_alumnos where DATE(fecha_escaneo) = DATE('$fecha') and acceso = 1");
                          $cont=1;
                          while($datos=$consulta->fetch_array())
                            {
                              //$dato=$datos[0]."||".$datos[1]."||".$datos[2]."||".$datos[3]."||".$datos[4]."||".$datos[5]."||".$datos[7]."||".$datos[8];
                        ?>
                             <tr>
                                <td><?php echo $cont?></td>
                                <td><?php echo $datos['matricula_alum']?></td>
                                <td><?php echo $datos['nombre']?></td>
                                <td><?php echo $datos['carrera']?></td>
                                <td><?php echo $datos['grado']?></td>
                                <td><?php echo $datos['grupo']?></td>
                                <td><?php echo $datos['fecha_registro']?></td>
                                <td><?php echo $datos['fecha_escaneo']?></td>
                                <td><?php echo $datos['temperatura']?></td>
                                <td><?php echo $datos['p1'];?></td>
                                <td><?php echo $datos['p2'];?></td>
                                <td><?php echo $datos['p3'];?></td>
                                <td><?php echo $datos['p4'];?></td>
                              </tr>
                        <?php
                          $cont=$cont+1;
                            }
                        ?>
                          </tbody>
                 </table><br><br>
                 <h3>Aforo Usuarios</h3><br>
                <table class="table table-bordered table-hover" id="example1" style="overflow:auto; display:inline-block;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Rol de Usuario</th>
                                <th>Fecha Registro</th>
                                <th>Fecha Escaneo</th>
                                <th>Temperatura</th>
                                <th>Preg.1</th>
                                <th>Preg.2</th>
                                <th>Preg.3</th>
                                <th>Preg.4</th>
                            </tr>
                        </thead>
                        <tbody style="overflow:scroll;">
                        <?php
                          require("conexion.php");
                          $consulta=$mysqli->query("SELECT usuarios.id_usuario, usuarios.nombre, usuarios.telefono, usuarios.correo, roles.nombre_rol, historial_users.fecha_registro, historial_users.fecha_escaneo, historial_users.temperatura, historial_users.p1, historial_users.p2, historial_users.p3, historial_users.p4 FROM historial_users INNER JOIN usuarios ON usuarios.id_usuario=historial_users.id_usuario INNER JOIN roles ON roles.id_rol=usuarios.id_rol WHERE DATE(fecha_escaneo) = DATE('$fecha') and acceso = 1");
                          $cont=1;
                          while($datos=$consulta->fetch_array())
                            {
                              //$dato=$datos[0]."||".$datos[1]."||".$datos[2]."||".$datos[3]."||".$datos[4]."||".$datos[5]."||".$datos[7]."||".$datos[8];
                        ?>
                             <tr>
                                <td><?php echo $cont?></td>
                                <td><?php echo $datos['nombre']?></td>
                                <td><?php echo $datos['telefono']?></td>
                                <td><?php echo $datos['correo']?></td>
                                <td><?php echo $datos['nombre_rol']?></td>
                                <td><?php echo $datos['fecha_registro']?></td>
                                <td><?php echo $datos['fecha_escaneo']?></td>
                                <td><?php echo $datos['temperatura']?></td>
                                <td><?php echo $datos['p1'];?></td>
                                <td><?php echo $datos['p2'];?></td>
                                <td><?php echo $datos['p3'];?></td>
                                <td><?php echo $datos['p4'];?></td>
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