<?php 
require 'layout/header.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_kategori WHERE id_kategori = $id");
echo "<script>alert('Data berhasil dihapus.');window.location='list_kategori.php';</script>";

?>