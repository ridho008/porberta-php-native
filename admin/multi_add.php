<?php  
require_once 'layout/header.php';
require '../config/functions.php';
$kategori = query("SELECT * FROM tb_kategori");


if(isset($_POST['tambah_multi_berita'])) {
	if(multi_tambah_berita($_POST) > 0) {
		echo "<script>alert('Data Berhasil Ditambahkan');window.location='list_berita.php';</script>";
	} else {
		echo "<script>alert('Data Gagal Ditambahkan')</script>";
	}
}

?>

<div class="box">
	<h1>Generate Record Berita</h1>
	<h4>
		<small>Record Berita</small>
		<div class="pull-right">
			<!-- <a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a> -->
		</div>
	</h4>

<form action="" method="post" enctype="multipart/form-data">
	<input type="hidden" name="total" value="<?= @$_POST['count_add']; ?>">
	<table class="table">
		<thead>
			<tr>
				<th>No.</th>
				<th>Gambar</th>
				<th>Berita</th>
				<th>Isi Berita</th>
			</tr>
		</thead>
		<tbody>
			<?php for($i = 1; $i <= $_POST['count_add']; $i++) : ?>
			<tr>
				<td><?= $i; ?></td>
				<td>
					<input type="file" name="foto-<?= $i ?>" class="form-control-file" required>
				</td>
				<td>
					<input type="text" name="judul-<?= $i ?>" class="form-control" required>
				</td>
				<td>
					<select name="kategori-<?= $i ?>">
						<?php foreach($kategori as $ktg) : ?>
						<option value="<?= $ktg['id_kategori']; ?>"><?= $ktg['nama_kategori']; ?></option>
					<?php endforeach; ?>
					</select>
				</td>
				<td>
					<textarea name="isi-<?= $i ?>" cols="10" rows="10"></textarea>
				</td>
			</tr>
		<?php endfor; ?>
		</tbody>
	</table>
	<div class="form-group">
		<button type="submit" name="tambah_multi_berita" class="btn btn-primary">Tambah Data</button>
	</div>
</form>

</div>

<?php require_once 'layout/footer.php'; ?>