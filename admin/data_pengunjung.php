<?php
	session_start();
	include_once '../koneksi.php';
    if (isset($_SESSION['username']) || isset($_SESSION['password'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>BAPER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" sizes="250x250" href="../img/baper.png">
  	<link href="../css/bootstrap.css" rel="stylesheet">
  	<link href="../css/admin.css" rel="stylesheet">
  	<link href="../css/jquery-ui.css" rel="stylesheet">
		<link href="../css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="../js/jam.js"> type="text/javascript" </script>
    <style>
			.report{
				width: 100px;
			}
      .form-group{
        margin-top: 5px;
        margin-left: 7%;
      }
     .col-md-12{margin-left: 15px}
     button.btn{
        margin-right: 80%;
     }
    </style>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
	<?php include_once 'menu_admin.php'; ?>
	<section class="content row">
	    <aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
  <!-- <div class="collapse navbar-collapse navbar-ex1-collapse"> -->
    <ul class="menu dropdown dropdown-fixed-top">
      <li><a href="index.php" ><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
      <li><a href="pencarian_admin.php" ><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
      <li><a href="data_pengunjung.php" class="active"><span class="glyphicon glyphicon-list" style="width: 13%"></span>Data Pengunjung</a></li>
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
      <div class="row" style="margin-top: 10px;">
      <h1>Daftar Pengunjung</h1><br/>

        <div class="col-md-10 col-md-offset-1">
          <table class="table table-striped">
            <thead style="    background: #06a0e9;">
              <tr>
								<td>ID Pengunjung</td>
                <td>Nama</td>
                <td>Tanggal Lahir</td>
                <td>Alamat</td>
                <td>No HP</td>
                <td>Identitas</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
            <?php
                $query = mysqli_query($koneksi,"SELECT * from pengunjung");
                  while (@$data = mysqli_fetch_array($query)) {
                    $id = $data['id_pengunjung'];
                    $query2 = mysqli_query($koneksi,"SELECT * from identitas where id_pengunjung=$id");
                    ?>
              <tr>
								<td><?php echo $data['id_pengunjung']; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo date('d-m-Y', strtotime($data['tgl'])); ?></td>
								<td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['no_hp']; ?></td>
                <td>
                  <?php
                    while (@$data2 = mysqli_fetch_array($query2)) {
                      echo $data2['type']. " : ".$data2['no_id'].'<br/>';;
                    }
                   ?>
                </td>
								<td style="padding-top: 5px;">
									<a class="btn btn-danger" onclick="return confirm('Yakin Data ingin Dihapus?')" href=" hapus_pengunjung.php?id_pengunjung=<?php echo $data['id_pengunjung']; ?>">Hapus</a>
								</td>
                <?php
                }
							?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </section>
	<?php include_once '../footer.php'; ?>

	<script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }
?>
