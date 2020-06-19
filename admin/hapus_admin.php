<?php 
require 'layout/header.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM admin WHERE id_admin = $id");
$row = mysqli_fetch_assoc($result);
$gambar = $row['gambar_admin'];

if(file_exists("../img/admin/" . $gambar)) {
	unlink("../img/admin/" . $gambar);
}

// jalankan query delete data admin
mysqli_query($conn, "DELETE FROM admin WHERE id_admin = $id");
echo "<script>alert('Data berhasil dihapus.');window.location='list_admin.php';</script>";
?>