<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $database = "dblatihan";

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
                document.location='index.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Error');
                document.location='index.php';
              </script>";
      }
    }
    else {
      $simpan = mysqli_query($koneksi, "INSERT INTO tmhs
                                        (nrp, nama, alamat, prodi)
                                        VALUES
                                        ('$_POST[tnrp]', '$_POST[tnama]', '$_POST[talamat]', '$_POST[tprodi]')
                            ");
      if($simpan) {
        echo "<script>
                alert('Success');
                document.location='index.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Error');
                document.location='index.php';
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
    else if($_GET['page'] == "delete") {
      $delete = mysqli_query($koneksi, "DELETE FROM tmhs WHERE id_mhs = '$_GET[id]'");
      if($delete) {
        echo "<script>
                alert('Delete Success');
                document.location='index.php';
              </script>";
      }
      else {
        echo "<script>
                alert('Success');
                document.location='index.php';
              </script>";
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Learning CRUD</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
  </head>
  <body>
  <!-- header-->
  <div class="container">
    <h1 class="text-center m-3">Basic CRUD Implementation</h1>
  </div>
  <!-- form -->
  <div class="container">
    <div class="card">
      <div class="card-header bg-primary text-white">
        Form
      </div>
      <div class="card-body">
        <form class="" action="" method="post">
          <div class="form-group">
            <label>NRP</label>
            <input type="text" name="tnrp" value="<?=@$vnrp?>" class="form-control" placeholder="Masukkan NRP" required>
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="tnama" value="<?=@$vnama?>" class="form-control" placeholder="Masukkan Nama" required>
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea name="talamat" class="form-control" rows="5" placeholder="Masukkan Alamat" required><?=@$valamat?></textarea>
          </div>
          <div class="form-group">
            <label>Program Studi</label>
            <select class="form-control" name="tprodi">
              <option value="<?=@$vprodi?>"><?=@$vprodi?></option>
              <option value="S1-TI">S1-TI</option>
              <option value="S1-SI">S1-SI</option>
              <option value="S1-Tekfo">S1-Tekfo</option>
            </select>
          </div>
          <button type="submit" name="bsimpan" class="btn btn-success">Save</button>
          <button type="reset" name="breset" class="btn btn-danger">Reset</button>
        </form>
      </div>
    </div>
  </div>
  <!-- table -->
  <br>
  <div class="container">
    <div class="card">
      <div class="card-header bg-success text-white">
        Table
      </div>
      <div class="card-body">
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
              <a href="index.php?page=edit&id=<?=$data['id_mhs']?>" class="btn btn-warning">Edit</a>
              <a href="index.php?page=delete&id=<?=$data['id_mhs']?>" onclick="return confirm('Are you sure?')" class="btn btn-danger">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </table>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  </body>
</html>
