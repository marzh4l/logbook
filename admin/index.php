<?php
	session_start();
	include_once '../koneksi.php';
    if (isset($_SESSION['username']) || isset($_SESSION['fungsi'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>BAPER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" sizes="250x250" href="../img/baper.png">
  	<link href="../css/bootstrap.css" rel="stylesheet">
  	<link href="../css/admin.css" rel="stylesheet">
  	<link rel="stylesheet" href="../css/jquery-ui.css">

    <script type="text/javascript" src="../js/jam.js"></script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
	<?php include_once 'menu_admin.php'; ?>

	<section class="content row">
	    <aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
        <!-- <div class="collapse navbar-collapse navbar-ex1-collapse"> -->
          <ul class="menu dropdown dropdown-fixed-top" style="position: fixed;">
            <li><a href="index.php" class="active"><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
            <li><a href="pencarian_admin.php" ><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
            <li><a href="data_pengunjung.php" ><span class="glyphicon glyphicon-list" style="width: 13%"></span>Data Pengunjung</a></li>
            <li><a href="buku_tamu.php" ><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
            <li><a href="fungsi.php" ><span class="glyphicon glyphicon-cog" style="width: 13%"></span>Fungsi Admin</a></li>
						<li><a href="tambah_user.php" ><span class="glyphicon glyphicon-user" style="width: 13%"></span>Tambah Pengguna</a></li>
						<li><a href="kelola_user.php" ><span class="glyphicon glyphicon-edit" style="width: 13%"></span>Kelola Pengguna</a></li>
            <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
          </ul>
        <!-- </div> -->
      </aside>
    <section class="main-content col-md-10 text-center">
      <div class="row" style="margin-bottom:0;"><div class="col-md-12" style="text-align:right; font-size:12px; padding-right:0;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></div></div>
      <div class="row isi">
        <div class="panel-body">
          <a href="pencarian_admin.php" class="tambah-peng"><i class="glyphicon glyphicon glyphicon-search"></i><br/>Cari Pengunjung</a>
          <a href="data_pengunjung.php" class="tambah-peng"><i class="glyphicon glyphicon glyphicon-list"></i><br/>Data Pengenjung</a>
          <br/>
          <a href="buku_tamu.php" class="tambah-peng"><i class="glyphicon glyphicon glyphicon-folder-open"></i><br/>Buku Tamu</a>
					<a href="fungsi.php" class="tambah-peng"><i class="glyphicon glyphicon glyphicon-cog"></i><br/>Fungsi Admin</a>
					<br/>
					<a href="tambah_user.php" class="tambah-peng"><i class="glyphicon glyphicon glyphicon-user"></i><br/>Tambah Pengguna</a>
					<a href="kelola_user.php" class="tambah-peng"><i class="glyphicon glyphicon glyphicon-edit"></i><br/>Kelola Pengguna</a>
        </div>
      </div>
    </section>
  </section>
	<?php include_once 'footer_admin.php'; ?>
	<script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/bootstrap.js"></script>

  <script>
  $(function() {
    $( "#no_id" ).autocomplete({
      source: "pelanggan.php",
       minLength:1,
    });
  } );
  </script>
</body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }
?>
