<!-- Aside de los users -->
<style>
  .os-host-overflow-x .user-name-custom{
      display: none !important;
    }
</style>
<!-- Brand Logo -->
<center>
      <div style="background-color: #ffff;">
        <img src="dist/img/logoUTSEM1.png" alt="UTSEM Logo" height="" width="60px" style="margin-top: 10px; margin-bottom: 4px;">
      </div>
    </center>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      </div>

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image" style="display: flex; align-items: center">
            <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="user-name-custom" style="white-space: normal;">
          <a href="info_user.php" class="nav-link active" style="font-size: 15px; width: auto;"><?php echo $nombre; ?></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header" style="font-weight: bold; color: white;">MI PANEL</li>
          <?php
              $consultar_modulos=$mysqli->query("SELECT * FROM modulos INNER JOIN rel_roles_modulos ON modulos.id_modulo=rel_roles_modulos.id_modulo WHERE id_rol = '1' AND modulos.estado='Activado'");
              $cont=1;
              while($dato=$consultar_modulos->fetch_array())
              {
          ?> 
            <li class="nav-item">
              <a href="<?php echo $dato['url']?>" class="nav-link">
              <i class="<?php echo $dato['icon']?>"></i>
              <p><?php echo $dato['modulo']?></p>
              </a>
            </li>
          <?php 
                $cont=$cont+1;
              }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->