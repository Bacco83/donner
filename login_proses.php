<?php

require_once 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password, level, nama FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $dbUsername, $dbPassword, $level, $nama);
        $stmt->fetch();

        if ($password === $dbPassword) {
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $dbUsername;
            $_SESSION['level'] = $level;
            $_SESSION['nama'] = $nama;


            if ($level === 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: donatur/kata_pengantar.php");
            }
            exit;
        } else {
            echo "Password salah.";
        }
    } else {
        echo "Username tidak ditemukan.";
    }

    $stmt->close();
}

?>
