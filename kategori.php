<?php
if ($_SESSION["user"]["level"] == 'petugas' || $_SESSION["user"]["level"] == 'admin') {
    echo "<h3 style='color:#fff'>Selamat datang di </h3>";
} else {
    echo "<script>alert('Hanya admin dan petugas yang bisa mengakses halaman ini!'); document.location.href='index.php'</script>";
}
?>
<h1 class="mt-4" style="color:#fff">Kategori buku</h1>
<div class="card" style="background-color:#162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color:#162933">
    <div class="row">
      <div class="col-md-12">
      <a href="?page=kategori_tambah" class="btn btn-primary my-4" style="background-color: black; color: white;">Tambah Kategori</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color:#fff">
            <th>No</th>
            <th>Nama kategori</th>
            <th>aksi</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM kategori");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr style="color:#fff">
              <td><?= $num++; ?></td>
              <td><?= $data["kategori"]; ?></td>
              <td>
    <a href="?page=kategori_ubah&&id=<?= $data['id_kategori']; ?>" class="btn btn-info text-light" style="background-color: black;">Ubah</a>
    <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=kategori_hapus&&id=<?= $data['id_kategori']; ?>" class="btn btn-danger" style="background-color: black;">Hapus</a>
</td>

            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>