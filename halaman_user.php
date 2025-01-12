<!DOCTYPE html>
<html>
<head>
    <title>Halaman User</title>
    <script>
        // Fungsi untuk menampilkan pesan popup
        function showPopup() {
            var popup = document.getElementById("myPopup");
            popup.classList.toggle("show");
            setTimeout(function(){ 
                // Setelah 5 detik, refresh halaman ke index.php
                window.location.href = "index.php";
            }, 5000);
        }
    </script>
    <style>
        /* Style untuk popup */
        .popup {
            display: none;
            position: fixed;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            background-color: #f1f1f1;
            border: 1px solid #d4d4d4;
            padding: 10px;
            text-align: center;
        }

        .show {
            display: block;
        }
    </style>
</head>
<body>
    <?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:index.php?pesan=gagal");
    }
 
    ?>
    <h1>Halaman User</h1>
 
    <p>Halo <b><?php echo $_SESSION['username']; ?></b> Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>
    
    <!-- Tambahkan elemen popup -->
    <div id="myPopup" class="popup">
        Anda berhasil login sebagai user. Halaman ini akan otomatis refresh ke index.php dalam 5 detik.
    </div>

    <!-- Panggil fungsi showPopup saat halaman dimuat -->
    <script>
        showPopup();
    </script>
</body>
</html>
