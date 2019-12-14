<?php 
	echo date(" F Y");
	echo "<br>";
	echo date(" d F Y"); 
?>
<!-- <form method="POST" action="">
	
		<select type="submit" name="pilih">
			<option value="0">Pilih</option>
			<option value="pilih 1">Pilih 1</option>
			<option value="pilih 2">Pilih 2</option>
			<option value="pilih 3">Pilih 3</option>
		</select>
		<input type="submit" value="OK">

		<input type="text" maxlength="6" accept="image/jpg" id="check" data-minlength="6" /><br />
		<input type="submit" value="send" />
</form> -->

	<script>
// 		$(function() {
//     $('input[type="submit"]').prop('disabled', true);
//     $('#check').on('input', function(e) {
//         if(this.value.length === 6) {
//             $('input[type="submit"]').prop('disabled', false);
//         } else {
//             $('input[type="submit"]').prop('disabled', true);
//         }
//     });
// });
	</script>
<?php 
	// $pilih = @$_POST['pilih'];
	// echo $pilih;
?>

<html>
<head>
<title>Javascript Form Validation Example</title>
<script language="javascript" type='text/javascript'>
 
function validasi(){
 
    var nama = document.getElementById('nama');
    var alamat = document.getElementById('alamat');
    var kodepos = document.getElementById('kodepos');
    var status = document.getElementById('status');
    var username = document.getElementById('username');
    var email = document.getElementById('email');
 
    if(isAlphabet(nama, "Nama hanya berisi huruf!")){
        if(isAlphanumeric(alamat, "Alamat hanya berisi huruf dan angka!")){
            if(isNumeric(kodepos, "Kode pos hanya berisi angka!")){
                if(madeSelection(status, "Status belum dipilih!")){
                    if(lengthRestriction(username, 6, 8)){
                        if(emailValidator(email, "Email anda salah!")){
                            return true;
                        }
                    }
                }
            }
        }
    }
 
    return false;
 
}
 
function notEmpty(elem, helperMsg){
    if(elem.value.length == 0){
        alert(helperMsg);
        elem.focus();
        return false;
    }
    return true;
}
 
function isNumeric(elem, helperMsg){
    var numericExpression = /^[0-9]+$/;
    if(elem.value.match(numericExpression)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
 
function isAlphabet(elem, helperMsg){
    var alphaExp = /^[a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
 
function isAlphanumeric(elem, helperMsg){
    var alphaExp = /^[0-9a-zA-Z]+$/;
    if(elem.value.match(alphaExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
 
function lengthRestriction(elem, min, max){
    var uInput = elem.value;
    if(uInput.length >= min && uInput.length <= max){
        return true;
    }else{
        alert("Harap isikan di antara " +min+ " dan " +max+ " karakter");
        elem.focus();
        return false;
    }
}
 
function madeSelection(elem, helperMsg){
    if(elem.value == "Pilih Status"){
        alert(helperMsg);
        elem.focus();
        return false;
    }else{
        return true;
    }
}
 
function emailValidator(elem, helperMsg){
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if(elem.value.match(emailExp)){
        return true;
    }else{
        alert(helperMsg);
        elem.focus();
        return false;
    }
}
</script>
</head>
<body>
<form id="biodata-form" method="post" onsubmit='return validasi()'>
                            <table id="tabel-biodata"> 
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" id="nama" value="" maxlength="1024"/></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" id="alamat" value="" maxlength="1024"/></td>
                                </tr>
                                <tr>
                                    <td>Kode Pos</td>
                                    <td><input type="text" id="kodepos" value="" maxlength="1024"/></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <select id='status'>
                                            <option>Pilih Status</option>
                                            <option>Kawin</option>
                                            <option>Belum Kawin</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><textarea id="username" value="" style="height: 100px;"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" id="email" value="" maxlength="1024"/></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Simpan" class="button"/></td>
                                </tr>
                            </table>
                        </form>
</body>
</html>