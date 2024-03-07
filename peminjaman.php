<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['idpinjam'])) {
    $idpinjaman = $_GET['idpinjam'];
    
    // Assuming $koneksi is your database connection
    $stmt = mysqli_prepare($koneksi, "UPDATE peminjaman SET status_peminjaman='dikembalikan' WHERE id_peminjaman=?");
    
    // Bind the parameter
    mysqli_stmt_bind_param($stmt, 'i', $idpinjaman);
    
    // Execute the query
    $success = mysqli_stmt_execute($stmt);
   

    mysqli_stmt_close($stmt);
}
?>


<h1 class="mt-4 text-center" style="color:#fff">Peminjaman buku</h1>
<div class="card" style="background-color:fff">
<div class="card-body" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover; color: #fff;">
    <div class="row">
      <div class="col-md-12" style="background-color:#162933">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"style="background-color:#162933">
          <tr style="color:#fff">
            <th>No</th>
            <th>User</th>
            <th>Buku</th>
            <th>Cover</th>
            <th>Tanggal peminjaman</th>
            <th>Tanggal pengembalian</th>
            <th>Status peminjam</th>
            
          </tr>
          <?php
          $id_user = $_SESSION["user"]["id_user"];
          $num = 1;
          $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user = '$id_user'");
          while ($data = mysqli_fetch_array($query)) {
          ?>
            <tr style="color: #fff">
              <td><?= $num++; ?></td>
              <td><?= $data["nama"]; ?></td>
              <td><?= $data["judul"]; ?></td>
              <td style="width: 250px;">
                <img class="w-100" src="./assets/upload/<?= $data["cover"]; ?>" alt="">
              </td>
              <td><?= $data["tanggal_peminjaman"]; ?></td>
              <td><?= $data["tanggal_pengembalian"]; ?></td>
              <td><?= $data["status_peminjaman"]; ?></td>
              <td>
              

    </a>
</td>
              <td>
                <?php if ($data["status_peminjaman"] != "dikembalikan") { ?>
                  
                <?php } ?>
              </td>
            </tr>
          <?php }; ?>
        </table>
      </div>
    </div>
  </div>
</div>