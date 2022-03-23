
<?php 
if (isset($_POST['Input'])) { 
$nama = $_POST['nama']; 
$nim = $_POST['nim'];
$prog = $_POST['progs'];
$uts = $_POST['NUts'];
$tugas = $_POST['NTugas'];
$uas = $_POST['Nuas'];
$na = 0.4*$tugas+0.3*$uts+0.3*$uas;
echo"<table style='padding: 15px;'>";
echo  "<tr>";
    echo "<td style='padding: 15px;'>Nama</td>";
    echo "<td style='padding: 15px;'>NIM</td>";
    echo "<td style='padding: 15px;'>Program Studi</td>";
    echo "<td style='padding: 15px;'>Nilai Akhir</td>";
    echo "<td style='padding: 15px;'>STATUS</td>";
    echo "<td style='padding: 15px;'>Catatan Khusus</td>";
echo "</tr>";
echo  "<tr>";
    echo "<td>$nama</td>";
    echo "<td>$nim</td>";
    echo "<td>";
    if ($prog == "Teknik Informatika S1"){echo " Teknik Informatika S1";}
    elseif ($prog == "Sistem Informasi S1"){echo "Sistem Informasi S1";}
    else echo "Teknik Informatika D3";
    echo"</td>";
    echo '<td style="text-align:center;">';echo $na;echo'</td>';
    echo "<td style='text-align:center;'>";
    if ($na >60){
        echo 'LULUS';
    }
    else{echo 'TIDAK';}
    echo"</td>";
    echo "<td>";
    if (isset($_POST['1'])){echo 'Kehadiran >= 70 % <br>';}
    if (isset($_POST['2'])){echo 'interaktif dikelas <br>';}
    if (isset($_POST['3'])){echo 'Tidak terlambat mengumpulkan tugas <br>';}
    echo"</td>";
echo "</tr>";
echo "</table>";
} 
?> 

