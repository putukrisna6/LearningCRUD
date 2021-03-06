<?php
  $server = "d1kb8x1fu8rhcnej.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
  $user = "eggcbdzlczrvoyqr";
  $pass = "o4szjtzqwqedkxoe";
  $database = "jofb338o32n5ij9c";

  $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

  // if bsimpan
  if(isset($_POST['bsimpan'])) {
    $simpan = mysqli_query($koneksi, "INSERT INTO tmhs
                                      (nrp, nama, alamat, prodi)
                                      VALUES
                                      ('$_POST[tnrp]', '$_POST[tnama]', '$_POST[talamat]', '$_POST[tprodi]')
                          ");
    if($simpan) {
      echo "<script>
              alert('Success');
              document.location='index.php#form-mhs';
            </script>";
    }
    else {
      echo "<script>
              alert('Error');
              document.location='index.php#form-mhs';
            </script>";
    }
  }
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - Basic CRUD</title>
    <meta name="description" content="CRUD + PHP + Bootstrap Implementation">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">Basic CRUD</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse"
                id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="display.php">Display</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <div class="container"><i class="fa fa-database fa-lg"></i>
                <div class="about-me">
                    <p>Hello! This simple page is made to implement basic CRUD operations with PHP, MySQL, and Bootstrap.</p><a class="btn btn-outline-primary" role="button" href="display.php">Display Data</a></div>
            </div>
        </section>
    </main>
    <section class="portfolio-block website gradient">
        <div class="container" id="form-mhs">
            <h1 class="text-center">Form</h1>
            <form action="" method="post">
                <div class="form-group">
                  <label>NRP</label>
                  <input class="form-control" type="text" name="tnrp" placeholder="Input NRP" required="">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" type="text" name="tnama" placeholder="Input Nama" required="">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="talamat" type="text" placeholder="Input Alamat" required=""></textarea></div>
                <div class="form-group">
                  <label>Program Studi</label>
                  <select class="form-control" name="tprodi">
                    <optgroup label="Fakultas Teknologi Informasi dan Komunikasi">
                      <option value="S1-TI">S1-TI</option>
                      <option value="S1-SI">S1-SI</option>
                      <option value="S1-Tekfo">S1-Tekfo</option>
                    </optgroup>
                  </select>
                </div>
                <button type="submit" name="bsimpan" class="btn btn-success">Save</button>
                <button type="reset" name="breset" class="btn btn-danger">Reset</button>
            </form>
        </div>
    </section>
    <footer class="page-footer">
        <div class="container">
            <div class="links">
                <h6>© Putu Krisna Andyartha 2020<br></h6>
            </div>
        </div>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
</html>
