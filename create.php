<html lang="en">
<?php
require "engine/functions.php";

if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "<script>
                alert('DATA BERHASIL DITAMBAHKAN!'); 
                document.location.href = 'index.php';   
            </script>";
    } else {
        echo "<script>
                alert('DATA GAGAL DITAMBAHKAN!'); 
                document.location.href = 'create.php';   
            </script>";
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Produk</title>
    <style>
        @import url(https://fonts.googleapis.com/css?family=PT+Sans+Caption:400,700);

        body {
            background-color: #A5A5A5;
            color: #4D4D4D;
            font-size: 100%;
            font-family: 'PT Sans Caption', sans-serif;
            font-weight: 400;
        }

        form {
            border-top: 5px solid #01caa7;
            width: 552px;
            margin: 40px auto;
        }

        fieldset {
            margin: auto;
            width: 470px;
            height: auto;
            border: 1px solid #e5e5e5;
            border-top: 0px solid #e5e5e5;
            background: #fdfdfd;
            padding: 40px;
        }

        form div {
            padding: 0 0 40px 0;
        }

        form label {
            float: left;
            width: 200px;
            font-size: 1em;
            color: #111;
        }

        form label.mid {
            line-height: 40px;
        }

        form input,
        form select {
            background: #01caa7;
            border: 2px solid #fff;
            color: #fff;
            font-family: 'PT Sans Caption', sans-serif;
            font-size: 1em;
            font-weight: 400;
            height: 40px;
            margin: 0;
            padding: 0 10px;
            width: 240px;
            vertical-align: middle;
        }

        form input:hover,
        form select:hover,
        form textarea:hover {
            border: 2px solid #2b7b5c;
        }

        form input:focus,
        form select:focus,
        form textarea:focus {
            border-color: #2b7b5c;
            outline: none;
        }

        form select {
            float: left;
            margin-bottom: 40px;
            appearance: none;
            width: 260px;
            border-radius: 0;
        }

        form input.checkbox,
        form input.radio {
            margin: 0;
            padding: 2px 0;
            width: auto;
            height: auto;
        }

        form input.button {
            width: 270px;
            height: 40px;
            border: 0px solid #fff;
        }

        form textarea {
            width: 240px;
            height: 200px;
            padding: 10px;
            background: #01caa7;
            border: 2px solid #fff;
            color: #fff;
        }

        form input.submit {
            float: left;
            margin-left: 200px;
            width: 125px;
            height: 50px;
            color: #fff;
        }

        button {
            float: left;
            margin-left: 200px;
            width: 125px;
            height: 50px;
            color: #000;
            background-color: #01caa7;
        }

        form input.submit:hover {
            background: #1d9676;
            background: -webkit-linear-gradient(#1d9676, #01caa7);
            background: -moz-linear-gradient(#1d9676, #01caa7);
            background: -o-linear-gradient(#1d9676, #01caa7);
            background: -ms-linear-gradient(#1d9676, #01caa7);
            background: linear-gradient(#1d9676, #01caa7);
        }

        header {
            color: #fff;
        }
    </style>
</head>
<br>

<center>
    <h1>Tambah Data Produk</h1>
</center>

<body>
    <form action="" method="post">
        <fieldset>
            <div>
                <label for="produk" class="mid">Nama Produk :</label>
                <input type="text" name="namaproduk" id="produk" tabindex="1" autofocus required>
            </div>
            <div>
                <label for="penjual" class="mid">Nama Penjual :</label>
                <input type="text" name="namapenjual" id="penjual" tabindex="1" required>
            </div>
            <div>
                <label for="hargaproduk" class="mid">Harga :</label>
                <input type="text" name="harga" id="hargaproduk" tabindex="1" required>
            </div>
            <div>
                <label for="namatoko" class="mid">Nama Toko :</label>
                <input type="text" name="toko" id="namatoko" tabindex="1" required>
            </div>
            <div>
                <label for="namagambar" class="mid">Gambar :</label>
                <input type="text" name="gambar" id="namagambar" tabindex="1" required>
            </div>
            <div>
                <button type="submit" class="submit" name="submit">Tambah Data</button>
            </div>

        </fieldset>

    </form>
</body>

</html>