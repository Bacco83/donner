<?php include "header.php"; 

if (!isset($_SESSION['user_id']) || $_SESSION['level'] !== 'user') {
    header("Location: ../login.php");
    exit();
}

?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kata Pengantar</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="alert alert-info">
                <h4>Selamat datang di Aplikasi Donner!</h4>
                <p>Aplikasi ini hadir sebagai wujud kepedulian dan solusi inovatif dalam menghubungkan para dermawan dengan mereka yang membutuhkan bantuan. Dengan latar belakang keinginan untuk mengurangi limbah barang yang sudah tidak terpakai, kami merancang platform ini sebagai sarana untuk memudahkan proses berdonasi barang secara efisien dan bermanfaat.</p>
                <p>Tujuan utama dari Aplikasi Donner adalah membuka pintu kesempatan bagi semua individu yang ingin memberikan kontribusi positif terhadap masyarakat. Dengan berdonasi, kita tidak hanya memberikan bantuan kepada mereka yang membutuhkan, tetapi juga ikut serta dalam upaya melibatkan masyarakat dalam aksi sosial yang nyata.</p>
                <p>Melalui fitur-fitur yang disediakan dalam aplikasi ini, para donatur dapat dengan mudah menyumbangkan barang-barang yang tidak terpakai kepada pihak yang membutuhkan. Hal ini tidak hanya membantu orang-orang yang kurang beruntung, tetapi juga mengurangi jumlah limbah yang dihasilkan oleh barang-barang yang sudah lama tidak digunakan.</p>
                <p>Semoga melalui Aplikasi Donner ini, kita dapat bersama-sama menciptakan lingkungan yang lebih berdaya dan saling mendukung. Mari bergabung dalam gerakan kebaikan ini dan berikan sentuhan positif pada kehidupan mereka yang membutuhkan bantuan. Terima kasih atas partisipasi dan dukungan Anda!</p>
                <strong>Salam,<br>Tim Aplikasi Donner</strong>
            </div>
        </div>
    </section>
</div>

<?php include "footer.php"; ?>
