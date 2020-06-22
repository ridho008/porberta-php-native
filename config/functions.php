<?php 
require 'db_connect.php';

function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query); // query di ambil dari parameter
	$rows = []; //siapkan kotak kosong untuk baju
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row; //setiapkan lopping masukan baju kedalam kotak
	}
	return $rows; //bawa/kembalikan baju bersama kotaknya
}

function base_url($url = null) {
	$base_url = 'http://localhost/berita_kita/';
	if($url != null) {
		return $base_url . $url;
	} else {
		return $base_url;
	}
}

function tambah_berita($data) {
	global $conn;
	$judul_berita = htmlspecialchars($data["judul_berita"]);
	$isi_berita = htmlspecialchars($data["isi_berita"]);
	$id_kategori = htmlspecialchars($data["id_kategori"]);
	// $gambar_berita = htmlspecialchars($data["gambar_berita"]);
	$cekGambar = $_FILES['gambar_berita']['error'];

	// cek apakah inputan sudah di isi
	if(empty($judul_berita && $isi_berita && $id_kategori)) {
		echo "<script>alert('Isi data dengan lengkap.')</script>";
		return false;
	}

	if($cekGambar === 4) {
		echo "<script>alert('Pilih gambar terlebih dahulu.')</script>";
		return false;
	}

	
	// upload gambar
	$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
	$extensi = explode(".", $_FILES['gambar_berita']['name']);
	$gambar_berita = "brg-".round(microtime(true)).".".end($extensi);
	$sumber = $_FILES['gambar_berita']['tmp_name'];
	// cek apakah gambar yang diupload ?
	if(!in_array($gambar_berita, $ekstensiGambarValid)) {
		echo "<script>alert('yang anda upload bukan gambar.')</script>";
		return false;
	}
	move_uploaded_file($sumber, "../img/" . $gambar_berita);




	// generate gambar
	// $gambarBaru = uniqid();
	// $gambarBaru .= '.';
	// $gambarBaru .= $ekstensiGambar;
	// move_uploaded_file($gambar_berita, "../img/" . $ekstensiGambar);
	// return $gambarBaru;

	// $gambar_berita = upload();
	// if(!$gambar_berita) {
	// 	return false;
	// }

	$result = mysqli_query($conn, "INSERT INTO tb_berita (judul_berita, isi_berita, id_kategori, gambar_berita) VALUES ('$judul_berita', '$isi_berita', '$id_kategori', '$gambar_berita')") or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}

function upload() {
	$namaFile = $_FILES['gambar_berita']['name'];
	$ukuranFile = $_FILES['gambar_berita']['size'];
	$error = $_FILES['gambar_berita']['error'];
	$tmpName = $_FILES['gambar_berita']['tmp_name'];
	$gambarLama = $_POST["gambarLama"];

	// jika user tidak memilih gambar
	if($error === 4) {
		echo "<script>alert('pilih gambar terlebih dahulu.')</script>";
		return false;
	}

	$ekstensiGambarValid = ['jpg','jpeg','png'];
	$ekstensiGambar = explode('.', $namaFile);
	$ekstensiGambar = strtolower(end($ekstensiGambar));



	// cek apakah bukan gambar yang diupload
	if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
		echo "<script>alert('yang anda upload bukan gambar.')</script>";
		return false;
	}

	// cek ukuran gambar yang diupload
	if($ukuranFile > 1000000) {
		echo "<script>alert('gambar yang anda upload terlalu besar.')</script>";
		return false;
	}

	// generate/acak nama file gambar
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiGambar;

	// $select = query("SELECT * FROM tb_berita WHERE id_berita = $id") or die(mysqli_error($conn));

	$path = "../img/" . $gambarLama;
	if(file_exists($path)) {
		unlink($path);
	}
	// echo "File telah dihapus";
	move_uploaded_file($tmpName, '../img/' . $namaFileBaru);
	
	return $namaFileBaru;
}

function edit_berita($data) {
	global $conn;
	$id = $data['id_berita'];
	$judul_berita = htmlspecialchars($data["judul_berita"]);
	$isi_berita = htmlspecialchars($data["isi_berita"]);
	$id_kategori = htmlspecialchars($data["id_kategori"]);
	$gambarLama = $data["gambarLama"];

	// cek upload gambar
	if($_FILES['gambar_berita']['error'] === 4) {
		$gambar_berita = $gambarLama;
	} else {
		$gambar_berita = upload();
	}

	$result = mysqli_query($conn, "UPDATE tb_berita SET judul_berita = '$judul_berita', isi_berita = '$isi_berita', id_kategori = '$id_kategori', gambar_berita = '$gambar_berita' WHERE id_berita = $id") or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}

// ---------KATEGORI-------------
function tambah_kategori($data) {
	global $conn;
	$nama_kategori = htmlspecialchars($data['nama_kategori']);

	if(empty($nama_kategori)) {
		echo "<script>alert('isi inputan terlebih dahulu.');window.location='tambah_kategori.php';</script>";
		return false;
	}

	$query = mysqli_query($conn, "INSERT INTO tb_kategori (nama_kategori) VALUES ('$nama_kategori')");
	return mysqli_affected_rows($conn);
}

