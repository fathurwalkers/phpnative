<?php

// Memanggil file Functions.php yang berisi semua Logic dari Aplikasi ini 
// Guna nya untuk menerapkan Gaya Templating 
require "engine/functions.php";

// Setelah Function Query() dikirim ke Halaman index ini 
// Hasil nya akan mengembalikan Array Associative berisi data dari database yang sudah di query dan di fetch
// Dan array tersebut di simpan dalam sebuah Variable bernama $products
// Nantinya kita bisa memakai Variable $products ini untuk mengeluarkan / menampilkan data pada isi dari variable tsb
// yang berupa Array Associative 
$products = query("SELECT * FROM produk");

if (isset($_POST["cari"])) {
    $products = cari($_POST["keyword"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Distributor Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/javascript" href="assets/index.js">
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-survival101">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="assets/img/tbrheader.png" alt="Techno Buton Raya" width="200px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarColor02">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="create.php">Tambah Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Logout<i class="ion-ios-arrow-down"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

        </nav>

    </header>
    <br>
    <br>
    <main>
        <h1>
            Informasi Produk
        </h1>
        <center>
            <form action="" method="post">
                <input type="text" name="keyword" placeholder="Cari produk anda..." autofocus autocomplete="off">
                <button type="submit" name="cari">Cari</button>
            </form>
        </center>
        <br>
        <table class="rwd-table">
            <thead>
                <tr>
                    <th>
                        No. Produk
                    </th>
                    <th>
                        Nama Produk
                    </th>
                    <th>
                        Nama Penjual
                    </th>
                    <th>
                        Harga
                    </th>
                    <th>
                        Distributor
                    </th>
                    <th>
                        Gambar
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                <!-- Menyiapkan Variable yang nantinya dipakai sebagai Nomor  -->
                <?php $i = 1; ?>

                <!-- Melakukan Operator Foreach, yang artinya  
             Variable $products tadi sudah berisi data Array Associative 
             Maka dari itu kita menggunakan foreach untuk mengeluarkan isi array associative tadi
             dan menyimpannya dalam bentuk satuan data ke variable $row
             dan nantinya kita dapat memanggil array associative tersebut sesuai dengan sifatnya -->
                <?php foreach ($products as $row) : ?>
                    <tr>
                        <td>
                            <?= $i; ?>
                        </td>
                        <td>
                            <?= $row["namaproduk"]; ?>
                        </td>
                        <td>
                            <?= $row["namapenjual"]; ?>
                        </td>
                        <td>
                            <?= $row["harga"]; ?>
                        </td>
                        <td>
                            <?= $row["toko"]; ?>
                        </td>
                        <td>
                            <img src="assets/img/<?= $row["gambar"]; ?>" width="65px">
                        </td>
                        <td>
                            <a href="edit.php?produk_id=<?= $row["produk_id"]; ?>" class="btn btn-info">Edit </a>
                            <a href="engine/hapus.php?produk_id=<?= $row["produk_id"]; ?>" class="btn btn-warning">Hapus </a>
                        </td>
                    </tr>
                    <?php $i++; ?>
                <?php endforeach; ?>

            </tbody>
        </table>
        <br>
        <br>
    </main>
    <script src="assets/index.js"></script>
</body>

</html>