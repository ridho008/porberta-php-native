<?php 
require 'layout/header.php';
require '../config/functions.php';

$list_admin = query("SELECT * FROM admin ORDER BY id_admin DESC");

?>
<div class="box">
	<h1>List Admin</h1>
	<h4>
		<small>Data Admin</small>
		<div class="pull-right">
			<!-- <a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a> -->
		</div>
	</h4>

<a href="tambah_admin.php" class="btn btn-primary">Tambah Data Admin</a>
	<table class="table" id="datatables">
		<thead>
			<tr>
				<th>No</th>
				<th>Gambar</th>
				<th>Nama Admin</th>
				<th>Username</th>
				<th>Password</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no = 1; 
			foreach($list_admin as $ladmin) : ?>
			<tr>
				<td><?= $no++; ?></td>
				<td>
					<img src="../img/admin/<?= $ladmin["gambar_admin"]; ?>" width="50">
				</td>
				<td><?= $ladmin["nama_admin"]; ?></td>
				<td><?= $ladmin["user_admin"]; ?></td>
				<td><?= $ladmin["pass_admin"]; ?></td>
				<td>
					<a href="edit_admin.php?id=<?= $ladmin["id_admin"]; ?>" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
					<a href="hapus_admin.php?id=<?= $ladmin["id_admin"]; ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
				</td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<?php require 'layout/footer.php'; ?>