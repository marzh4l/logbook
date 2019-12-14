<?php
	include_once '../koneksi.php';
	$id = $_GET['id'];
	$hapus = mysqli_query($koneksi, "DELETE FROM fungsi WHERE id_fungsi = '$id'");
	if ($hapus) {
		echo "<script> alert('Data Berhasil di Hapus!')
					   location.replace('fungsi.php') </script>";
	} else {
		echo "<script> alert('Data Gagal di Hapus!')
					   location.replace('fungsi.php') </script>";
	}
?>