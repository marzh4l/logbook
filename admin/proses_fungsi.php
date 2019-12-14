<?PHP
include "../koneksi.php" ; 
	$id_fungsi = $_POST['id_fungsi']; 
	$fungsi = $_POST['fungsi']; 
	$cekuser = mysqli_query($koneksi,"SELECT * FROM fungsi WHERE fungsi = '$fungsi'"); 
	
	if (mysqli_num_rows($cekuser) > 0){ 
		header("location:fungsi.php?error=3"); 
	} else {
		$query = mysqli_query($koneksi,"INSERT INTO fungsi(id_fungsi,fungsi) VALUES ('$id_fungsi','$fungsi')");
		if ($query) {
			header("location:fungsi.php?error=1"); 
		} else {
			header("location:fungsi.php?error=2"); 
		} 
	}
?>