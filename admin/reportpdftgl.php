<?php 
require_once '../config/functions.php';
require_once 'layout/header.php';


?>
<div class="box">
	<h1>Report to PDF per tanggal</h1>
	<h4>
		<small>PDF per tanggal</small>
		<div class="pull-right">
			<a href="list_berita.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
		</div>
	</h4>

<form action="<?= base_url('report/report_pdf_tgl.php'); ?>" method="post" target="_blank">
	<table>
		<tr>
			<td>
				<div class="form-group">
					<label for="tgla">Dari Tanggal</label>
					<input type="date" name="tgla" id="tgla" class="form-control">
				</div>
			</td>
			<td>
				<div class="form-group">
					<label for="tglb">Sampai Tanggal</label>
					<input type="date" name="tglb" id="tglb" class="form-control">
				</div>
			</td>
			<td>
				<button type="submit" name="cetakpdftgl" class="btn btn-primary">Cetak</button>
			</td>
		</tr>
	</table>
	

</form>

</div>


<?php require_once 'layout/footer.php'; ?>