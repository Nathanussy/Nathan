<h1 class="mt-4" style="color:#fff">Buku</h1>
<div class="card" style="background-color:#162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color:#162933">
    <div class="row">
      <div class="col-md-12">
        <form action="" method="post" enctype="multipart/form-data">
          <?php
          if (isset($_POST["submit"])) {
            $id_kategori = $_POST["id_kategori"];
            $judul = $_POST["judul"];
            $deskripsi = $_POST["deskripsi"];
            $penulis = $_POST["penulis"];
            $penerbit = $_POST["penerbit"];
            $tahunTerbit = $_POST["tahunTerbit"];

            $fileBuku = $_FILES['cover'];
            $fileType = explode("image/", $fileBuku["type"]);
            $fileName = rand(100_000, 999_999) . '.' . $fileType[1];

            move_uploaded_file($fileBuku['tmp_name'], './assets/upload/' . $fileName);

            $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori, judul, cover, deskripsi, penulis, penerbit, tahun_terbit) VALUES('$id_kategori', '$judul', '$fileName', '$deskripsi', '$penulis', '$penerbit', '$tahunTerbit')");

            if ($query) {
              echo "<script>location.href = '?page=buku'</script>";
            }
          }
          ?>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Kategori</div>
            <div class="col-md-8">
              <select name="id_kategori" class="form-control">
                <?php
                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");

                while ($kategori = mysqli_fetch_array($kat)) {
                ?>
                  <option value="<?= $kategori["id_kategori"] ?>"><?= $kategori["kategori"] ?></option>
                <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Judul</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="judul">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Cover</div>
            <div class="col-md-8">
              <input class="form-control" type="file" name="cover">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Deskripsi</div>
            <div class="col-md-8">
              <textarea rows="5" class="form-control" type="text" name="deskripsi"></textarea>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Penulis</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="penulis">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Penerbit</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="penerbit">
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-2" style="color:#fff">Tahun terbit</div>
            <div class="col-md-8">
              <input class="form-control" type="text" name="tahunTerbit">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
    <button class="btn btn-primary" name="submit" value="submit" style="background-color: black; color: white;">Simpan</button>
    <button class="btn btn-secondary" name="reset" style="background-color: black; color: white;">Reset</button>
    <a href="?page=buku" class="btn btn-danger" style="background-color: black; color: white;">Kembali</a>
</div>

          </div>
        </form>
      </div>
    </div>
  </div>
</div>