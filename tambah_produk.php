<?php include('koneksi.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD POINT COFFE</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <center><h1>Tambah Produk</h1></center>
    <form method="POST" action="proses_tambah.php" enctype="multipart/form-data">
    <section class="base">
    <div>
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" autofocus="" required="" />
    </div>
    <div>
        <label>Kategori</label>
        <input type="text" name="kategori"/>
    </div>
    <div>
        <label>Stock</label>
        <input type="text" name="stock" required="" />
    </div>
    <div>
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" required="" />
    </div>
    <div>
        <label>Gambar Produk</label>
        <input type="file" name="gambar_produk" required="" />
    </div>
    <div>
        <button type="submit">Simpan Produk</button>
    </div>
</body>
</html>