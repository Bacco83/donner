<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $nama = $_POST["nama"];
    $level = $_POST["level"];

    $cek_username = mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    if (mysqli_num_rows($cek_username) > 0) {
        header("location: register.php?pesan=gagal");
        exit();
    }

    $query = "INSERT INTO user (username, password, nama, level) VALUES ('$username', '$password', '$nama', '$level')";
    if (mysqli_query($conn, $query)) {
        session_start();
        $_SESSION['user_id'] = mysqli_insert_id($conn);
        $_SESSION['username'] = $username;
        $_SESSION['nama'] = $nama;
        $_SESSION['level'] = $level;

        if ($level == 'admin') {
            header("location: admin/dashboard.php");
        } elseif ($level == 'user') {
            header("location: donatur/kata_pengantar.php");
        }
    } else {
        header("location: register.php?pesan=gagal");
    }
}
?>
