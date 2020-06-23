<?php 
require '../config/functions.php';
require 'layout/header.php';
if(isset($_POST['tambah'])) {
	// cek apakah berhasil di tambahkan atau tidak
	if(tambah_berita($_POST) > 0) {
		echo "<script>alert('Data Berhasil Ditambahkan.');window.location='list_berita.php';</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan.')</script>";
	}
}

$kategori = query("SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");


?>
<div class="box">
	<h1>Tambah Data Berita</h1>
	<h4>
		<small>Tambah Berita</small>
		<div class="pull-right">
			<a href="list_berita.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>

<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="judul_berita">Judul Berita</label>
	  <input type="text" class="form-control" placeholder="Masukan judul berita" name="judul_berita" id="judul_berita">
	</div>
	<div class="form-group">
		<label for="isi_berita">Isi Berita</label><br>
			<textarea name="isi_berita" id="isi_berita" cols="74" rows="6"></textarea>
	</div>
	<div class="form-group">
		<label for="id_kategori">Kategori</label>
			<select name="id_kategori" id="id_kategori">
				<option value="">-- Kategori --</option>
				<?php foreach($kategori as $ktg) : ?>
				<option value="<?= $ktg["id_kategori"]; ?>"><?= $ktg["nama_kategori"]; ?></option>
			<?php endforeach; ?>
			</select>
	</div>
	<div class="form-group">
		<label for="gambar_berita">Gambar</label>
		<input type="file" name="gambar_berita" id="gambar_berita" class="gambar_berita" onchange="previewImage()">
		<img src="<?= base_url('img/nophoto.jpg'); ?>" width="100" class="img-preview">
	</div>
	<div class="form-group">
		<button type="submit" name="tambah" class="btn btn-primary">Tambah Data Berita</button>
	</div>
</form>

</div>

<script>
	CKEDITOR.replace( 'isi_berita' );
</script>
<?php require 'layout/footer.php'; ?>