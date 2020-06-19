<?php 
require_once 'layout/header.php';
?>
<div class="box">
	<h1>Generate Record Berita</h1>
	<h4>
		<small>Record Berita</small>
		<div class="pull-right">
			<!-- <a href="data.php" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a> -->
		</div>
	</h4>

<form action="multi_add.php" method="post">
	<div class="form-group">
		<label for="count_add">Masukan Jumlah Record Yang Ingin Ditambahkan</label>
		<input type="text" name="count_add" id="count_add" pattern="[0-9]+" class="form-control" maxlength="2" required>
	</div>
	<div class="form-group">
		<button type="submit" name="generate" class="btn btn-primary">Generate</button>
	</div>
</form>

</div>
<?php require_once 'layout/footer.php'; ?>