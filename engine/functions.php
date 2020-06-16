<?php
$conn = mysqli_connect("localhost", "root", "", "crudnative");

// READ ( Menampilkan data ke Halaman Index )
// Kita menggunakan Variable $query 
// Artinya Variable $query berasal dari apa yang kita Tulis di halaman Index
// Halaman index akan mengirimkan string yang kita tulis, dan nilai nya akan di simpan di dalam Variable $query
function query($query)
{
    global $conn;

    // Melakukan Query untuk memilih data pada Table "Produk" 
    $result = mysqli_query($conn, $query);

    // Menyiapkan Array kosong untuk tempat penyimpanan data yang sudah di Query / Select nanti 
    $rows = [];

    // Melakukan Fetch ( Pengambilan data satu-persatu ) pada setiap isi dari tiap - tiap Field 
    // pada Table Produk 
    while ($row = mysqli_fetch_assoc($result)) {

        // Menyimpan data yang sudah di Query pada Variable $row ke variable $rows yang berupa array kosong. 
        // Variable dari $rows kini sudah memiliki data dari Table Produk berupa Array Assosiative
        $rows[] = $row;
    }
    // Mengembalikan hasil dari operasi While ke $rows, agar Function Query() nanti nya menghasilkan nilai $rows
    // Dan nilai serta Function Query() nantinya akan di kirim ke halaman Index 
    return $rows;
}


function tambah($data)
{
    global $conn;
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $namapenjual = htmlspecialchars($data["namapenjual"]);
    $harga = htmlspecialchars($data["harga"]);
    $toko = htmlspecialchars($data["toko"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $query = "INSERT INTO produk VALUES (null, '$namaproduk', '$namapenjual', '$harga', '$toko', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function hapus($produk_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '$produk_id'");
    return mysqli_affected_rows($conn);
}
