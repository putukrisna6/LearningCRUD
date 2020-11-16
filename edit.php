<?php
  $server = "d1kb8x1fu8rhcnej.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
  $user = "eggcbdzlczrvoyqr";
  $pass = "o4szjtzqwqedkxoe";
  $database = "jofb338o32n5ij9c";

  $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));

  // if add
  if(isset($_POST['bsimpan'])) {
    if($_GET['page'] == "edit") {
      $edit = mysqli_query($koneksi, "UPDATE tmhs set
                                      nrp = '$_POST[tnrp]',
                                      nama = '$_POST[tnama]',
                                      alamat = '$_POST[talamat]',
                                      prodi = '$_POST[tprodi]'
                                      WHERE id_mhs = '$_GET[id]'
                            ");
      if($edit) {
        echo "<script>
                alert('Edit Success');
                document.location='display.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Error');
                document.location='edit.php';
              </script>";
      }
    }
  }

  // if edit / delete
  if (isset($_GET['page'])) {
    if ($_GET['page'] == "edit") {
      $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE id_mhs = '$_GET[id]'");
      $data = mysqli_fetch_array($tampil);

      if($data) {
        $vnrp = $data['nrp'];
        $vnama = $data['nama'];
        $valamat = $data['alamat'];
        $vprodi = $data['prodi'];
      }
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit - Basic CRUD</title>
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
        </div>
    </nav>
    <section class="portfolio-block website">
        <div class="container" id="form-mhs">
            <h1 class="text-center">Edit</h1>
            <form action="" method="post">
                <div class="form-group">
                  <label>NRP</label>
                  <input class="form-control" type="text" name="tnrp" placeholder="Input NRP" required="" value="<?=@$vnrp?>">
                </div>
                <div class="form-group">
                  <label>Nama</label>
                  <input class="form-control" type="text" name="tnama" placeholder="Input Nama" required="" value="<?=@$vnama?>">
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" name="talamat" type="text" placeholder="Input Alamat" required=""><?=@$valamat?></textarea></div>
                <div class="form-group">
                  <label>Program Studi</label>
                  <select class="form-control" name="tprodi">
                    <option value="<?=@$vprodi?>"><?=@$vprodi?></option>
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
