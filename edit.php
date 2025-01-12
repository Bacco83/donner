<?php
include "koneksi.php";

// Pastikan id_donasi tersedia
if (isset($_GET['id'])) {
    $id_donasi = $_GET['id'];

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama_donatur = $_POST["nama_donatur"];
        $jenis_donasi = implode(", ", $_POST["jenis_donasi"]);
        $deskripsi = $_POST["deskripsi"];
        $jumlah = $_POST["jumlah"];
        $tanggal_donasi = $_POST["tanggal_donasi"];
        $alamat_donatur = $_POST["alamat_donatur"];

        // Update data in the database
        $sql = "UPDATE donasi SET 
                nama_donatur = '$nama_donatur', 
                jenis_donasi = '$jenis_donasi', 
                deskripsi = '$deskripsi', 
                jumlah = $jumlah, 
                tanggal_donasi = '$tanggal_donasi', 
                alamat_donatur = '$alamat_donatur'
                WHERE id_donasi = $id_donasi";

        if ($conn->query($sql) === TRUE) {
            echo "Data donasi berhasil diperbarui.";
            header("refresh:2;url=data_donasi.php");
    
        // Menyembunyikan formulir setelah proses edit berhasil
            echo "<script>
                     document.getElementById('editForm').style.display = 'none';
                </script>";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    } else {
        // Jika form tidak disubmit, ambil data donasi berdasarkan id
        $query = "SELECT * FROM donasi WHERE id_donasi = $id_donasi";
        $result = $conn->query($query);

        // Periksa apakah query berhasil
        if (!$result) {
            die("Query error: " . $conn->error);
        }

        // Ambil data dari hasil query
        $row = $result->fetch_assoc();

        // Assign data ke variabel
        $nama_donatur = $row['nama_donatur'];
        $jenis_donasi = $row['jenis_donasi'];
        $deskripsi = $row['deskripsi'];
        $jumlah = $row['jumlah'];
        $tanggal_donasi = $row['tanggal_donasi'];
        $alamat_donatur = $row['alamat_donatur'];
    }
} else {
    echo "ID Donasi tidak ditemukan.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Donasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Edit Donasi</h2>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_donatur">Nama Donatur:</label>
                        <input type="text" class="form-control" name="nama_donatur" value="<?php echo isset($nama_donatur) ? $nama_donatur : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Donasi:</label>
                        <div class="checkbox-group" id="jenisDonasi">
                            <?php
                            // Define the jenis_donasi options
                            $donasiOptions = array("pakaian", "sepatu", "uang", "elektronik", "tulis", "makanan");

                            // Loop through the options
                            foreach ($donasiOptions as $option) {
                                // Check if the option is selected
                                $isChecked = isset($jenis_donasi) && in_array($option, explode(", ", $jenis_donasi));
                            ?>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="jenis_donasi[]" id="<?php echo $option; ?>" value="<?php echo $option; ?>" <?php echo ($isChecked ? 'checked' : ''); ?>>
                                    <label class="custom-control-label" for="<?php echo $option; ?>"><?php echo $option; ?></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" name="deskripsi" rows="4" required><?php echo isset($deskripsi) ? $deskripsi : ''; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" class="form-control" name="jumlah" value="<?php echo isset($jumlah) ? $jumlah : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_donasi">Tanggal Donasi:</label>
                        <input type="date" class="form-control" name="tanggal_donasi" value="<?php echo isset($tanggal_donasi) ? $tanggal_donasi : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_donatur">Alamat Donatur:</label>
                        <input type="text" class="form-control" name="alamat_donatur" value="<?php echo isset($alamat_donatur) ? $alamat_donatur : ''; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="foto_produk">Unggah Foto Produk:</label>
                        <input type="file" class="form-control" name="foto_produk[]" accept="image/*" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Perbarui Donasi</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
