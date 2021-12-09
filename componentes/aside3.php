<!-- Aside de los estudiantes -->
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
            <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="user-name-custom" style="white-space: normal;">
           <a href="info_user.php" class="nav-link active" style="font-size: 15px; width: auto;"><?php echo $nombre; ?></a>
        </div>   
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
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->