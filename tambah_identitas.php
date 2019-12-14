<?php
  session_start();
  include_once 'koneksi.php';
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
  <script type="text/javascript" src="js/jam.js"></script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
  <?php include_once 'menu.php'; ?>
  <section class="content row">
        <aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
        <ul class="menu">
          <li><a href="home.php" ><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
          <li><a href="pencarian.php" class="active"><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
          <li><a href="tambah_data.php"><span class="glyphicon glyphicon-plus-sign" style="width: 13%"></span>Tambah Pengenjung</a></li>
          <li><a href="input_bt.php"><span class="glyphicon glyphicon-book" style="width: 13%"></span>Input Buku Tamu</a></li>
          <li><a href="buku_tamu_cs.php" ><span class="glyphicon glyphicon-folder-open" style="width: 13%"></span>Buku Tamu</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-out" style="width: 13%"></span>Logout</a></li>
        </ul>
      </aside>
    <section class="main-content col-md-10">
      <span class="status" style="margin-left: 87.4%; font-style: italic; font-size: 10px; padding-right: 0px;">Welcome <b><?php echo  $_SESSION['fungsi']; ?></b></span>
      <div class="row" style="margin-top: 30px;">
        <div class="col-xs-offset-1 col-md-10" style="background: #e0e3e0;border-radius: 5px;">
            <div class="i-foto col-md-6" style="border-right: 1px solid black">
              <p style="margin-top:30px;">
                  <?php
                    $id = $_GET['id'];
                    $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, pengunjung.nama, pengunjung.tgl, pengunjung.alamat, pengunjung.no_hp, pengunjung.foto, identitas.type, identitas.no_id FROM pengunjung, identitas WHERE pengunjung.id_pengunjung = identitas.id_pengunjung AND identitas.id_pengunjung = '$id'");
                    $data = mysqli_fetch_array($query);
                  ?>
                <img src="<?php echo $data['foto']; ?>" alt="">
                <table style="margin-left: 40px; width:100%; text-align: left;">
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
                <?php
                  $id_pengunjung = $data['id_pengunjung'];
                  $type = $data['type'];
                  $query_type = mysqli_query($koneksi,"SELECT * FROM identitas WHERE id_pengunjung = '$id_pengunjung'");
                  $no = 1;
                  while($data_type = mysqli_fetch_array($query_type)){
                ?>
                  <tr>
                    <td><?php echo $data_type['type']; ?></td>
                    <td>:</td>
                    <td><?php echo $data_type['no_id']; ?></td>
                  </tr>
                <?php $no++; } ?>
                </table>
              </p>
            </div>
            <div class="i-data col-md-6" style="padding-top: 10px;padding-bottom: 30px; border-left: none;">
              <center><h3>Tambah Identitas</h3></center><br/>
              <form class="form-horizontal" method="post" action="proses_ti.php"  enctype="multipart/form-data">
                <div class="form-group">
                  <label for="firstname" class="col-md-5 control-label">ID Pengunjung</label>
                  <div class="col-md-6" style="padding-right: 0px;">
                  <input type="text" name="id_pengunjung" class="form-control" value="<?php echo $data['id_pengunjung']; ?>" readonly>
                  </div>
                </div>

                <div class="form-group">
                  <label for="firstname" class="col-md-5 control-label">Type</label>
                  <div class="col-md-6" style="padding-right: 0px;">
                  <select class="form-control" name="type" style="width: 100%">
                    <option>-- Pilih --</option>
                      <?php
                        $query = mysqli_query($koneksi,"SELECT * FROM type WHERE type NOT IN (select type from identitas where id_pengunjung = $id) ORDER BY id_type ASC");
                          if(mysqli_num_rows($query) != 0){
                          while($data = mysqli_fetch_assoc($query)){
                              echo '<option value="'.$data['type'].'">'.$data['type'].'</option>';
                          }
                      }
                      ?>
                  </select>
                  </div>
                  <div class="col-md-1" style="padding-left: 3px; color: red; font-size: 15px;">*</div>
                </div>
                <div class="form-group" style="margin-bottom: 0px;">
                  <div class="field">
                    <label>
                      <div class="col-md-5 control-label">
                        <span>No. Identitas</span>
                      </div>
                      <div class="col-md-5" style="padding-left: 15px; padding-right: 0px;">
                        <input class='optional form-control' name="no_id" id="no_id" data-validate-length="" placeholder="Masukan No Identitas" required style="width: 195px;" />
                      </div>
                      <div class="col-md-1" style="padding-left: 29px; width: 29px; height: 0px; color: red; font-size: 15px;">*</div>
                      <div class="col-md-1" style="padding-left: 33px;">
                        <a href="#" class="tooltip-test" data-toggle="tooltip" id="no_id_tooltip" title="">
                          <i class="glyphicon glyphicon-question-sign" style="font-size: 18pt;margin-top: 6px;"></i>
                        </a>
                      </div>
                    </label>
                    <span class='extra'></span>
                  </div>
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
        </div>
      </div>

    </section>
  </section>
  <?php include_once 'footer.php'; ?>

  <script src="js/jquery-3.1.1.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/validator.js"></script>
  <script language="Javascript">
  // selecksi type
    $("select").change(function() {
      var jumlah = "";
      $( "select option:selected" ).each(function() {
        if($( this ).attr('value') == "KTP") jumlah = 16;
        else if($( this ).attr('value') == "SIM A") jumlah = 13;
        else if($( this ).attr('value') == "SIM C") jumlah = 12;
      });
      $('#no_id').removeAttr('readonly');
      $('#no_id').attr('data-validate-length', jumlah);
      $('#no_id_tooltip').attr('title', "Masukkan"+jumlah+" karakter");
    }).trigger( "change" );
    //end of seleksi type

    // initialize the validator
    var validator = new FormValidator(),
      $form = $('form');

    document.forms[0].addEventListener('blur', function(e){
      validator.checkField.call(validator, e.target)
    }, true);

    document.forms[0].addEventListener('input', function(e){
      validator.checkField.call(validator, e.target);
    }, true);

    document.forms[0].addEventListener('change', function(e){
      validator.checkField.call(validator, e.target)
    }, true);

    document.forms[0].onsubmit = function(e){
      var submit = true,
        validatorResult = validator.checkAll(this);

      console.log(validatorResult);
      return !!validatorResult.valid;
    };
    $('#alerts').change(function(){
      validator.settings.alerts = (this.checked) ? false : true;
      if( this.checked )
        $('form .alert').remove();
    }).prop('checked',false);
    // end of validation
      $(document).ready(function(){
    		$('#btn_add_visit').click(function(){
    			$('#visitor').append('<input style="width: 22%;" type="text" class="form-control visitor" name="1" value="">')
    		});
	     });
  </script>
</body>
</html>
<?php
    } else {
        header("location: index.php");
    }
?>
