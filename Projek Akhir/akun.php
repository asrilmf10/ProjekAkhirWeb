<?php
    session_start();

    require 'config.php';
    
    if(!isset($_SESSION['login'])) {
        header("Location: login.php");
        exit;
    }

    $result = mysqli_query($db, "SELECT * FROM akun");

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $kirim = mysqli_query($db, "INSERT INTO akun (email, username, katasandi) VALUES ('$email', '$uname', '$pword')");
        if($kirim) {
            header("Location:akun.php");
        } else {
            echo "INVALID !!";
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
        .h-list a.profil {
            background-color: #00ABE0;
            color: white;
        }
        .h-list a.profil:hover {
            color: black;
        }
        .h-list a.home {
            background-color: #00DEFF;
            color: black;
        }
        .h-list a.home:hover {
            color: white;
        }
        .switch {
            font-size: 12px;
            border-radius: 3px;
            margin-top: 5px;
        }
        .switch:hover {
            font-weight: bold;
        }
        .head {
            text-align: center;
        }
        .edit {
            color: black;
        }
        .edit:hover {
            color: red;
        }
        .tabel {
            margin: 25px 470px;
        }
        .data {
            padding-left: 5px;
        }
        .logout {
            text-decoration: none;
        }
        h4 {
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            color: whitesmoke;
            border: 2px solid #00DEFF;
            border-radius: 5px;
            margin-left: 130px;
            margin-right: 130px;
            background-color: #00DEFF;
        }
        h4:hover {
            font-weight: bold;
            border: 2px solid #00ABE0;
            background-color: #00ABE0;
            color: black;
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
            <p class="teks">Kumpulan Resep Masakan Indonesia</p> <br>
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <table width="350px" class="tabel">
            <tr>
                <th class="head" colspan="4">
                    <h3>Profil Anda</h3>
                </th>
            </tr>
            
            <?php
                if(isset($_SESSION['login'])){
                $user = $_SESSION['login']['username'];
                } 
                $query = "SELECT * FROM akun WHERE username = '$user'";
                $result = $db->query($query);
                while($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td class="data" width="70px">Email</td>
                <td width="5px"> : </td>
                <td class="data" width="170px"><?=$row['email'] ?></td>
                <td width="95x" rowspan="2"><img src="gambar/profil.png"></td>
            </tr>
            <tr>
                <td class="data">Username</td>
                <td> : </td>
                <td class="data"><?=$row['username'] ?></td>
            </tr>
            <?php
                }
            ?>
            <tr>
                <td colspan="4">
                    <a href="logout.php" class="logout">
                        <h4>Logout <i class="fa-solid fa-right-from-bracket"></i></h4>
                    </a>
                </td>
            </tr>
        </table>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>