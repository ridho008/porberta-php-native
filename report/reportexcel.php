<?php  
require_once '../config/functions.php';

$query = query("SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_berita.id_kategori = tb_kategori.id_kategori") or die(mysqli_error($conn));

$fileName = "beritaexcel". date('d-m-Y') . ".xls";
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$fileName");

?>
<table border="1" cellpadding="10" cellspacing="0">
	<tr>
		<th>No</th>
		<th>Judul Berita</th>
		<th>Kategori</th>
		<th>Tanggal</th>
		<th>Gambar</th>
	</tr>
	<?php foreach($query as $brt) : ?>
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $brt['judul_berita']; ?></td>
		<td><?= $brt['nama_kategori']; ?></td>
		<td><?= tanggal($brt['tgl']); ?></td>
		<td><?= $brt['gambar_berita']; ?></td>
	</tr>
<?php endforeach; ?>
</table>