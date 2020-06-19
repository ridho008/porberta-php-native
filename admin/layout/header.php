<?php 
require '../config/db_connect.php';
// include_once '../config/functions.php';
?>

<!-- <ul>
	<li><a href="./list_berita.php">List Berita</a></li>
	<li><a href="./list_kategori.php">List Kategori</a></li>
	<li><a href="./list_admin.php">List Admin</a></li>
	<li><a href="../logis/logout.php">Logout</a></li>
</ul> -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | PortalDO</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/simple-sidebar.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/DataTables/datatables.min.css">
    <script src="../assets/vendor/ckeditor/ckeditor/ckeditor.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="../">
                        PortalDo..
                    </a>
                </li>
                <li>
                    <a href="../" target="_blank"><i class="glyphicon glyphicon-globe"></i> Kunjungi Website</a>
                </li>
                <li>
                    <a href="./index.php">Dashboard</a>
                </li>
                <li>
                    <a href="./list_berita.php">List Berita</a>
                </li>
                <li>
                    <a href="./list_kategori.php">List Kategori</a>
                </li>
                <li>
                    <a href="./list_admin.php">List Admin</a>
                </li>
                <li>
                    <a href="./page_kontak.php?id=1">Page::Kontak</a>
                </li>
                <li>
                    <a href="./page_tentang.php?id=2">Page::Tentang Kami</a>
                </li>
                <li>
                    <a href="../logis/logout.php">Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                
            


