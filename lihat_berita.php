<?php  
require 'config/functions.php';
// require_once 'layout/header.php';
$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM tb_berita
				 INNER JOIN tb_kategori ON tb_berita.id_kategori = tb_kategori.id_kategori WHERE id_berita = '$id'") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($query);
// $post = query("SELECT * FROM tb_berita WHERE id_kategori = '$id'");
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
  <link rel="stylesheet" href="css/style.css">

  <title></title>
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
    </div>
  </div>
</nav>
</div>

<div class="container mt-4">
	<div class="row">

	<div class="col-md-4 text-center">
		<h4>Postingan Lainnya</h4>
		<?php 
		$id_berita = $data['id_berita'];
		$id_kategori = $data['id_kategori'];
		$terkait = mysqli_query($conn, "SELECT * FROM tb_berita WHERE id_kategori = '$id_kategori'");
		$kait = mysqli_fetch_assoc($terkait);

		if(mysqli_num_rows($terkait) > 0) {
		do {
			if($kait['id_berita'] != $id_berita) {
		?>
		<div class="card text-center mb-3" style="width: 18rem;">
		  <img src="img/<?= $kait['gambar_berita']; ?>" class="card-img-top" alt="...">
		  <div class="card-body">
		    <p class="card-text"><a href="lihat_berita.php?id=<?= $kait['id_berita']; ?>"><?= $kait['judul_berita']; ?></a></p>
		  </div>
		</div>
		<?php } }while($kait = mysqli_fetch_assoc($terkait)); }else{echo "Tidak ada berita terkait.";}?>
	</div>
	<div class="col-md-8 feature-img">
		<p class="card-text"><small class="form-text text-muted">Penulis <?= $nulis['user_admin']; ?></small></p>
		<?php foreach($query as $q) : ?>
		<h3><?= $q['judul_berita']; ?></h3>
		<img src="img/<?= $q['gambar_berita']; ?>">
		<p class="card-text"><small class="form-text text-muted">Dirilis <?= tanggal($q['tgl']); ?></small></p>
		<p><?= $q['isi_berita']; ?></p>
		
	<?php endforeach; ?>
	
	</div>
	</div>
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