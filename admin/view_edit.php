<?php include "header.php"; 

if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}

?>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_donatur = $_POST['nama_donatur'];
    $jenis_donasi = $_POST['jenis_donasi'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $tanggal_donasi = $_POST['tanggal_donasi'];
    $alamat_donatur = $_POST['alamat_donatur'];
    $foto_produk_filename = $_POST['foto_produk_filename'];
    $foto_produk_path = $_POST['foto_produk_path'];
    $metode_donasi = $_POST['metode_donasi'];
    $status_donasi = $_POST['status_donasi'];

    if ($_FILES['new_photo']['size'] > 0) {
        $new_photo = $_FILES['new_photo'];
        $new_photo_filename = $new_photo['name'];
        $new_photo_path = '../uploads/' . $new_photo_filename;

        move_uploaded_file($new_photo['tmp_name'], $new_photo_path);

        $query = "UPDATE donasi SET
                    nama_donatur = '$nama_donatur',
                    jenis_donasi = '$jenis_donasi',
                    deskripsi = '$deskripsi',
                    jumlah = $jumlah,
                    tanggal_donasi = '$tanggal_donasi',
                    alamat_donatur = '$alamat_donatur',
                    foto_produk_filename = '$new_photo_filename',
                    foto_produk_path = '$new_photo_path',
                    metode_donasi = '$metode_donasi',
                    status_donasi = '$status_donasi'
                    WHERE id_donasi = $id_donasi";
    } else {
        $query = "UPDATE donasi SET
                    nama_donatur = '$nama_donatur',
                    jenis_donasi = '$jenis_donasi',
                    deskripsi = '$deskripsi',
                    jumlah = $jumlah,
                    tanggal_donasi = '$tanggal_donasi',
                    alamat_donatur = '$alamat_donatur',
                    metode_donasi = '$metode_donasi',
                    status_donasi = '$status_donasi'
                    WHERE id_donasi = $id_donasi";
    }

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: data_donasi.php");
        exit();
    } else {
        die("Query error: " . mysqli_error($conn));
    }
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Donasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Form Edit Data -->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_donatur">Nama Donatur:</label>
                            <input type="text" class="form-control" name="nama_donatur" value="<?php echo $row['nama_donatur']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="jenis_donasi">Jenis Donasi:</label>
                            <select class="form-control" name="jenis_donasi" required>
                                <option value="Pakaian" <?php echo ($row['jenis_donasi'] == 'Pakaian') ? 'selected' : ''; ?>>Pakaian</option>
                                <option value="Uang" <?php echo ($row['jenis_donasi'] == 'Uang') ? 'selected' : ''; ?>>Uang</option>
                                <option value="Alat Elektronik" <?php echo ($row['jenis_donasi'] == 'Alat Elektronik') ? 'selected' : ''; ?>>Alat Elektronik</option>
                                <option value="Makanan" <?php echo ($row['jenis_donasi'] == 'Makanan') ? 'selected' : ''; ?>>Makanan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" rows="3"><?php echo $row['deskripsi']; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah Donasi:</label>
                            <input type="number" class="form-control" name="jumlah" value="<?php echo $row['jumlah']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_donasi">Tanggal Donasi:</label>
                            <input type="date" class="form-control" name="tanggal_donasi" value="<?php echo $row['tanggal_donasi']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat_donatur">Alamat Donatur:</label>
                            <input type="text" class="form-control" name="alamat_donatur" value="<?php echo $row['alamat_donatur']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="foto_produk_filename">Foto Produk:</label>
                            <?php
                            $foto_produk_filenames = explode(", ", $row['foto_produk_filename']);
                            echo "<div class='foto-produk'>";
                            foreach ($foto_produk_filenames as $filename) {
                                echo "<img src='../uploads/{$filename}' alt='Foto Produk' class='img-fluid' style='width: 500px; height: 500px;'>";
                            }
                            echo "</div>";
                            ?>
                            <br>
                            <label for="new_photo">Pilih Foto Baru:</label>
                            <input type="file" name="new_photo">
                        </div>
                        
                        <div class="form-group">
                            <label for="foto_produk_path">Foto Produk Path:</label>
                            <?php
                            $foto_produk_path = '../uploads/' . $row['foto_produk_filename'];
                            ?>
                            <input type="text" class="form-control" name="foto_produk_path" value="<?php echo $foto_produk_path; ?>" readonly>
                        </div>


                        <div class="form-group">
                            <label for="metode_donasi">Metode Donasi:</label>
                            <select class="form-control" name="metode_donasi" required>
                                <option value="Kirim Ke Kantor" <?php echo ($row['metode_donasi'] == 'Kirim Ke Kantor') ? 'selected' : ''; ?>>Kirim Ke Kantor</option>
                                <option value="Diambil Oleh Petugas" <?php echo ($row['metode_donasi'] == 'Diambil Oleh Petugas') ? 'selected' : ''; ?>>Diambil Oleh Petugas</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status_donasi">Status Donasi:</label>
                            <select class="form-control" name="status_donasi" required>
                                <option value="Menunggu Verifikasi" <?php echo ($row['status_donasi'] == 'Menunggu Verifikasi') ? 'selected' : ''; ?>>Menunggu Verifikasi</option>
                                <option value="Pengajuan Donasi Diterima" <?php echo ($row['status_donasi'] == 'Pengajuan Donasi Diterima') ? 'selected' : ''; ?>>Pengajuan Donasi Diterima</option>

                                <option value="Donasi Diterima" <?php echo ($row['status_donasi'] == 'Donasi Diterima') ? 'selected' : ''; ?>>Donasi Diterima</option>
                                <option value="Donasi Sedang Diambil Oleh Petugas" <?php echo ($row['status_donasi'] == 'Donasi Sedang Diambil Oleh Petugas') ? 'selected' : ''; ?>>Donasi Sedang Diambil Oleh Petugas</option>
                                <option value="Pengajuan Donasi Ditolak" <?php echo ($row['status_donasi'] == 'Pengajuan Donasi Ditolak') ? 'selected' : ''; ?>>Pengajuan Donasi Ditolak</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include "footer.php"; ?>