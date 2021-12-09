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
        <div class="info" style="margin-left: 10px;">
          <a href="Perfil.php" class="d-block"><i class="fas fa-home"></i> INICIO</a>
        </div>
      </div>
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <?php if($tipo_rol =="Estudiante")
          {
        ?>
            <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        <?php
          }
         else
          {
        ?>
            <img src="dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        <?php
          }
        ?> 
        </div>
          <a href="info_user.php" class="nav-link active" style="font-size: 14px;"><?php echo $nombre; ?></a>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header" style="font-weight: bold; color: white;">MI PANEL</li>
          <li class="nav-item">
            <a href="contestar_form.php" class="nav-link">
              <i class="fas fa-align-left"></i>
              <p>Formulario de sanidad</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="mi_historico.php" class="nav-link">
              <i class="fas fa-book"></i>
              <p>Mi histórico</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="recuperar_qr.php" class="nav-link">
              <i class="fas fa-qrcode"></i>
              <p>Recuperación de QR</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="lector.php" class="nav-link">
              <i class="fas fa-qrcode"></i>
              <p>Lector de QR</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="preguntas.php" class="nav-link">
              <i class="fas fa-align-left"></i>
              <p>Preguntas de Sanidad</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="historico.php" class="nav-link">
              <i class="fas fa-table"></i>
              <p>Histórico</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="usuarios.php" class="nav-link">
              <i class="fas fa-users"></i>
              <p>Usuarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="gestion_roles.php" class="nav-link">
              <i class="fas fa-users-cog"></i>
              <p>Gestión de Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="gestion_aforo.php" class="nav-link">
              <i class="fas fa-traffic-light"></i>
              <p>Gestión de Aforo</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->