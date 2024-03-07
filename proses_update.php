<?php
require("koneksi.php");

$id = $_SESSION['user']['id_user'];
if (isset($_GET['id_peminjaman'])) {
    // Ambil tanggal saat ini
    $tanggal_sekarang = date("Y-m-d");

    // Ambil ID peminjaman dari URL
    $id_peminjaman = $_GET['id_peminjaman'];
    
    // Perbarui status peminjaman dan tanggal pengembalian
    $query_update_status = mysqli_query($koneksi, "UPDATE peminjaman SET status_peminjaman = 'Dikembalikan', tanggal_pengembalian = '$tanggal_sekarang' WHERE id_peminjaman = '$id_peminjaman'
");
    
    if ($query_update_status) {
        header("location:index.php?page=peminjaman");
    } else {
        echo "Gagal memperbarui status peminjaman: " . mysqli_error($koneksi);
    }
}
?>