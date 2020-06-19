<?php
ob_start();
require '../assets/vendor/autoload.php';
require '../config/functions.php';

use Spipu\Html2Pdf\Html2Pdf;

$berita = query("SELECT * FROM tb_berita INNER JOIN tb_kategori ON tb_berita.id_kategori = tb_kategori.id_kategori") or die(mysqli_error($conn));

$html2pdf = new Html2Pdf();
$html = '
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Daftar Berita</title>
</head>
<body>
	<h1 align="center">Daftar Berita</h1>
	<table border="1" cellspacing="0" cellpadding="10" align="center">
		<tr>
			<th>No</th>
			<th>Judul Berita</th>
			<th>Kategori</th>
			<th>Tanggal</th>
			<th>Gambar</th>
		</tr>';
		$no = 1;
		foreach($berita as $brt) {
			$html .= '
							<tr>
								<td>'. $no++ .'</td>
								<td>'. $brt["judul_berita"] .'</td>
								<td>'. $brt["nama_kategori"] .'</td>
								<td>'. tanggal($brt["tgl"]) .'</td>
								<td>
									<img src="../img/'. $brt['gambar_berita'] .'" width="100">
								</td>
							</tr>
			';
		}
$html .=	'</table>
</body>
</html>

';
$html2pdf->writeHTML($html);
ob_end_clean();
$html2pdf->output('daftarberita' . date('d-m-Y') . '.pdf');

?>
