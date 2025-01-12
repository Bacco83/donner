<?php
include "../koneksi.php";

function getDataDonasi($jenisDonasi = null, $rentangWaktu = null)
{
    global $conn;

    $whereClause = "";

    if ($jenisDonasi && $jenisDonasi !== 'all') {
        $whereClause .= " WHERE jenis_donasi = '$jenisDonasi'";
    }

    if ($rentangWaktu) {
        $whereClause .= ($whereClause === "") ? " WHERE" : " AND";
        $whereClause .= " tanggal_donasi >= DATE_SUB(NOW(), INTERVAL $rentangWaktu)";
    }

    $query = "SELECT jenis_donasi, COUNT(*) as jumlah_donasi FROM donasi $whereClause GROUP BY jenis_donasi";
    $result = mysqli_query($conn, $query);

    $data = array(
        'kategori' => array(),
        'jumlah' => array()
    );

    while ($row = mysqli_fetch_assoc($result)) {
        $data['kategori'][] = $row['jenis_donasi'];
        $data['jumlah'][] = $row['jumlah_donasi'];
    }

    return $data;
}

$jenisDonasi = isset($_GET['jenisDonasi']) ? $_GET['jenisDonasi'] : null;
$rentangWaktu = isset($_GET['rentangWaktu']) ? $_GET['rentangWaktu'] : null;

$dataDonasi = getDataDonasi($jenisDonasi, $rentangWaktu);

echo json_encode($dataDonasi);

mysqli_close($conn);
?>
