<h1 class="mt-4 text-center" style="color:#fff">Ulasan</h1>
<div class="card" style="background-color: #162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color: #162933">
    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color:#fff">
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Cover</th>
            <th>Ulasan</th>
            <th>Rating</th>
            <th>aksi</th>
          </tr>
          <?php
          $num = 1;
          $whereClause = "";
          if ($_SESSION["user"]["level"] == "peminjam") {
            $id_user = $_SESSION["user"]["id_user"];
            $whereClause = "WHERE ulasan.id_user = '$id_user'";
          }

          $query = mysqli_query($koneksi, "SELECT * FROM ulasan LEFT JOIN user ON user.id_user = ulasan.id_user LEFT JOIN buku ON buku.id_buku = ulasan.id_buku $whereClause");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr style="color:#fff">
              <td><?= $num++; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td style="width: 250px;">
                <img class="w-100" src="./assets/upload/<?= $data["cover"]; ?>" alt="">
              </td>
              <td><?= $data["ulasan"]; ?></td>
              <td><?= $data["rating"]; ?></td>
              <td>
              <?php if ($_SESSION["user"]["level"] == "admin" || $_SESSION["user"]["level"] == "petugas") : ?>
                  
                <a onclick="return confirm('Apakah anda yakin menghapus kategori ini?');" href="?page=ulasan_hapus&&id=<?= $data['id_ulasan']; ?>" class="btn btn-danger" style="background-color: black; color: white;">Hapus</a>

                <?php endif; ?>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>