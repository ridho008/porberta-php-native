<?php 
require 'config/functions.php';
// include_once "layout/header.php";
$id = $_GET['id'];

$query = query("SELECT * FROM tb_berita WHERE id_kategori = '$id'");
?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">

  <title>Portal Berita Terbaru</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
<div class="container">
  <a class="navbar-brand text-white" href="<?= base_url(); ?>">PortalDo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link text-white" href="#">Kontak</a>
      <a class="nav-item nav-link text-white" href="#">Tentang</a>
      <a class="nav-item nav-link text-white float-right" href="logis/login.php">Login</a>
    </div>
  </div>
</nav>
</div>

<div class="container mt-4">
	<h1 class="text-dark text-center">Berita Terbaru</h1>
	<div class="row">

		<?php foreach($query as $q) : ?>
		<div class="col-md-3">
			<div class="card gambar mt-2" style="width: 14rem;">
			  <img src="img/<?= $q['gambar_berita']; ?>" class="card-img-top">
			  <div class="card-body">
			    <h5 class="card-title"><a href="lihat_berita.php?id=<?= $q['id_berita']; ?>"><?= $q['judul_berita']; ?></a></h5>
			    <p class="card-text"><?= tanggal($q['tgl']); ?></p>
			    <a href="lihat_berita.php?id=<?= $q['id_berita']; ?>" class="btn btn-danger">Lihat</a>
			  </div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>
</div>

<div class="container-fluid bg-dark mt-4">
  <footer class="blockquote-footer text-center p-3">Ridho Surya Copyright <?= date('Y'); ?></footer>
</div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>