<?php 
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM request WHERE id_req = '$id' ");
        $row = mysqli_fetch_array($result);
    }
 
    if(isset($_POST['submit'])){
        $n_masakan = $_POST['nama-m'];
        $a_masakan = $_POST['asal-m'];
        $b_utama = $_POST['bahan'];
        $tanggal = $_POST['tanggal'];

        $gambar = $_FILES['gambar']['name'];
        $x = explode('.', $gambar);
        $ekstensi = strtolower(end($x));

        $new_gambar = "$n_masakan.$ekstensi";
        $tmp = $_FILES['gambar']['tmp_name'];
        
        move_uploaded_file($tmp, 'gambar/'.$new_gambar);

        $query = "UPDATE request SET nama_makanan='$n_masakan', asal_makanan='$a_masakan', bahan_utama='$b_utama', gambar='$new_gambar', keterangan='$tanggal' WHERE id_req='$id'";
        $hasil = $db->query($query);
        if($hasil) {
            header("Location:req-R.php");
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
        h4 {
            text-align: center;
            margin: 5px 0px;
        }
        .edit {
            border: 2px solid black;
            border-radius: 25px;
            margin: 10px 400px;
        }
        .tanggal {
            margin: 5px 0px; 
        }
        .req {
            width: 350px;
            height: 25px;
            margin: 5px 0px 0px 0px;
        }
        .resep {
            padding-left: 50px; 
        }
        .input {
            width: 75px;
            height: 30px;
            margin-left: 284px;
            margin-bottom: 5px;
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
        .kembali {
            text-align: center;
            padding-top: 5px;
        }
        .back {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            width: 115px;
            height: 55px;
            border: 2px solid red;
            border-radius: 7px;
            background-color: red;
        }
        .back:hover {
            border: 2px solid black;
            background-color: black;
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
            <a class="akun" href="logout.php"><?php echo $user ?> <i class="fa-solid fa-right-from-bracket"></i></a>
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
            <input type="text" placeholder="Cari resep...">
            <button class="cari" type="submit"><i class="fa fa-search"></i></button> <br>
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="edit">
            <h4>EDIT REQUEST</h4>
            <form action="" method="post" enctype="multipart/form-data" class="resep">                
                <h5 class="tanggal">Tanggal Edit Request : <?=date("l, d-m-Y")?></h5>

                <label for="">Nama Masakan : </label> <br>
                <input type="text" name="nama-m" class="req" value=<?=$row['nama_makanan'];?>> <br> <br>

                <label for="">Asal Masakan : </label> <br>
                <input type="text" name="asal-m" class="req" value=<?=$row['asal_makanan'];?> > <br> <br>

                <label for="">Bahan Utama : </label> <br>
                <input type="text" name="bahan" class="req" value=<?=$row['bahan_utama'];?>> <br> <br>

                <label for="">Gambar Masakan : </label> <br>
                <input type="file" name="gambar" class="gambar" value=<?=$row['gambar'];?>> <br>

                <input type="hidden" name="tanggal" value=<?=date("d-m-Y")?>>
                <input type="submit" name="submit" class="input" value="Simpan">
            </form>
        </div>
        <div class="kembali">
            <a href="req-R.php" class="back"><i class="fa-regular fa-circle-left"></i> Kembali</a> 
        </div>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>