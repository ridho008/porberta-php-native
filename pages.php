<?php  
require_once 'config/functions.php';

$id = $_GET['id'];

$query = query("SELECT * FROM tb_pages WHERE id_pages = $id")[0] or die(mysqli_error($conn));

$berita = mysqli_query($conn, "SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_berita.id_kategori = tb_kategori.id_kategori") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($berita);

$penulis = mysqli_query($conn, "SELECT * FROM admin") or die(mysqli_error($conn));
$nulis = mysqli_fetch_assoc($penulis);

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

  <title>Tentang Kami & Kontak</title>
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

<div class="container bg-light">
	<div class="row">
		<div class="col-md-7 mt-5">
			<h2><?= $query['nama_pages']; ?></h2>
			<p><?= $query['isi_pages']; ?></p>
		</div>
		<div class="col-md-5 mt-5">
			<h4>Sidebar</h4>
			<hr>
			<?php 
			$id_berita = $data['id_berita'];
			$id_kategori = $data['id_kategori'];
			$terkait = mysqli_query($conn, "SELECT * FROM tb_berita WHERE id_kategori = '$id_kategori'") or die(mysqli_error($conn));
			$kait = mysqli_fetch_assoc($terkait);

			if(mysqli_num_rows($terkait) > 0) {
				do {
					if($kait['id_berita'] != $id_berita) {
			?>
			<div class="card text-center mb-3" style="width: 15rem;">
		  <img src="img/<?= $kait['gambar_berita']; ?>" class="card-img-top" alt="...">
		  <div class="card-body">
		  	<small id="emailHelp" class="form-text text-muted">Penulis <?= $nulis['user_admin']; ?></small>
		    <p class="card-text"><a href="lihat_berita.php?id=<?= $kait['id_berita']; ?>"><?= $kait['judul_berita']; ?></a></p>
		  </div>
		</div>
	<?php } }while($kait = mysqli_fetch_assoc($terkait)); } else {echo "Tidak ada berita terkait.";} ?>
		</div>
	</div>
</div>


<div class="container-fluid bg-dark mt-5">
  <footer class="blockquote-footer text-center p-3">Ridho Surya Copyright <?= date('Y'); ?></footer>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>