<h1 class="mt-4" style="color:#fff">Report</h1>
<div class="card" style="background-color:#162933">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
  <div class="card-body">
  <div class="card" style="background-color:#162933">
      <div class="col-md-12">
      <a href="cetak.php" target="_blank" class="btn btn-primary my-4" style="background-color: black; color: white;"><i class="fs fa-print"></i>Cetak data</a>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <tr style="color:#fff">
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Tanggal peminjaman</th>
            <th>Tanggal pengembalian</th>
            <th>Status</th>
            <th>aksi</th>
            
          </tr>
          <?php
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
          while ($data = mysqli_fetch_array($query)) {
          ?>

          
            <tr style="color:#eddcfc">
              <td><?= $num++; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td><?= $data["tanggal_peminjaman"]; ?></td>
              <td><?= $data["tanggal_pengembalian"]; ?></td>
              <td><?= $data["status_peminjaman"]; ?></td>
              <td><form method="POST" action="proses_update.php?id_peminjaman=<?php echo $data['id_peminjaman']; ?>">
                                    <input type="submit" value="Kembalikan" class="btn btn-danger" style="margin-top: 5px; background-color: #e74c3c; border-color: #e74c3c;">
                                </form></td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>