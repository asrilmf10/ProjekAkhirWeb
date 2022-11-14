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
        .nama {
            background-color: #DC751E;
        }
        .h-list a.register {
            background-color: #00ABE0;
            color: white;
        }
        .h-list a.register:hover {
            color: black;
        }
        .h-list a.home {
            background-color: #00DEFF;
            color: black;
        }
        .h-list a.home:hover {
            color: white;
        }
        .regis {
            border: 2px solid;
            border-radius: 25px;
            width: 450px;
            margin: 25px 380px;
            padding: 5px 25px 5px 20px;
        }
        .regis a {
            text-decoration: none;
            color: red;
            margin-top: 0px;
        }
        .n-logo {
            padding: 15px;
        }
        .switch {
            font-size: 12px;
            border-radius: 3px;
            margin-top: 5px;
        }
        .switch:hover {
            font-weight: bold;
        }
        h3 {
            text-align: center;
        }
        .form-regis {
            width: 100%;
            height: 25px;
            margin: 2.5px 0px 5px;
        }
        .btn-send {
            width: 70px;
            height: 25px;
            margin: 2px 0px 0px 195px;
            font-size: 15px;
            border-style: none;
            border-radius: 25px;
            background-color: #00ABE0;
            color: black;
        }
        .btn-send:hover {
            background-color: #00DEFF;
            color: white;
        }
        .akun {
            padding-top: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
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
            <a class="nama" href="#"><i class="fa-solid fa-user-tie"></i> <?php echo $user ?></a>
            <?php
                }
            ?>

            <a class="home" href="index.php"><i class="fa-solid fa-house"></i> Beranda</a>
            <a class="register" href="register.php"><i class="fa-solid fa-right-to-bracket"></i> Daftar</a>
            <a class="profil" href="akun.php"><i class="fa-solid fa-circle-user"></i> Profil</a>
            <a class="aboutMe" href="about.php"><i class="fa-solid fa-circle-info"></i> Tentang</a>
            <a class="menu-resep" href="resep.php"><i class="fa-solid fa-bars"></i> Daftar Resep</a>
            <a href="request.php"><i class="fa-solid fa-circle-plus"></i> Request Resep</a>
        </div>
    </div>
    <div class="navbar">
        <div class="n-logo">
            <p class="logo">MariMasak</p>
            <p class="teks">Kumpulan Resep Masakan Indonesia</p>
            <br> <button class="switch" onclick="myFunction()"><i class="fa-solid fa-sun"></i> Change Mode</button>
        </div>
    </div>
    <div class="main">
        <div class="regis">
            <form action="" method="post">
                <label><h3>Daftar Akun</h3></label>

                <label for="email">Email</label><br>
                <input type="email" name="email" class="form-regis"><br>

                <label for="nama">Username</label><br>
                <input type="text" name="uname" class="form-regis"><br>

                <label for="password">Password</label><br>
                <input type="password" name="pword" class="form-regis"><br>

                <label for="konfirmasi">Konfrimasi Password</label><br>
                <input type="password" name="konfirmasi" class="form-regis"><br>

                <input type="submit" name="submit" class="btn-send" value="Daftar">
            </form>
            <p class="akun">Sudah punya akun ? 
                <a href="login.php">Login</a>
            </p>
        </div>
    </div>
    <div class="footer">
        <div class="f-teks">
            <p>@Copyright 2022 - by 3C1-20</p>
        </div>
    </div>
</body>
</html>

<?php 
    require 'config.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $uname = $_POST['uname'];
        $pword = $_POST['pword'];

        $konfirmasi = $_POST['konfirmasi'];

        $user = $db->query("SELECT * FROM akun WHERE email='$email'");
        $num_user = mysqli_num_rows($user);
        if($num_user > 0) {
            echo "
                <script>
                    alert('Email telah digunakan');
                </script>
            ";
        } else {
            if($pword == $konfirmasi) {
                $pword = password_hash($pword, PASSWORD_DEFAULT);
                
                $query = "INSERT INTO akun (email, username, katasandi) VALUES ('$email', '$uname', '$pword')";
                $result = $db->query($query);

                if($result) {
                    echo "
                        <script>
                            alert('Registrasi Berhasil');
                            document.location.href = 'akun.php';
                        </script>
                    ";
                } else {
                    echo "
                        <script>
                            alert('Registrasi Gagal');
                        </script>
                    ";
                }
            } else {
                echo "
                    <script>
                        alert('Password Salah !!');
                    </script>
                ";
            }
        }
    }
?>