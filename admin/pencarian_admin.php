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
  	<link rel="stylesheet" href="../css/jquery-ui.css">
    <script type="text/javascript" src="../js/jam.js"></script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
  <?php include_once 'menu_admin.php'; ?>

  <section class="content row">
    <aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
  <!-- <div class="collapse navbar-collapse navbar-ex1-collapse"> -->
    <ul class="menu dropdown dropdown-fixed-top">
      <li><a href="index.php" ><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
      <li><a href="pencarian_admin.php" class="active"><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
      <li><a href="data_pengunjung.php" ><span class="glyphicon glyphicon-list" style="width: 13%"></span>Data Pengunjung</a></li>
      <li><a href="buku_tamu.php" ><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
      <li><a href="fungsi.php" ><span class="glyphicon glyphicon-cog" style="width: 13%"></span>Fungsi Admin</a></li>
      <li><a href="tambah_user.php" ><span class="glyphicon glyphicon-user" style="width: 13%"></span>Tambah Pengguna</a></li>
      <li><a href="kelola_user.php" ><span class="glyphicon glyphicon-edit" style="width: 13%"></span>Kelola Pengguna</a></li>
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
    </ul>
  <!-- </div> -->
</aside>
    <section class="main-content col-md-10">
      <div class="row" style="margin-bottom:0;"><div class="col-md-12" style="text-align:right; font-size:12px; padding-right:0;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></div></div>
      <div class="row content-header">
        <div class="col-md-offset-3 col-md-6 form-horizontal">
          <div class="form-group">
            <label for="firstname" class="col-md-5 control-label">Nama Pengunjung</label>
            <div class="col-md-5">
            <input type="text" class="form-control" name="nama" placeholder="" id="nama">
            </div>
          </div>
          <div class="form-group">
            <label for="firstname" class="col-md-5 control-label">Tanggal Lahir</label>
            <div class="col-md-5">
              <input type="text" class="form-control" name="tgl" id="tgl">
            </div>
            <div class="col-md-2 text-center">
              <button class="btn btn-success" id="cari"><i class="glyphicon glyphicon-search"></i></button>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="background: #eaf0ea;">
        <div class="col-md-6 " style="padding: 0 20px;">
          <center><h3>Daftar Pengunjung</h3></center>
          <table class="table table-striped">
            <thead>
              <tr>
                <td>Nama</td>
                <td>Tanggal Lahir</td>
                <td>Identitas</td>
                <td></td>
              </tr>
            </thead>
            <tbody id="tpeng">

            </tbody>
          </table>
        </div>
        <div class="i-foto col-md-6 " style="padding: 20px; border-left: 1px solid black;">
            <p><img id="peng_foto" src="../img/logo1.png" alt=""><br/></p>
            <table id="peng_detail" style="margin-left: 20%; width:60%; text-align: left;">
              <tr>
                <td>No Pengunjung</td>
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
    </section>
  </section>
  <?php include_once 'footer_admin.php'; ?>

  <script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script language="javascript">

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
          $('#add').attr('href', '../tambah_identitas.php?id='+data.id_pengunjung);
        }
      });
    }
    $(function(){
      $('#nama').on("keypress", function(e){
        if(e.which == 13) {
          $("#tgl").focus();
        }
      });
    });
    $(function(){
      $('#tgl').on("keypress", function(e){
        if(e.which == 13) {
          var nama = $('#nama').val();
          if (nama == ""){
            alert("nama tidak boleh kosong");
          } else if (nama) {
            cari();
          }
        }
      });
    });
    $(function(){
			$('#cari').click(function(){
				cari();
			});
		});
    function cari(){
      var nama = $('#nama').val();
      var tgl = $("#tgl").val();
      if (nama != "" && tgl == "") {
        $.ajax({
          type : 'GET',
          url: "../cp_by_nama.php?nama="+nama,
          dataType : "json",
          success: function(data){
            var row, i, j = "";
            $('#tpeng').empty();

            $.each(data, function( key, value ) {
              var d = new Date(data[key].tgl);
              d = d.getDate() + '-' + (d.getMonth()+1) + '-' + d.getFullYear();
              row += '<tr><td>'+ data[key].nama +'</td><td>'+ d +'</td><td>';
              data2 = data[key].id;
              $.each(data2, function( key2, value2 ) {
                 row += data2[key2].type +' : ' + data2[key2].no_id +'<br/>';
              });
              row += '</td><td><button class="btn btn-success" onclick="detail(this.value)" value="'+ data[key].no +'">Detail</button></td></tr>';
            });
            $('#tpeng').append(row);
          },
          error : function(){
            alert("Data tidak ditemukan");
          }
        });
      } else if(nama != "" && tgl != ""){
        $.ajax({
          url: "../cp_by_nama_tgl.php?nama="+nama+"&tgl="+tgl,
          dataType : "json",
          success: function(data){
            var row, i, j = "";
            $('#tpeng').empty();

            $.each(data, function( key, value ) {
              row += '<tr><td>'+ data[key].nama +'</td><td>'+ data[key].tgl +'</td><td>';
              data2 = data[key].id;
              $.each(data2, function( key2, value2 ) {
                 row += data2[key2].type +' : ' + data2[key2].no_id +'<br/>';
              });
              row += '</td><td><button class="btn btn-success" onclick="detail(this.value)" value="'+ data[key].no +'">Detail</button></td></tr>';
            });
            $('#tpeng').append(row);
          },
          error : function(){
            alert("Data tidak ditemukan");
          }
        });
      }
    }

  </script>
</body>
</html>
<?php
    } else {
        header("location: ../index.php");
    }
?>
