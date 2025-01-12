<!DOCTYPE html>
<html>

<head>
    <title>Halaman admin</title>
</head>

<?php include "header_admin.php"; ?>

<body>
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard Donasi</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Donasi Barang</h3>
                                    <a href="view_report.php?report_type=donasi_barang" class="btn btn-primary">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Informasi dan statistik donasi barang...</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Donasi Uang</h3>
                                    <a href="view_report.php?report_type=donasi_uang" class="btn btn-primary">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p>Informasi dan statistik donasi uang...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php include "footer.php"; ?>

</html>