<?php 
require("componentes/variables_session.php");
$id_rol=$_REQUEST['id'];
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
                <h3 class="card-title">Modificar Rol</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <?php
                $consulta_info_rol=$mysqli->query("SELECT * FROM roles where id_rol ='$id_rol'");
                $datos_rol=$consulta_info_rol->fetch_array()
              ?>
                    <form method="POST" action="Backend/actualizar_rol.php">
                        <input type="number" name="id_rol" value="<?php echo $id_rol; ?>" hidden>
                        <label>Nombre del Rol</label>
                        <input type="text" class="form-control" value="<?php echo $datos_rol['nombre_rol']?>" name="nombre_rol" <?php if($datos_rol['nombre_rol']=="Docentes"){ echo "disabled";} ?>><br>
                        <label for="">Estado</label>
                        <select name="status" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="9" tabindex="-1" aria-hidden="true">
                        <?php
                          if($datos_rol['estado']=="Activado"){
                        ?>
                            <option value="Activado" selected>Activado</option>
                            <option value="Desactivado">Desactivado</option>
                        <?php 
                          }
                          else{
                        ?>
                            <option value="Activado">Activado</option>
                            <option value="Desactivado" selected>Desactivado</option>
                        <?php
                          }
                        ?>  
                        </select><br>
                        <label for="">Observaciones</label>
                        <input type="text" class="form-control" id="" value="<?php echo $datos_rol['observaciones']?>" name="observaciones"><br>
                        <h5>Modulos</h5>
                            <?php
                                $consulta=$mysqli->query("SELECT * FROM modulos WHERE estado = 'Activado'");
                                while($datos=$consulta->fetch_array())
                                {
                            ?>
                                <div class="icheck-success d-inline">
                                        <input onchange="activarradio(this)" type="checkbox" id="<?php echo $datos['id_modulo']; ?>" value="<?php echo $datos['id_modulo']; ?>" name="modulo[]" 
                                        <?php
                                          $consulta_relacion=$mysqli->query("SELECT * FROM rel_roles_modulos WHERE id_rol = '$id_rol'");
                                          while($datos2=$consulta_relacion->fetch_array())
                                          {
                                            if($datos['id_modulo']==$datos2['id_modulo']){
                                              echo "checked";
                                            }
                                          }
                                        ?>>
                                        <label for="<?php echo $datos['id_modulo']; ?>"><?php echo $datos['modulo']?></label><br>
                                  </div>
                            <?php
                                if($datos['id_modulo'] > 3 ){
                            ?>
                                    <label>Control total</label>
                                    <input onchange="activarcheck(this)" type="radio" value="1" id="<?php echo $datos['id_modulo']; ?>" name="<?php echo "editar".$datos['id_modulo']; ?>" <?php
                                          $consulta_relacion=$mysqli->query("SELECT * FROM rel_roles_modulos WHERE id_rol = '$id_rol'");
                                          while($datos2=$consulta_relacion->fetch_array())
                                          {
                                            if($datos['id_modulo']==$datos2['id_modulo']){
                                              if($datos2['editar'] == 1){
                                                echo "checked";
                                              }
                                            }
                                          }
                                        ?>>Si
                                    <input onchange="activarcheck(this)" type="radio" value="0" id="<?php echo $datos['id_modulo']; ?>" name="<?php echo "editar".$datos['id_modulo']; ?>" <?php
                                          $consulta_relacion=$mysqli->query("SELECT * FROM rel_roles_modulos WHERE id_rol = '$id_rol'");
                                          while($datos2=$consulta_relacion->fetch_array())
                                          {
                                            if($datos['id_modulo']==$datos2['id_modulo']){
                                              if($datos2['editar'] == 0){
                                                echo "checked";
                                              }
                                            }
                                          }
                                        ?>>No <br><p><br>
                            <?php
                                  }
                                }
                            ?>
                            <a href="gestion_roles.php" class="btn btn-outline-danger">Regresar</a>
                            <button type="submit" class="btn btn-outline-success" style="float:right;">Actualizar</button>
                </form>
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
<script>
  function activarcheck(parametro){

  var name = parametro.id;
  var checks = document.getElementById(name);
  
  console.log(parametro);
  checks.checked=true;

}
</script>
</html>
