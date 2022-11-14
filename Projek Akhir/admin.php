<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelompok 3C1-20</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="gambar">
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <script src="jquery.js"></script>
    <style>
        .switch {
            font-size: 12px;
            border-radius: 3px;
        }
        .switch:hover {
            font-weight: bold;
        }
        .tabel {
            padding: 25px 65px;
        }
        .text {
            text-align: center;
        }
        .judul {
            text-decoration: none;
            color: black;
        }
        .judul:hover {
            color: #00DEFF;
        }
        .dark-mode .text{
            color: white;
        } 
    </style>
</head>
<body>
    <div class="header">
        <div class="h-list">
            <a class="home" href="admin.php"><i class="fa-solid fa-house"></i> Beranda</a>
            <a class="about" href="about-a.php"><i class="fa-solid fa-circle-info"></i> Tentang</a>
            <a class="profil" href="#"><i class="fa-solid fa-user"></i> Daftar Akun</a>
            <a class="menu-resep" href="resep-R.php"><i class="fa-solid fa-bars"></i> Daftar Resep</a>
            <a class="resep" href="resep-C.php"><i class="fa-solid fa-circle-plus"></i> Buat Resep</a>
            <a href="#"><i class="fa-solid fa-bars"></i> Daftar Request</a>
        </div>
    </div>
    <div class="navbar">
        <div class="n-logo">
            <p class="logo">MariMasak</p>
            <p class="teks">Kumpulan Resep Masakan Indonesia</p>
            <form action="" method="GET">
                <?php
                    require 'config.php';
                    $result = mysqli_query($db, "SELECT * FROM resep");

                    if(isset($_GET['search'])) {
                        $keyword = $_GET['keyword'];
                        $result = mysqli_query($db, "SELECT * FROM resep WHERE nama_resep LIKE '%$keyword%'");
                    } else{
                        $result = mysqli_query($db, "SELECT * FROM resep");
                    }
                ?>
                <input type="text" name="keyword" placeholder=" Cari resep ...">
                <input type="submit" name="search" value="search">
            </form> <br>
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="contents">
            <table class="tabel">
                <tr>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-ayam.jpg" width="175px" height="100px">
                        <p class="text"><a class="judul" href="resep-ayam.php">Kumpulan Resep <br> berbahan Ayam</a></p>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-daging.jpg" width="175px" height="100px">
                        <p class="text"><a class="judul" href="resep-daging.php">Kumpulan Resep <br> berbahan Daging</a></p>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-ikan.jpg" width="175px" height="100px">
                        <p class="text"><a class="judul" href="resep-ikan.php">Kumpulan Resep <br> berbahan Ikan</a></p>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-sayur.jpg" width="175px" height="100px">
                        <p class="text"><a class="judul" href="resep-sayur.php">Kumpulan Resep <br> berbahan Sayur</a></p>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-seafood.jpg" width="175px" height="100px">
                        <p class="text"><a class="judul" href="resep-seafood.php">Kumpulan Resep <br> berbahan Seafood</a></p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>