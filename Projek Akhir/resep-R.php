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
        .daftar {
            padding-top: 2px;
        }
        h3 {
            text-align: center;
            width: 200px;
            height: 25px;
            border: 2px solid black;
            border-radius: 3px;
            font-size: 20px;
            font-weight: bold;
            margin-left: 533px;
        }
        h4 {
            float: left;
            padding: 7px 0px 0px 295px;         
        }
        .tambah {
            border: 2px solid #00ABE0;
            border-radius: 5px; 
            background-color: #00ABE0;
            text-decoration: none;
            color: black;
        }
        .tambah:hover {
            background-color: #00DEFF; 
            color: white;
        }
        .tabel {
            position: fixed;
            margin: 5px 0px 0px 425px;
            border-collapse: collapse;
        }
        .data {
            padding-left: 5px;
        }
        .action {
            padding-left: 23px;
            color: #00ABE0;
        }
        .action:hover {
            color: #00DEFF;
        }
        .head {
            background-color: #DC751E;
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
            <input type="text" placeholder=" Cari resep...">
            <button class="cari" type="submit"><i class="fa fa-search"></i></button> <br>
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="daftar">
            <h3>DAFTAR RESEP</h3>
            <h4><a href="resep-C.php" class="tambah"><i class="fa-solid fa-circle-plus"></i> Tambah Resep</a></h4>
            <div>
                <table border=2 width="400px" class="tabel">
                    <tr>
                        <th class="head" width="20px">No</th>
                        <th class="head"  width="250px">Nama Resep</th>
                        <th class="head"  width="65">Edit</th>
                        <th class="head"  width="65">Hapus</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td class="data" height="35px"><?=$i;?></td>
                        <td class="data"><?=$row['nama_resep'] ?></td>
                        <td>
                            <a class="action" href="resep-U.php?id=<?=$row['id_resep'];?>">
                            <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td>
                            <a class="action" href="resep-D.php?id=<?=$row['id_resep'];?>">
                            <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                    <?php
                        $i++;
                        }
                    ?>
                </table>
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