<?php 
require '../config/functions.php';
require 'layout/header.php';

$id = $_GET['id'];

$pages = query("SELECT * FROM tb_pages WHERE id_pages = $id")[0];
$kategori = query("SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");

if(isset($_POST['editPage'])) {
	// cek apakah berhasil di tambahkan atau tidak
	if(edit_pages($_POST) > 0) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='page_kontak.php?id=1'</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.')</script>";
	}
}



?>
<div class="box">
	<h1>Edit Data Berita</h1>
	<h4>
		<small>Edit Berita</small>
		<div class="pull-right">
			<a href="list_berita.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>

<form action="" method="post">
	<div class="form-group">
		<label for="nama_pages">Nama Pages</label>
		<input type="text" name="nama_pages" id="nama_pages" value="<?= $pages['nama_pages']; ?>">
	</div>
	<div class="form-group">
		<label for="isi_pages">Isi Pages</label>
		<textarea name="isi_pages" id="isi_berita" cols="30" rows="10"><?= $pages['isi_pages']; ?></textarea>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary" name="editPage">Edit</button>
	</div>
</form>


</div>
<script>
	CKEDITOR.replace( 'isi_berita' );
</script>
<?php require 'layout/footer.php'; ?>