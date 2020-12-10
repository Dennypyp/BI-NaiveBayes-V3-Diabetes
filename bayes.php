<?php
class Bayes
{
  private $pasien = "dataDiabetes.json";
  // private $jumTrue = 0;
  // private $jumFalse = 0;
  // private $jumData = 0;

  function __construct()
  {
  }

  /*================================================================
  FUNCTION SUM TRUE DAN FALSE
  =================================================================*/
  function sumTrue()
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['diabetes'] == 1) {
        $t += 1;
      }
    }

    return $t;
  }

  function sumFalse()
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['diabetes'] == 0) {
        $t += 1;
      }
    }
    return $t;
  }

  function sumData()
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);
    return count($hasil);
  }

  //=================================================================

  /*================================================================
  FUNCTION PROBABILITAS
  =================================================================*/
  function probHamil($hamil, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['hamil'] == $hamil && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['hamil'] == $hamil && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probGlukosa($glukosa, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['glukosa'] == $glukosa && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['glukosa'] == $glukosa && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probTekanan($tekanan, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['tekanan'] == $tekanan && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['tekanan'] == $tekanan && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probTebal($tebal, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['tebal'] == $tebal && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['tebal'] == $tebal && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probInsulin($insulin, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['insulin'] == $insulin && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['insulin'] == $insulin && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probBMI($BMI, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['BMI'] == $BMI && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['BMI'] == $BMI && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probRiwayat($riwayat, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['riwayat'] == $riwayat && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['riwayat'] == $riwayat && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }

  function probUmur($umur, $status)
  {
    $data = file_get_contents($this->pasien);
    $hasil = json_decode($data, true);

    $t = 0;
    foreach ($hasil as $hasil) {
      if ($hasil['umur'] == $umur && $hasil['diabetes'] == $status) {
        $t += 1;
      } else if ($hasil['umur'] == $umur && $hasil['diabetes'] == $status) {
        $t += 1;
      }
    }
    return $t;
  }
  //=================================================================

  /*=================================================================
  MARI BERHITUNG
  keterangan parameter :
  $sT   : jumlah data yang bernilai true ( sumTrue )
  $sF   : jumlah data yang bernilai false ( sumFalse )
  $sD   : jumlah data pada data latih ( sumData )
  $pH   : jumlah probabilitas hamil ( probHamil )
  $pG   : jumlah probabilitas glukosa ( probGlukosa )
  $pTE  : jumlah probabilitas tekanan ( probTekanan )
  $pTB   : jumlah probabilitas tebal ( probTebal )
  $pI   : jumlah probabilitas insulin (probInsulin )
  $pB   : jumlah probabilitas BMI (probBMI )
  $pR   : jumlah probabilitas riwayat (probRiwayat )
  $pU   : jumlah probabilitas umur (probUmur )
  ==================================================================*/

  function hasilTrue($sT = 0, $sD = 0, $pH = 0, $pG = 0, $pTE = 0, $pTB = 0, $pI = 0, $pB = 0, $pR = 0, $pU=0)
  {
    $paTrue = $sT / $sD;
    $p1 = $pH / $sT;
    $p2 = $pG / $sT;
    $p3 = $pTE / $sT;
    $p4 = $pTB / $sT;
    $p5 = $pI / $sT;
    $p6 = $pB / $sT;
    $p7 = $pR / $sT;
    $p8 = $pU / $sT;
    $hsl = $paTrue * $p1 * $p2 * $p3 * $p4 * $p5* $p6* $p7* $p8;
    return $hsl;
  }

  function hasilFalse($sF = 0, $sD = 0, $pH = 0, $pG = 0, $pTE = 0, $pTB = 0, $pI = 0, $pB = 0, $pR = 0, $pU=0)
  {
    $paFalse = $sF / $sD;
    $p1 = $pH / $sF;
    $p2 = $pG / $sF;
    $p3 = $pTE / $sF;
    $p4 = $pTB / $sF;
    $p5 = $pI / $sF;
    $p6 = $pB / $sF;
    $p7 = $pR / $sF;
    $p8 = $pU / $sF;
    $hsl = $paFalse * $p1 * $p2 * $p3 * $p4 * $p5* $p6* $p7* $p8;
    return $hsl;
  }

  function perbandingan($pATrue, $pAFalse)
  {
    if ($pATrue > $pAFalse) {
      $stt = "Positif Diabetes";
      $hitung = ($pATrue / ($pATrue + $pAFalse)) * 100;
      $status = 100 - $hitung;
    } elseif ($pAFalse > $pATrue) {
      $stt = "Negatif Diabetes";
      $hitung = ($pAFalse / ($pAFalse + $pATrue)) * 100;
      $status = 100 - $hitung;
    }

    $hsl = array($stt, $hitung, $status);
    return $hsl;
  }
  //=================================================================
}
