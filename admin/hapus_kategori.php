<?php 
require '../config/functions.php';
require 'layout/header.php';

// mengatasi iseng menulis url
if(!isset($_GET['id'])) {
	header("Location: " . base_url('admin/list_kategori.php'));
	exit;
}

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = $id");
echo "<script>alert('Data berhasil dihapus.');window.location='list_kategori.php';</script>";

?>