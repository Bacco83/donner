<?php
require('fpdf186/fpdf.php');

include "../koneksi.php";

$jenisDonasi = isset($_GET['jenisDonasi']) ? $_GET['jenisDonasi'] : null;
$filename = 'Donation_Report';

if ($jenisDonasi) {
    $filename .= '_' . $jenisDonasi;
}

$pdf = new FPDF('L');
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 16);

if ($jenisDonasi) {
    $pdf->Cell(0, 10, 'Donation Report - ' . $jenisDonasi, 0, 1, 'C');
} else {
    $pdf->Cell(0, 10, 'Donation Report - All', 0, 1, 'C');
}

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Nama Donatur', 1);
$pdf->Cell(40, 10, 'Jenis Donasi', 1);
$pdf->Cell(30, 10, 'Jumlah', 1);
$pdf->Cell(40, 10, 'Tanggal Donasi', 1);
$pdf->Cell(100, 10, 'Status Donasi', 1);
$pdf->Ln();

$query = "SELECT * FROM donasi";

if ($jenisDonasi && $jenisDonasi !== 'All') {
    $query .= " WHERE jenis_donasi = '$jenisDonasi'";
}

$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30, 10, $row['id_donasi'], 1);
    $pdf->Cell(40, 10, $row['nama_donatur'], 1);
    $pdf->Cell(40, 10, $row['jenis_donasi'], 1);
    $pdf->Cell(30, 10, $row['jumlah'], 1);
    $pdf->Cell(40, 10, $row['tanggal_donasi'], 1);
    $pdf->Cell(100, 10, $row['status_donasi'], 1);
    $pdf->Ln();
}

$pdfContent = $pdf->Output('', 'S');
$pdfBase64 = base64_encode($pdfContent);

echo '<embed src="data:application/pdf;base64,' . $pdfBase64 . '" type="application/pdf" width="100%" height="600px" />';
?>
