<?php
// Pastikan koneksi ke database sudah dimasukkan sebelumnya
include 'koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$kategori = $_POST['kategori'];
$stock = $_POST['stock'];
$harga_jual = $_POST['harga_jual'];
$gambar = $_FILES['gambar_produk']['name'];

if ($gambar != "") {
    $ekstensi_diperbolehkan = array('jpg', 'png');
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $nama_gambar_baru = uniqid() . '.' . $ekstensi; // Membuat nama unik untuk gambar
    $tmp_file = $_FILES['gambar_produk']['tmp_name'];

    // Periksa ekstensi file
    if (in_array($ekstensi, $ekstensi_diperbolehkan)) {
        // Pindahkan file gambar ke folder tujuan
        move_uploaded_file($tmp_file, 'gambar/' . $nama_gambar_baru);

        // Query untuk menambahkan data ke database
        $query = "UPDATE data_produk SET nama_produk = '$nama_produk',kategori = '$kategori',stock = '$stock',harga_jual = '$harga_jual',gambar_produk = '$nama_gambar_baru'";
        $query .= "WHERE id  = '$id'";
        $result = mysqli_query($koneksi, $query);

        // Periksa apakah query berhasil
        if (!$result) {
            die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
        } else {
            echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi gambar hanya bisa jpg dan png!');window.location='edit_produk.php';</script>";
    }
} else {
    $query = "UPDATE data_produk SET nama_produk = '$nama_produk',kategori = '$kategori',stock = '$stock',harga_jual = '$harga_jual',gambar_produk = '$nama_gambar_baru'";
    $query = "WHERE id  = '$id'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    } else {
        echo "<script>alert('Data berhasil diubah!');window.location='index.php';</script>";
    }
}

?>
