<?php
    require 'config.php';

    $query = "SELECT * FROM resep";
    $result = $db->query($query);

    if(isset($_POST['submit'])) {
        $n_masakan = $_POST['nama'];
        $j_masakan = $_POST['jenis'];
        $b_utama = $_POST['bahan'];
        $b_halus = $_POST['bumbu'];
        $cara = $_POST['cara'];        
        
        $query = "INSERT INTO resep (nama_resep, kategori, bahan_resep, bumbu_halus, cara_buat) VALUES ('$n_masakan', '$j_masakan', '$b_utama', '$b_halus', '$cara')";
        $kirim = $db->query($query);
    }
?>

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
        .akun {
            background-color: #DC751E;
        }
        .h-list a.home {
            background-color: #00DEFF;
            color: black;
        }
        .h-list a.home:hover {
            color: white;
        }
        .h-list a.menu-resep {
            background-color: #00ABE0;
            color: white;
        }
        .h-list a.menu-resep:hover {
            color: black;
        }
        .switch {
            font-size: 12px;
            border-radius: 3px;
            margin-top: 3px;
        }
        .switch:hover {
            font-weight: bold;
        }
        .b-resep {
            border: 2px solid black;
            border-radius: 25px;
            margin-top: 7px;
            margin-left: 400px;
            margin-right: 400px;
            margin-bottom: 5px; 
            padding-bottom: 5px;
        }
        .tabel {
            position: fixed;
            margin: 45px 65px 0px 75px;
        }
        .text {
            text-align: center;
        }
        .isi {
            text-decoration: none;
            color: black;
        }
        .data {
            text-decoration: none;
            color: black;
        }
        .data:hover {
            color: #00ABE0;
        }
        .dark-mode .main a.data {
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="h-list">
            <?php
                session_start();
                
                if(isset($_SESSION['login'])){
                $user = $_SESSION['login']['username'];
            ?>
            <a class="akun" href="#"><i class="fa-solid fa-user-tie"></i> <?php echo $user ?></a>
            <?php
                }
            ?>

            <a class="home" href="index.php"><i class="fa-solid fa-house"></i> Beranda</a>
            <a class="register" href="register.php"><i class="fa-solid fa-right-to-bracket"></i> Daftar</a>
            <a class="profil" href="akun.php"><i class="fa-solid fa-circle-user"></i> Profil</a>
            <a class="about" href="about.php"><i class="fa-solid fa-circle-info"></i> Tentang</a>
            <a class="menu-resep" href="resep.php"><i class="fa-solid fa-bars"></i> Daftar Resep</a>
            <a href="request.php"><i class="fa-solid fa-circle-plus"></i> Request Resep</a>
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
            <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="contents">
            <table class="tabel">
                <tr>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-ayam.jpg" width="175px" height="100px">
                        <p class="text"><a class="isi" href="resep-ayam.php">Daftar Resep <br> untuk Ayam</a></p> <br>
                        <?php
                            $jenis = "Ayam";
                            $query = "SELECT * FROM resep WHERE kategori = '$jenis'";
                            $result = $db->query($query);
                            $i = 1;
                            while($row = mysqli_fetch_array($result)) {
                                $resep = $row['nama_resep'];
                        ?>
                        <a class="data" href="resep-ayam.php"><?=$i;?>) Resep <?php echo $resep ?><br></a>
                        <?php
                            $i++;
                            }
                        ?>
                    </td>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-daging.jpg" width="175px" height="100px">
                        <p class="text"><a class="isi" href="resep-daging.php">Daftar Resep <br> untuk Daging</a></p> <br>
                        <?php
                            $jenis = "Daging";
                            $query = "SELECT * FROM resep WHERE kategori = '$jenis'";
                            $result = $db->query($query);
                            $i = 1;
                            while($row = mysqli_fetch_array($result)) {
                                $resep = $row['nama_resep'];
                        ?>
                        <a class="data" href="resep-daging.php"><?=$i;?>) Resep <?php echo $resep ?><br></a>
                        <?php
                            $i++;
                            }
                        ?>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-ikan.jpg" width="175px" height="100px">
                        <p class="text"><a class="isi" href="resep-ikan.php">Daftar Resep <br> untuk Ikan</a></p> <br>
                        <?php
                            $jenis = "ikan";
                            $query = "SELECT * FROM resep WHERE kategori = '$jenis'";
                            $result = $db->query($query);
                            $i = 1;
                            while($row = mysqli_fetch_array($result)) {
                                $resep = $row['nama_resep'];
                        ?>
                        <a class="data" href="resep-ikan.php"><?=$i;?>) Resep <?php echo $resep ?><br></a>
                        <?php
                            $i++;
                            }
                        ?>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-sayur.jpg" width="175px" height="100px">
                        <p class="text"><a class="isi" href="resep-sayur.php">Daftar Resep <br> untuk Sayur</a></p> <br>
                        <?php
                            $jenis = "sayur";
                            $query = "SELECT * FROM resep WHERE kategori = '$jenis'";
                            $result = $db->query($query);
                            $i = 1;
                            while($row = mysqli_fetch_array($result)) {
                                $resep = $row['nama_resep'];
                        ?>
                        <a class="data" href="resep-sayur.php"><?=$i;?>) Resep <?php echo $resep ?><br></a>
                        <?php
                            $i++;
                            }
                        ?>
                    </td>
                    <td width="175px" class="c-items">
                        <img src="gambar/resep-seafood.jpg" width="175px" height="100px">
                        <p class="text"><a class="isi" href="resep-seafood.php">Daftar Resep <br> untuk Seafood</a></p> <br>
                        <?php
                            $jenis = "Seafood";
                            $query = "SELECT * FROM resep WHERE kategori = '$jenis'";
                            $result = $db->query($query);
                            $i = 1;
                            while($row = mysqli_fetch_array($result)) {
                                $resep = $row['nama_resep'];
                        ?>
                        <a class="data" href="resep-seafood.php"><?=$i;?>) Resep <?php echo $resep ?><br></a>
                        <?php
                            $i++;
                            }
                        ?>
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