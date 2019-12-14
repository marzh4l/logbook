<?php
  session_start();
  include_once '../koneksi.php';
  include_once '../konfigurasi.php';
    if (isset($_SESSION['username']) || isset($_SESSION['password'])){
      $table = $conn->query("SELECT * from fungsi");
?>
<!DOCTYPE html>
<html>
<head>
  <title>BAPER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" sizes="250x250" href="../img/baper.png">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">\
    <link href="../css/admin2.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <script type="text/javascript" src="../js/jam.js"></script>
</head>
<body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">
  <?php include_once 'menu_admin.php'; ?>

  <section class="content row">
      <aside class="col-md-2" style="padding-right: 0; height: auto; font-size: 16px;">
  <!-- <div class="collapse navbar-collapse navbar-ex1-collapse"> -->
    <ul class="menu dropdown dropdown-fixed-top">
      <li><a href="index.php"><span class="glyphicon glyphicon-time" style="width: 13%"></span>Beranda</a></li>
      <li><a href="pencarian_admin.php" ><span class="glyphicon glyphicon-search" style="width: 13%"></span>Cari Pengunjung</a></li>
      <li><a href="data_pengunjung.php" ><span class="glyphicon glyphicon-list" style="width: 13%"></span>Data Pengenjung</a></li>
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
      <div class="row" style="margin-top: 30px;">
        <div class="col-md-offset-4 col-md-4" style="background: #e0e3e0;border-radius: 5px; padding-top: 10px;padding-bottom: 30px; border-left: none;">
            <center><h3>Ubah Pengguna</h3></center><br/>
            <form class="form-horizontal" method="post" action="proses_user.php"  enctype="multipart/form-data">
            <?php
              $username = @$_GET['username'];
              $query = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
              $data = mysqli_fetch_array($query);
            ?>
              <div class="field">
                <label>
                  <div>Username</div>
                  <input name="username" value="<?php echo $data['username'] ?>" required="required" />
                </label>
                <a href="#" class="tooltip-test" data-toggle="tooltip" title="Username akan digunakan untuk login">
                  <i class="glyphicon glyphicon-question-sign" style=""></i>
                </a>
              </div>
              <div class="field">
                <label>
                  <div>Password</div>
                  <input type="password" name="password" data-validate-length-range="6,30" required='required' value="<?php echo $data['password'] ?>">
                </label>
                <a href="#" class="tooltip-test" data-toggle="tooltip" title="Password minimal harus 6 karakter dan terdiri dari huruf, angka, dan simbol (!, @, #, $, %, ^, &, *, '(' atau ')' )">
                  <i class="glyphicon glyphicon-question-sign" style=""></i>
                </a>
              </div>

              <div class="field">
                <label>
                  <div>Nama</div>
                  <input name="nama" value="<?php echo $data['nama'] ?>" required="required" />
                </label>
                <a href="#" data-toggle="tooltip" title="Masukkan nama penanggung jawab fungsi">
                  <i class="glyphicon glyphicon-question-sign" style="margin-top: 0px;"></i>
                </a>
              </div>
              <div class="field">
                <label>
                  <div>Fungsi</div>
                  <input name="fungsi" value="<?php echo $data['fungsi'] ?>" readonly />
                </label>
              </div>
              <br/>
              <br/>
              <div class="form-group">
                <div class="col-md-offset-1 col-md-10 text-center" style="margin-left: 23%;">
                  <button style="margin-right: 50px; background-color: #ff0000; border-color: #ff0000;" type="reset" class="btn btn-success">Batal</button>
                  <button type="submit" class="btn btn-success">Simpan</button>
                </div>
              </div>
          </form>
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
                        <i class="fa fa-info-circle"></i>  <strong>Password minimal harus 6 karakter </strong> dan terdiri dari <strong>huruf, angka, dan simbol <br>(!, @, #, $, %, ^, &, *, '(' atau ')</strong>!!!
                    </div>
                </div>
        <?php
            }
        ?>
        </div>
      </div>
    </section>
  </section>
  <?php include_once '../footer.php'; ?>
  <script src="../js/jquery-3.1.1.js"></script>
  <script src="../js/jquery-ui.js"></script>
  <script src="../js/bootstrap.js"></script>
  <script src="../js/validator.js"></script>
  <script>
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

  </script>
</body>
</html>
<?php
    } else {
        header("location: index.php");
    }
?>
