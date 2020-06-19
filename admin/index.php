<?php 
session_start();
include_once 'layout/header.php';


require '../config/functions.php';
if(!isset($_SESSION['login'])) {
	header("Location: " . base_url('logis/login.php'));
	exit;
}

$user = mysqli_query($conn, "SELECT * FROM admin") or die(mysqli_error($conn));
$data = mysqli_fetch_assoc($user);

?>
<div class="row">
<div class="col-lg-12">
    <h1>Selamat Datang <?= $data['user_admin']; ?></h1>
    <p></p>
    <p>Aplikasi Website Berita Sederhana <code>PortalDooo...</code>.</p>
    <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
</div>
</div>
<?php include_once 'layout/footer.php'; ?>