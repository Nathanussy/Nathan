<?php
require_once "koneksi.php";

$id = $_GET["id"];
$hapus_koleksi= mysqli_query($koneksi, "DELETE FROM koleksi WHERE id_buku = '$id'");
if($hapus_koleksi){
    $hapus_peminjaman= mysqli_query($koneksi, "DELETE FROM peminjaman WHERE id_buku = '$id'");
    if($hapus_peminjaman){
        $hapus_ulasan= mysqli_query($koneksi, "DELETE FROM ulasan WHERE id_buku = '$id'");
if($hapus_ulasan){
    $query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku = '$id'");
    echo "<script>location.href = '?page=buku'</script>";
}
}

}