function edit_kategori($data) {
	global $conn;
	$id = $_POST['id_kategori'];
	$nama_kategori = htmlspecialchars($data['nama_kategori']);

	if(empty($nama_kategori)) {
		echo "<script>alert('isi inputan terlebih dahulu.');window.location='edit_kategori.php';</script>";
		return false;
	}

	$query = mysqli_query($conn, "UPDATE tb_kategori SET nama_kategori = '$nama_kategori' WHERE id_kategori = $id");
	return mysqli_affected_rows($conn);
}

// ----------ADMIN------------
function tambah_admin($data) {
	global $conn;
	$nama_admin = strtolower(stripcslashes($data['nama_admin']));
	$user_admin = htmlspecialchars(mysqli_real_escape_string($conn, $data['user_admin']));
	$pass_admin = htmlspecialchars(mysqli_real_escape_string($conn, $data['pass_admin']));
	$cekGambar = $_FILES['gambar_admin']['error'];

	if($cekGambar === 4) {
		echo "<script>alert('Pilih gambar terlebih dahulu.')";
	}

	// cek gambar
	// $gambar_admin = upload_admin();
	// if(!$gambar_admin) {
	// 	return false;
	// }
	$ektensi = explode('.', $_FILES['gambar_admin']['name']);
	$gambar_admin = 'admin-'.round(microtime(true)).'.'.end($ektensi);
	$tmpName = $_FILES['gambar_admin']['tmp_name'];
	move_uploaded_file($tmpName, '../img/admin/'. $gambar_admin);

	$result = mysqli_query($conn, "SELECT user_admin FROM admin WHERE user_admin = '$user_admin'") or die(mysqli_error($conn));

	// cek apakah useradmin sudah terdaftar ?
	if(mysqli_fetch_assoc($result)) {
		echo "<script>alert('Username sudah terdaftar')</script>";
		return false;
	}

	// cek apakah inputan sudah di isi atau belum
	if(empty($nama_admin && $user_admin && $pass_admin)) {
		echo "<script>alert('isi inputan terlebih dahulu.');window.location='tambah_admin.php';</script>";
		return false;
	}

	// generate password
	$pass_admin = password_hash($pass_admin, PASSWORD_DEFAULT);

	mysqli_query($conn, "INSERT INTO admin (nama_admin, user_admin, pass_admin, gambar_admin) VALUES ('$nama_admin', '$user_admin', '$pass_admin', '$gambar_admin')");
	return mysqli_affected_rows($conn);	
}

function upload_admin() {
	$namaFileAdmin = $_FILES['gambar_admin']['name'];
	$ukuranFileAdmin = $_FILES['gambar_admin']['size'];
	$errorAdmin = $_FILES['gambar_admin']['error'];
	$tmpAdmin = $_FILES['gambar_admin']['tmp_name'];
	// diambil dari iputan halaman edit
	$gambarAdminLama = $_POST['gambarAdminLama'];

	// cek apakah gambar sudah di upload/input
	if($errorAdmin === 4) {
		echo "<script>alert('pilih gambar terlebih dahulu.')</script>";
		return false;
	}

	$ekstensiGambarValidAdmin = ['jpg','jpeg','png'];
	$ekstensiGambarAdmin = explode('.', $namaFileAdmin);
	$ekstensiGambarAdmin = strtolower(end($ekstensiGambarAdmin));

	// cek yang diupload gambar atau bukan
	if(!in_array($ekstensiGambarAdmin, $ekstensiGambarValidAdmin)) {
		echo "<script>alert('yang anda upload bukan gambar.')</script>";
		return false;
	}

	// cek ukuran gambar yang di upload
	if($ukuranFileAdmin > 1000000) {
		echo "<script>alert('ukuran gambar terlalu besar.')</script>";
		return false;
	}

	// generate nama file gambar
	$namaFileBaruAdmin = uniqid();
	$namaFileBaruAdmin .= '.';
	$namaFileBaruAdmin .= $ekstensiGambarAdmin;

	
	// ambil inputan gambar lama, sehingga akan digunakan untuk replace gambar atau file lainnnya.

	// hapus replace jika ingin di edit
	$path = "../img/admin/" . $gambarAdminLama;
	if(file_exists($path)) {
		unlink($path);
	}

	move_uploaded_file($tmpAdmin, '../img/admin/' . $namaFileBaruAdmin);
	return $namaFileBaruAdmin;
}

