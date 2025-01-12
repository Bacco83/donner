<?php
include "../koneksi.php";

if (isset($_GET['id_donasi'])) {
    $id_donasi = $_GET['id_donasi'];

    $query = "DELETE FROM donasi WHERE id_donasi = '$id_donasi'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Data berhasil dihapus.";
        header("refresh:2;url=data_donasi.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "ID Donasi tidak ditemukan.";
}
?>
