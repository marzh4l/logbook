<?php
	session_start();
	include_once 'koneksi.php';
	include_once 'konfigurasi.php';
    if (isset($_SESSION['username']) || isset($_SESSION['fungsi'])){
			$table = $conn->query("SELECT pengunjung.id_pengunjung, buku_tamu.asal, buku_tamu.fungsi, pengunjung.nama, buku_tamu.keperluan,
				buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE
				pengunjung.id_pengunjung = buku_tamu.id_pengunjung AND keluar IS NULL
				ORDER BY buku_tamu.masuk ASC");
			$tamu_bk = $table->num_rows;
?>
<!DOCTYPE html>
<html>
<head>
	<title>BAPER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" sizes="250x250" href="img/baper.png">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link href="css/admin.css" rel="stylesheet">
  	<link rel="stylesheet" href="css/jquery-ui.css">
    <script type="text/javascript" src="js/jam.js"></script>
    <style>
      .form-group{
        margin-top: 5px;
        margin-left: 7%;
      }
     .form-control{ width: 152px;}
     .col-sm-12{margin-left: 15px}
     button.btn{
        margin-right: 65%;
        margin-bottom: 10px;
        margin-top: -46px;
     }
    </style>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
	<?php include_once 'menu.php'; ?>
	<section class="content row">
	     <aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
        <ul class="menu">
          <li><a href="home.php" ><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
          <li><a href="pencarian.php"><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
          <li><a href="tambah_data.php"><span class="glyphicon glyphicon-plus-sign" style="width: 13%"></span>Tambah Pengunjung</a></li>
          <li><a href="input_bt.php"><span class="glyphicon glyphicon-book" style="width: 13%"></span>Input Buku Tamu</a></li>
          <li><a href="buku_tamu_cs.php" class="active"><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
        </ul>
      </aside>

    <section class="main-content col-md-10 text-center">
      <span class="status" style="margin-left: 87.4%; font-style: italic; font-size: 10px; padding-right: 0px;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></span>
      <div class="row" style="margin-top: 10px;">
      <h1>Buku Tamu</h1>
			<?php
				if($tamu_bk == NULL){
					echo '<div class="col-md-10 col-md-offset-1" style="text-align:right; margin-bottom:10px;"><a class="btn btn-success" onclick="alert(\'Tidak ada pengunjung yang belum keluar\');">Pengunjung Belum Keluar</a></div><br/>';
				} else {
					echo '<div class="col-md-10 col-md-offset-1" style="text-align:right; margin-bottom:10px;"><a href="buku_tamu_cs_bk.php" class="btn btn-success" target="_self">Pengunjung Belum Keluar</a></div><br/>';
				}
			 ?>
        <div class="col-md-10 col-md-offset-1">
          <table class="table table-striped">
            <thead style="    background: #06a0e9;">
              <tr>
                <td>No</td>
                <td>Nama</td>
								<td>Asal/Instansi/lembaga</td>
                <td>Tujuan</td>
                <td>Keperluan</td>
                <td>No Visitor</td>
                <td>Waktu Masuk</td>
                <td>Waktu Keluar</td>
              </tr>
            </thead>
            <tbody>
            <?php
              $tgl=date('d-m-Y');
              $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, buku_tamu.asal, buku_tamu.fungsi, pengunjung.nama, buku_tamu.keperluan,
                buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE
                pengunjung.id_pengunjung = buku_tamu.id_pengunjung AND year(buku_tamu.masuk) = year(now())
                AND month(buku_tamu.masuk) = month(now()) AND day(buku_tamu.masuk) = day(now())
                ORDER BY buku_tamu.masuk ASC");
              $no = 1;
              while ($data = mysqli_fetch_array($query)) {
            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['asal']; ?></td>
                <td><?php echo $data['fungsi']; ?></td>
                <td><?php echo $data['keperluan']; ?></td>
                <td style="text-align: center;">
                  <span class="label label-info"><?php echo $data['no_visitor']; ?></span>
                </td>
                <td>
                  <?php
                    $space1 = explode(' ',$data['masuk']);
                    // $data['masuk'];
                    echo '<STRONG style="color:#5cb85c;">'.$space1[1].'</STRONG>';
                  ?>
                </td>
                <td>
                  <?php
                  $keluar =$data['keluar'];
                  $space2 = explode(' ',$data['keluar']);
                  if($keluar == ""){
                    echo '<a id="myButton1" data-end-text="The End" data-load-text="Loading..." class="btn btn-danger waktu-keluar" href="keluar.php?id='.$data['id_pengunjung'].'&waktu='.$data['masuk'].'" autocomplete="off">Keluar</a>';
                  } else if($keluar != ""){
                    echo '<STRONG style="color:#d9534f;">'.$space2[1].'</STRONG>';
                  }
                 ?>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </section>
	<?php include_once 'footer.php'; ?>
	<script src="js/jquery-3.1.1.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  $(function() {
    $( "#no_id" ).autocomplete({
        source: "pelanggan.php",
        minLength:1,
    });

    $('#myButton1').on("click", function() {
    $('#myButton1').button("load");
    setTimeout(function() {
        $('#myButton1').button("end");
        $('#myButton1').attr('disabled', 'disabled');
      }, 1000);
    });
  } );
  </script>
</body>
</html>
<?php
    } else {
        header("location: index.php");
    }
?>
