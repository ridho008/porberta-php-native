<?php 
session_start();
require '../config/functions.php';

// config cookie
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
	$id = $_COOKIE['id'];
	$key = $_COOKIE['key'];

	$result = mysqli_query($conn, "SELECT user_admin FROM admin WHERE id_admin = $id") or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);

	// cek cookie dan username
	if($key === hash('sha256', $row['username'])) {
		$_SESSION['login'] = true;
	}
}

if(isset($_SESSION['login'])) {
	header("Location: " . base_url('admin'));
	exit;
}

if(isset($_POST["masuk"])) {
	$username = $_POST["user_admin"];
	$password = $_POST["pass_admin"];

	// cek apakah username ada di DB ?
	$cekUsername = mysqli_query($conn, "SELECT * FROM admin WHERE user_admin = '$username'") or die(mysqli_error($conn));
	if(mysqli_num_rows($cekUsername) === 1) {
		$row = mysqli_fetch_assoc($cekUsername);
		if(password_verify($password, $row["pass_admin"])) {
			// set session
			$_SESSION['login'] = true;

			// set cookie
			if(isset($_POST['remember'])) {
				setcookie('id', $row['id_admin'], time() + 60);
				setcookie('key', hash('sha256', $row['username']), time() + 60);
			}

			header("Location: " . base_url("admin"));
			exit;
		}
	} else {
		$error = true;
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Halaman Login</title>
	<!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
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
    <!-- <form class="form-inline my-2 my-lg-0" action="cari.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari" name="keyword">
      <button class="btn btn-light my-2 my-sm-0" name="cari" type="submit">Cari</button>
    </form> -->
  </div>
</nav>

<div class="row">
	<div class="col-md-6 mt-5">
		<h3 class="text-center mt-5">Halaman Login</h3>
		<form action="" method="post" class="ml-5">
			<div class="form-group">
				<label for="user_admin">Username</label>
				<input type="text" name="user_admin" id="user_admin" required class="form-control">
			</div>
			<div class="form-group">
				<label for="pass_admin">Password</label>
				<input type="text" name="pass_admin" id="pass_admin" class="form-control">
			</div>
			<div class="form-group form-check">
				<input type="checkbox" name="remember" id="remember" class="form-check-input">
				<label for="remember">Remember Me</label>
				<a href="<?= base_url('logis/registrasi.php'); ?>" class="badge badge-info ml-1">Registrasi Account</a>
			</div>
			<div class="form-group">
				<button type="submit" name="masuk" class="btn btn-primary">Login</button>
			</div>
		</form>
	</div>
	<div class="col-md-6 regis">
		<img src="../img/regis/background.jpg">
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


	<!-- <h1>Halaman Login</h1>
	<?php if(isset($error)) : ?>
		<p style="color:red;">Username/Password anda salah.</p>
	<?php endif; ?>
	<form action="" method="post">
		<table>
			<tr>
				<td>
					<label for="user_admin">Username
						<input type="text" name="user_admin" id="user_admin">
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="pass_admin">Password
						<input type="text" name="pass_admin" id="pass_admin">
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<label for="remember">Remember
						<input type="checkbox" name="remember" id="remember" value="">
					</label>
				</td>
			</tr>
			<tr>
				<td>
					<button type="submit" name="masuk">Login</button>
				</td>
			</tr>
		</table>
	</form>
</body>
</html> -->