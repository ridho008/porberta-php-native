<?php 
session_start();
require 'layout/header.php';
require '../config/functions.php';

if(!isset($_SESSION['login'])) {
	header("Location: " . base_url('logis/login.php'));
	exit;
}

$list_berita = query("SELECT * FROM tb_berita
						INNER JOIN tb_kategori ON tb_berita.id_kategori = tb_kategori.id_kategori ORDER BY id_berita DESC
	");



?>
<div class="box">
	<h1>List Berita</h1>
	<h4>
		<small>Data Berita</small>
		<div class="pull-right">
			<!-- <a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a> -->
		</div>
	</h4>
<a href="tambah_berita.php" class="btn btn-primary">Tambah Data Berita</a>
<a href="generate_add.php" class="btn btn-warning">Multi Add</a>
<!-- <a href="<?= base_url('report/report_pdf.php'); ?>" class="btn btn-success float-right" target="_blank">Report PDF</a> -->

<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
    Laporan
    <span class="caret"></span>
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="<?= base_url('report/report_pdf.php'); ?>" target="_blank">Report to PDF</a></li>
    <li><a href="#">Report to PDF per tanggal</a></li>
    <li><a href="#">Something else here</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>
<table class="table" id="datatables">
	<thead>
		<tr>
			<th>No</th>
			<th>Aksi</th>
			<th>Judul Berita</th>
			<th>Kategori</th>
			<th>Tanggal</th>
			<th>Gambar</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$no = 1;
		foreach($list_berita as $berita) : ?>
		<tr>
			<td><?= $no++; ?></td>
			<td>
				<a href="edit_berita.php?id=<?= $berita['id_berita']; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
				<a href="hapus_berita.php?id=<?= $berita['id_berita']; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
			<td><?= $berita["judul_berita"]; ?></td>
			<td><?= $berita["nama_kategori"]; ?></td>
			<td><?= tanggal($berita["tgl"]); ?></td>
			<td>
				<img src="../img/<?= $berita['gambar_berita']; ?>" width="50">
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

</div>

<?php require 'layout/footer.php'; ?>