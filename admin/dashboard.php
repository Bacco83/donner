<?php include "header.php"; 

if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

?>

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

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Donasi Pakaian</h3>
                                <a href="#" class="btn btn-primary" onclick="generateReport('Pakaian')">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Informasi dan statistik donasi pakaian...</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Uang</h3>
                                <a href="#" class="btn btn-primary" onclick="generateReport('Uang')">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Informasi dan statistik donasi uang...</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Donasi Alat Elektronik</h3>
                                <a href="#" class="btn btn-primary" onclick="generateReport('Alat Elektronik')">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Informasi dan statistik donasi alat elektronik...</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Donasi Makanan</h3>
                                <a href="#" class="btn btn-primary" onclick="generateReport('Makanan')">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Informasi dan statistik donasi makanan...</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Donasi Semua Kategori</h3>
                                <a href="#" class="btn btn-primary" onclick="generateReport('All')">View Report</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Informasi dan statistik donasi semua kategori...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script>
    function generateReport(jenisDonasi) {
        const url = `generate_report.php?jenisDonasi=${jenisDonasi}`;
        
        window.open(url, '_blank');
    }
</script>
