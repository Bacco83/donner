<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_donatur = $_POST["nama_donatur"];
    $jenis_donasi = implode(", ", $_POST["jenis_donasi"]);
    $deskripsi = $_POST["deskripsi"];
    $jumlah = $_POST["jumlah"];
    $tanggal_donasi = $_POST["tanggal_donasi"];
    $alamat_donatur = $_POST["alamat_donatur"];

    // Upload foto_produk
    $targetDir = "uploads/";
    $foto_produk = $_FILES["foto_produk"];
    $foto_produk_filenames = [];
    $targetFilePaths = [];

    foreach ($foto_produk["name"] as $key => $filename) {
        if (!empty($filename)) {
            $targetFilePath = $targetDir . basename($filename);
            move_uploaded_file($foto_produk["tmp_name"][$key], $targetFilePath);
            $foto_produk_filenames[] = $filename;
            $targetFilePaths[] = $targetFilePath;
        }
    }

    // Masukkan data ke database dengan prepared statement
    $sql = "INSERT INTO donasi (nama_donatur, jenis_donasi, deskripsi, jumlah, tanggal_donasi, alamat_donatur, foto_produk_filename, foto_produk_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("sssissss", $nama_donatur, $jenis_donasi, $deskripsi, $jumlah, $tanggal_donasi, $alamat_donatur, $foto_produk_filenames_str, $targetFilePaths_str);

    $foto_produk_filenames_str = implode(", ", $foto_produk_filenames);
    $targetFilePaths_str = implode(", ", $targetFilePaths);

    if ($stmt->execute()) {
        echo "Donasi berhasil ditambahkan.";
        header("refresh:2;url=dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    $stmt->close();
    $koneksi->close();
}

?>
