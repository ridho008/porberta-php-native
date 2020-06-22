<?php 
require '../config/functions.php';
require 'layout/header.php';

// mengatasi iseng menulis url
if(!isset($_GET['id'])) {
	header("Location: " . base_url('admin/list_kategori.php'));
	exit;
}

$id = $_GET['id'];
$edit_kategori = query("SELECT * FROM tb_kategori WHERE id_kategori = $id")[0];
if(isset($_POST['edit_kategori'])) {
	if(edit_kategori($_POST) > 0) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='list_kategori.php';</script>";
	} else {
		echo "<script>alert('Data Berhasil Diubah.');window.location='list_kategori.php';</script>";
	}
}

?>
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
			<input type="hidden" name="id_kategori" id="id_kategori" value="<?= $edit_kategori["id_kategori"]; ?>">
			<input type="text" name="nama_kategori" id="nama_kategori" value="<?= $edit_kategori["nama_kategori"]; ?>" class="form-control">
		</div>
		<div class="form-group">
				<button type="submit" name="edit_kategori" class="btn btn-primary">Edit Kategori</button>
		</div>
	</form>	
</div>

<?php require 'layout/footer.php'; ?>