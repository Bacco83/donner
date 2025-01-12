<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    .info {
      display: flex;
      align-items: center;
    }

    .white-icon {
      color: white;
      margin-right: 10px;
    }

    .user-info {
      margin: 0;
      color: white;
      font-weight: bold;
    }
    
  </style>

</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="img/donner.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Donner</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['nama'] ?></a>
        </div>
      </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <div class="sidebar">
              <!-- Sidebar user (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="info">
                  <i class="fas fa-user-cog white-icon"></i>
                  <p class="user-info">Admin</p>
                </div>
              </div>
              <li class="nav-item">
                <a href="kata_pengantar.php" class="nav-link">
                  <i class="fas fa-envelope"></i>
                  <p>
                    Kata Pengantar
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                  <i class="fas fa-desktop"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="form_donasi.php" class="nav-link">
                  <i class="fas fa-tshirt"></i>
                  <p>
                    Donasi Sekarang!
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="donation_chart.php" class="nav-link">
                  <i class="fas fa-chart-bar"></i>
                  <p>
                    Grafik Donasi
                  </p>
                </a>
              </li>
              <li class="nav-item active">
                <a href="data_donasi.php" class="nav-link">
                  <i class="nav-icon fa fa-users"></i>
                  <p>
                    Data Donasi
                  </p>
                </a>
              </li>
              <li class="nav-item active">
                <a href="dokumentasi.php" class="nav-link">
                  <i class="fas fa-image"></i>
                  <p>
                    Dokumentasi
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="logout.php" class="nav-link">
                  <i class="nav-icon far fa-paper-plane"></i>
                  <p>
                    Logout
                  </p>
                </a>
              </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>