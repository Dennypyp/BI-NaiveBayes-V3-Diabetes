<?php
require_once 'autoload.php';

$obj = new Bayes();

// echo $obj->sumData()."<br>";
// echo $obj->sumTrue()."<br>";
// echo $obj->sumFalse()."<br>";
// echo $obj->probUsia(21,0)."<br>";

$jumTrue = $obj->sumTrue();
$jumFalse = $obj->sumFalse();
$jumData = $obj->sumData();

$a1 = "Kehamilan Rendah";
$a2 = "Glukosa Rendah";
$a3 = "Hipotensi";
$a4 = "Tipis";
$a5 = "Insulin sedikit";
$a6 = "Kurus";
$a7 = "Nihil";
$a8 = "Remaja";

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
$paF = $obj->hasilFalse($jumTrue, $jumData, $hamil2, $glukosa2, $tekanan2, $tebal2, $insulin2, $BMI2, $riwayat2, $umur2);

echo "
======================================<br>
Jumlah Kehamilan : $a1<br>
Glukosa : $a2<br>
Tekanan Darah : $a3<br>
Ketebalan Kulit : $a4<br>
Tingkat Insulin : $a5<br>
BMI : $a6<br>
Riwayat Diabetes Keluarga : $a7<br>
Umur : $a8<br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan true : <br>
jumlah true : $jumTrue <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
kemungkinan false : <br>
jumlah false : $jumFalse <br>
jumlah data : $jumData <br>
=======================================<br><br>
";

echo "
======================================<br>
pATrue : $jumTrue / $jumData<br>
Jumlah Kehamilan true : $hamil / $jumTrue <br>
Glukosa true : $glukosa / $jumTrue <br>
Tekanan Darah true : $tekanan / $jumTrue <br>
Ketebalan Kulit true : $tebal / $jumTrue <br>
Tingkat Insulin true : $insulin / $jumTrue <br>
BMI true : $BMI / $jumTrue <br>
Riwayat Diabetes Keluarga true : $riwayat / $jumTrue <br>
Umur true : $umur / $jumTrue <br><br>
=======================================<br><br>
";

echo "
======================================<br>
pAFalse : $jumFalse / $jumData<br>
Jumlah Kehamilan false : $hamil2 / $jumFalse <br>
Glukosa false : $glukosa2 / $jumFalse <br>
Tekanan Darah false : $tekanan2 / $jumFalse <br>
Ketebalan Kulit false : $tebal2 / $jumFalse <br>
Tingkat Insulin false : $insulin2 / $jumFalse <br>
BMI false : $BMI2 / $jumFalse <br>
Riwayat Diabetes Keluarga false : $riwayat2 / $jumFalse <br>
Umur false : $umur2 / $jumFalse <br><br>
=======================================<br><br>
";

echo "
======================================<br>
presentasi yes : $paT<br>
presentasi no : $paF<br>
=======================================<br><br>
";

if ($paT > $paF) {
  echo "
  ======================================<br>
  PRESENTASI YES LEBIH BESAR DARI PADA PRESENTASI NO<br>
  =======================================
  <br><br>";
} else if ($paF > $paT) {
  echo "
  ======================================<br>
  PRESENTASI NO LEBIH BESAR DARI PADA PRESENTASI YES<br>
  =======================================
  <br><br>";
}

// echo $obj->hasilTrue($jumTrue,$jumData,$Usia,$kelamin,$keringat,$batuk,$kondisi)."<br>";
// echo $obj->hasilFalse($jumTrue,$jumData,$Usia2,$kelamin2,$keringat2,$batuk2,$kondisi2)."<br><br>";

$result = $obj->perbandingan($paT, $paF);
echo " Status : $result[0] <br>Presentasi positif sebanyak : " . round($result[1], 2) . " % <br>Presentasi negatif sebanyak : " . round($result[2], 2) . " % ";
