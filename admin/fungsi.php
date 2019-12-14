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
  	<link href="../css/jquery-ui.css" rel="stylesheet">
	<link href="../css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script src="../js/jam.js" type="text/javascript"> </script>
    <style>
		.report{
			width: 100px;
		}
        .form-group{
            margin-top: 5px;
            margin-left: 7%;
        }
        .col-md-12{margin-left: 15px;}
        button.btn{
           margin-right: 7%;
        }
        .panel-default{ margin-left: 15px;}
        .form-horizontal .control-label{
            padding-top: 5px;
            padding-left: 23px;
        }
        .col-sm-9{
            margin-left: -20px;
        }
        .f2.col-lg-6{ margin-left: -2%}
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
      <li><a href="fungsi.php" class="active"><span class="glyphicon glyphicon-cog" style="width: 13%"></span>Fungsi Admin</a></li>
			<li><a href="tambah_user.php" ><span class="glyphicon glyphicon-user" style="width: 13%"></span>Tambah Pengguna</a></li>
			<li><a href="kelola_user.php" ><span class="glyphicon glyphicon-edit" style="width: 13%"></span>Kelola Pengguna</a></li>
			<li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
    </ul>
  <!-- </div> -->
</aside>
    <section class="main-content col-md-10 text-center">
        <div class="row" style="margin-bottom:0;"><div class="col-md-12" style="text-align:right; font-size:12px; padding-right:0;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></div></div>
      <div class="row" style="margin-top: 10px;">
        <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php
                                if (@$_GET['error'] == 1){
                            ?>
                                <div class="col-lg-12">
                                    <div class="alert alert-info alert-success">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="fa fa-info-circle"></i>  <strong>Data Berhasil Di Simpan</strong> Ke <strong>DATABASE</strong>, Terima Kasih telah menambah Data!
                                    </div>
                                </div>
                            <?php
                                } else if (@$_GET['error'] == 2){
                            ?>
                                    <div class="col-lg-12">
                                        <div class="alert alert-info alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-info-circle"></i>  <strong>Data Gagal Di Simpan</strong> Ke <strong>DATABASE</strong>!!!
                                        </div>
                                    </div>
                            <?php
                                } else if (@$_GET['error'] == 3){
                            ?>
                                    <div class="col-lg-12">
                                        <div class="alert alert-info alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <i class="fa fa-info-circle"></i>  <strong>Nama</strong> Fungsi <strong>Tidak Boleh Sama</strong>!!!
                                        </div>
                                    </div>
                            <?php
                                }
                            ?>

                                <h2 class="text-center">Tambah Fungsi</h2>
                                <?php if (@$_GET['edit'] == 1) { ?>
                                <!-- form -->
                                <form  class="form-horizontal" action="edit_fungsi.php" method="POST">
                                    <?php
                                        $id_fungsi = @$_GET['id_fungsi'];
                                        $fungsi = @$_GET['fungsi'];
                                    ?>

                                    <div class="form-group">
                                      <label class="control-label col-sm-3">Id Fungsi</label>
                                      <div class="col-sm-9">
                                        <input name="id_fungsi" class="form-control" id="disabledInput" type="number" value="<?php echo $id_fungsi ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label col-sm-3">Nama Fungsi</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $fungsi ?>" name="fungsi" required>
                                      </div>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-danger">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                                <?php } else { ?>
                                <!-- form -->
                                <form  class="form-horizontal" action="proses_fungsi.php" method="POST">
                                    <?php
                                        $cari_kode = mysqli_query($koneksi, "SELECT max(id_fungsi) FROM fungsi ORDER BY id_fungsi ASC"); //membuat variable query pada koneksi table
                                        $data_kode = mysqli_fetch_array($cari_kode); //membuat penampungan array data nim pada tableA
                                        if ($data_kode) { //kondisi, jika pada data array nim
                                            $nilai_kode = substr($data_kode[0],0); //pengurutan baris data awal (data kiri)yaitu 1454
                                            $kode = (int) $nilai_kode; //menampilakan data int pada nilai kode
                                            $kode = $kode + 1; //menambah nilai 1 pada data 0+1 = 1
                                            $hasil_kode = "".str_pad($kode, 0, "0", STR_PAD_LEFT); //menampilkan data Sting "", nilai 4 itu baris data
                                                                                                        //dari kanan dan 0 itu data penilaian dari 4 bari angka
                                        } else { //jika kondisi tidak pemenuhi data array kembali pada hasil ketetapan atau konstanta
                                            $hasil_kode = "01";
                                        }
                                    ?>

                                    <div class="form-group">
                                      <label class="control-label col-sm-3">Id Fungsi</label>
                                      <div class="col-sm-9">
                                        <input name="id_fungsi" class="form-control" id="disabledInput" type="number" value="<?php echo $hasil_kode ?>" readonly>
                                      </div>
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label col-sm-3">Nama Fungsi</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" placeholder="Nama Fungsi" name="fungsi" required>
                                      </div>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="reset" class="btn btn-danger">Batal</button>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="f2 col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h2 class="text-center">Fungsi</h2>
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Id Fungsi</th>
                                        <th>Nama Fungsi</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
    <?php
        $query = mysqli_query($koneksi, "SELECT * FROM fungsi ORDER BY id_fungsi ASC");
        $no = 1;
        while($data = mysqli_fetch_array($query)){
    ?>

                                <tbody>
                                    <tr>
                                        <td align="center"><?php echo $data['id_fungsi']; ?></td>
                                        <td align="left"><?php echo $data['fungsi']; ?></td>
                                        <td><a href="fungsi.php?edit=1&id_fungsi=<?php echo $data['id_fungsi']; ?>&fungsi=<?php echo $data['fungsi']; ?>" class="btn btn-success">Ubah</a></td>
                                        <td><a onclick="return confirm('Yakin Data ingin Dihapus?')" href=" hapus_fungsi.php?id=<?php echo $data['id_fungsi']; ?> " class="btn btn-danger">Hapus</a></td>
                                    </tr>
        <?php
            $no ++; }
        ?>
                                </tbody>
                            </table>
                        </div>
                            </div>
                        </div>
                    </div>

                </div>


      </div>
    </section>
  </section>
	<?php include_once 'footer_admin.php'; ?>

	<script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/bootstrap.js"></script>
</body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }
?>
