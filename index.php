<?php 
  session_start();
  include_once 'koneksi.php';

  if (isset($_SESSION['username']) || isset($_SESSION['fungsi'])){
    header('location: index.php');
  } else  {
?>
<!DOCTYPE html>
<html>
<head>
  <title>BAPER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" sizes="250x250" href="img/baper.png">
  <link href="css/log-in.css" rel="stylesheet">
</head>
<body>
  <div class="container">
  <img id="background" src="img/background.jpg">
	<div id="loginform">
		<div class="frame">
			<div id="facebook"><img src="img/logo_pertamina.png" alt=""></div>
			<div id="mainlogin">
				<form action="" method="POST" style="text-align: right;">
					<input type="text" name="username" placeholder="username" required autocomplete="off">
					<input type="password" name="password" placeholder="password" required>
					<button type="submit" value="LOGIN" name="login">LOGIN</button>
				</form>
				<?php
        // variable form
        $username = @$_POST['username'];
        $password = @$_POST['password'];
        //koneksi ke database berupa tabel user
        $cekuser = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        $hasil = mysqli_fetch_array($cekuser); // penampungan data user ke dalam Array (Struktur data)
        $login = @$_POST['login']; //variable buttom login

        //Kondisi variable login
        if($login){ 
            if (mysqli_num_rows($cekuser)==0) { //jika kondisi data sama dengan 0 maka gaagal login
                  ?> <script type="text/javascript"> alert("Gagal Login"); </script> <?php
                  $stop=1;
            } 
            if (@$stop!=1) { // jika kondisi berisi maka menampilkan beberapa fungsi login
              $data = mysqli_num_rows($cekuser);
              // $data = mysqli_num_rows($data);
              $fungsi = $hasil['fungsi'];
              // $pass = $hasil['password'];
              if ($fungsi == 'IT MOR II Palembang'){ //kondisi admin
                  $_SESSION['fungsi'] = $fungsi;
                  $_SESSION['username'] = $username;
                ?>
                  <script type="text/javascript"> 
                        // alert("Anda Berhasil login ADMIN", "success"); 
                        window.location.href = "admin/index.php";
                        // untuk langsung melihat
                    </script>
                <?php        
                } elseif ($fungsi == 'Customer Service') { //kondisi CS
                    $_SESSION['fungsi'] = $fungsi;
                    $_SESSION['username'] = $username;
                ?>
                  <script type="text/javascript"> 
                        // alert("Anda Berhasil login CS", "success"); 
                        window.location.href = "home.php";
                        // untuk langsung melihat
                    </script>
                <?php   
                } elseif ($fungsi == 'HSSE II' || $fungsi == 'External Relation Sumbagsel' || $fungsi == 'HR Sumbagsel') { // kondisi 3 fungsi
                    $_SESSION['fungsi'] = $fungsi;
                    $_SESSION['username'] = $username;
                ?>
                  <script type="text/javascript"> 
                        // alert("Anda Berhasil login 4 Fungsi", "success"); 
                        window.location.href = "fungsi1.php";
                        // untuk langsung melihat
                    </script>
                <?php   
                } else  { //kondisi 14 fungsi
                    $_SESSION['fungsi'] = $fungsi;
                    $_SESSION['username'] = $username;
                ?>
                  <script type="text/javascript"> 
                        // alert("Anda Berhasil login 14 Fungsi", "success"); 
                        window.location.href = "fungsi2.php";
                        // untuk langsung melihat
                    </script>
                <?php
                }
            }
        }
        ?>
			</div>
		</div>
	</div>
  </div>
</body>
</html>
<?php } ?>