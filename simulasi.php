<?php
require_once 'autoload.php';

$obj = new Bayes();

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = $_POST['hamil'];
$a2 = $_POST['glukosa'];
$a3 = $_POST['tekanan'];
$a4 = $_POST['tebal'];
$a5 = $_POST['insulin'];
$a6 = $_POST['BMI'];
$a7 = $_POST['riwayat'];
$a8 = $_POST['umur'];

//TRUE
$hamil = $obj->probHamil($a1, 1);
$glukosa = $obj->probGlukosa($a2, 1);
$tekanan = $obj->probTekanan($a3, 1);
$tebal = $obj->probTebal($a4, 1);
$insulin = $obj->probInsulin($a5, 1);
$BMI = $obj->probBMI($a6, 1);
$riwayat = $obj->probRiwayat($a7, 1);
$umur = $obj->probUmur($a8, 1);

//FALSE
$hamil2 = $obj->probHamil($a1, 0);
$glukosa2 = $obj->probGlukosa($a2, 0);
$tekanan2 = $obj->probTekanan($a3, 0);
$tebal2 = $obj->probTebal($a4, 0);
$insulin2 = $obj->probInsulin($a5, 0);
$BMI2 = $obj->probBMI($a6, 0);
$riwayat2 = $obj->probRiwayat($a7, 0);
$umur2 = $obj->probUmur($a8, 0);

//result
$paT = $obj->hasilTrue($jumTrue, $jumData, $hamil, $glukosa, $tekanan, $tebal, $insulin, $BMI, $riwayat, $umur);
$paF = $obj->hasilFalse($jumFalse, $jumData, $hamil2, $glukosa2, $tekanan2, $tebal2, $insulin2, $BMI2, $riwayat2, $umur2);


echo "
<div class='jumbotron jumbotron-fluid' id='hslPrekdiksinya'>
  <div class='container'>
    <h1 class='display-4 tebal'>Hasil Prediksi</h1>
    <p class='lead'>Berikut ini adalah hasil prediksi berdasarkan ciri pasien menggunakan metode naive bayes.</p>
  </div>
</div>
";

echo "
<div class='card' style='width: 25rem;'>
  <div class='card-header' style='background-color:#17a2b8;color:#fff'>
    <b>Informasi Pasien</b>
  </div>
  <ul class='list-group list-group-flush'>
    <li class='list-group-item'>Jumlah Kehamilan : &nbsp;&nbsp;<b>$a1</b></li>
    <li class='list-group-item'>Glukosa : &nbsp;&nbsp;<b>$a2</b></li>
    <li class='list-group-item'>Tekanan Darah : &nbsp;&nbsp;<b>$a3</b></li>
    <li class='list-group-item'>Ketebalan Kulit : &nbsp;&nbsp;<b>$a4</b></li>
    <li class='list-group-item'>Tingkat Insulin : &nbsp;&nbsp;<b>$a5</b></li>
    <li class='list-group-item'>BMI : &nbsp;&nbsp;<b>$a6</b></li>
    <li class='list-group-item'>Riwayat Diabetes Keluarga : &nbsp;&nbsp;<b>$a7</b></li>
    <li class='list-group-item'>Umur : &nbsp;&nbsp;<b>$a8</b></li>
  </ul>
</div><br>
<hr>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th>Jumlah Positif</th>
    <th>Jumlah Negatif</th>
    <th>Jumlah Total Data</th>
  </tr>
  <tr>
    <td>$jumTrue</td>
    <td>$jumFalse</td>
    <td>$jumData</td>
  </tr>
</table>
";

echo "<br>
<table class='table table-bordered' style='font-size:18px;text-align:center'>
  <tr style='background-color:#17a2b8;color:#fff'>
    <th></th>
    <th>Positif</th>
    <th>Negatif</th>
  </tr>
  <tr>
    <td>pA</td>
    <td>$jumTrue / $jumData</td>
    <td>$jumFalse / $jumData</td>
  </tr>
  <tr>
    <td>Jumlah Kehamilan</td>
    <td>$hamil / $jumTrue</td>
    <td>$hamil2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Glukosa</td>
    <td>$glukosa / $jumTrue</td>
    <td>$glukosa2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Tekanan Darah</td>
    <td>$tekanan / $jumTrue</td>
    <td>$tekanan2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Ketebalan Kulit</td>
    <td>$tebal / $jumTrue</td>
    <td>$tebal2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Tingkat Insulin</td>
    <td>$insulin / $jumTrue</td>
    <td>$insulin2 / $jumFalse</td>
  </tr>
  <tr>
    <td>BMI</td>
    <td>$BMI / $jumTrue</td>
    <td>$BMI2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Riwayat Diabetes Keluarga</td>
    <td>$riwayat / $jumTrue</td>
    <td>$riwayat2 / $jumFalse</td>
  </tr>
  <tr>
    <td>Umur</td>
    <td>$umur / $jumTrue</td>
    <td>$umur2 / $jumFalse</td>
  </tr>
</table>
";



$result = $obj->perbandingan($paT, $paF);

if ($paT > $paF) {
  echo "<br>
  <h3 class='tebal'>PRESENTASI <span class='badge badge-danger' style='padding:10px'><b>POSITIF</b></span> LEBIH BESAR DARI PADA PRESENTASI NEGATIF</h3><br>";
  echo "<h4><br>Presentasi positif sebanyak : <b>" . round($result[1], 2) . " %</b> <br>Presentasi negatif sebanyak : <b>" . round($result[2], 2) . " % </b></h4>";
} else if ($paF > $paT) {
  echo "<br>
  <h3 class='tebal'>PRESENTASI <span class='badge badge-success' style='padding:10px'><b>NEGATIF</b></span> LEBIH BESAR DARI PADA PRESENTASI POSITIF</h3><br>";
  echo "<h4><br>Presentasi negatif sebanyak : <b>" . round($result[1], 2) . " %</b> <br>Presentasi positif sebanyak : <b>" . round($result[2], 2) . " % </b></h4>";
}


if ($result[0] == "Positif Diabetes") {
  echo "
  <div class='alert alert-danger mt-5' role='aler'>
    <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
    <p>Maaf, berdasarkan hasil prediksi , anda dinyatakan <b>Positif Diabetes!</b></p>
    <hr>
    <p class='mb-0'>- Silakan Merujuk ke Rumah Sakit Terdekat -</p>
  </div>";
} else {
  echo "
  <div class='alert alert-success mt-5' role='aler'>
  <h4 class='alert-heading'>Kesimpulan : $result[0] </h4>
  <p>Selamat ! berdasarkan hasil prediksi , anda dinyatakan <b>Negatif Diabetes!</p>
  <hr>
  <p class='mb-0'>- Semoga Selalu Sehat -</p>
  </div>";
}
