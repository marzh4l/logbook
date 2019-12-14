<?php
	include_once '../koneksi.php';
	$username = $_GET['username'];
	$nama = $_GET['nama'];
	$reset = mysqli_query($koneksi,"UPDATE `logbook`.`user` SET `password` = '$username', `nama` = '' WHERE `user`.`username` = '$username'");
		if ($reset) {
			header("location:kelola_user.php?error=1");
		} else {
			header("location:kelola_user.php?error=2");
		}
?>