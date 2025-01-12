<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Donasi</title>
    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Tambahkan Bootstrap CSS (jika belum ada) -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Tambahkan Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-lQVefH4HLhIdVuj/a6DfN1Npb1CIlOMxHbAbd8Kw4YkKhz5laQqLGkqsi6fO+2Ib" crossorigin="anonymous">
</head>
<body>

<div style="width: 80%; margin: auto;">
    <canvas id="grafikDonasi" width="400" height="200"></canvas>
</div>

<!-- Tambahkan tombol kembali dengan ikon -->
<div style="margin-top: 20px; text-align: center;">
<a href="dashboard.php" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
</a>

    </a>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Ambil data donasi dari server (ganti 'fetch_data.php' dengan skrip sisi server yang sebenarnya)
        fetch('fetch_data.php')
            .then(response => response.json())
            .then(data => {
                // Perbarui grafik dengan data yang diambil
                perbaruiGrafik(data);
            })
            .catch(error => {
                console.error('Kesalahan mengambil data:', error);
            });

        function perbaruiGrafik(data) {
            // Data donasi
            var dataDonasi = {
    labels: data.kategori,
    datasets: [{
        label: 'Jumlah Donasi',
        data: data.jumlah,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            // Konfigurasi grafik
            var konfigurasiGrafikDonasi = {
    type: 'bar',
    data: dataDonasi,
    options: {
        scales: {
            y: {
                beginAtZero: true,
                stepSize: 1 // Menetapkan langkah/jarak antar label sumbu Y
            }
        }
    }
};



            // Dapatkan elemen canvas
            var elemenCanvasGrafikDonasi = document.getElementById('grafikDonasi');

            // Buat grafik menggunakan Chart.js
            var grafikDonasi = new Chart(elemenCanvasGrafikDonasi, konfigurasiGrafikDonasi);
        }
    });
</script>

</body>
</html>
