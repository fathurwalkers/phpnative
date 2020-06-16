<?php
require "functions.php";

$produk_id = $_GET["produk_id"];

if (hapus($produk_id) > 0) {
    echo "<script>
            alert('DATA BERHASIL DI HAPUS ! '); 
            document.location.href = '../index.php';   
        </script>";
} else {
    echo "<script>
            alert('DATA GAGAL DI HAPUS ! '); 
            document.location.href = '../index.php';   
        </script>";
}
