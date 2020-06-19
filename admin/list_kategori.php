<?php 
require 'layout/header.php';
require '../config/functions.php';

$list_kategori = query("SELECT * FROM tb_kategori ORDER BY id_kategori DESC");

?>
<div class="box">
	<h1>List Kategori</h1>
	<h4>
		<small>Data Kategori</small>
		<div class="pull-right">
			<!-- <a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a> -->
		</div>
	</h4>
<a href="tambah_kategori.php" class="btn btn-primary">Tambah Data Kategori</a>
<table class="table" id="datatables">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$no = 1; 
		foreach($list_kategori as $lkate) : ?>
		<tr>
			<td><?= $no++; ?></td>
			<td><?= $lkate["nama_kategori"]; ?></td>	
			<td>
				<a href="edit_kategori.php?id=<?= $lkate["id_kategori"]; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
				<a href="hapus_kategori.php?id=<?= $lkate["id_kategori"]; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
			</td>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>

</div>
<?php require 'layout/footer.php'; ?>