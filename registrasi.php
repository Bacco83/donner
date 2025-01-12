<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Donner</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Registrasi Donner</h1>

    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == "gagal") {
            echo "<div class='alert'>Registrasi gagal. Silakan coba lagi!</div>";
        }
    }
    ?>

    <div class="kotak_login">
        <p class="tulisan_login">Silahkan registrasi</p>

        <form action="register_proses.php" method="post">
            <label>Username</label>
            <input type="text" name="username" class="form_login" placeholder="Username .." required="required">

            <label>Password</label>
            <input type="text" name="password" class="form_login" placeholder="Password .." required="required">

            <label>Nama</label>
            <input type="text" name="nama" class="form_login" placeholder="Nama .." required="required">

            <label>Level</label>
            <select name="level" class="form_login">
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <input type="submit" class="tombol_login" value="REGISTRASI">

            <br/>
            <br/>
            <center>
                <a class="link" href="index.php">Kembali</a>
                <span> | </span>
                <a class="link" href="login.php">Login</a>
            </center>
        </form>
    </div>

</body>
</html>
