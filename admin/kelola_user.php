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

    <script src="../js/jam.js"></script>
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
      <li><a href="data_pengunjung.php" ><span class="glyphicon glyphicon-list" style="width: 13%"></span>Data Pengunjung</a></li>
      <li><a href="buku_tamu.php" ><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
      <li><a href="fungsi.php" ><span class="glyphicon glyphicon-cog" style="width: 13%"></span>Fungsi Admin</a></li>
			<li><a href="tambah_user.php" ><span class="glyphicon glyphicon-user" style="width: 13%"></span>Tambah Pengguna</a></li>
			<li><a href="kelola_user.php" class="active"><span class="glyphicon glyphicon-edit" style="width: 13%"></span>Kelola Pengguna</a></li>
			<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
    </ul>
  <!-- </div> -->
</aside>
    <section class="main-content col-md-10 text-center">
      <div class="row" style="margin-bottom:0;"><div class="col-md-12" style="text-align:right; font-size:12px; padding-right:0;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></div></div>
      <div class="row" style="margin-top: 10px;">
      <?php
            if (@$_GET['error'] == 1){
        ?>
            <div class="col-lg-12">
                <div class="alert alert-info alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <i class="fa fa-info-circle"></i>  <strong>Data Berhasil Di Reset</strong> Ke <strong>DATABASE</strong>, Terima Kasih telah menginput Data!
                </div>
            </div>
        <?php
            } else if (@$_GET['error'] == 2){
        ?>
                <div class="col-lg-12">
                    <div class="alert alert-info alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <i class="fa fa-info-circle"></i>  <strong>Data Gagal Di Reset</strong> Ke <strong>DATABASE</strong>!!!
                    </div>
                </div>
        <?php
            }
        ?>
      <h1>Daftar Pengguna</h1><br/>

        <div class="col-md-10 col-md-offset-1">
          <table class="table table-striped">
            <thead style="background: #06a0e9;">
              <tr>
								<td>No</td>
                <td>Username</td>
                <td>Password</td>
                <td>Nama</td>
                <td>Fungsi</td>
                <td></td>
              </tr>
            </thead>
            <tbody>
            <?php
                $query = mysqli_query($koneksi,"SELECT * from user");
                $no=1;
                  while ($data = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $no; ?></td>
								<td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['fungsi']; ?></td>
								<td>
									<a id="myButton1" data-end-text="The End" data-load-text="Loading..." class="btn btn-danger" href="update_user.php?username=<?php echo $data['username']; ?>" autocomplete="off">Ubah</a>
								</td>
              </tr>
                <?php  $no++; }
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
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script>
  $(function(){
    $('#myButton1').on("click", function() {
    $('#myButton1').button("load");
    setTimeout(function() {
        $('#myButton1').button("end");
        $('#myButton1').attr('disabled', 'disabled');
      }, 1000);
    });
  });
  </script>
</body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }
?>
