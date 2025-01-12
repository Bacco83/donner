<?php
include "koneksi.php";

// Fetch all data
$query = "SELECT * FROM donasi";
$result = mysqli_query($conn, $query);

// Check if query is successful
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$search = isset($_GET['search']) ? $_GET['search'] : '';
$dateFilter = isset($_GET['date_filter']) ? $_GET['date_filter'] : '';

// Check if $search is set before using it
if (isset($search)) {
    $query = "SELECT * FROM donasi WHERE 
                (nama_donatur LIKE '%$search%' OR jenis_donasi LIKE '%$search%' OR deskripsi LIKE '%$search%')";
} else {
    $query = "SELECT * FROM donasi";
}

// Add date filter if provided
if (!empty($dateFilter)) {
    $query .= " AND tanggal_donasi = '$dateFilter'";
}

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<?php include "header.php"?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data yang sudah donasi</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <!-- Search and Date Filter Form -->
                    <form action="" method="GET">
                    <div class="form-row">
    <div class="col-md-6 mb-3">
        <label for="search">Search:</label>
        <div class="input-group">
            <input type="text" class="form-control" name="search" value="<?php echo $search; ?>">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <label for="date_filter">Date:</label>
        <input type="date" class="form-control" name="date_filter" value="<?php echo $dateFilter; ?>">
    </div>
</div>
</form>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Donatur</th>
                                    <th>Jenis Donasi</th>
                                    <th>Deskripsi</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal Donasi</th>
                                    <th>Alamat Donatur</th>
                                    <th>Foto Produk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>{$i}</td>";
                                    echo "<td>{$row['nama_donatur']}</td>";
                                    echo "<td>{$row['jenis_donasi']}</td>";
                                    echo "<td>{$row['deskripsi']}</td>";
                                    echo "<td>{$row['jumlah']}</td>";
                                    echo "<td>{$row['tanggal_donasi']}</td>";
                                    echo "<td>{$row['alamat_donatur']}</td>";

                                    $foto_produk_filenames = explode(", ", $row['foto_produk_filename']);
                                    echo "<td class='foto-produk'>";
                                    foreach ($foto_produk_filenames as $filename) {
                                        echo "<img src='uploads/{$filename}' alt='Foto Produk' class='img-fluid'>";
                                    }
                                    echo "</td>";

                                    echo "<td>
                                        <a href='edit.php?id={$row['id_donasi']}' class='btn btn-warning btn-sm'>Edit</a>
                                        <a href='hapus_data.php?id_donasi={$row['id_donasi']}' onclick='return confirm(\"Anda yakin akan menghapus data ini?\")' class='btn btn-danger btn-sm'>Hapus</a>
                                        </td>";
                                    echo "</tr>";
                                    $i++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include "footer.php"?>
