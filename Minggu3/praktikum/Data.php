<html> 
<head><title>Pengolahan Form</title>
</head> 

<body> 
<form action ="processor.php" method="post" 
name="input"> <table><tr>
<td>Nama Anda : </td><td><input type="text" name="nama"></td></tr> 
<tr><td>NIM Anda : </td><td><input type="text" name="nim"></td></tr>
<tr><td>program Studi : </td><td>
<select name="progs"> 
<option value="Teknik Informatika S1">A11</option> 
<option value="Sistem Informasi S1">A12</option> 
<option value="Teknik Informatika D3">A22</option> 
</select>  </td></tr>
<tr><td>Nilai Tugas</td><td><input type="number" name="NTugas" placeholder="angka maksimal 100"></td></tr>
<tr><td>Nilai UTS</td><td><input type="number" name="NUts" placeholder="angka maksimal 100"></td></tr>
<tr><td>Nilai UAS</td><td><input type="number" name="Nuas" placeholder="angka maksimal 100"></td></tr>
<tr><td>catatan Khusus</td>
<td><input type="checkbox" name="1" value="Kehadiran >= 70 %" checked> 
Kehadiran >= 70 %
<br> 
<input type="checkbox" name="2" value="interaktif dikelas"> 
interaktif dikelas<br> 
<input type="checkbox" name="3" value="Tidak terlambat mengumpulkan tugas">
Tidak terlambat mengumpulkan tugas<br> </td></tr>
<tr><td>
<input type="submit" name="Input" value="Input"> </td></tr>
</table></form> 

</body> 
</html>