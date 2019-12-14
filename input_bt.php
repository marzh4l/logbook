<?php
	session_start();
	include_once "koneksi.php";
	if (isset($_SESSION['username']) || isset($_SESSION['fungsi'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>BAPER</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" sizes="250x250" href="img/baper.png">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/admin.css" rel="stylesheet">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<script type="text/javascript" src="js/jam.js"></script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
	<?php include_once 'menu.php'; ?>
	<section class="content row">
    	<aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
	      <ul class="menu">
	        <li><a href="home.php" ><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
	        <li><a href="pencarian.php"><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
	        <li><a href="tambah_data.php"><span class="glyphicon glyphicon-plus-sign" style="width: 13%"></span>Tambah Pengunjung</a></li>
	        <li><a href="input_bt.php" class="active"><span class="glyphicon glyphicon-book" style="width: 13%"></span>Input Buku Tamu</a></li>
	        <li><a href="buku_tamu_cs.php"><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
	        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
	      </ul>
	    </aside>

    	<section class="main-content col-md-10">
    	<span class="status" style="margin-left: 87%; font-style: italic; font-size: 10px; padding-right: 0px;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></span>
    <?php
		$id_pengunjung = @$_POST['id_pengunjung'];
		$no_id = @$_POST['no_id'];
	?>
	<div class="row content-header">
        <div class="col-md-offset-4 col-md-4 form-horizontal">
          <div class="form-group">
          	<form method="POST" action="">
	            <label for="firstname" class="col-md-4 control-label">Identitas</label>
	            <div class="col-md-6" style="padding-right: 0;">
	              <input type="text" id="no_id" name="no_id" class="form-control" autocomplete="on">
	            </div>
	            <div class="col-md-1" style="padding-left:0;">
	              <button class="btn btn-success" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	            </div>
            </form>
          </div>
        </div>
     </div>

     <div class="row" style="">
        <div class="col-xs-offset-1 col-md-10" style="background: #e0e3e0;border-radius: 5px;">
	<?php if (@$no_id == ""){ ?>
			<div class="i-foto col-md-6">
	            <p style="margin-top:30px;">
	                <img src="img/" alt="Foto Pengunjung">
	                <table style="margin-left: 70px; width:70%; text-align: left;">
	                  <tr>
	                    <td>NO Pengunjung</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>Nama</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>Tanggal Lahir</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>Alamat</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>No HP</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>KTP</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>SIM A</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                  <tr>
	                    <td>SIM C</td>
	                    <td>:</td>
	                    <td>-</td>
	                  </tr>
	                </table>
	            </p>
	        </div>
			<div class="i-data col-md-6" style="padding-top: 30px;padding-bottom: 30px;">
	            <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data">
	            	<fieldset disabled>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">ID Pengunjung</label>
	                  <div class="col-md-7">
	                  <input type="text" name="id_pengunjung" placeholder="Nomor Identitas" readonly class="form-control">
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">Asal/Instansi/lembaga</label>
	                  <div class="col-md-7">
	                  <input type="text" class="form-control" name="asal" placeholder="Asal/Instansi/Lembaga" readonly>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="disabledSelect" class="col-md-5 control-label">Fungsi Tujuan</label>
	                  <div class="col-md-7">
	                  <select class="form-control" id="disabledSelect" style="width: 100%">
	                    <option value="" readonly>-- Pilih --</option>
	                  </select>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">Keperluan</label>
	                  <div class="col-md-7">
	                  <input type="text" class="form-control" name="keperluan" placeholder="Keperluan" readonly>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">No Visitor</label>
	                  <div class="col-md-7" id="visitor">
	                    <input type="text" class="form-control visitor" ame="visitor" placeholder="Nomor Visitor" readonly>
	                  </div>
	                </div>
	                <div class="form-group">
	                  <div class="col-sm-offset-2 col-sm-10 text-center" style="margin-left: 23%;">
	                    <button style="margin-right: 50px; background-color: #ff0000; border-color: #ff0000;" type="reset" class="btn btn-success">Batal
	                    </button>
	                    <button type="submit" class="btn btn-success">Simpan</button>
	                  </div>
	                </div>
	                </fieldset>
	            </form>
	        </div>
	<?php } else if (@$no_id != ""){
		// echo $id_pengunjung;
		$query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, pengunjung.nama, pengunjung.tgl, pengunjung.alamat, pengunjung.no_hp, pengunjung.foto, identitas.type, identitas.no_id FROM pengunjung, identitas WHERE pengunjung.id_pengunjung = identitas.id_pengunjung AND identitas.no_id = '$no_id'");
		// $no = 1;
		if($data = mysqli_fetch_array($query)){
		// $data = mysqli_fetch_array($query);
	?>
			<div class="i-foto col-md-6">
	            <p style="margin-top:30px;">
	                <img src="<?php echo $data['foto']; ?>" alt="">
	                <table style="margin-left: 70px; width:70%; text-align: left;">
	                  <tr>
	                    <td>NO Pengunjung</td>
	                    <td>:</td>
	                    <td><?php echo $data['id_pengunjung']; ?></td>
	                  </tr>
	                  <tr>
	                    <td>Nama</td>
	                    <td>:</td>
	                    <td><?php echo $data['nama']; ?></td>
	                  </tr>
	                  <tr>
	                    <td>Tanggal Lahir</td>
	                    <td>:</td>
	                    <td><?php echo date('d-m-Y', strtotime($data['tgl'])); ?></td>
	                  </tr>
	                  <tr>
	                    <td>Alamat</td>
	                    <td>:</td>
	                    <td><?php echo $data['alamat']; ?></td>
	                  </tr>
	                  <tr>
	                    <td>No HP</td>
	                    <td>:</td>
	                    <td><?php echo $data['no_hp']; ?></td>
	                  </tr>
	                  <tr>
	                    <td>Kartu Identitas</td>
	                    <td>:</td>
	                <?php // while($array = mysqli_fetch_array($query)){ ?>
	                    <td><?php // echo $array['type']; ?></td>
	                  </tr>
	                <?php
	                  $id_pengunjung = $data['id_pengunjung'];
	                  $type = $data['type'];
	                  $query_type = mysqli_query($koneksi,"SELECT * FROM identitas WHERE id_pengunjung = '$id_pengunjung'");
	                  $no = 1;
	                  while($data_type = mysqli_fetch_array($query_type)){
	                ?>
	                  <tr>
	                    <td><?php echo $data_type['type']; ?></td>
	                    <td> </td>
	                    <td><?php echo $data_type['no_id']; ?></td>
	                  </tr>
	                <?php $no++; } ?>

	                </table>
	            </p>
	        </div>
			<div class="i-data col-md-6" style="padding-top: 30px;padding-bottom: 30px;">
	            <form class="form-horizontal" method="post" action="proses_bt.php">
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">ID Pengunjung</label>
	                  <div class="col-md-6" style="padding-right: 0px;">
	                  	<input type="text" name="id_pengunjung" value="<?php echo $data['id_pengunjung']; ?>" readonly class="form-control">
	                  </div>
	                  <div class="col-md-1" style="padding-left: 3px; padding-rigth: 0px;"></div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">Asal Instansi/lembaga</label>
	                  <div class="col-md-6" style="padding-right: 0px;">
	                  	<input type="text" class="form-control" name="asal" placeholder="Asal/Instansi/Lembaga" required>
	                  </div>
	                  <div class="col-md-1" style="padding-left: 3px; padding-rigth: 0px; color: red; font-size: 15px;">*</div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">Fungsi Tujuan</label>
	                  <div class="col-md-6" style="padding-right: 0px;">
	                  <select class="form-control" name="fungsi" style="width: 100%">
	                    <option value="0">-- Pilih --</option>
						<?php
	    					mysqli_select_db("fungsi");
	    					$sql = mysqli_query($koneksi,"SELECT * FROM fungsi WHERE id_fungsi >= '3' ORDER BY fungsi ASC");
	    					if(mysqli_num_rows($sql) != 0){
	    					    while($data = mysqli_fetch_assoc($sql)){
	    					        echo '<option>'.$data['fungsi'].'</option>';
	    					    }
	    					}
    					?>
	                  </select>
	                  </div>
	                  <div class="col-md-1" style="padding-left: 3px; padding-rigth: 0px; color: red; font-size: 15px;">*</div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">Keperluan</label>
	                  <div class="col-md-6" style="padding-right: 0px;">
	                  <input type="text" class="form-control" name="keperluan" placeholder="Keperluan" required>
	                  </div>
	                  <div class="col-md-1" style="padding-left: 3px; padding-rigth: 0px; color: red; font-size: 15px;">*</div>
	                </div>
	                <div class="form-group">
	                  <label for="firstname" class="col-md-5 control-label">No Visitor</label>
	                  <div class="col-md-6" style="padding-right: 0px;" id="visitor">
	                    <input type="text" class="form-control visitor" name="no_visitor" placeholder="Nomor Visitor" required>
	                  </div>
	                  <div class="col-md-1" style="padding-left: 3px; padding-right: 0px; color: red; font-size: 15px;">*</div>
	                </div>
	                	<span class="status" style="font-size: 10px; margin-left: 58%;">*Wajib di isi</span>
	                <div class="form-group">
	                  <div class="col-sm-offset-2 col-sm-10 text-center" style="margin-left: 23%; margin-top: 10px;">
	                    <button style="margin-right: 50px; background-color: #ff0000; border-color: #ff0000;" type="reset" class="btn btn-success">Batal</button>
	                    <button type="submit" class="btn btn-success">Simpan</button>
	                  </div>
	                </div>
	            </form>
	        </div>
	        <?php 
	    		} else {
	    			// echo "<strong>Sorry Data Tidak Ditemukan</strong>";
	    	?>
	    			<div class="col-lg-4"></div>
	    			<div class="col-lg-4">
	                    <div class="alert alert-info alert-danger text-center" style="margin-top: 7%; width: 85%;">
	                        <!-- <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times;</button> -->
	                        <i class="fa fa-info-circle"></i>  <strong>data</strong> tidak <strong>diTemukan</strong>
	                    </div>
	                </div>
	                <div class="col-lg-4"></div>
	        <?php
	        	} 
	        ?>
	<?php } ?>
		</div>
	</div>
		</section>
	</section>
	<?php include_once 'footer.php'; ?>
	<script src="js/jquery-3.1.1.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script language="Javascript">
      $(document).ready(function(){
    		$('#btn_add_visit').click(function(){
    			$('#visitor').append('<input style="width: 22%;" type="text" class="form-control visitor" name="1" value="">')
    		});
	     });
			 $( "#no_id" ).autocomplete({
	       source: "search_id.php",
	       minLength:1
	     });

  </script>
</body>
</html>
<?php
    } else {
        header("location: index.php");
    }
?>
