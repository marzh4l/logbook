<?php
  session_start();
  include_once '../koneksi.php';
  include_once '../konfigurasi.php';
    if (isset($_SESSION['username']) || isset($_SESSION['fungsi'])){
      $table = $conn->query("SELECT * from fungsi WHERE id_fungsi > 2");
      $table2 = $conn->query("select Distinct year(masuk) as tahun from buku_tamu;");
      $table3 = $conn->query("SELECT * from fungsi WHERE id_fungsi > 2");
      $table4 = $conn->query("SELECT * from fungsi WHERE id_fungsi > 2");
      $table5 = $conn->query("SELECT pengunjung.id_pengunjung, buku_tamu.asal, buku_tamu.fungsi, pengunjung.nama, buku_tamu.keperluan,
				buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE
				pengunjung.id_pengunjung = buku_tamu.id_pengunjung AND keluar IS NULL
				ORDER BY buku_tamu.masuk ASC");

			$tamu_bk = $table5->num_rows;
      @$tampil = $_GET['tampil'];
      $tgl = @$_POST['tgl'];
      $bulan = @$_POST['bulan'];
      $tahun = @$_POST['tahun'];
      $fungsitgl = @$_POST['fungsitgl'];
      $fungsibln = @$_POST['fungsibln'];
      $fungsithn = @$_POST['fungsithn'];
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
    <link href="../css/bootstrap-datepicker.css" rel="stylesheet"/>
    <script type="text/javascript" src="../js/jam.js"></script>
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
      <li><a href="buku_tamu.php" class="active"><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
      <li><a href="fungsi.php" ><span class="glyphicon glyphicon-cog" style="width: 13%"></span>Fungsi Admin</a></li>
      <li><a href="tambah_user.php" ><span class="glyphicon glyphicon-user" style="width: 13%"></span>Tambah Pengguna</a></li>
      <li><a href="kelola_user.php" ><span class="glyphicon glyphicon-edit" style="width: 13%"></span>Kelola Pengguna</a></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
    </ul>
  <!-- </div> -->
</aside>
    <section class="main-content col-md-10 text-center">
      <div class="row" style="margin-bottom:0;"><div class="col-md-12" style="text-align:right; font-size:12px; padding-right:0;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></div></div>
      <div class="row">
      <h1>Buku Tamu</h1><br/>
      <div class="col-md-offset-1 col-md-4">
        <form class="form-inline text-left" role="form" style="padding-top: 5px;">
          <label style="width: 170px;">Tampilkan Buku Tamu : </label>
          <select  name="tampil" id="tampil" class="form-control" required>
            <option value="perhari">Perhari</option>
            <option value="perbulan">Perbulan</option>
            <option value="pertahun">Pertahun</option>
          </select>
        </form>
      </div>
      <div class="col-md-4">
        <form method="POST" action="?tampil=hari" class="form-inline text-left" role="form" id="tampil_perhari" style="display: none;">
          <div class="form-group" style="margin-left: 0;">
            <label style="width: 60px;" for="name">Perhari</label>
            <input style="width: 100px;" type="text" name="tgl" class="form-control" id="tgl_hari" placeholder="dd/mm/yyyy">
          </div>
          <div class="form-group" style="margin-left: 0;">
            <select style="width: 100px;" name="fungsitgl" id="" class="form-control">
              <?php
                echo "<option>-- Fungsi --</option>";
              while ($row = $table->fetch_assoc() ) {
                echo '<option value="'. $row['fungsi'] .'" required>'. $row['fungsi'] .'</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group" style="margin-left: 0; width: 50px;"><button type="submit" class="btn btn-success" >OK</button></div>
        </form>
        <form method="POST" action="?tampil=bulan" class="form-inline text-left" role="form" id="tampil_perbulan" style="display: none;">
          <div class="form-group" style="margin-left: 0;">
            <label style="width: 60px;" for="name">Perbulan</label>
            <input style="width: 100px;" type="text" name="bulan" class="form-control" id="tgl_bulan" placeholder="mm/yyyy">
          </div>
          <div class="form-group" style="margin-left: 0;">
            <select style="width: 100px;" name="fungsibln" id="" class="form-control">
              <?php
                echo "<option>-- Fungsi --</option>";
              while ($row = $table3->fetch_assoc() ) {
                echo '<option value="'. $row['fungsi'] .'" required>'. $row['fungsi'] .'</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group" style="margin-left: 0; width: 50px;"><button type="submit" class="btn btn-success" >OK</button></div>
        </form>
        <form method="POST" action="?tampil=tahun" class="form-inline text-left" role="form" id="tampil_pertahun" style="display: none;">
          <div class="form-group" style="margin-left: 0;">
            <label style="width: 60px;" for="name">Pertahun</label>
          </div>
          <div class="form-group" style="margin-left: 0;">
            <select style="width: 100px;" name="tahun" class="form-control">
              <option value="">-- Tahun --</option>
              <?php
              while ($row = $table2->fetch_assoc() ) {
                echo '<option value="'. $row['tahun'] .'" required>'. $row['tahun'] .'</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group" style="margin-left: 0;">
            <select style="width: 100px;" name="fungsithn" id="" class="form-control">
              <?php
                echo "<option>-- Fungsi --</option>";
              while ($row = $table4->fetch_assoc() ) {
                echo '<option value="'. $row['fungsi'] .'" required>'. $row['fungsi'] .'</option>';
              }
              ?>
            </select>
          </div>
          <div class="form-group" style="margin-left: 0; width: 50px;"><button type="submit" class="btn btn-success" >OK</button></div>
        </form>
      </div>
      <div class="col-md-2" style="text-align:right; padding-top:4px;">
        <div class="row">
          <?php
    				if($tamu_bk == ""){
    					echo '<a class="btn btn-success" onclick="alert(\'Tidak ada pengunjung yang belum keluar\');">Pengunjung Belum Keluar</a>';
    				} else {
    					echo '<a href="buku_tamu_bk.php" class="btn btn-success" target="_self">Pengunjung Belum Keluar</a>';
    				}
    			 ?>
        </div>
      </div>
      <br/><br/>
        <div class="col-md-10 col-md-offset-1" style="padding-top: 10px;">
          <table class="table table-striped">
            <?php
              if($tampil == 'hari'){
                ?>
                <div class="alert alert-info" style="margin-bottom: 0;">Tanggal : <?php echo @$tgl ."<br/>Fungsi : ".$fungsitgl;?></div>
                <div class="alert" style="margin-bottom: 0;">Cetak :
                  <a id="link_cetak" target='_black'  href="../cetak_pdf_3f.php?<?php
                  if($tampil == "hari") echo 'lap=hari&tgl='.$tgl.'&fungsi='.$fungsitgl;
                  else if($tampil == "bulan") echo 'lap=bulan&bulan='.$bulan.'&fungsi='.$fungsibln;
                  else if($tampil == "tahun") echo 'lap=tahun&tahun='.$tahun.'&fungsi='.$fungsithn;
                  ?>" class="btn btn-success report" style="width: 100px; padding-left: initial;"><span class="glyphicon glyphicon-print" style="width: 45%"></span>PDF</a>
                  <a href="../excel.php?<?php
                  if($tampil == "hari"){ echo 'tgl='.$tgl.'&fungsitgl='.$fungsitgl;
                  } else if($tampil == "bulan"){ echo 'bulan='.$bulan.'&fungsibln='.$fungsibln;
                  } else if($tampil == "tahun"){ echo 'tahun='.$tahun.'&fungsithn='.$fungsithn;}
                  ?>" class="btn btn-success report" style="width: 100px; padding-left: initial;"><span class="glyphicon glyphicon-print" style="width: 45%"></span>EXCEL</a>
                </div>
            <thead style="    background: #06a0e9;">
              <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Asal/Instansi/lembaga</td>
                <td>Keperluan</td>
                <td>No Visitor</td>
                <td>Waktu Masuk</td>
                <td>Waktu Keluar</td>
                <td>Detail</td>
              </tr>
            </thead>
            <tbody>
            <?php
                $exp = explode('-',$tgl);

                $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, buku_tamu.asal, pengunjung.nama, buku_tamu.keperluan, buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE pengunjung.id_pengunjung = buku_tamu.id_pengunjung
                AND year(buku_tamu.masuk) = '$exp[2]'
                AND month(buku_tamu.masuk) = '$exp[1]'
                AND day(buku_tamu.masuk) = '$exp[0]'
                AND buku_tamu.fungsi = '$fungsitgl'
                ORDER BY buku_tamu.masuk ASC");
                $no = 1;
                  while (@$data = mysqli_fetch_array($query)) {
                    ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['asal']; ?></td>
                <td><?php echo $data['keperluan']; ?></td>
                <td style="text-align: center;">
                  <span class="label label-info" style="top: 5px;position: relative;"><?php echo $data['no_visitor']; ?></span>
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
                    // echo '<a id="myButton1" data-end-text="The End" data-load-text="Loading..." class="btn btn-danger waktu-keluar" href="keluar.php?id='.$data['id_pengunjung'].'&waktu='.$data['masuk'].'" autocomplete="off">Keluar</a>';
                    echo '<STRONG style="color:#428bca;">BELUM KELUAR</STRONG>';
                  } else if($keluar != ""){
                    echo '<STRONG style="color:#d9534f;">'.$space2[1].'</STRONG>';
                  }
                 ?>
                </td>
                <td style="padding-top: 5px;">
                  <button style="margin-right: 0;" onclick="detail(this.value)" value="<?php echo $data['id_pengunjung']; ?>" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                    Detail
                  </butoon>
                </td>
                <?php
                }

              } else if($tampil == 'bulan'){
                ?>
                <div class="alert alert-info" style="margin-bottom: 0;">Bulan : <?php echo @$bulan ."<br/>Fungsi : ".$fungsibln;?></div>
                <div class="alert" style="margin-bottom: 0;">Cetak :
                  <a id="link_cetak" target='_black'  href="../cetak_pdf_3f.php?<?php
                  if($tampil == "hari") echo 'lap=hari&tgl='.$tgl.'&fungsi='.$fungsitgl;
                  else if($tampil == "bulan") echo 'lap=bulan&bulan='.$bulan.'&fungsi='.$fungsibln;
                  else if($tampil == "tahun") echo 'lap=tahun&tahun='.$tahun.'&fungsi='.$fungsithn;
                  ?>" class="btn btn-success report" style="width: 100px; padding-left: initial;"><span class="glyphicon glyphicon-print" style="width: 45%"></span>PDF</a>
                  <a href="../excel.php?<?php
                  if($tampil == "hari"){ echo 'tgl='.$tgl.'&fungsitgl='.$fungsitgl;
                  } else if($tampil == "bulan"){ echo 'bulan='.$bulan.'&fungsibln='.$fungsibln;
                  } else if($tampil == "tahun"){ echo 'tahun='.$tahun.'&fungsithn='.$fungsithn;}
                  ?>" class="btn btn-success report" style="width: 100px; padding-left: initial;"><span class="glyphicon glyphicon-print" style="width: 45%"></span>EXCEL</a>
                </div>
                <thead style="    background: #06a0e9;">
              <tr>
                <td>No</td>
                <td>Tanggal</td>
                <td>Nama</td>
                <td>Asal/Instansi/lembaga</td>
                <td>Keperluan</td>
                <td>No Visitor</td>
                <td>Waktu Masuk</td>
                <td>Waktu Keluar</td>
                <td>Detail</td>
              </tr>
            </thead>
            <tbody>
                <?php
                $exp = explode('-',$bulan);

                $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, buku_tamu.asal, pengunjung.nama, buku_tamu.keperluan, buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE pengunjung.id_pengunjung = buku_tamu.id_pengunjung
                AND year(buku_tamu.masuk) = '$exp[1]'
                AND month(buku_tamu.masuk) = '$exp[0]'
                AND buku_tamu.fungsi = '$fungsibln'
                ORDER BY buku_tamu.masuk ASC");
                $no = 1;
                while (@$data = mysqli_fetch_array($query)) {

            ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td>
                  <?php
                    $exp_bln = explode(' ',$data['masuk']);
                    echo date('d-m-Y', strtotime($exp_bln[0]));
                  ?>
                </td>
                <td><?php echo $data['nama']; ?></td>
                <td><?php echo $data['asal']; ?></td>
                <td><?php echo $data['keperluan']; ?></td>
                <td style="text-align: center;">
                  <span class="label label-info"><?php echo $data['no_visitor']; ?></span>
                </td>
                <td>
                  <?php
                    $space = explode(' ',$data['masuk']);
                    echo '<STRONG style="color:#5cb85c;">'.$space[1].'</STRONG>';
                  ?>
                </td>
                <td>
                  <?php
                  $keluar =$data['keluar'];
                  if($keluar == ""){
                    // echo '<a id="myButton1" data-end-text="The End" data-load-text="Loading..." class="btn btn-danger waktu-keluar" href="keluar.php?id='.$data['id_pengunjung'].'&waktu='.$data['masuk'].'" autocomplete="off">Keluar</a>';
                    echo '<STRONG style="color:#428bca;">BELUM KELUAR</STRONG>';
                  } else if($keluar != ""){
                    echo '<STRONG style="color:#d9534f;">'.$space[1].'</STRONG>';
                  }
                 ?>
                </td>
								<td style="padding-top: 5px;">
									<button style="margin-right: 0;" onclick="detail(this.value)" value="<?php echo $data['id_pengunjung']; ?>" class="btn btn-success" data-toggle="modal" data-target="#myModal">
										Detail
									</butoon>
								</td>
              </tr>
              <?php
                }

              } elseif ($tampil == "tahun") {
                ?>
                <div class="alert alert-info" style="margin-bottom: 0;">Tahun : <?php echo @$tahun ."<br/>Fungsi : ".$fungsithn;?></div>
                <div class="alert" style="margin-bottom: 0;">Cetak :
                  <a id="link_cetak" target='_black'  href="../cetak_pdf_3f.php?<?php
                  if($tampil == "hari") echo 'lap=hari&tgl='.$tgl.'&fungsi='.$fungsitgl;
                  else if($tampil == "bulan") echo 'lap=bulan&bulan='.$bulan.'&fungsi='.$fungsibln;
                  else if($tampil == "tahun") echo 'lap=tahun&tahun='.$tahun.'&fungsi='.$fungsithn;
                  ?>" class="btn btn-success report" style="width: 100px; padding-left: initial;"><span class="glyphicon glyphicon-print" style="width: 45%"></span>PDF</a>
                  <a href="../excel.php?<?php
                  if($tampil == "hari"){ echo 'tgl='.$tgl.'&fungsitgl='.$fungsitgl;
                  } else if($tampil == "bulan"){ echo 'bulan='.$bulan.'&fungsibln='.$fungsibln;
                  } else if($tampil == "tahun"){ echo 'tahun='.$tahun.'&fungsithn='.$fungsithn;}
                  ?>" class="btn btn-success report" style="width: 100px; padding-left: initial;"><span class="glyphicon glyphicon-print" style="width: 45%"></span>EXCEL</a>
                </div>
              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </section>
  </section>
	<?php include_once 'footer_admin.php'; ?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body" style="height: 230px;">
					<div class="col-md-6" style="padding-left: 10px;"><img style="width: 300px;height: 200px;" id="peng_foto" src="img/logo1.png" alt=""></div>
					<div class="col-md-6" style="padding-top: 10px; padding-right: 10px;">
						<table id="peng_detail" style="margin-left: 5%; width:95%; text-align: left;">
							<tr>
                  <td>NO Pengunjung</td>
                  <td>:</td>
                  <td id="peng_no"></td>
              </tr>
              <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td id="peng_nama"></td>
              </tr>
              <tr>
                  <td>Tanggal Lahir</td>
                  <td>:</td>
                  <td id="peng_tgl"></td>
              </tr>
              <tr>
                  <td>Alamat</td>
                  <td>:</td>
                  <td id="peng_alamat"></td>
              </tr>
              <tr>
                  <td>No HP</td>
                  <td>:</td>
                  <td id="peng_no_hp"></td>
              </tr>
						</table>
					</div>
				</div>

				<div class="modal-footer">
						<a type="button" class="btn btn-primary pull-right" data-dismiss="modal">Kembali</a>
				</div>
			</div>
		</div>
	</div>



	<script src="../js/jquery-3.1.1.js"></script>

  <script src="../js/bootstrap.js"></script>
	<script src="../js/bootstrap-datepicker.js"></script>
  <script>
	function detail(id){
		$.ajax({
			type : 'GET',
			url: "../cp_detail.php?id="+id,
			dataType : "json",
			success: function(data){
				var d = new Date(data.tgl);
				d = d.getDate() + '-' + (d.getMonth()+1) + '-' + d.getFullYear();

				$('#peng_foto').attr('src', "");
				$('#add').attr('href', "");
				$('#peng_no').empty();
				$('#peng_nama').empty();
				$('#peng_tgl').empty();
				$('#peng_alamat').empty();
				$('#peng_no_hp').empty();
				for (i = 0; i < 3; i++) {
					$('#identitas').remove();
				}

				$('#peng_foto').attr('src', '../'+data.foto);
				$('#peng_no').append(data.id_pengunjung);
				$('#peng_nama').append(data.nama);
				$('#peng_tgl').append(d);
				$('#peng_alamat').append(data.alamat);
				$('#peng_no_hp').append(data.no_hp);
				$.each( data.identitas, function( key, value ) {
					$('#peng_detail').append('<tr id="identitas"><td>'+ data.identitas[key].type +'</td><td>:</td><td>'+ data.identitas[key].no_id +'</td></tr>');
				});
				$('#add').attr('href', 'tambah_identitas.php?id='+data.id_pengunjung);
			}
		});
	}
  // selecksi type
  $( "#tampil" ).change(function() {
    $( "select option:selected" ).each(function() {
      if($( this ).attr('value') == "perhari"){
        $("#tampil_perhari").css("display", "block");
        $("#tampil_perbulan").css("display", "none");
        $("#tampil_pertahun").css("display", "none");
      }

      else if($( this ).attr('value') == "perbulan"){
        $("#tampil_perhari").css("display", "none");
        $("#tampil_perbulan").css("display", "block");
        $("#tampil_pertahun").css("display", "none");
      }
      else if($( this ).attr('value') == "pertahun"){
        $("#tampil_perhari").css("display", "none");
        $("#tampil_perbulan").css("display", "none");
        $("#tampil_pertahun").css("display", "block");
      }

    });
    // $('#no_id').removeAttr('readonly');
    // $('#no_id').attr('data-validate-length', jumlah);
    // $('#no_id_tooltip').attr('title', "Masukkan"+jumlah+" karakter");
  }).trigger( "change" );
  //end of seleksi type

  $(function() {
    $('#tgl_hari').datepicker({
        format: "dd-mm-yyyy",
        // format: "yyyy-mm-dd",
        autoclose:true
    });
		$('#tgl_bulan').datepicker({
        format: "mm-yyyy",
        startView: "months",
        minViewMode: "months",
        autoclose:true
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
