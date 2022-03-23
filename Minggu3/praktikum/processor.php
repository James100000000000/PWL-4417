
<?php 
if (isset($_POST['Input'])) { 
$nama = $_POST['nama']; 
$nim = $_POST['nim'];
$prog = $_POST['progs'];
$uts = $_POST['NUts'];
$tugas = $_POST['NTugas'];
$uas = $_POST['Nuas'];
$na = 0.4*$tugas+0.3*$uts+0.3*$uas;
echo"<table style='padding: 15px; border: 1px solid;'>";
echo  "<tr style='padding: 15px; border: 1px solid;'>";
    echo "<td style='padding: 15px; border: 1px solid;'>Nama</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>NIM</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>Program Studi</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>Nilai Akhir</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>STATUS</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>Catatan Khusus</td>";
echo "</tr>";
echo  "<tr style='padding: 15px; border: 1px solid;'>";
    echo "<td style='padding: 15px; border: 1px solid;'>$nama</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>$nim</td>";
    echo "<td style='padding: 15px; border: 1px solid;'>";
    if ($prog == "Teknik Informatika S1"){echo " Teknik Informatika S1";}
    elseif ($prog == "Sistem Informasi S1"){echo "Sistem Informasi S1";}
    else echo "Teknik Informatika D3";
    echo"</td>";
    echo "<td style='padding: 15px; border: 1px solid; text-align:center;'>";echo $na;echo'</td>';
    echo "<td style='padding: 15px; border: 1px solid; text-align:center;'>";
    if ($na >60){
        echo 'LULUS';
    }
    else{echo 'TIDAK';}
    echo"</td>";
    echo "<td style='padding: 15px; border: 1px solid; text-align:center;'>";
    if (isset($_POST['1'])){echo 'Kehadiran >= 70 % <br>';}
    if (isset($_POST['2'])){echo 'interaktif dikelas <br>';}
    if (isset($_POST['3'])){echo 'Tidak terlambat mengumpulkan tugas <br>';}
    echo"</td>";
echo "</tr>";
echo "</table>";
} 
?> 