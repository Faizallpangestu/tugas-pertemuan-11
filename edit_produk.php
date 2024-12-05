<?php include('koneksi.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM data_produk where id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die("Query Error: " . mysqli_errno($koneksi) . " - " . mysqli_error($koneksi));
    }
    $data = mysqli_fetch_assoc($result);

    if(!count($data)) {
        echo "<script>alert('Data tidak ditemukan dalam tabel.');window.location='index.php';</script>";
    }

} else {
    echo "<script>alert('Masukkan ID yang ingin di EDIT');window.location='index.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD POINT COFFE</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <center><h1>EDIT PRODUK <?php echo $data['nama_produk'];?></h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
    <div>
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" autofocus="" required="" value="<?php echo $data['nama_produk'];?>"/>
        <input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
    </div>
    <div>
        <label>Kategori</label>
        <input type="text" name="kategori" value="<?php echo $data['kategori'];?>"/>
    </div>
    <div>
        <label>Stock</label>
        <input type="text" name="stock" required="" value="<?php echo $data['stock'];?>"/>
    </div>
    <div>
        <label>Harga Jual</label>
        <input type="text" name="harga_jual" value="<?php echo $data['harga_jual'];?>"/>
    </div>
    <div>
        <label>Gambar Produk</label>
        <img src="gambar/<?php echo $data['gambar_produk'];?>" style="width: 120px;float:left;margin-bottom: 5px;">
        <input type="file" name="gambar_produk" required="" />
        <i style="float: left;font-size: 11px;color: red;">Abaikan jika tidak merubah gambar produk i>
    </div>
    <div>
        <button type="submit">Simpan Perubahan</button>
    </div>
</body>
</html>