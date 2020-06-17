<html lang="en">

<?php

require "engine/functions.php";

if (isset($_POST["register"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Selamat, Anda berhasil mendaftar!'); 
                document.location.href = 'index.php';   
            </script>";
    } else {
        echo "<script>
                alert('Data Valid, anda gagal mendaftar'); 
                document.location.href = 'register.php';   
            </script>";
    }
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <style>
        body {
            height: 100vh;
            width: 100vw;
            padding: 0;
            margin: 0;
            background-color: #FFAEBD;
            font-family: "Roboto", sans-serif;
            padding: 30px;
        }

        .login-container {
            height: 100%;
            width: 100%;
            background-color: #FFAEBD;
        }

        .form-wrapper {
            background-color: #fff;
            min-height: 300px;
            width: 340px;
            margin: 45px auto;
            box-shadow: 2px 4px 12px #ededed;
            border: 1px solid #eee;
            padding: 30px 25px;
            border-radius: 3px;
        }

        .form-img {
            display: block;
            width: 400px;
            margin: 0 auto 20px auto;
            box-shadow: 1px black;
        }

        .input-group {
            margin: 0 0 24px 0;
        }

        .label {
            font-size: 14px;
            display: block;
            margin: 2px 0 6px 2px;
            font-weight: bold;
            color: #616161;
        }

        .label-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .link {
            text-decoration: none;
            color: #4eb8dd;
            font-size: 14px;
            cursor: pointer;
        }

        .link:hover {
            text-decoration: underline;
        }

        .input {
            width: 100%;
            padding: 12px 12px;
            box-sizing: border-box;
            /*   background-color: #eee; */
            background-color: #eff3f4;
            border: 1.5px solid transparent;
            font-size: 16px;
            border-radius: 3px;
            transition: 0.2s ease-in;
        }

        .input:focus {
            outline: none;
            border-color: #4eb8dd;
        }

        .login-btn {
            width: 100%;
            color: #fff;
            text-align: center;
            background-color: #4eb8dd;
            border: 1px solid transparent;
            padding: 12px 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 3px;
        }

        .login-btn:hover {
            background-color: #3c99b9;
        }

        .line {
            height: 1px;
            width: 35%;
            background-color: #bbb;
        }

        .oauth-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .o-btn {
            width: 48%;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px 0;
            padding: 12px 7px;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 3px;
            cursor: pointer;
        }

        .p {
            font-size: 12px;
            text-align: center;
            color: #bbb;
            margin: 25px 0 0 0;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="login-container">
        <img class="form-img" src="assets/img/tbrheader.png" alt="">
        <div class="form-wrapper">

            <form action="" class="form" method="post">
                <div class="input-group">
                    <label for="username" class="label">Username</label>
                    <input name="username" type="text" class="input" placeholder="Masukkan username baru anda.." autocomplete="off">
                </div>

                <div class="input-group">
                    <div class="label-flex">
                        <label for="username" class="label">Password</label>
                    </div>
                    <input name="password" type="password" class="input" placeholder="password baru anda..">
                </div>

                <div class="input-group">
                    <div class="label-flex">
                        <label for="username" class="label">Konfirmasi Password</label>
                    </div>
                    <input name="password2" type="password" class="input" placeholder="password baru anda..">
                </div>

                <button type="submit" name="register" class="login-btn">Daftar Sekarang</button>

            </form>

            <div class="or-container">

                <p class="p">Sudah punya akun? <a href="login.php" class="link">Login disini</a></p>
            </div>
        </div>

</body>

</html>