<?php 
require("componentes/variables_session.php");
  $permisos=$mysqli->query("SELECT * FROM `rel_roles_modulos` WHERE id_rol = '$id_rol' and id_modulo = '6'");
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
<div id="respuesta"></div>
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
                <h3 class="card-title">USUARIOS</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <button style="float:right;" class="btn btn-success" data-toggle="modal" data-target="#modaladd" onclick="reset_modal()"<?php if($permiso['editar'] == 0){ echo "disabled"; } ?>><i class="fas fa-plus"></i> Agregar nuevo</button><br><br>
                <table class="table table-bordered table-hover" id="example1" style="overflow:auto; display:inline-block;">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nombre</th>
                                <th>Teléfono</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Estado</th>
                                <th>Observaciones</th>
                                <th>Modificar</th>
                                <th>Borrar</th>
                            </tr>
                        </thead>
                        <tbody style="overflow:scroll;">
                        <?php
                          require("conexion.php");
                          $consulta=$mysqli->query("SELECT usuarios.id_usuario, usuarios.nombre, usuarios.telefono, usuarios.correo, usuarios.password, usuarios.id_rol, roles.nombre_rol as nombre_rol, usuarios.estado, usuarios.observaciones FROM usuarios INNER JOIN roles ON usuarios.id_rol=roles.id_rol");
                          $cont=1;
                          while($datos=$consulta->fetch_array())
                            {
                              $dato=$datos[0]."||".$datos[1]."||".$datos[2]."||".$datos[3]."||".$datos[4]."||".$datos[5]."||".$datos[7]."||".$datos[8];
                        ?>
                             <tr>
                                <td><?php echo $cont?></td>
                                <td><?php echo $datos['nombre']?></td>
                                <td><?php echo $datos['telefono']?></td>
                                <td><?php echo $datos['correo']?></td>
                                <td><?php echo $datos['nombre_rol']?></td>
                                <td><?php echo $datos['estado']?></td>
                                <td><?php echo $datos['observaciones']?></td>
                                <td><center><button class="btn btn-success" data-toggle="modal" data-target="#modificar_usuario" onClick="consultar_usuario('<?php echo $dato ?>')" <?php if($permiso['editar'] == 0){ echo "disabled"; } ?>><i class="fas fa-edit"></i></button></td>
                                <td><center><a <?php
                                                if($permiso['editar'] == 0){ echo "disabled"; }
                                                else{ echo "href=Backend/eliminar_usuario.php?id=$datos[0]"; }
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
              <form id="formadd">
                  <p id="demo" style="color: red;"></p>
                  <label for="">Nombre completo*</label>
                  <input type="text" class="form-control" id="nombre" placeholder="Nombre Completo" required><br>
                  <label for="">Teléfono*</label>
                  <input type="number" class="form-control" placeholder="Teléfono" id="telefono" required><br>
                  <label for="">Correo*</label>
                  <input type="email" class="form-control" placeholder="Correo" id="correo" required><br>
                  <label for="">Confirmar Correo*</label>
                  <input type="email" class="form-control" placeholder="Confirmar Correo" id="correo2" required oninput="validarcorreo();"><br>
                  <label for="">Contraseña*</label>
                  <input type="password" class="form-control" placeholder="Contraseña" id="password" required><br>
                  <label for="">Confirmar Contraseña*</label>
                  <input type="password" class="form-control" placeholder="Confirmar Contraseña" id="password2" required oninput="validarpassword();"><br>
                  <label for="">Estado*</label>
                  <select id="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value="Activado">Activado</option>
                      <option value="Desactivado">Desactivado</option>
                  </select><br>
                  <label for="">Observaciones*</label>
                  <input type="text" class="form-control" placeholder="OBSERVACIONES" id="observaciones" required><br>
                  <label for="">Rol de Usuario*</label>
                  <select id="id_rol" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                  <?php 
                    $consulta=$mysqli->query("SELECT * FROM roles");
                    while($dato=$consulta->fetch_array())
                        {
                   ?>
                      <option value="<?php echo $dato['id_rol'] ?>"><?php echo $dato['nombre_rol'] ?></option>
                 <?php
                        }
                 ?>
                  </select><br>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-outline-success" id="btnadd" onclick="agregar_user();">Agregar</button>
            </div>
            </form>
        </div>
          <!-- /.modal-content -->
    </div>
        <!-- /.modal-dialog -->
</div>
<!-- Modal de Actualizacion-->
<div class="modal fade" id="modificar_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                  <input type="number" id="id_usuario" name="id_usuario" hidden>
                  <label for="">Nombre Completo*</label>
                  <input type="text" id="nombre_us" class="form-control"><br>
                  <label>Teléfono*</label>
                  <input id="telefono_us" type="number" class="form-control"><br>
                  <label>Correo*</label>
                  <input id="correo_us" type="email" class="form-control"><br>
                  <label>Contraseña*</label>
                  <input id="password_us" type="text" class="form-control"><br>
                  <label for="">Estado*</label>
                  <select id="status_us" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                      <option value="Activado">Activado</option>
                      <option value="Desactivado">Desactivado</option>
                  </select><br>
                  <label for="">Observaciones*</label>
                  <input type="text" class="form-control" placeholder="OBSERVACIONES" id="observaciones_us" required><br>
                  <label for="">Rol de Usuario*</label>
                  <select id="id_rol_us" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                  <?php 
                    $consulta=$mysqli->query("SELECT * FROM roles");
                    while($dato=$consulta->fetch_array())
                        {
                   ?>
                      <option value="<?php echo $dato['id_rol'] ?>"><?php echo $dato['nombre_rol'] ?></option>
                 <?php
                        }
                 ?>
                  </select><br>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-outline-success" id="btnupdate" onclick="update_user()">Actualizar</button>
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


