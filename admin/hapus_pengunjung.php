<?php
	include_once '../koneksi.php';
	$id_pengunjung = $_GET['id_pengunjung'];
	$hapus = mysqli_query($koneksi, "DELETE FROM pengunjung WHERE id_pengunjung = '$id_pengunjung'");
	if ($hapus) {
		echo "<script> alert('Data Berhasil di Hapus!')
					   location.replace('data_pengunjung.php') </script>";
	} else {
		echo "<script> alert('Data Gagal di Hapus!')
					   location.replace('data_pengunjung.php') </script>";
	}
?>