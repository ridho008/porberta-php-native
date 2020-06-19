<?php 
require 'layout/header.php';
require '../config/functions.php';

if(isset($_POST['tambah_kategori'])) {
	if(tambah_kategori($_POST) > 0) {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='list_kategori.php';</script>";
	} else {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='list_kategori.php';</script>";
	}
}

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tambah Kategori</title>
</head>
<body>
	<h1>Halaman Tambah Kategori</h1>
	<form action="" method="post">
		<ul>
			<li>
				<label for="nama_kategori">Nama Kategori</label>
				<input type="text" name="nama_kategori" id="nama_kategori">
			</li>
		</ul>
		<ul>
			<li>
				<button type="submit" name="tambah_kategori">Tambah Kategori</button>
			</li>
		</ul>
	</form>
</body>
</html> -->
<div class="box">
	<h1>Tambah Data Kategori</h1>
	<h4>
		<small>Tambah Kategori</small>
		<div class="pull-right">
			<a href="list_kategori.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>

<form action="" method="post">
	<div class="form-group">
		<label for="nama_kategori">Nama Kategori</label>
		<input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
	</div>
	<div class="form-group">
		<button type="submit" name="tambah_kategori" class="btn btn-primary">Tambah Kategori</button>
	</div>
</form>

</div>
<?php require 'layout/footer.php'; ?>