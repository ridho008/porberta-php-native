<?php 
session_start();
require 'config/db_connect.php';
require 'config/functions.php';
// include_once 'layout/header.php';


$query = query("SELECT * FROM tb_berita INNER JOIN
								tb_kategori ON tb_berita.id_kategori = tb_kategori.id_kategori
	") or die(mysqli_error($conn));

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
  <link rel="stylesheet" href="css/style.css">

  <title>Portal Berita Terbaru</title>
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
        <a class="nav-link text-white" href="pages.php?id=1">Kontak</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="pages.php?id=2" tabindex="-1" aria-disabled="true">Tentang Kami</a>
      </li>
      <?php if(!isset($_SESSION['login'])) : ?>
      <li class="nav-item">
        <a class="nav-link text-white" href="logis/login.php" tabindex="-1" aria-disabled="true">Login</a>
      </li>
      <?php else : ?>
        <li class="nav-item">
        <a class="nav-link text-danger btn btn-light" href="<?= base_url('admin'); ?>" tabindex="-1" aria-disabled="true">Dashboard</a>
      </li>
      <li class="nav-item" style="display: none;">
        <a class="nav-link text-white" href="logis/login.php" tabindex="-1" aria-disabled="true">Login</a>
      </li>
    <?php endif; ?>
    </ul>
    <ul class="navbar-nav float-right">
    <li class="nav-item">
        <a class="nav-link text-white" href="logis/registrasi.php" tabindex="-1" aria-disabled="true">Register</a>
      </li>
      </ul>
    <form class="form-inline my-2 my-lg-0" action="cari.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Cari" name="keyword">
      <button class="btn btn-light my-2 my-sm-0" name="cari" type="submit">Cari</button>
    </form>
  </div>
</nav>

<div class="container mt-4">
	<h1 class="text-dark text-center">Berita Terbaru</h1>
	<div class="row">

		<?php foreach($query as $q) : ?>
		<div class="col-md-3">
			<div class="card gambar mt-2" style="width: 14rem;">
			  <img src="img/<?= $q['gambar_berita']; ?>" class="card-img-top">
			  <div class="card-body">
			    <h6 class="card-title"><a href="lihat_berita.php?id=<?= $q['id_berita']; ?>"><?= $q['judul_berita']; ?></a></h6>
			    <p class="card-text"><small class="form-text text-muted">Dirilis <?= tanggal($q['tgl']); ?></small></p>
			    <p><a href="kategori.php?id=<?= $q['id_kategori']; ?>" class="badge badge-danger"><?= $q['nama_kategori']; ?></a></p>
			    <a href="lihat_berita.php?id=<?= $q['id_berita']; ?>" class="btn btn-danger">Lihat</a>
			  </div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="container-fluid bg-dark mt-3">
  <footer class="blockquote-footer text-center p-3">Ridho Surya Copyright <?= date('Y'); ?></footer>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>