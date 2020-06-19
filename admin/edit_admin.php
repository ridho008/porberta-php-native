<?php 
require 'layout/header.php';
require '../config/functions.php';

$id = $_GET['id'];
if(isset($_POST['edit_admin'])) {
	// cek apakah berhasil di tambahkan atau tidak
	if(edit_admin($_POST) > 0) {
		echo "<script>alert('Data Berhasil Diedit.');window.location='list_admin.php';</script>";
	} else {
		echo "<script>alert('Data Gagal Diedit.')</script>";
	}
}

// $edit_kategori = query("SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
$edit_admin = query("SELECT * FROM admin WHERE id_admin = $id")[0];


?>
<div class="box">
	<h1>Edit Data Admin</h1>
	<h4>
		<small>Edit Admin</small>
		<div class="pull-right">
			<a href="list_admin.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="nama_admin">Nama Admin</label>
		<input type="hidden" name="id" id="id" value="<?= $edit_admin["id_admin"]; ?>">
		<input type="hidden" name="gambarAdminLama" value="<?= $edit_admin["gambar_admin"]; ?>">
		<input type="text" name="nama_admin" id="nama_admin" value="<?= $edit_admin["nama_admin"]; ?>" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_admin">User Admin</label><br>
		<input type="text" name="user_admin" id="user_admin" value="<?= $edit_admin["user_admin"]; ?>" readonly class="form-control">
		<small>Username admin tidak bisa di ganti.</small>
	</div>
	<div class="form-group">
		<label for="pass_admin">Password</label><br>
		<input type="password" name="pass_admin" id="pass_admin" value="<?= $edit_admin["pass_admin"]; ?>" class="form-control">
	</div>
	<div class="form-group">
			<label for="gambar_admin">Gambar</label>
			<img src="../img/admin/<?= $edit_admin["gambar_admin"]; ?>" width="50">
			<input type="file" name="gambar_admin" id="gambar_admin" value="<?= $edit_admin["gambar_admin"]; ?>" class="form-control-file">
	</div>
	<div class="form-group">
			<button type="submit" name="edit_admin" class="btn btn-primary">Edit Data Admin</button>
	</div>
</form>
</div>
<?php require 'layout/footer.php'; ?>