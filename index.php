<?php include('koneksi.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Point Coffe</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <center><h1>Data Produk</h1></center>
     <center><a href="tambah_produk.php">+ &nbsp; Tambah Produk </a></center>
     <br>
     <table>
        <thead>
            <th>No.</th>
            <th>Produk</th>
            <th>Kategori.</th>
            <th>Stock</th>
            <th>Harga Jual</th>
            <th>Gambar</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php 
                $query = "SELECT * FROM data_produk ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if(!$result) {
                    die("Query Error: ".mysqli_errno($koneksi)."-".mysqli_error($koneksi));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['nama_produk'];?></td>
                <td><?php echo substr($row['kategori'], 0, 20)?></td>
                <td><?php echo number_format ($row['stock'],0,',','.');?></td>
                <td>Rp<?php echo number_format ($row['harga_jual'],0,',','.');?></td>
                <td><img src="gambar/Kopi Saku.jpg?php echo $row['gambar_produk'];?>" width="100"></td>
                <td>
                    <a href="edit_produk.php?id=<?php echo $row['id'];?>">Edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['id'];?>" onclick="return confirm('anda yakin akan menghapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php
                $no++;
                }
            ?>
        </tbody>
     </table>
</body>
</html>