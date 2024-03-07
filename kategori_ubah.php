<h1 class="mt-4" style="color:#fff">Ubah kategori buku</h1>
<div class="card" style="background-color:#162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color:#162933">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post">
          <?php
          $id = $_GET["id"];

          if (isset($_POST["submit"])) {
            $kategori = $_POST["kategori"];
            $query = mysqli_query($koneksi, "UPDATE kategori SET kategori = '$kategori' WHERE id_kategori = '$id'");

            if ($query) {
              echo "<script>location.href = '?page=kategori'</script>";
            }
          }

          $query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE id_kategori = '$id'");
          $data = mysqli_fetch_array($query);
          ?>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#eddcfc">Nama kategori</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="kategori" value="<?= $data["kategori"]; ?>">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
            <button class="btn btn-primary" name="submit" value="submit" style="background-color: black; color: white;">Simpan</button>
<button class="btn btn-secondary" name="reset" style="background-color: black; color: white;">Reset</button>
<a href="?page=kategori" class="btn btn-danger" style="background-color: black; color: white;">Kembali</a>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>