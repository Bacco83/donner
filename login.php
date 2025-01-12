<!DOCTYPE html>
<html>
<head>
	<title>Login Donner</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Selamat Datang <br/> Di aplikasi Donner!</h1>

	<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
		}
	}
	?>

	<div class="kotak_login">
		<p class="tulisan_login">Silahkan login</p>

		<form action="login_proses.php" method="post">
			<label>Username</label>
			<input type="text" name="username" class="form_login" placeholder="Username .." required="required">

			<label>Password</label>
			<input type="text" name="password" class="form_login" placeholder="Password .." required="required">

			<input type="submit" class="tombol_login" value="LOGIN">

			<br/>
			<br/>
			<center>
                <a class="link" href="index.php">Kembali</a>
                <span> | </span> 
                <a class="link" href="registrasi.php">Registrasi</a>
            </center>
		</form>
	</div>

</body>
</html>
