<?php
require_once 'koneksi.php';

if (!$_SESSION['user']) {
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Onbrary</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- ... (kode HTML yang sudah ada) ... -->
    <style>
    .navbar {
        background-image: url('foto/_27f75eba-aad5-4e0c-9492-04522a5a0ea2.jpeg'); /* Gantilah 'path/to/your/image.jpg' dengan path gambar Anda */
        background-size: cover; /* Untuk memastikan gambar meliputi seluruh area navbar */
        background-repeat: no-repeat; /* Agar gambar tidak diulang */
        background-color: transparent; /* Warna latar belakang transparan untuk memungkinkan gambar terlihat */
        background-position: center; /* Posisi gambar di tengah navbar */
        height: 50px; /* Sesuaikan tinggi navbar dengan kebutuhan Anda */
    }

    .sb-sidenav {
        background-color: #0000; /* Warna hitam untuk sidebar */
    }

    .sb-sidenav a.nav-link {
        color: #eddcfc!important; /* Warna teks putih untuk menu-link di sidebar */
    }
</style>

</head>


<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand bg-Tan">
<a class="navbar-brand ps-3" href="?" style="color: #ffffff; font-weight: bold;"> Onbrary </a>
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="?" style="color:#fff"><i class="fas fa-bars"></i></button>
</nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" >
                <div class="sb-sidenav-menu" >
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color:#fff">Features</div>
                        <a class="nav-link" href="?">
    <div class="sb-nav-link-icon"><i class="fas fa-home" style="color: #80bfff;"></i></div>
    <span style="color: #fff;">Home</span>
</a>

                        
                        <?php
if ($_SESSION["user"]["level"] != "peminjam") {
?>
    <a class="nav-link" href="?page=kategori">
        <div class="sb-nav-link-icon"><i class="fas fa-table" style="color: #80bfff;"></i></div>
        <span style="color: #fff;">Kategori</span>
    </a>
    <style>
    .nav-link span {
        text-shadow: -2px -2px 2px #000, 2px -2px 2px #000, -2px 2px 2px #000, 2px 2px 2px #000;
    }
</style>

<a class="nav-link" href="?page=user">
    <div class="sb-nav-link-icon"><i class="fas fa-user" style="color: #80bfff;"></i></div>
    <span style="color: #fff;">User</span>
</a>
<a class="nav-link" href="?page=buku">
    <div class="sb-nav-link-icon"><i class="fas fa-book" style="color: #80bfff;"></i></div>
    <span style="color: #fff;">Buku</span>
</a>
<?php } else { ?> 
    <a class="nav-link" href="?page=daftar_buku">
        <div class="sb-nav-link-icon"><i class="fas fa-book-open" style="color: #80bfff;"></i></div>
        <span style="color: #fff;">Daftar buku</span>
    </a>

    <a class="nav-link" href="?page=peminjaman">
        <div class="sb-nav-link-icon"><i class="fas fa-book" style="color: #80bfff;"></i></div>
        <span style="color: #fff;">Peminjaman</span>
</a>
    
    
    </a>
    <a class="nav-link" href="?page=koleksi&id=<?= $_SESSION["user"]["id_user"]; ?>">
        <div class="sb-nav-link-icon"><i class="fas fa-bookmark" style="color: #80bfff;"></i></div>
        <span style="color: #fff;">Koleksi</span>
    </a>
<?php } ?>
<a class="nav-link" href="?page=ulasan">
    <div class="sb-nav-link-icon"><i class="fas fa-comment" style="color: #80bfff;"></i></div>
    <span style="color: #fff;">Ulasan</span>
</a>


                        <?php
                        if ($_SESSION["user"]["level"] != "peminjam") {
                        ?>
                            <a class="nav-link" href="?page=laporan">
    <div class="sb-nav-link-icon"><i class="fas fa-book" style="color: #80bfff;"></i></div>
    <span style="color: #fff;">Laporan peminjaman</span>

    <a class="nav-link" href="?page=peminjaman">
        <div class="sb-nav-link-icon"><i class="fas fa-book" style="color: #80bfff;"></i></div>
        <span style="color: #fff;">Peminjaman</span>
</a>

                        <?php
                        }
                        ?>
                        <a class="nav-link" href="logout.php">
    <div class="sb-nav-link-icon"><i class="fas fa-power-off" style="color: #ff0000;"></i></div>
    <span style="color: #ffffff;">Logout</span>
</a>

                    </div>
                </div>
                <div class="sb-sidenav-footer" style="background: #000">
                    <div class="small" style="color:#fff" >Login sebagai:</div>
                    <p class="m-0" style="color:#fff"><?= $_SESSION["user"]["nama"]; ?></p>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content" style="background:#000000" >
            <main>
                <div class="container-fluid px-4">
                    <?php
                    $page = isset($_GET["page"]) ? $_GET["page"] : "home";

                    if (file_exists($page . ".php")) {
                        require_once $page . ".php";
                    } else {
                        require_once "404.php";
                    }
                    ?>
                <style>
    footer {
        background-image: url('foto/abstract-lines-blue-wavy-lines-wallpaper.jpg'); /* Gantilah 'path/to/your/image.jpg' dengan path gambar Anda */
        background-size: cover; /* Untuk memastikan gambar meliputi seluruh area footer */
        background-repeat: no-repeat; /* Agar gambar tidak diulang */
        background-position: center; /* Posisi gambar di tengah footer */
        color: #000; /* Warna teks untuk footer */
    }

    .container-fluid {
        padding-right: 0; /* Menghapus padding kanan agar gambar footer mencakup seluruh lebar layar */
        padding-left: 0; /* Menghapus padding kiri agar gambar footer mencakup seluruh lebar layar */
    }
</style>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>