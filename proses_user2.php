<?php
	include_once 'koneksi.php';
	$username = @$_POST['username'];
	$password = @$_POST['password']; 
	$nama = @$_POST['nama'];
	$fungsi = @$_POST['fungsi']; 
	if(eregi('.{6,}', $password) && eregi('[a-zA-Z]+', $password) && eregi('[0-9]+', $password) && eregi('[\!\@\#\$\%\^\&\*\(\)]+', $password)) {
		// echo "Password diterima";
		$query = mysqli_query($koneksi,"UPDATE user SET username = '$username', password = '$password', nama = '$nama' WHERE fungsi = '$fungsi'");
		if ($query) {
			header("location:my_account2.php?error=1"); 
		} else {
			header("location:my_account2.php?error=2"); 
		} 
	}
	else{
		header("location:my_account2.php?error=3");
		// echo '<b>Password minimal harus 6 karakter dan terdiri dari huruf, angka, dan simbol</b>';
	}

?>