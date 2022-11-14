<?php
    require 'config.php';

    date_default_timezone_set("Asia/Makassar");
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

        if($kirim) {
            echo "
                <script>
                    alert('Resep berhasil ditambahkan'); 
                    document.location.href = 'resep-R.php';
                </script>
            ";
        } else {
            echo "
                <script>
                    alert('Resep gagal ditambahkan');
                </script>
            ";
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
        .h-list a.resep {
            background-color: #00ABE0;
            color: white;
        }
        .h-list a.resep:hover {
            color: black;
        }
        .b-resep {
            border: 2px solid black;
            border-radius: 25px;
            margin-top: 2px;
            margin-left: 400px;
            margin-right: 400px;
            padding-bottom: 3px;
        }
        .tanggal {
            padding-top: 5px;
        }
        .req {
            width: 417px;
            height: 20px;
            margin-bottom: 2px;
        }
        .resep {
            padding-left: 25px;
        }
        .pilih {
            margin-bottom: 2px;
        }
        .input {
            width: 75px;
            height: 30px;
            margin-left: 348px;
            margin-top: 2px;
            margin-bottom: 2px;
            font-size: 18px;
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
        <div class="b-resep">
            <form action="" method="post" enctype="multipart/form-data" class="resep">                
                <h5 class="tanggal">Tanggal Rilis Resep : <?=date("l, d-m-Y")?></h5> <br>

                <label for="">Nama Masakan : </label> <br>
                <input type="text" name="nama" class="req"> <br>
                <label for="">Kategori : </label>
                <select name="jenis" class="pilih">
                    <option value="">--Bahan--</option>
                    <option value="Ayam">Ayam</option>
                    <option value="Daging">Daging</option>
                    <option value="Ikan">Ikan</option>
                    <option value="Sayur">Sayur</option>
                    <option value="Seafood">Seafood</option>
                </select> <br>

                <label for="">Bahan Utama : </label> <br>
                <textarea name="bahan" id="" cols="55" rows="5.3"></textarea> <br>

                <label for="">Bumbu Halus : </label> <br>
                <textarea name="bumbu" id="" cols="55" rows="5.3"></textarea> <br>

                <label for="">Cara membuat : </label> <br>
                <textarea name="cara" id="" cols="55" rows="5.3"></textarea> <br>

                <input type="submit" name="submit" class="input" value="Simpan">
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