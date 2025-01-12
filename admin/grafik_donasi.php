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
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        #grafikContainer {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            margin-top: 25px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        canvas {
            width: 100%;
            max-width: 600px;
            height: auto;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <label for="jenisDonasi">Jenis Donasi:</label>
        <select id="jenisDonasi" name="jenisDonasi">
            <option value="all">Semua Jenis Donasi</option>
            <option value="Pakaian">Pakaian</option>
            <option value="Uang">Uang</option>
            <option value="Alat Elektronik">Alat Elektronik</option>
            <option value="Makanan">Makanan</option>
        </select>
        <button onclick="tampilkanGrafik()">Tampilkan Grafik</button>
        <div id="grafikContainer">
            <canvas id="grafikDonasi" width="400" height="200"></canvas>
        </div>
    </div>

    <div style="margin-top: 20px; text-align: center;">
        <a href="dashboard.php" class="btn btn-primary">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            tampilkanGrafik();
        });

        function tampilkanGrafik() {
            var jenisDonasi = document.getElementById('jenisDonasi').value;

            fetch(`fetch_data.php?jenisDonasi=${jenisDonasi}`)
                .then(response => response.json())
                .then(data => {
                    Chart.getChart("grafikDonasi")?.destroy();
                    perbaruiGrafik(data);
                })
                .catch(error => {
                    console.error('Kesalahan mengambil data:', error);
                });
        }

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
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            };

            var konfigurasiGrafikDonasi = {
                type: 'bar',
                data: dataDonasi,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1
                        }
                    }
                }
            };

            var elemenCanvasGrafikDonasi = document.getElementById('grafikDonasi');

            var grafikDonasi = new Chart(elemenCanvasGrafikDonasi, konfigurasiGrafikDonasi);
        }
    </script>

</body>

</html>
