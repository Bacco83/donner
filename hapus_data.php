<?php
include "koneksi.php";

// Periksa apakah parameter id_donasi telah diterima melalui GET
if (isset($_GET['id_donasi'])) {
    $id_donasi = $_GET['id_donasi'];

    // Query hapus data berdasarkan id_donasi
    $query = "DELETE FROM donasi WHERE id_donasi = '$id_donasi'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil dijalankan
    if ($result) {
        echo "Data berhasil dihapus.";
        header("refresh:2;url=data_donasi.php");
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "ID Donasi tidak ditemukan.";
}
?>
