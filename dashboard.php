<?php include "header.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Donasi</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <!-- Card 1 - Donasi Barang -->
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Donasi Barang</h3>
                                <a href="view_report.php?report_type=donasi_barang" class="btn btn-primary">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Content untuk Donasi Barang -->
                            <p>Informasi dan statistik donasi barang...</p>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->

                <!-- Col 2 -->
                <div class="col-lg-6">
                    <!-- Card 2 - Donasi Uang -->
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Donasi Uang</h3>
                                <a href="view_report.php?report_type=donasi_uang" class="btn btn-primary">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Content untuk Donasi Uang -->
                            <p>Informasi dan statistik donasi uang...</p>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"; ?>
