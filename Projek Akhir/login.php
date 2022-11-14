<?php
    session_start();

    require 'config.php';

    if(isset($_POST['login'])) {
        $uname = $_POST['username'];
        $pword = $_POST['password'];

        $query = "SELECT * FROM akun WHERE email = '$uname' OR username = '$uname'";
        $result = $db->query($query);
        $row = mysqli_fetch_array($result);
        $user = $row['username'];

        if(password_verify($pword, $row['katasandi'])) {
            $_SESSION['login'] = $row;

            echo"
                <script>
                    alert('SELAMAT DATANG $user');
                    document.location.href = 'index.php';
                </script>
            ";
        } else {
            echo"
                <script>
                    alert('Username atau Password anda salah !!');
                    document.location.href = 'login.php';
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
    <link rel="stylesheet" href="fontawesome-free/css/all.min.css">
    <style>
        body {
            background-image: url("gambar/wallpaper-login.jpeg");
        }
        .main {
            opacity: 0.9;
            background-image: linear-gradient(to right top, #00abe0, #00b8e9, #00c4f1, #00d1f8, #00deff);
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            padding: 20px 25px;
            width: 300px;
            border-radius: 5px;
        }
        h3 {
            text-align: center;
            padding-bottom: 5px;
            border-bottom: 2px solid black;
        }
        .form {
            width: 295px;
            height: 25px;
            border: none;
            background-color: transparent;
            border-bottom: 2px solid black;
            margin-top: 10px;
            margin-bottom: 15px;
        }
        .button {
            width: 300px;
            height: 30px;
            border: none;
            background-color: skyblue;
        }
        .button:hover {
            background-color: blue;
            color: white;
            font-weight: bold;
        }
        .akun {
            text-decoration: none;
            color: red;
        }
    </style>
</head>
<body>
    <div class="main">
        <form action="" method="post">
            <label><h3>LOGIN</h3></label>

            <input type="text" name="username" class="form" placeholder="Email / Username"> <br>

            <input type="password" name="password" class="form" placeholder="Password"><br>

            <input type="submit" name="login" class="button" value="Log in"><br>
            <p>
                Belum punya akun ? <a href="register.php" class="akun">Register</a>
            </p>
        </form>
    </div>
</body>
</html>