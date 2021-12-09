<?php 
  require("componentes/variables_session.php");
  $permisos=$mysqli->query("SELECT * FROM `rel_roles_modulos` WHERE id_rol = '$id_rol' and id_modulo = '8'");
  $permiso=$permisos->fetch_array();
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
                <h3 class="card-title">GESTIÓN DE AFORO PERMITIDO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button class="btn btn-success" data-toggle="modal" data-target="#modaladd" onclick="reset_modal()" <?php if($permiso['editar'] == 0){ echo "disabled"; } ?>><i class="fas fa-plus"></i> Agregar nuevo</button><br><br>
                <table class="table table-bordered table-hover" id="example1" style="overflow:auto; display:inline-block;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Semáforo</th>
                                <th>Aforo General</th>
                                <th>Aforo Administrativos</th>
                                <th>Aforo Docentes</th>
                                <th>Aforo Estudiantes</th>
                                <th>Estado</th>
                                <th>Observaciones</th>
                                <th>Modificar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody style="overflow:scroll;">
                        <?php
                          require("conexion.php");
                          $consulta=$mysqli->query("SELECT * FROM aforo");
                          $cont=1;
                          while($datos=$consulta->fetch_array())
                            {
                              $dato=$datos[0]."||".$datos[1]."||".$datos[2]."||".$datos[3]."||".$datos[4]."||".$datos[5]."||".$datos[6]."||".$datos[7];
                        ?>
                             <tr>
                                <td><?php echo $cont?></td>
                                <td><?php echo $datos['semaforo']?></td>
                                <td><?php echo $datos['a_general']?></td>
                                <td><?php echo $datos['a_administrativo']?></td>
                                <td><?php echo $datos['a_docentes']?></td>
                                <td><?php echo $datos['a_estudiantes']?></td>
                                <td><?php echo $datos['estado']?></td>
                                <td><?php echo $datos['observaciones']?></td>
                                <td><center><button class="btn btn-success" data-toggle="modal" data-target="#modificar_aforo" onClick="consultar_aforo('<?php echo $dato ?>')" <?php if($permiso['editar'] == 0){ echo "disabled"; } ?>><i class="fas fa-edit"></i></button></td>
                                <td><center><a <?php
                                                if($permiso['editar'] == 0){ echo "disabled"; }
                                                else{ echo "href=Backend/eliminar_aforo.php?id=$datos[0]"; }
                                                ?> >
                                  <button class="btn btn-danger" onClick="return ConfirmDeleteAf()" <?php if($permiso['editar'] == 0){ echo "disabled"; } ?>><i class="fas fa-trash"></i></button></a></td>
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
<!-- SECCION DE MODALES-->
<!-- Modal de Inserccion-->
<div class="modal fade" id="modaladd">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">AGREGAR NUEVO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="Backend/agregar_aforo.php" method="POST" id="formadd">
                  <label for="">Semáforo*</label>
                  <select name="semaforo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value="Verde">Verde</option>
                      <option value="Amarrillo">Amarillo</option>
                      <option value="Naranja">Naranja</option>
                      <option value="Rojo">Rojo</option>
                  </select><br>
                  <label for="">Aforo General Permitido*</label>
                  <p id="demo" style="color: red;"></p>
                  <input type="number" class="form-control" id="ag" placeholder="Aforo General Permitido" name="a_gral" oninput="myFunction()" required><br>
                  <label for="">Aforo Permitido Administrativos*</label>
                  <input type="number" class="form-control" id="aa" placeholder="Aforo General Permitido Administrativos" name="a_admin" oninput="myFunction()" required><br>
                  <label for="">Aforo Permitido Docentes*</label>
                  <input type="number" class="form-control" id="ad" placeholder="Aforo General Permitido Docentes" name="a_docentes" oninput="myFunction()" required><br>
                  <label for="">Aforo Permitido Estudiantes*</label>
                  <input type="number" class="form-control" id="ae" placeholder="Aforo General Permitido Estudiantes" name="a_estudiantes" oninput="myFunction()" required><br>
                  <label for="">Estado*</label>
                  <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value="Activado">Activado</option>
                      <option value="Desactivado">Desactivado</option>
                  </select><br>
                  <label for="">Observaciones</label>
                  <input type="text" name="observaciones" class="form-control" placeholder="Observaciones" required>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success" id="btnadd">Agregar</button>
            </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
<!-- Modal de Actualizacion-->
<div class="modal fade" id="modificar_aforo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Aforo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="Backend/actualizar_aforo.php" method="POST">
                  <input type="number" id="id_aforo" name="id_aforo" hidden>
                  <label for="">Semáforo*</label>
                  <select id="semaforo" name="semaforo" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value="Verde">Verde</option>
                      <option value="Amarrillo">Amarillo</option>
                      <option value="Naranja">Naranja</option>
                      <option value="Rojo">Rojo</option>
                  </select><br>
                  <label>Aforo General Permitido*</label>
                  <p id="demo2" style="color: red;"></p>
                  <input id="a_gral" type="number" class="form-control" name="a_gral" oninput="myFunction2()"><br>
                  <label>Aforo Permitido Administrativos*</label>
                  <input id="a_admin" type="number" class="form-control"  name="a_admin" oninput="myFunction2()"><br>
                  <label for="">Aforo Permitido Docentes*</label>
                  <input type="number" class="form-control" id="a_docentes"  name="a_docentes" oninput="myFunction2()"><br>
                  <label for="">Aforo Permitido Estudiantes*</label>
                  <input type="number" class="form-control" id="a_estudiantes"  name="a_estudiantes" oninput="myFunction2()"><br>
                  <label for="">Estado*</label>
                  <select id="status" name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value="Activado">Activado</option>
                      <option value="Desactivado">Desactivado</option>
                  </select><br>
                  <label for="">Observaciones</label>
                  <input id="observaciones" type="text" name="observaciones" class="form-control">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success" id="btnupdate">Actualizar</button>
            </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
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


