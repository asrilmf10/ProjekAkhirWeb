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
        .h-list a.about {
            background-color: #00ABE0;
            color: white;
        } 
        .h-list a.about:hover {
            color:black;
        }
        .n-logo {
            padding-top: 15px;
        }
        .tentang {
            position: fixed;
            padding: 10px 414px;
        }
        h3 {
            text-align: center;
            padding-bottom: 10px;
        }
        .profil {
            border: 1px solid black;
        }
        .data {
            padding-left: 20px;
        }
        .media {
            text-decoration: none;
            color: black;
        }
        .media:hover {
            color: red;
        }.switch {
            font-size: 12px;
            border-radius: 3px; 
            margin-top: 5px;
        }
        .switch:hover {
            font-weight: bold;
        }
        .dark-mode .main a.media{
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="h-list">
            <a class="home" href="admin.php"><i class="fa-solid fa-house"></i> Beranda</a>
            <a class="about" href="about-a.php"><i class="fa-solid fa-circle-info"></i> Tentang</a>
            <a class="" href="#"><i class="fa-solid fa-user"></i> Daftar Akun</a>
            <a class="menu-resep" href="resep-R.php"><i class="fa-solid fa-bars"></i> Daftar Resep</a>
            <a class="resep" href="resep-C.php"><i class="fa-solid fa-circle-plus"></i> Buat Resep</a>
            <a href="#"><i class="fa-solid fa-bars"></i> Daftar Request</a>
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
        <div class="tentang">
            <h3>Projek Akhir Praktikum Pemrograman Web <br>
                Resep Masakan Indonesia <br>
                Kelompok 3C1-20
            </h3>
            <table width="450px">
                <tr>
                    <th width="150px" height="175x" class="profil"> <img src="gambar/athief.jpg" width="150px"  height="175x"> </th>
                    <th width="150px" height="175px" class="profil"> <img src="gambar/asril.jpg" width="150px"  height="175x"> </th>
                    <th width="150px" height="175px" class="profil"> <img src="gambar/adrian.jpeg" width="150px"  height="175x"> </th>
                </tr>
                <tr>
                    <td class="data">Athief Naufal R.<br>
                        2009106101 <br>
                        <a class="media" href="https://www.instagram.com/bukanatip"><i class="fa-brands fa-instagram"></i> bukanatip</a>
                    </td>
                    <td class="data">Asril Muhamad F.<br>
                        2009106109 <br>
                        <a class="media" href="https://www.instagram.com/asrilmf"><i class="fa-brands fa-instagram"></i> asrilmf</a>
                    </td>
                    <td class="data">Adrian Tasmin <br>
                        2009106112 <br>
                        <a class="media" href="https://www.instagram.com/ts_adriannn"><i class="fa-brands fa-instagram"></i> ts_adriannn</a>
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