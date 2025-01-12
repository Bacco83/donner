<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
            background-color: #f8f9fa;
            transition: background-color 0.3s ease; /* Transisi warna latar belakang dengan durasi 0.3 detik */
        }

        .form-container {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px #000000;
            transition: box-shadow 0.3s ease; /* Transisi bayangan dengan durasi 0.3 detik */
        }

        .form-container:hover {
            box-shadow: 0px 0px 20px 0px #000000; /* Bayangan yang berbeda saat dihover */
        }

        .form-container:hover,
        .form-container:hover body {
            background-color: #e2e6ea; /* Warna latar belakang yang berbeda saat dihover */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-check-input {
            margin-top: 6px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h2 class="text-center mb-4">Form Donasi</h2>
        <form action="proses_donasi.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_donatur">Nama Donatur:</label>
                <input type="text" class="form-control" name="nama_donatur" required>
            </div>
            <div class="form-group">
                <label>Jenis Donasi:</label>
                <div class="checkbox-group" id="jenisDonasi">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_donasi[]" value="pakaian">
                        <label class="form-check-label">Pakaian</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_donasi[]" value="sepatu">
                        <label class="form-check-label">Sepatu</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_donasi[]" value="uang">
                        <label class="form-check-label">Uang</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_donasi[]" value="elektronik">
                        <label class="form-check-label">Alat Elektronik</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_donasi[]" value="tulis">
                        <label class="form-check-label">Alat Tulis</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="jenis_donasi[]" value="makanan">
                        <label class="form-check-label">Makanan</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
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
                <label for="foto_produk">Unggah Foto Produk:</label>
                <input type="file" class="form-control" name="foto_produk[]" accept="image/*" multiple>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Donasi Sekarang</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
