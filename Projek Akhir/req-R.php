<?php 
    require 'config.php';

    date_default_timezone_set("Asia/Makassar");
    $query = "SELECT * FROM request";
    $result = $db->query($query);

    if(isset($_POST['submit'])) {
        $n_masakan = $_POST['nama-m'];
        $a_masakan = $_POST['asal-m'];
        $b_utama = $_POST['bahan'];
        $tanggal = $_POST['tanggal'];        
        
        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));

        $new_gambar = "$n_masakan.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];

        if(move_uploaded_file($tmp, 'gambar/'.$new_gambar)) {
            $query = "INSERT INTO request(nama_makanan, asal_makanan, bahan_utama, gambar, keterangan) VALUES('$n_masakan', '$a_masakan', '$b_utama', '$new_gambar', '$tanggal')";
            $hasil = $db->query($query);
            if($hasil) {
                header("Location:req-R.php");
            } else {
                echo "INVALID !!";
            }    
        }
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
        .h-list a.request {
            background-color: #00ABE0;
            color: white;
        }
        .h-list a.request:hover {
            color: black;
        }
        .switch {
            font-size: 12px;
            border-radius: 3px;
        }
        .switch:hover {
            font-weight: bold;
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
            float: right;
            padding: 0px 107px 5px 0px;         
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
            margin: 3px 0px 0px 80px;
            border-collapse: collapse;
        }
        .data {
            padding-left: 5px;
        }
        .gambar {
            padding-left: 35px;
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
            <a class="resep" href="resep.php"><i class="fa-solid fa-bars"></i> Daftar Resep</a>
            <a class="request" href="request.php"><i class="fa-solid fa-circle-plus"></i> Request Resep</a>
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
            <h3>DAFTAR REQUEST</h3>
            <h4><a href="request.php" class="tambah"><i class="fa-solid fa-circle-plus"></i> Tambah Request</a></h4>
            <div>
                <table border=2 width="1100px" class="tabel">
                    <tr>
                        <th class="head" width="20px">No</th>
                        <th class="head"  width="250px">Nama Masakan</th>
                        <th class="head"  width="250px">Asal Masakan</th>
                        <th class="head"  width="200">Bahan Utama</th>
                        <th class="head"  width="150">Gambar</th>
                        <th class="head"  width="65">Edit</th>
                        <th class="head"  width="65">Hapus</th>
                        <th class="head"  width="155px">Keterangan</th>
                    </tr>
                    <?php 
                        $i = 1;
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td class="data"><?=$i;?></td>
                        <td class="data"><?=$row['nama_makanan'] ?></td>
                        <td class="data"><?=$row['asal_makanan'] ?></td>
                        <td class="data"><?=$row['bahan_utama'] ?></td>
                        <td class="gambar"><img src="gambar/<?=$row['gambar']?>" width="75px" height="50px"></td>
                        <td>
                            <a class="action" href="req-U.php?id=<?=$row['id_req'];?>">
                            <i class="fa-solid fa-pen"></i>
                            </a>
                        </td>
                        <td>
                            <a class="action" href="req-D.php?id=<?=$row['id_req'];?>">
                            <i class="fa-solid fa-trash-can"></i>
                            </a>
                        </td>
                        <td class="data"><?=$row['keterangan']?></td>
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