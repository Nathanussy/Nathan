<h1 class="mt-4" style="color:#fff">Informasi</h1>
<?php
// include 'koneksi.php';
$id = $_GET['id'];
$id_user = $_SESSION['user']['id_user'];
$query=mysqli_query($koneksi,"SELECT * FROM buku WHERE id_buku='$id'");
$buku=mysqli_fetch_array($query);
$data = [
    'buku' => [
        'judul' => $buku['judul'],
        'penulis' => $buku['penulis'],
        'penerbit' => $buku['penerbit'],
        'tahun_terbit' => $buku['tahun_terbit'],
        'deskripsi' => $buku['deskripsi'],
        'cover' => $buku['cover'],
    ]
    ];
// Ambil data ulasan dari database
$queryUlasan = mysqli_query($koneksi, "SELECT ulasan.*, user.username
FROM ulasan
JOIN user ON ulasan.id_user = user.id_user WHERE id_buku='$id'");
$ulasan = [];
while ($row = mysqli_fetch_assoc($queryUlasan)) {
    $ulasan[] = $row;
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="card card-primary card-outline" style="background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); background-size: cover;">
            <div class="card-body box-profile" style="color: #fff">
    <h3 class="profile-username text-center" style="text-shadow: 2px 2px 2px #000;">
        <?= $data['buku']['judul']; ?>
    </h3>
   

                        <td style="width: 250px;">
                            <img class="w-100" src="./assets/upload/<?= $data['buku']["cover"]; ?>" alt="cover">
                        </td>
                    </tr>
                    <!-- <a href="?page=ulasan_tambah" class="btn btn-success btn-block mt-2">
                        <b>Berikan Ulasan </b>
                    </a> -->
                    <?php
    $queryPeminjaman = mysqli_query($koneksi, "SELECT COUNT(*) FROM peminjaman WHERE id_user='$id_user' AND id_buku='$id'");
    $result = mysqli_fetch_row($queryPeminjaman);
    $jumlahPeminjaman = $result[0]; // Access the count value

    if ($jumlahPeminjaman > 0) {
        echo '<a href="?page=ulasan_tambah&id=' . $id . '" class="btn btn-success btn-block mt-2" >
        <b>Berikan Ulasan</b></a>';
        
    } else {
        echo '<a href="?page=ulasan_tambah&id=' . $id . '" class="btn btn-success btn-block mt-2" style="display:none">
        <b>Berikan Ulasan</b></a>';    }
?>



                    <a href="?page=peminjaman_tambah&id=<?php echo $id; ?>" class="btn btn-danger btn-block mt-2" style="background-color: black; color: white;">
    <b>Pinjam</b>
</a>
<a href="?page=koleksi_tambah&id=<?php echo $id; ?>" class="btn btn-danger btn-block mt-2" style="background-color: black; color: white;">
    <b>Koleksi</b>
</a>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.col -->

        <div class="col-md-9">
            <div class="card card-primary card-outline" style="background-color:#162933">
                <div class="card-header">
                    <h4 style="color:#fff">Tentang Buku</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped" style="color:#fff">
                        <tr>
                            <td style="width: 150px; color:#fff">Penulis</td>
                            <td style="color:#fff"><?= $data['buku']['penulis']; ?></td>
                        </tr>
                        <tr>
                            <td>Penerbit</td>
                            <td><?= $data['buku']['penerbit']; ?></td>
                        </tr>
                        <tr>
                            <td style="color:#fff">Tahun Terbit</td>
                            <td style="color:#fff"><?= $data['buku']['tahun_terbit']; ?></td>
                        </tr>
                        <tr>
                            <td>Sinopsis</td>
                            <td><?= $data['buku']['deskripsi']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            
            
            <div class="card card-primary card-outline" style="background-color:#162933">
                <div class="card-header ">
                    <h4 style="color:#fff">Ulasan</h4>
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped" style="color:#fff">
                        <thead>
                            <tr>
                                <th>Ulasan</th>
                                <th>Rating</th>
                                <th>Pemberi Ulasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ulasan as $row): ?>
                                <tr>
                                    <td style="color:#fff"><?= $row['ulasan']; ?></td>
                                    <td style="color:#fff"><?= $row['rating']; ?></td>
                                    <td style="color:#fff"><?= $row['username']; ?></td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
