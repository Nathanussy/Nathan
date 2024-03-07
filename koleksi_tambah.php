<?php
$id=$_GET['id'];
?>

<h1 class="mt-4" style="color:#fff">tambah koleksi Buku</h1>
<div class="card" style="background-color: #162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color: #162933">
      <div class="col_md_12">
        <form method="post">
          <?php
          if (isset($_POST['submit'])) {
            $id_user = $_SESSION['user']['id_user'];
            $id_buku = $_POST['id_buku'];
            $query = mysqli_query($koneksi, "INSERT INTO koleksi(id_user, id_buku)values('$id_user','$id_buku')");

            if ($query) {
              echo '<script>alert("Tambah Data Berhasil.");</script>';
            } else {
              echo '<script>alert("Tambah Data Gagal.");</script>';
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-1" style="color:#fff">buku</div>
            <div class="col-md-8">
              <select name="id_buku" class="form-control">
              <?php
                $buk = mysqli_query($koneksi, "SELECT * FROM buku where id_buku=$id");

                while ($buku = mysqli_fetch_array($buk)) {
                ?>
                  <option value="<?= $buku["id_buku"] ?>"><?= $buku["judul"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-10" style="color:#fff">Mau ditambah ke koleksi?</div>
        <div class="col-md-8">
        <button name="submit" class="btn btn-primary" style="background-color: black; color: white;">Tambah</button>
        </div>
        <div class="row">
          <div class="col-md-1">
          <a href="?page=koleksi&id=<?= $_SESSION["user"]["id_user"]; ?>" class="btn btn-danger" style="background-color: black; color: white;">Kembali</a>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>