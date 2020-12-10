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

  <link rel="stylesheet" href="css/datatables.css">

  <title>DATASET</title>
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
          <li class="nav-item">
            <a class="nav-link" href="index.php">Naive Bayes</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="data_simulasi.php">Dataset<span class="sr-only">(current)</span></a>
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
        <h2 class="tebal text-center">List Dataset</h2><br>
        <p class="desc">Berikut ini adalah dataset yang kami ambil dari Pima Indians Diabetes Database yang bersumber dari kaggle.com (dengan sumber asli dari The National Institute of Diabetes and Digestive and Kidney Diseases).</p><br>

        <table id="dataLatih" class="display pt-3 mb-3">
          <thead>
            <tr>
              <th>No</th>
              <th>Kehamilan</th>
              <th>Glukosa</th>
              <th>Tekanan Darah</th>
              <th>Ketebalan Kulit</th>
              <th>Tingkat Insulin</th>
              <th>BMI</th>
              <th>Riwayat Diabetes Keluarga</th>
              <th>Umur</th>
              <th>Hasil</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $data = 'dataDiabetes.json';
            $json = file_get_contents($data);
            $hasil = json_decode($json, true);

            $no = 1;
            foreach ($hasil as $hasil) {

              if ($hasil['diabetes'] == 1) {
                $stt = "Positif Diabetes";
              } else {
                $stt = "Negatif Diabetes";
              }
            ?>

              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $hasil['hamil']; ?></td>
                <td><?php echo $hasil['glukosa']; ?></td>
                <td><?php echo $hasil['tekanan']; ?></td>
                <td><?php echo $hasil['tebal']; ?></td>
                <td><?php echo $hasil['insulin']; ?></td>
                <td><?php echo $hasil['BMI']; ?></td>
                <td><?php echo $hasil['riwayat']; ?></td>
                <td><?php echo $hasil['umur']; ?></td>
                <td><?php
                    if ($stt == "Positif Diabetes") {
                      echo "<span class='badge badge-danger' style='padding:10px'>Positif Diabetes</span>";
                    } else {
                      echo "<span class='badge badge-success' style='padding:10px'>Negatif Diabetes</span>";
                    }
                    ?></td>
              </tr>

            <?php
              $no++;
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="pumur-footer font-small abu1 mt-5">

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
  <script type="text/javascript" src="js/datatables.js"></script>

  <!-- validasi -->
  <script>
    $(document).ready(function() {
      $('.toggle').click(function() {
        $('ul').toggleClass('active');
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('#dataLatih').dataTable({
        "pumurLength": 50
      });
    });
  </script>

</body>

</html>