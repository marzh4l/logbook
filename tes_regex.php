<?php
// $email = "ggmail.com";
//
// //cek kevalidan email
// if (!eregi('^[a-zA-Z0-9_\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9_\-\.]+$', $email))
// {
//   echo '<b>Email Tidak Valid</b>';
// } else{
// 	echo "email valid";
// }
// echo '<br/>';

$password = "dddf4@";

//cek kevalidan email
if(eregi('.{6,}', $password) && eregi('[a-zA-Z]+', $password) && eregi('[0-9]+', $password) && eregi('[\!\@\#\$\%\^\&\*\(\)]+', $password)) {
		echo "Password diterima";
}
else{
	echo '<b>Password minimal harus 6 karakter dan terdiri dari huruf, angka, dan simbol</b>';
}
?>
