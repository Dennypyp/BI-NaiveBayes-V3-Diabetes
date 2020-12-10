<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" type="imumur/x-icon" href="img/nbc.png" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />

  <!-- font awsome -->
  <link rel="stylesheet" href="css/fontawesome.css" />
  <link rel="stylesheet" href="css/brands.css" />
  <link rel="stylesheet" href="css/solid.css" />

  <link rel="stylesheet" href="css/gaya.css">

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700&display=swap" rel="stylesheet">

  <title>Naive Bayes</title>
</head>

<body>

  <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">
        <img src="img/nbc.png" alt="" width=50 height=50>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Naive Bayes
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_simulasi.php">Dataset</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_train.php">Data Train</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="data_test.php">Data Test</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container" style='margin-top:90px'>
    <div class="row">
      <div class="col-12 mt-5">
        <h2 class="tebal text-center">Naive Bayes</h2>
        <p class="desc mt-4">Naïve Bayes Classifier merupakan sebuah metoda klasifikasi yang berakar pada teorema Bayes.
          Metode pengklasifikasian dengan menggunakan metode probabilitas dan statistik yg dikemukakan oleh ilmuwan Inggris Thomas Bayes,
          yaitu memprediksi peluang di masa depan berdasarkan pengalaman di masa sebelumnya sehingga dikenal sebagai Teorema Bayes.
          Ciri utama dr Naïve Bayes Classifier ini adalah asumsi yang sangat kuat (naïf) akan independensi dari masing-masing kondisi / kejadian.
          Menurut Olson Delen (2008) menjelaskan Naïve Bayes untuk setiap kelas keputusan, menghitung probabilitas dg syarat bahwa kelas keputusan adalah benar,
          mengingat vektor informasi obyek. Algoritma ini mengasumsikan bahwa atribut obyek adalah independen.
          Probabilitas yang terlibat dalam memproduksi perkiraan akhir dihitung sebagai jumlah frekuensi dari " master " tabel keputusan.</p>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mt-4">
        <h3 class="tebal text-center">Simulasi Probabilitas Seorang Wanita Menderita Diabetes</h3>
      </div>
      <div class="col-3"></div>
      <div class="col-6">
        <form method="POST" class="mt-3">

          <div class="form-group">
            <label for="hamil">Jumlah Kehamilan :</label>
            <input type="text" name="hamil" id="hamil" class="form-control selBox" required="required" placeholder="--berapa kali kehamilan anda-- (contoh : 2)">
          </div>

          <div class="form-group">
            <label for="glukosa">Kadar Glukosa :</label>
            <input type="text" name="glukosa" id="glukosa" class="form-control selBox" required="required" placeholder="--berapa kadar glukosa anda-- (contoh : 122)">
          </div>

          <div class="form-group">
            <label for="tekanan">Tekanan Darah (mm Hg) :</label>
            <input type="text" name="tekanan" id="tekanan" class="form-control selBox" required="required" placeholder="--berapa tekanan darah anda-- (contoh : 70)">
          </div>

          <div class="form-group">
            <label for="tebal">Tebal Kulit (mm):</label>
            <input type="text" name="tebal" id="tebal" class="form-control selBox" required="required" placeholder="--berapa ketebalan kulit triceps anda-- (contoh : 27)">
          </div>

          <div class="form-group">
            <label for="insulin">Insulin (mu U/ml):</label>
            <input type="text" name="insulin" id="insulin" class="form-control selBox" required="required" placeholder="--berapa kadar insulin anda-- (contoh : 0)">
          </div>

          <div class="form-group">
            <label for="BMI">BMI (kg/m^2):</label>
            <input type="text" name="BMI" id="BMI" class="form-control selBox" required="required" placeholder="--berapa BMI anda-- (contoh : 36.8)">
          </div>

          <div class="form-group">
            <label for="riwayat">Riwayat Diabetes Keluarga :</label>
            <input type="text" name="riwayat" id="riwayat" class="form-control selBox" required="required" placeholder="--seberapa index riwayat diabet keluarga-- (contoh : 0.34)">
          </div>

          <div class="form-group">
            <label for="umur">Umur (tahun):</label>
            <input type="text" name="umur" id="umur" class="form-control selBox" required="required" placeholder="--berapa umur anda-- (contoh : 27)">
          </div>

          <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary col-12 mt-3" id="dor" onclick="return simulasi()" />
          </div>

        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-12 mt-5 mb-5">
        <div id="hasilSIM" style="margin-bottom:30px;">

        </div>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="pumur-footer font-small abu1">

    <!-- Footer Elements -->
    <div class="container">

      <!-- Grid row-->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-12 py-5">

          <div class="text-center">
            Naive Bayes Diabetes
          </div>
        </div>
        <!-- Grid column -->

      </div>
      <!-- Grid row-->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3 abu2">© <?php echo date('Y'); ?> Copyright Bainur Bagus Abu Denny
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->


  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- validasi -->
  <script>
    $(document).ready(function() {
      $('.toggle').click(function() {
        $('ul').toggleClass('active');
      });
    });
  </script>

  <script>
    function simulasi() {
      var hamil = $("#hamil").val();
      var glukosa = $("#glukosa").val();
      var tekanan = $("#tekanan").val();
      var tebal = $("#tebal").val();
      var insulin = $("#insulin").val();
      var BMI = $("#BMI").val();
      var riwayat = $("#riwayat").val();
      var umur = $("#umur").val();

      //validasi
      var ha = document.getElementById("hamil");
      var gl = document.getElementById("glukosa");
      var te = document.getElementById("tekanan");
      var tb = document.getElementById("tebal");
      var ins = document.getElementById("insulin");
      var bm = document.getElementById("BMI");
      var ri = document.getElementById("riwayat");
      var um = document.getElementById("umur");

      if (ha.selectedIndex == 0) {
        alert("Jumlah kehamilan Tidak Boleh Kosong");
        return false;
      }

      if (gl.selectedIndex == 0) {
        alert("Tingkat glukosa Tidak Boleh Kosong");
        return false;
      }

      if (te.selectedIndex == 0) {
        alert("Tekanan darah Tidak Boleh Kosong");
        return false;
      }

      if (tb.selectedIndex == 0) {
        alert("Ketebalan kulit Tidak Boleh Kosong");
        return false;
      }

      if (ins.selectedIndex == 0) {
        alert("Tingkat insulin Tidak Boleh Kosong");
        return false;
      }

      if (bm.selectedIndex == 0) {
        alert("BMI Tidak Boleh Kosong");
        return false;
      }

      if (ri.selectedIndex == 0) {
        alert("Riwayat kedekatan diabetes Tidak Boleh Kosong");
        return false;
      }

      if (um.selectedIndex == 0) {
        alert("Umur Tidak Boleh Kosong");
        return false;
      }

      //batas validasi

      $.ajax({
        url: 'simulasi.php',
        type: 'POST',
        dataType: 'html',
        data: {
          hamil: hamil,
          glukosa: glukosa,
          tekanan: tekanan,
          tebal: tebal,
          insulin: insulin,
          BMI: BMI,
          riwayat: riwayat,
          umur: umur
        },
        success: function(data) {
          document.getElementById("hasilSIM").innerHTML = data;
        },
      });

      return false;

    }
  </script>

  <script>
    $(document).ready(function() {
      $('#dor').click(function() {
        $('html, body').animate({
          scrollTop: $("#hasilSIM").offset().top
        }, 500);
      });
    });
  </script>
</body>

</html>