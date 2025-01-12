<?php
// Sertakan kode koneksi database Anda di sini
include "koneksi.php";

$koneksi = mysqli_connect("localhost", "root", "", "donner");

// Ambil data dari database (ganti 'your_query_here' dengan query sesungguhnya)
$query = "SELECT jenis_donasi, SUM(jumlah) AS total FROM donasi GROUP BY jenis_donasi";
$result = mysqli_query($koneksi, $query);

// Persiapkan data untuk respons JSON
$data = [
    'kategori' => [],
    'jumlah' => []
];

while ($row = mysqli_fetch_assoc($result)) {
    $data['kategori'][] = $row['jenis_donasi']; // Menggunakan 'kategori' bukan 'jenis_donasi'
    $data['jumlah'][] = (int)$row['total'];
}

// Output JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
