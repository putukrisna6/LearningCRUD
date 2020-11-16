<?php
  $server = "d1kb8x1fu8rhcnej.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
  $user = "eggcbdzlczrvoyqr";
  $pass = "o4szjtzqwqedkxoe";
  $database = "jofb338o32n5ij9c";

  $koneksi = mysqli_connect($server, $user, $pass, $database) or die(mysqli_error($koneksi));
  // if edit / delete
  if (isset($_GET['page'])) {
    if($_GET['page'] == "delete") {
      $delete = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]'");
      if($delete) {
        echo "<script>
                alert('Delete Success');
                document.location='display.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Success');
                document.location='display.php';
              </script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Display - Basic CRUD</title>
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
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="display.php">Display</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page hire-me-page">
        <section class="portfolio-block hire-me">
            <div class="container">
                <div class="card">
                  <div class="heading" style="margin: 10px;">
                      <h3>Database</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped">
                        <tr>
                          <th>No.</th>
                          <th>NRP</th>
                          <th>Nama</th>
                          <th>Alamat</th>
                          <th>Program Studi</th>
                          <th>Aksi</th>
                        </tr>
                        <?php
                          $no = 1;
                          $tampil = mysqli_query($koneksi, "SELECT * FROM tmhs ORDER BY id_mhs ASC");
                          while($data = mysqli_fetch_array($tampil)) :
                         ?>
                        <tr>
                          <td><?=$no++?></td>
                          <td><?=$data['nrp']?></td>
                          <td><?=$data['nama']?></td>
                          <td><?=$data['alamat']?></td>
                          <td><?=$data['prodi']?></td>
                          <td>
                            <a href="edit.php?page=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning">Edit</a>
                            <a href="display.php?page=delete&id=<?=$data['id_mhs']?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
                          </td>
                        </tr>
                        <?php endwhile; ?>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </section>
    </main>
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
