<?php
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result ="SELECT * FROM resep WHERE id_resep='$id'";
        $row = $db->query($result);
    }

    if(isset($_POST['submit'])) {
        $n_masakan = $_POST['nama'];
        $j_masakan = $_POST['jenis'];
        $b_utama = $_POST['bahan'];
        $b_halus = $_POST['bumbu'];
        $cara = $_POST['cara'];        
         
        $query = "UPDATE resep SET nama_resep='$n_masakan', kategori='$j_masakan', bahan_resep='$b_utama', bumbu_halus='$b_halus', cara_buat='$cara' WHERE id_resep='$id'";
        $kirim = $db->query($query);

        if($kirim) { 
            echo "
                <script>
                    alert('Resep berhasil diedit'); 
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
        .h-list a.menu-resep {
            background-color: #00ABE0;
            color: white;
        }
        .h-list a.menu-resep:hover {
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
        h4 {
            text-align: center;
            font-weight: bold;
            padding-top: 2px;
            padding-bottom: 0px;
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
                if(isset($_SESSION['login'])){
                    $user = $_SESSION['login']['username']; 
            ?>
            <a class="akun" href="logout.php"><?php echo $user ?> <i class="fa-solid fa-right-from-bracket"></i></a>
            <?php
                }
            ?>
            <a class="home" href="index.php"><i class="fa-solid fa-house"></i> Beranda</a>
            <a class="about" href="about.php"><i class="fa-solid fa-circle-info"></i> Tentang</a>
            <a class="profil" href="akun.php"><i class="fa-solid fa-user"></i> Daftar Akun</a>
            <a class="menu-resep" href="resep-R.php"><i class="fa-solid fa-bars"></i> Daftar Resep</a>
            <a class="resep" href="resep-C.php"><i class="fa-solid fa-circle-plus"></i> Buat Resep</a>
            <a href="req-R.php"><i class="fa-solid fa-bars"></i> Daftar Request</a>
        </div>
    </div>
    <div class="navbar">
        <div class="n-logo">
            <p class="logo">MariMasak</p>
            <p class="teks">Kumpulan Resep Masakan Indonesia</p>
            <input type="text" placeholder=" Cari resep...">
            <button class="cari" type="submit"><i class="fa fa-search"></i></button> <br>
            <br> 
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="b-resep">
            <form action="" method="post" enctype="multipart/form-data" class="resep">                
                <h4>Edit Resep</h4> <br>

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
                <textarea name="bahan" id="" cols="55" rows="4.9"></textarea> <br>

                <label for="">Bumbu Halus : </label> <br>
                <textarea name="bumbu" id="" cols="55" rows="4.7"></textarea> <br>

                <label for="">Cara membuat : </label> <br>
                <textarea name="cara" id="" cols="55" rows="5.3"></textarea> <br>

                <input type="submit" name="submit" class="input" value="Simpan">
            </form>
        </div>
        <div class="kembali">
            <a href="resep-R.php" class="back"><i class="fa-regular fa-circle-left"></i> Kembali</a> 
        </div>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>