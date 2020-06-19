<?php 
require 'layout/header.php';
require '../config/functions.php';

if(isset($_POST['tambah_admin'])) {
	// cek apakah berhasil di tambahkan atau tidak
	if(tambah_admin($_POST) > 0) {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='list_admin.php';</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan.')</script>";
	}
}


?>
<div class="box">
	<h1>Tambah Data Admin</h1>
	<h4>
		<small>Tambah Admin</small>
		<div class="pull-right">
			<a href="list_admin.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nama_admin">Nama Admin</label>
		<input type="text" name="nama_admin" id="nama_admin" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_admin">User Admin</label><br>
		<input type="text" name="user_admin" id="user_admin" class="form-control">
	</div>
	<div class="form-group">
			<label for="pass_admin">Password</label><br>
			<input type="text" name="pass_admin" id="pass_admin" class="form-control">
	</div>
	<div class="form-group">
			<label for="gambar_admin">Gambar</label>
			<input type="file" name="gambar_admin" id="gambar_admin" class="form-control-file">
	</div>
	<div class="form-group">
			<button type="submit" name="tambah_admin" class="btn btn-primary">Tambah Data Admin</button>
	</div>
</form>
</div>

<?php require 'layout/footer.php'; ?>