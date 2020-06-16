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

    $gambar = upload();

    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO produk VALUES (null, '$namaproduk', '$namapenjual', '$harga', '$toko', '$gambar')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpname = $_FILES['gambar']['tmp_name'];

    if ($error === 4) {
        echo "<script>
                alert('SILAHKAN PILIH GAMBAR YANG VALID !');  
            </script>";

        return false;
    }

    $gambarvalid = ['jpg', 'png', 'jpeg'];
    $ekstensivalid = explode('.', $namafile);
    $ekstensivalid = strtolower(end($ekstensivalid));

    if (!in_array($ekstensivalid, $gambarvalid)) {
        echo "<script>
                alert('TIDAK DAPAT MENGUPLOAD FILE SELAIN GAMBAR !');  
            </script>";
        return false;
    }

    if ($ukuranfile > 1000000) {
        echo "<script>
                alert('UKURAN GAMBAR TERLALU BESAR ! MAX 1MB');  
            </script>";
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensivalid;

    move_uploaded_file($tmpname, 'assets/img/' . $namafilebaru);

    return $namafilebaru;
}


function hapus($produk_id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM produk WHERE produk_id = '$produk_id'");
    return mysqli_affected_rows($conn);
}


function update($data)
{
    global $conn;
    $produk_id = $data["produk_id"];
    $namaproduk = htmlspecialchars($data["namaproduk"]);
    $namapenjual = htmlspecialchars($data["namapenjual"]);
    $harga = htmlspecialchars($data["harga"]);
    $toko = htmlspecialchars($data["toko"]);
    $gambar = upload();

    $query = "UPDATE produk SET 
                namaproduk = '$namaproduk', 
                namapenjual = '$namapenjual', 
                harga = '$harga', 
                toko = '$toko', 
                gambar = '$gambar' 
                WHERE produk_id = '$produk_id'";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function cari($keyword)
{
    $query = "SELECT * FROM produk WHERE namaproduk LIKE '%$keyword%' OR 
                                        namapenjual LIKE '%$keyword%' OR 
                                        harga LIKE '%$keyword%' OR 
                                        toko LIKE '%$keyword%'";

    return query($query);
}
