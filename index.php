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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Distributor Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <style>
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-lg py-3 px-4">
            <a href="#" class="navbar-brand">
                COFFEE LOVE
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span> </span>
                <span> </span>
                <span> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto text-right">
                    <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                        <a href="#" class="nav-link">
                            COFFEES
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                        <a href="#" class="nav-link">
                            ABOUT
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                        <a href="#" class="nav-link">
                            CONTACT US
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="collapse" data-target=".navbar-collapse.show">
                        <a href="#" class="nav-link">
                            EQUIPMENT
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
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
</body>

</html>