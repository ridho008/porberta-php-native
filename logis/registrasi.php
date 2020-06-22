<?php 
require_once '../config/functions.php';
// require_once '../layout/header.php';

if(isset($_POST['regis'])) {
	if(register($_POST) > 0) {
		echo "<script>alert('Akun Berhasil Ditambahkan.');window.location='login.php';</script>";
	} else {
		echo "<script>alert('Akun Gagal Ditambahkan.')</script>";
	}
}

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="<?= base_url(); ?>css/style.css">

  <title>Halaman Registrasi</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <a class="navbar-brand text-white" href="<?= base_url(); ?>">PortalDo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#">Kontak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="#" tabindex="-1" aria-disabled="true">Tentang Kami</a>
      </li>
    </ul>
    <ul class="navbar-nav float-right">
    <li class="nav-item">
        <a class="nav-link text-white btn btn-outline-secondary" href="logis/login.php" tabindex="-1" aria-disabled="true">Login</a>
      </li>
      </ul>
  </div>
</nav>

	<div class="row bg-light">
		<div class="col-md-6 regis">
			<img src="../img/regis/background.jpg">
			<h2>Selamat Datang</h2>
		</div>
		<div class="col-md-5 ml-5 mt-3 formregis">
			<form action="" method="post" enctype="multipart/form-data">
				<h3 class="text-center">Buat Akun PortalDo</h3>
					<div class="form-group">
						<label for="nama_lengkap">Nama Lengkap</label>
						<input type="text" name="nama_lengkap" id="nama_lengkap" required class="form-control">
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" name="username" id="username" required class="form-control">
						<small id="emailHelp" class="form-text text-muted"> username 8 digit, agar menjaga keamanan.</small>
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" required class="form-control">
						<small id="emailHelp" class="form-text text-muted">Wajib/lebih password 12 digit.</small>
					</div>
					<div class="form-group">
						<label for="password2">Konfir Password</label>
						<input type="password" name="password2" id="password2" required class="form-control">
					</div>
					<div class="form-group">
						<label for="gambar_admin">Foto</label>
						<input type="file" name="gambar_admin" id="gambar_admin" required class="form-control-file">
					</div>
					<div class="form-group">
						<button type="submit" name="regis" class="btn btn-primary">Register</button>
					</div>
				</form>
		</div>
	</div>

<div class="container-fluid bg-dark">
  <footer class="blockquote-footer text-center p-3">Ridho Surya Copyright <?= date('Y'); ?></footer>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>