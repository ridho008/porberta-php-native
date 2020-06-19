<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Portal Berita Terbaru</title>
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url(); ?>">PortalDo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="#">Kontak</a>
      <a class="nav-item nav-link" href="#">Tentang</a>
      <a class="nav-item nav-link" href="#">Ok</a>
    </div>
    <form class="form-inline">
      <input class="form-control mr-sm-2">
      
    </form>
  </div>
</nav>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Berita</title>
</head>
<body>
  <ul>
    <?php foreach($query as $q) : ?>
    <li>
      <img src="<?= base_url('img/'); ?><?= $q['gambar_berita']; ?>" width="100">
    </li>
    <li>
      <h3><a href="lihat_berita.php?id=<?= $q['id_berita']; ?>"><?= $q['judul_berita']; ?></a></h3>
    </li>
    <li><a href="kategori.php?id=<?= $q['id_kategori']; ?>"><?= $q['nama_kategori']; ?></a></li>
    <li><?= $q['tgl']; ?></li>
    <li><a href="lihat_berita.php?id=<?= $q['id_berita']; ?>">Lihat</a></li>
  <?php endforeach; ?>
  </ul>
</body>
</html>
<?php require_once 'layout/footer.php'; ?> -->