<?php
	include_once '../koneksi.php';
	$id_fungsi = $_POST['id_fungsi'];
	$fungsi = $_POST['fungsi'];
	$cekuser = mysqli_query($koneksi,"SELECT * FROM fungsi WHERE fungsi = '$fungsi'"); 
	
	if (mysqli_num_rows($cekuser) > 0){
		header("location:fungsi.php?error=3"); 
	} else {
		$edit = mysqli_query($koneksi,"UPDATE `logbook`.`fungsi` SET `fungsi` = '$fungsi' WHERE `fungsi`.`id_fungsi` = '$id_fungsi'");
		if ($edit) {
			header("location:fungsi.php?error=1");
		} else {
			header("location:fungsi.php?error=2");
		}
	}
?>