<?php
$id=$_GET['id'];
?>
<h1 class="mt-4" style="color:#fff">Ulasan buku</h1>
<div class="card" style="background-color:#162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color:#162933">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <?php
          if (isset($_POST["submit"])) {
            $id_buku = $_POST["id_buku"];
            $id_user = $_SESSION['user']['id_user'];
            $ulasan = $_POST["ulasan"];
            $rating = $_POST["rating"];

            $query = mysqli_query($koneksi, "INSERT INTO ulasan(id_buku, id_user, ulasan, rating) VALUES('$id_buku', '$id_user', '$ulasan', '$rating')");

            if ($query) {
              echo "<script>location.href = '?page=ulasan'</script>";
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#eddcfc" >Buku</div>
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
          <div class="row mb-3">
            <div class="col-md-2" style="color:#eddcfc">Ulasan</div>
            <div class="col-md-8">
              <textarea rows="5" class="form-control" type="text" name="ulasan"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#eddcfc">Rating</div>
            <div class="col-md-8">
              <select class="form-control" name="rating" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <button class="btn btn-primary" name="submit" value="submit">Simpan</button>
              <button class="btn btn-secondary" name="reset">Reset</button>
              <a href="?page=ulasan" class="btn btn-danger">Kembali</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>