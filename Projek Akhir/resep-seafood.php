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
        .isi {
            padding: 30px 30px;
            margin: 50px 75px;
            border: 2px solid black;
            border-radius: 5px;
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
            <input type="text" placeholder=" Cari resep...">
            <button class="cari" type="submit"><i class="fa fa-search"></i></button> <br>
            <br> 
            <br> <button class="mode" onclick="myFunction()">Switch Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="contents">
            <div class="isi">
                <?php
                    $jenis = "Seafood";
                    $query = "SELECT * FROM resep WHERE kategori = '$jenis'";
                    $result = $db->query($query);
                    $i = 1;
                    while($row = mysqli_fetch_array($result)) {
                ?>
                <p>Resep <?=$row['nama_resep'] ?></p> <br>
                <p>Bahan : <br><?=$row['bahan_resep'] ?></p> <br>
                <p>Bumbu Halus : <br><?=$row['bumbu_halus'] ?></p> <br>
                <p>Cara Membuat : <br><?=$row['cara_buat'] ?></p>
                <?php
                    $i++;
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>