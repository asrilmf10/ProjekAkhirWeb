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
            $kirim = mysqli_query($db, "INSERT INTO request (nama_makanan, asal_makanan, bahan_utama, gambar, keterangan) VALUES ('$n_masakan','$a_masakan','$b_utama','$new_gambar','$tanggal')");
            if($kirim) {
                echo "<script> alert('Request Berhasil'); 
                    document.location.href = 'req-R.php';
                    </script>
                ";
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
        .b-request {
            width: 495px;
            height: 350px;
            border: 2px solid black;
            border-radius: 25px;
            margin: 2px 0px 15px 375px;
        }
        .req {
            width: 375px;
            height: 25px;
        }
        .resep {
            padding-top: 7px;
            padding-left: 57px;
        }
        .input {
            width: 75px;
            height: 30px;
            margin-left: 300px;
            margin-bottom: 5px;
            font-size: 16px;
            font-weight: bold;
            border-style: none;
            border-radius: 10px;
            background-color: #00DEFF;
            color: whitesmoke;
        }
        .input:hover {
            background-color: #00ABE0;
            color: black;
        }
        .lihat {
            width: 113px;
            height: 20px;
            border-left: 2px solid #00ABE0;
            border-bottom: 2px solid #00ABE0;
            border-radius: 3px;
            margin: 15px 0px 0px 430px;
            padding: 3px 0px 0px 0px;
        }
        .daftar {
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            color: black;
            margin-left: 3px;
        }
        .daftar:hover {
            color: red;
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
            <a class="request" href="request.php"><i class="fa-solid fa-circle-plus"></i> Request Resep</a>
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
            </form><br> 
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="lihat">
            <a class="daftar" href="req-R.php">Request Resep</a>
        </div>
        <div class="b-request">
            <form action="" method="post" enctype="multipart/form-data" class="resep">                
                <br> <h5 class="tanggal">Tanggal Rilis Request : <?=date("l, d-m-Y")?></h5> <br>

                <label for="">Nama Masakan : </label> <br>
                <input type="text" name="nama-m" class="req"> <br> <br>

                <label for="">Asal Masakan : </label> <br>
                <input type="text" name="asal-m" class="req"> <br> <br>

                <label for="">Bahan Utama : </label> <br>
                <input type="text" name="bahan" class="req"> <br> <br>

                <label for="">Gambar Masakan : </label> <br>
                <input type="file" name="gambar" class="gambar"> <br>

                <input type="hidden" name="tanggal" value=<?=date("d-m-Y")?>>
                <input type="submit" name="submit" class="input" value="Request">
            </form>
        </div>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>