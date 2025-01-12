<?php
include "header.php";

if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

include "../koneksi.php";

$user_id = $_SESSION['user_id'];
$nama_donatur = $_SESSION['nama'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $jenis_donasi = $_POST['jenis_donasi'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $tanggal_donasi = $_POST['tanggal_donasi'];
    $alamat_donatur = $_POST['alamat_donatur'];
    $metode_donasi = $_POST['metode_donasi'];
    $status_donasi = "Menunggu Verifikasi";

    $new_photo = $_FILES['new_photo'];
    $new_photo_filename = $new_photo['name'];
    $new_photo_path = '../uploads/' . $new_photo_filename;
    move_uploaded_file($new_photo['tmp_name'], $new_photo_path);

    $query = "INSERT INTO donasi (id_donatur, nama_donatur, jenis_donasi, deskripsi, jumlah, tanggal_donasi, alamat_donatur, foto_produk_filename, foto_produk_path, metode_donasi, status_donasi)
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "issssssssss", $user_id, $nama_donatur, $jenis_donasi, $deskripsi, $jumlah, $tanggal_donasi, $alamat_donatur, $new_photo_filename, $new_photo_path, $metode_donasi, $status_donasi);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
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
                    <h1>Tambah Data Donasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id_donatur" value="<?php echo $_SESSION['user_id']; ?>">

                        <div class="form-group">
                            <label for="nama_donatur">Nama Donatur:</label>
                            <input type="text" class="form-control" name="nama_donatur" value="<?php echo $_SESSION['nama']; ?>">
                        </div>

                        <div class="form-group">
                            <label for="jenis_donasi">Jenis Donasi:</label>
                            <select class="form-control" name="jenis_donasi" required>
                                <option value="Pakaian">Pakaian</option>
                                <option value="Uang">Uang</option>
                                <option value="Alat Elektronik">Alat Elektronik</option>
                                <option value="Makanan">Makanan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi:</label>
                            <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="jumlah">Jumlah Donasi:</label>
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_donasi">Tanggal Donasi:</label>
                            <input type="date" class="form-control" name="tanggal_donasi" required>
                        </div>

                        <div class="form-group">
                            <label for="alamat_donatur">Alamat Donatur:</label>
                            <input type="text" class="form-control" name="alamat_donatur" required>
                        </div>

                        <div class="form-group">
                            <label for="new_photo">Foto Produk:</label>
                            <br>
                            <input type="file" name="new_photo">
                        </div>

                        <div class="form-group">
                            <input type="hidden" class="form-control" name="foto_produk_path" value="NULL" readonly>
                        </div>

                        <div class="form-group">
                            <label for="metode_donasi">Metode Donasi:</label>
                            <select class="form-control" name="metode_donasi" required>
                                <option value="Kirim Ke Kantor">Kirim Ke Kantor</option>
                                <option value="Diambil Oleh Petugas">Diambil Oleh Petugas</option>
                            </select>
                        </div>

                        <input type="hidden" name="status_donasi" value="Menunggu Verifikasi">

                        <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include "footer.php"; ?>