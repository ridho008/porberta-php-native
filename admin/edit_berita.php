<?php 
require '../config/functions.php';
require 'layout/header.php';

$id = $_GET['id'];

$berita = query("SELECT * FROM tb_berita WHERE id_berita = $id")[0];
$kategori = query("SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");

if(isset($_POST['edit'])) {
	// cek apakah berhasil di tambahkan atau tidak
	if(edit_berita($_POST) > 0) {
		echo "<script>alert('Data Berhasil Diubah.');window.location='list_berita.php';</script>";
	} else {
		echo "<script>alert('Data Gagal Diubah.');window.location='list_berita.php';</script>";
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

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
			<label for="judul_berita">Judul Berita</label>
			<input type="hidden" name="id_berita" id="id_berita" value="<?= $berita["id_berita"]; ?>">
			<input type="hidden" name="gambarLama" id="gambarLama" value="<?= $berita["gambar_berita"]; ?>">
			<input type="text" name="judul_berita" id="judul_berita" value="<?= $berita["judul_berita"]; ?>" class="form-control">
	</div>
	<div class="form-group">
			<label for="isi_berita">Isi Berita</label><br>
			<textarea name="isi_berita" id="isi_berita" cols="74" rows="6"><?= $berita["isi_berita"]; ?></textarea>
	</div>
	<div class="form-group">
			<label for="id_kategori">Kategori</label>
			<select name="id_kategori" id="id_kategori">
				<option value="">-- Kategori --</option>
				<?php foreach($kategori as $ktg) : ?>
					<option value="<?= $ktg["id_kategori"]; ?>" <?php if($berita['id_kategori'] == $ktg["id_kategori"]){ echo 'selected'; } ?>><?= $ktg["nama_kategori"]; ?></option>
		<?php endforeach; ?>
			</select>
	</div>
	<div class="form-group">
			<label for="gambar_berita">Gambar</label>
			<img src="../img/<?= $berita["gambar_berita"]; ?>" width="50">
			<input type="file" name="gambar_berita" id="gambar_berita" class="form-control-file">
	</div>
	<div class="form-group">
			<button type="submit" name="edit" class="btn btn-primary">Edit Data Berita</button>
	</div>
</form>


</div>
<script>
	CKEDITOR.replace( 'isi_berita' );
</script>
<?php require 'layout/footer.php'; ?>