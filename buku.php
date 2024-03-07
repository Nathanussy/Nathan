<h1 class="mt-4" style="color: #fff;">Buku</h1>
<div class="card" style="background-color:#162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color:#162933">
    <div class="row">
      <div class="col-md-12">
        <a href="?page=buku_tambah" class="btn btn-primary my-4" style="background-color: black; color: white;">Tambah buku</a>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color:#fff">
            <th>No</th>
            <th>id</th>
            <th>Judul</th>
            <th>Cover</th>
            <th>Deskripsi</th>
            <th>Penerbit</th>
            <th>Penulis</th>
            <th>Tahun terbit</th>
            <th>Aksi</th>
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr style="color:#fff">
              <td><?= $num++; ?></td>
              <td><?= $data["id_buku"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td style="width: 250px;">
                <img class="w-100" src="./assets/upload/<?= $data["cover"]; ?>" alt="">
              </td>
              <td><?= $data["deskripsi"]; ?></td>
              <td><?= $data["penerbit"]; ?></td>
              <td><?= $data["penulis"]; ?></td>
              <td><?= $data["tahun_terbit"]; ?></td>
              <td>
    <a href="?page=buku_ubah&&id=<?= $data['id_buku']; ?>" class="btn btn-info text-light" style="background-color: black;">Ubah</a>
    <a name="submit" value="submit" onclick="return confirm('Apakah anda yakin menghapus buku ini?');" href="?page=buku_hapus&&id=<?= $data['id_buku']; ?>" class="btn btn-danger" style="background-color: black;">Hapus</a>
</td>

            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>