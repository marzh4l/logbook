<?php  
    session_start();
	include_once 'koneksi.php';
	// Fungsi header dengan mengirimkan raw data excel
	header("Content-type: application/vnd-ms-excel");
    // Mendefinisikan nama file ekspor "hasil-export.xls"
	header("Content-Disposition: attachment; filename=Data_logbook_MORII.xls");
   
    if($lap = @$_GET['tgl']){
        $hari = @$_GET['tgl'];
        $exp = explode('-',$hari);
        $fungsi = @$_GET['fungsitgl'];
       $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, buku_tamu.asal, pengunjung.nama, buku_tamu.keperluan, buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE pengunjung.id_pengunjung = buku_tamu.id_pengunjung 
                    AND year(buku_tamu.masuk) = '$exp[2]' 
                    AND month(buku_tamu.masuk) = '$exp[1]'
                    AND day(buku_tamu.masuk) = '$exp[0]'
                    AND buku_tamu.fungsi = '$fungsi'
                    ORDER BY buku_tamu.masuk ASC");
?>
    <p align="center" style="font-size: 15px; font-weight:bold;">
        Report LogBooks Tamu<br>
        PT.Pertamina (Persero) MOR II<br>
        Fungsi <?php echo $fungsi; ?>
    </p> 
    <p>Tanggal : <?php echo date (" d F Y"); ?></p>
        <table border="1">  
            <thead bgcolor="#5cb85c" align="center">
                <tr bgcolor="#06a0e9" >
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal/Instansi/Lembaga</th>
                    <th>Keperluan</th>
                    <th>No Visitor</th>
                    <th>Waktu Masuk</th>
                    <th>Wakty Keluar</th>
                </tr>
            </thead>
    <?php     
        //Menampilkan data dari database
            $no = 1;
        while($data = mysqli_fetch_assoc($query)){                     
            echo '<tr>';
            echo '<td width="50" align="center">'.$no.'</td>';
            echo '<td width="200">'.$data['nama'].'</td>';
            echo '<td>'.$data['asal'].'</td>';
            echo '<td width="200">'.$data['keperluan'].'</td>';
            echo '<td align="center">'.$data['no_visitor'].'</td>';
            echo '<td align="center">'.$data['masuk'].'</td>';
            echo '<td align="center">'.$data['keluar'].'</td>';
            echo '</tr>';
             $no++;
        }     
    ?>
  </table>
<?php
    } else if($lap = @$_GET['bulan']){
        $bulan = @$_GET['bulan'];
        $exp = explode('-',$bulan);
        $fungsi = @$_GET['fungsibln'];
        $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, buku_tamu.asal, pengunjung.nama, buku_tamu.keperluan, buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE pengunjung.id_pengunjung = buku_tamu.id_pengunjung 
                    AND year(buku_tamu.masuk) = '$exp[1]' 
                    AND month(buku_tamu.masuk) = '$exp[0]'
                    AND buku_tamu.fungsi = '$fungsi'
                    ORDER BY buku_tamu.masuk ASC");
?>
    <p align="center" style="font-size: 15px; font-weight:bold;">
        Report LogBooks Tamu<br>
        PT.Pertamina (Persero) MOR II<br>
        Fungsi <?php echo $fungsi; ?>
    </p> 
    <p>Bulan : <?php echo date(" F Y"); ?></p>
        <table border="1">  
            <thead bgcolor="#5cb85c" align="center">
                <tr bgcolor="#06a0e9" >
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal/Instansi/Lembaga</th>
                    <th>Keperluan</th>
                    <th>No Visitor</th>
                    <th>Waktu Masuk</th>
                    <th>Wakty Keluar</th>
                </tr>
            </thead>
            <tbody>       
            </tbody>
    <?php     
        //Menampilkan data dari database
            $no = 1;
        while($data = mysqli_fetch_assoc($query)){                     
            echo '<tr>';
            echo '<td width="50" align="center">'.$no.'</td>';
            echo '<td width="200">'.$data['nama'].'</td>';
            echo '<td>'.$data['asal'].'</td>';
            echo '<td width="200">'.$data['keperluan'].'</td>';
            echo '<td align="center">'.$data['no_visitor'].'</td>';
            echo '<td align="center">'.$data['masuk'].'</td>';
            echo '<td align="center">'.$data['keluar'].'</td>';
            echo '</tr>';
             $no++;
        }     
    ?>
  </table>
<?php
    } else if($lap = @$_GET['tahun']){
        $tahun = @$_GET['tahun'];
        $exp = explode('-',$tahun);
        $fungsi = @$_GET['fungsithn'];
        $query = mysqli_query($koneksi,"SELECT pengunjung.id_pengunjung, buku_tamu.asal, pengunjung.nama, buku_tamu.keperluan, buku_tamu.no_visitor, buku_tamu.masuk, buku_tamu.keluar FROM pengunjung, buku_tamu WHERE pengunjung.id_pengunjung = buku_tamu.id_pengunjung 
                    AND year(buku_tamu.masuk) = '$exp[0]' 
                    AND buku_tamu.fungsi = '$fungsi'
                    ORDER BY buku_tamu.masuk ASC");
?>
    <p align="center" style="font-size: 15px; font-weight:bold;">
        Report LogBooks Tamu<br>
        PT.Pertamina (Persero) MOR II<br>
        Fungsi <?php echo $fungsi; ?>
    </p> 
    <p>Tahun : <?php echo date(" Y"); ?></p>
        <table border="1">  
            <thead bgcolor="#5cb85c" align="center">
                <tr bgcolor="#06a0e9" >
                    <th>No</th>
                    <th>Nama</th>
                    <th>Asal/Instansi/Lembaga</th>
                    <th>Keperluan</th>
                    <th>No Visitor</th>
                    <th>Waktu Masuk</th>
                    <th>Wakty Keluar</th>
                </tr>
            </thead>
            <tbody>       
            </tbody>
    <?php     
        //Menampilkan data dari database
            $no = 1;
        while($data = mysqli_fetch_assoc($query)){                     
            echo '<tr>';
            echo '<td width="50" align="center">'.$no.'</td>';
            echo '<td width="200">'.$data['nama'].'</td>';
            echo '<td>'.$data['asal'].'</td>';
            echo '<td width="200">'.$data['keperluan'].'</td>';
            echo '<td align="center">'.$data['no_visitor'].'</td>';
            echo '<td align="center">'.$data['masuk'].'</td>';
            echo '<td align="center">'.$data['keluar'].'</td>';
            echo '</tr>';
             $no++;
        }     
    ?>
  </table>
<?php
    }
?> 