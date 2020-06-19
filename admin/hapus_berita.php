<?php 
require '../config/db_connect.php';
// require '../config/functions.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM tb_berita WHERE id_berita = $id");
// ubah file result menjadi assosiative
$data = mysqli_fetch_assoc($result);
$gambar = $data['gambar_berita'];
if(file_exists("../img/" . $gambar)) {
	unlink("../img/" . $gambar);
}

mysqli_query($conn, "DELETE FROM tb_berita WHERE id_berita = $id");
echo "<script>alert('Data berhasil dihapus.');window.location='list_berita.php';</script>";

?>