function edit_admin($data) {
	global $conn;
	$id = $_POST['id'];
	$nama_admin = strtolower(stripcslashes($data['nama_admin']));
	$user_admin = htmlspecialchars(mysqli_real_escape_string($conn, $data['user_admin']));
	$pass_admin = htmlspecialchars(mysqli_real_escape_string($conn, $data['pass_admin']));
	$gambarAdminLama = $data['gambarAdminLama'];

	// jika tidak tidak ingin mengubah gambar akan di replace 
	if($_FILES['gambar_admin']['error'] === 4) {
		$gambar_admin = $gambarAdminLama;
	} else {
		$gambar_admin = upload_admin();
	}

	$pass_admin = password_hash($pass_admin, PASSWORD_DEFAULT);

	mysqli_query($conn, "UPDATE admin SET nama_admin = '$nama_admin', user_admin = '$user_admin', pass_admin = '$pass_admin', gambar_admin = '$gambar_admin' WHERE id_admin = $id");

	return mysqli_affected_rows($conn);

}

function tanggal($tgl) {
	$bulan = ["", "Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

	// 2019-01-02
	// 012345678
	$tg = substr($tgl, 8,2);
	$bl = substr($tgl, 5,2);
	$th = substr($tgl, 0,4);
	return $tg . ' ' . $bulan[(int)$bl] . ' ' . $th;
}

function register($data) {
	global $conn;
	$nama_lengkap = htmlspecialchars($data['nama_lengkap']);
	$username = htmlspecialchars($data['username']);
	$password = mysqli_real_escape_string($conn, $data['password']);
	$password2 = mysqli_real_escape_string($conn, $data['password2']);

	if(empty($nama_lengkap && $username && $username && $password && $password2)) {
		echo "<script>alert('Pastikan sudah mengisi inputan.')</script>";
			return false;
	}

	// panjang username < 12
	if(strlen($username) < 8) {
		echo "<script>alert('Username terlalu pendek.')</script>";
			return false;
	}

	if(strlen($password) < 12) {
		echo "<script>alert('password maksimal 12 digit.')</script>";
			return false;
	}

	if($password != $password2) {
		echo "<script>alert('Password anda belum sama.')</script>";
			return false;
	}

	// jika user tidak mengupload gambar
	$namaGambar = $_FILES['gambar_admin']['error'];
	if($namaGambar === 4) {
		echo "<script>alert('Upload gambar dulu.')</script>";
			return false;
	}

	$result = mysqli_query($conn, "SELECT user_admin FROM admin WHERE user_admin = '$username'") or die(mysqli_error($conn));
	if(mysqli_fetch_assoc($result)) {
		echo "<script>alert('Username sudah terdaftar')</script>";
		return false;
	}

	// upload gambar
	$ekstensiGambarValid = ['jpeg','jpg','png'];
	$ektensi = explode('.', $_FILES['gambar_admin']['name']);
	$gambar_admin = round(microtime(true)) . '.' . end($ektensi);
	$sumber = $_FILES['gambar_admin']['tmp_name'];
	move_uploaded_file($sumber, '../img/admin/' . $gambar_admin);

	$password = password_hash($password, PASSWORD_DEFAULT);
	$query = mysqli_query($conn, "INSERT INTO admin (nama_admin, user_admin, pass_admin, gambar_admin) VALUES('$nama_lengkap', '$username', '$password', '$gambar_admin')") or die(mysqli_error($conn));
	return mysqli_affected_rows($conn);
}

// ------------------FITUR MULTIPLE-------------------

function multi_tambah_berita($data) {
	global $conn;
	$total = $data['total'];
	for($i = 1; $i <= $total; $i++) {
		$judul_berita = htmlspecialchars($data['judul-'.$i]);
		$isi_berita = htmlspecialchars($data['isi-'.$i]);
		$id_kategori = htmlspecialchars($data['kategori-'.$i]);

		// cek apakah inputan kosong ?
		if(empty($judul_berita && $isi_berita && $id_kategori)) {
			echo "<script>alert('Pastikan sudah mengisi inputan.')</script>";
			return false;
		}

		// cek gambar, apakah sudah di upload ?
		$cekGambar = $_FILES['foto-'.$i]['error'];
		if($cekGambar === 4) {
			echo "<script>alert('Pastikan sudah upload gambar.')</script>";
			return false;
		}

		$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
		$ektensi = explode('.', $_FILES['foto-'.$i]['name']);
		$gambar_berita = 'brt' . round(microtime(true)) . '.' . end($ektensi);
		if(!in_array($gambar_berita, $ekstensiGambarValid))
		$sumber = $_FILES['foto-'.$i]['tmp_name'];
		move_uploaded_file($sumber, '../img/' . $gambar_berita);

		$query = mysqli_query($conn, "INSERT INTO tb_berita (judul_berita, isi_berita, id_kategori, gambar_berita) VALUES ('$judul_berita', '$isi_berita', '$id_kategori', '$gambar_berita')") or die(mysqli_error($conn));
	}
	return mysqli_affected_rows($conn);
}

function edit_pages($data) {
	global $conn;
	$id = $_GET['id'];
	$nama_pages = htmlspecialchars($data["nama_pages"]);
	$isi_pages = htmlspecialchars($data["isi_pages"]);

	$result = mysqli_query($conn, "UPDATE tb_pages SET nama_pages = '$nama_pages', isi_pages = '$isi_pages' WHERE id_pages = $id") or die(mysqli_error($conn));

	return mysqli_affected_rows($conn);
}