<?php  
	include "../koneksi.php" ; 
	$username = @$_POST['username'];
	$password = @$_POST['password']; 
	$nama = @$_POST['nama'];
	$fungsi = @$_POST['fungsi']; 
	if(eregi('.{6,}', $password) && eregi('[a-zA-Z]+', $password) && eregi('[0-9]+', $password) && eregi('[\!\@\#\$\%\^\&\*\(\)]+', $password)) {
		// echo "Password diterima";
		$query = mysqli_query($koneksi,"INSERT INTO user(username,password,nama,fungsi) VALUES ('$username','$password','$nama','$fungsi')");
		if ($query) {
			header("location:tambah_user.php?error=1"); 
		} else {
			header("location:tambah_user.php?error=2"); 
		} 
	}
	else{
		header("location:tambah_user.php?error=3");
		// echo '<b>Password minimal harus 6 karakter dan terdiri dari huruf, angka, dan simbol</b>';
	}
	
?>