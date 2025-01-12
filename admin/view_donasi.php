<?php
include "../koneksi.php";

if (isset($_GET['id_donasi'])) {
    $id_donasi = $_GET['id_donasi'];

    $query = "SELECT * FROM donasi WHERE id_donasi = $id_donasi";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: data_donasi.php");
    exit();
}
?>

<?php include "header.php";

if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Donasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_donatur">Nama Donatur:</label>
                        <input type="text" class="form-control" value="<?php echo $row['nama_donatur']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="jenis_donasi">Jenis Donasi:</label>
                        <input type="text" class="form-control" value="<?php echo $row['jenis_donasi']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi :</label>
                        <textarea class="form-control" readonly><?php echo $row['deskripsi']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah Donasi:</label>
                        <input type="text" class="form-control" value="<?php echo $row['jumlah']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_donasi">Tanggal Donasi :</label>
                        <input type="text" class="form-control" value="<?php echo $row['tanggal_donasi']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="alamat_donatur">Alamat Donatur:</label>
                        <input type="text" class="form-control" value="<?php echo $row['alamat_donatur']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="foto_produk">Foto Produk:</label>
                        <?php
                        $foto_produk_filenames = explode(", ", $row['foto_produk_filename']);
                        echo "<div class='foto-produk'>";
                        foreach ($foto_produk_filenames as $filename) {
                            echo "<img src='../uploads/{$filename}' alt='Foto Produk' class='img-fluid' style='width: 500px; height: 500px;'>";
                        }
                        echo "</div>";
                        ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="metode_donasi">Metode Donasi:</label>
                        <input type="text" class="form-control" value="<?php echo $row['metode_donasi']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label for="status_donasi">Status Donasi:</label>
                        <input type="text" class="form-control" value="<?php echo $row['status_donasi']; ?>" readonly>
                    </div>

                    <a href="data_donasi.php" class="btn btn-primary btn-sm">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include "footer.php"; ?>
